<section class="two">
  <div class="inner">
    <div class="content">
      <h3>Kontenverwaltung bei postrr</h3>
      <p>Es wurde noch kein Rechtesystem implementiert. Ein Benutzer mit Zugang kann alles.</p>
    </div>

  </div>
</section>
<section class="thr">
  <div class="inner">
    <h2><?php echo ADD_USER ?></h2>
    <div class="content">
      <form action='<?php echo $_SERVER['PHP_SELF']; ?>?id=addusers' method="post">
        <label for="username">
          <?php echo LABEL_USERNAME ?>
          <input type="text" name="username" />
        </label
        <label for="password">
          <?php echo LABEL_PASSWORD ?>
          <input type="password" name="password[]" />
        </label>
        <label for="password">
          <?php echo LABEL_PASSWORDREPEAT ?>
          <input type="password" name="password[]" />
        </label>
        <label for="email">
          <?php echo LABEL_EMAIL ?>
          <input type="text" name="email" />
        </label>
        <label for="info">
          <?php echo LABEL_INFO ?>
          <textarea name="info"></textarea>
        </label>
        <input type="submit" name="formaction" value="<?php echo SUBMIT_ADDUSER ?>" />
      </form>
      <?php
      if (isset($_POST['formaction'])) {
        // pruefen ob der benutzername nicht nur aus leerzeichen besteht, als variable username
        if (($username = trim($_POST['username'])) == '') {
          echo '<p class="error userform form">' . ERROR_USERFORM_EMPTYUSERNAME . '</p>';
        }
        // pruefen ob info nicht nur aus leerzeichen besteht, als variable info
        if (($info = trim($_POST['info'])) == '') {
          echo '<p class="error userform form">' . ERROR_USERFORM_EMPTYINFO . '</p>';
        }
        // pruefen ob email nich nur aus leerzeichen besteht, als variable email
        if (($email = trim($_POST['email'])) == '') {
          echo '<p class="error userform form">' . ERROR_USERFORM_EMPTYEMAIL . '</p>';
        }
        // pruefen ob password array ist, ob es zwei werte hat und auch ohne leerzeichen gefüllt sind
        if (!is_array($_POST['password']) OR
          count($_POST['password']) != 2 OR
          $pw1=trim($_POST['password'][0]) == '' OR
          $pw2=trim($_POST['password'][1]) == '') {
          echo '<p class="error userform form">' . ERROR_USERFORM_EMPTYPASSWORD . '</p>';
        }
        // pruefen ob password wert eins gleich wert zwei ist
        if ($_POST['password'][0] != $_POST['password'][1]) {
          echo '<p class="error userform form">' . ERROR_USERFORM_PWMISMATCH . '</p>';
        } else {
          // ansonsten in variable password speichern
          $password=$_POST['password'][0];
        }
        // ueberpruefen ob der name zwischen 3 und 30 zeichen enthällt und keine leerzeichen
        if (!preg_match('~\A\S{3,30}\z~', $username)) {
          echo '<p class="error userform form">' . ERROR_USERFORM_USERNAME . '</p>';
        }


        // Benutzer mit Namen
        $sql = 'SELECT ID FROM Users WHERE Username = ? LIMIT 1';
        $stmt = $dbconnect->prepare($sql);
        if (!$stmt) {
          return $dbconnect->error;
        }
        // ... aus dem formular
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
        // falls es ergebnisse gibt
        if ($stmt->num_rows) {
          echo '<p class="error userform form">' . ERROR_USERFORM_DOUBLEUSERNAME . '</p>';
        }
        $stmt->close();


        
        // einfügen der daten
        $sql = 'INSERT INTO Users(Username, Email, Info) VALUES (?, ?, ?)';
        $stmt = $dbconnect->prepare($sql);
        if (!$stmt) {
          return $dbconnect->error;
        }
        // username, email, info
        $stmt->bind_param('sss', $username, $email, $info);
        if (!$stmt->execute()) {
          return $stmt->error;
        }
        // UserID ist die auto-increment ID des Users beim eintragen
        $UserID = $stmt->insert_id;
        // setze Passwort fuer benutzer
        $sql = 'UPDATE Users SET Password = ? WHERE ID = ?';
        $stmt = $dbconnect->prepare($sql);
        if (!$stmt) {
          return $dbconnect->error;
        }
        // passwort umrechnen mit der md5 funktion, input ist die UserID und das Passwort
        $Hash = md5(md5($UserID).$password);
        // Password ist $Hash, ID ist $UserID
        $stmt->bind_param('si', $Hash, $UserID);
        if (!$stmt->execute()) {
          return $stmt->error;
        }
      } else {
        // keine _POST action, normale anzeige
        return true;
      }
      ?>
    </div>
  </div>
</section>
