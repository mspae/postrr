<section class="thr">
  <div class="inner">
    <div class="content">
      <?php
      // uid get variable ist $uid
      $uid=$_GET['uid'];
      // select den benutzer mit $uid als ID
      $sql="SELECT * FROM Users WHERE ID={$uid}";
      $query=mysqli_query($dbconnect,$sql);
      // mache einen array aus dem datensatz
      $user=mysqli_fetch_array($query);
      // stelle den datensatz so dar
      echo '<article>';
      echo '<h3><a href="?id=u&uid=' . $user['ID'] . '" name="' . $user['Username'] . '">' . $user['Username'] . '</a></h3>';
      echo '<div class="meta"><p class="email">' . $user['Email'] . '</p></div>';
      echo '<div class="text">' . $user['Info'] . '</div>';
      // falls eingeloggt
      if (getUserID($dbconnect)) {
        // zeige bearbeiten link
        echo '<div class="actionblock"><a href="' . $_SERVER['PHP_SELF'] . '?id=updateusers&uid=' . $user['ID'] . '">' . LABEL_USER_EDIT . '</a></div>';
      }
      echo '</article>';
      ?>
    </div>
  </div>
</section>