
<section class="thr">
  <div class="inner">
    <h2><?php echo SEARCH_TITLE; ?></h2>
    <div class="content">
    <?php
    if (!isset($_POST['searchquery'])) {
      echo '<form action="' . $_SERVER['PHP_SELF'] . '?id=search" method="post">';
      echo '<label for="searchquery">' . LABEL_SEARCH . '<input type="text" name="searchquery" /></label>';
      echo '<input type="submit" name="searchaction" value="' . SUBMIT_SEARCH . '" />';
    } else if ((trim($_POST['searchquery'])) == '') {
      echo '<p class="message error searchform">' . ERROR_SEARCHFORM_NOQUERY . '</p>';
    } else {
      $searchquery=htmlspecialchars($_POST['searchquery']);
      $sql="SELECT * FROM Posts WHERE ( Title LIKE '%{$searchquery}%' OR Content LIKE '%{$searchquery}%')";
      $query=mysqli_query($dbconnect,$sql);

      echo '<p>' . SEARCH_RESULTS1 . mysqli_num_rows($query) . SEARCH_RESULTS2 . '</p>';
      while ($results=mysqli_fetch_assoc($query)) {

        echo '<h3><a href="?id=s&p=' . $results['ID'] . '" name="' . $results['Title'] . '">' . $results['Title'] . '</a></h3>';
      }
    }
    ?>
    </div>
  </div>
</section>
