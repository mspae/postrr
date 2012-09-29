<section class="thr">
  <div class="inner">
    <h2><?php echo LIST_USER ?></h2>
    <div class="content">
      <?php
      $sql='SELECT * FROM Users';
      $query=mysqli_query($dbconnect,$sql);
      while ($users=mysqli_fetch_assoc($query)) {
        echo '<article>';
        echo '<h3><a href="' . $_SERVER['PHP_SELF'] . '?id=u&uid=' . $users['ID'] . '" >' . $users['Username'] . '</a></h3>';
        echo '<div class="meta"><p class="email">' . $users['Email'] . '</p></div>';
        echo '<div class="usertext">' . $users['Info'] . '</div>';
        echo '<div class="actionblock"><a href="' . $_SERVER['PHP_SELF'] . '?id=updateusers&uid=' . $users['ID'] . '">' . LABEL_USER_EDIT . '</a></div>';
        echo '</article>';
      }
      ?>
    </div>
  </div>
</section>