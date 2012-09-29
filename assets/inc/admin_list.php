<section class="thr">
  <div class="inner">
    <h2><?php echo ADMIN_LIST ?></h2>
       <div class="content">
    <?php
      $sql='SELECT * FROM Posts ORDER BY Time DESC';
      $query=mysqli_query($dbconnect,$sql);
      while ($posts=mysqli_fetch_assoc($query)) {
        echo '<article>';
        echo '<h3><a href="?id=s&p=' . $posts['ID'] . '" title="' . $posts['Title'] . '">' . $posts['Title'] . '</a></h3>';
        echo '<div class="meta"><p class="category">' . POSTED_IN . $posts['Category'] . '</p>';
        echo '<p class="time">' . POSTED_ON . $posts['Time'] . '</p></div>';
        echo '<div class="text">' . $posts['Content'] . '</div>';
        echo '<div class="actionblock"><a href="' . $_SERVER['PHP_SELF'] . '?id=s&p=' . $posts['ID'] . '&a=edit">' . LABEL_CONTENT_EDIT . '</a></div>';
        echo '</article>';
      }
    ?>
    </div>
    </div>
  </div>
</section>