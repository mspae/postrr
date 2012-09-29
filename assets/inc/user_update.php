<section class="thr">
  <div class="inner">
    <h2><?php echo UPDATE_USER ?></h2>
    <div class="content">
    <?php
    // falls keine post-id mit get gesetzt wurde, zeige fehlermeldung und beende
    if (!isset($_GET['uid'])) {
      echo ERROR_USERFORM_NOID;
      return;
    }
    // post-id aus get-variable ziehen
    $uid=$_GET['uid'];
    // post auswaehlen durch die id
    $sql="SELECT * FROM Users WHERE ID={$uid}";
    // query definieren
    $query=mysqli_query($dbconnect,$sql);
    // array mit beitragsinhalten machen
    $user=mysqli_fetch_array($query);

    ?>
      <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=updateusers&uid=' . $user['ID']; ?>" method="post">
        <label for="username">
          <?php echo LABEL_USERNAME ?>
          <input type="text" name="username" value="<?php echo $user['Username'] ?>" />
        </label>
        <label for="email">
          <?php echo LABEL_EMAIL ?>
          <input type="text" name="email" value="<?php echo $user['Email'] ?>" />
        </label>
        <label for="info">
          <?php echo LABEL_INFO ?>
          <textarea name="info"><?php echo $user['Info'] ?></textarea>
        </label>
        <input type="submit" name="formaction" value="<?php echo SUBMIT_UPDATEUSER ?>" />
        <input type="submit" name="deleteaction" value="<?php echo SUBMIT_DELETEUSER ?>" />
      </form>
      <?php

      if (isset($_POST['formaction'])) {
        if (($username = trim($_POST['username'])) == '') {
          echo '<p class="error userform form">' . ERROR_USERFORM_EMPTYNAME . '</p>';
        } else if (($email = trim($_POST['email'])) == '') {
          echo '<p class="error userform form">' . ERROR_USERTFORM_EMPTYEMAIL . '</p>';
        } else if (($info = trim($_POST['info'])) == '') {
          echo '<p class="error userform form">' . ERROR_USERFORM_EMPTYINFO . '</p>';
        } else {
          // query definieren mit formular inhalten
          $sql="UPDATE Users SET Username='{$username}', Email='{$email}', Info='{$info}' WHERE ID={$uid}";
          mysqli_query($dbconnect, $sql);
          // zuerueck zur einzelansicht
          header("Location: {$_SERVER['PHP_SELF']}?id=u&uid={$user['ID']}");
        }
      }
      // falls delete button gedrueckt wurde
      if (isset($_POST['deleteaction'])) {
        // diesen query
        $sql="DELETE FROM Users WHERE ID={$uid}";
        // laufen lassen
        mysqli_query($dbconnect, $sql);
        // und zur homepage zurueck
        header("Location: {$_SERVER['PHP_SELF']}");
      }
      ?>
    </div>
  </div>
</section>