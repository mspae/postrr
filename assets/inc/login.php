<?php
  include('info.php');
?>

<section class="thr">
  <div class="inner">
    <h2><?php echo LOGIN_TITLE; ?></h2>
    <div class="content">
      
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=login" method="post">
        <label><?php echo LABEL_USERNAME ?>
          <input type="text" name="username" />
        </label>
        <label>
          <?php echo LABEL_PASSWORD ?>
          <input type="password" name="password" />
        </label>
        <input type="submit" name="formaction" value="<?php echo SUBMIT_LOGIN ?>" />
      </form>
      <?php
      if ('POST' == $_SERVER['REQUEST_METHOD']) {
        // pruefen ob der benutzername nicht nur aus leerzeichen besteht, als variable username
        if (($username = trim($_POST['username'])) == '') {
          echo '<p class="error userform form">' . ERROR_USERFORM_EMPTYUSERNAME . '</p>';
        }
        // pruefen ob das password nicht nur aus leerzeichen besteht, als variable password
        if (($password = trim($_POST['password'])) == '') {
          echo '<p class="error userform form">' . ERROR_USERFORM_EMPTYPASSWORD . '</p>';
        } else {
          $sql = 'SELECT
                    ID
                  FROM
                    Users
                  WHERE
                    Username = ?';
          $stmt = $dbconnect->prepare($sql);
          if (!$stmt) {
            return $dbconnect->error;
          }
          $stmt->bind_param('s', $username);
          if (!$stmt->execute()) {
            return $stmt->error;
          }
          $stmt->bind_result($UserID);
          if (!$stmt->fetch()) {
            echo '<p class="error userform form">' . ERROR_LOGIN_USERNAME . '</p>';
          }
          $stmt->close();
          $sql = 'SELECT
                    Password
                  FROM
                    Users
                  WHERE
                    ID = ? AND
                    Password = ?';
          $stmt = $dbconnect->prepare($sql);
          if (!$stmt) {
            return $dbconnect->error;
          }
          $Hash = md5(md5($UserID).$password);
          $stmt->bind_param('is', $UserID, $Hash);
          if (!$stmt->execute()) {
            return $stmt->error;
          }
          $stmt->bind_result($Hash);
          if (!$stmt->fetch()) {
            echo '<p class="error userform form">' . ERROR_LOGIN_PASSWORD . '</p>';
          } else {
            echo '<p class="success userform form">' . SUCCESS_LOGIN . '</p>';
            $stmt->close();
            $_COOKIE['UserID'] = $UserID; // fake-cookie setzen
            $_COOKIE['Password'] = $Hash; // fake-cookie setzen
            setcookie('UserID', $UserID, strtotime("+1 month"));
            setcookie('Password', $Hash, strtotime("+1 month"));
            ob_flush();
          }
        }
      }
      ?>
    </div>
  </div>
</section>