

<section class="thr">
  <div class="inner">
    <!--<h2><?php echo HOME_TITLE; ?></h2>-->
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
        echo '</article>';
      }
    ?>
    </div>
  </div>
</section>
<?php
  include('info.php');
?>
