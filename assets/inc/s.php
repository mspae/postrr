<section class="thr">
  <div class="inner">
    <div class="content">
      <?php
      // $p ist der GET-Parameter p
      $p=$_GET['p'];
      // selecte den post mit $p als ID
      $sql="SELECT * FROM Posts WHERE ID={$p}";
      $query=mysqli_query($dbconnect,$sql);
      // mache aus dem dem datensatz einen array
      $post=mysqli_fetch_array($query);
      // und stelle ihn so dar
      echo '<article>';
      echo '<h3><a href="?id=s&p=' . $post['ID'] . '" name="' . $post['Title'] . '">' . $post['Title'] . '</a></h3>';
      echo '<div class="meta"><p class="category">' . POSTED_IN . $post['Category'] . '</p>';
      echo '<p class="time">' . POSTED_ON . $post['Time'] . '</p></div>';
      echo '<div class="text">' . $post['Content'] . '</div>';
      // falls eingeloggt
      if (getUserID($dbconnect)) {
        // zeige bearbeiten link
        echo '<div class="actionblock"><a href="' . $_SERVER['PHP_SELF'] . '?id=s&p=' . $post['ID'] . '&a=edit">' . LABEL_CONTENT_EDIT . '</a></div>';
        // falls action get-var gesetzt ist
        if (isset($_GET['a'])) {
          // falls es auf edit gesetzt wurde
          if ($_GET['a'] == 'edit') {
            // gehe zu beitrag updaten seite und gebe die post id als get var weiter
            header("Location: {$_SERVER['PHP_SELF']}?id=update&p={$post['ID']}");
          }
        }
      }
      echo '</article>';
      ?>
    </div>
  </div>
</section>