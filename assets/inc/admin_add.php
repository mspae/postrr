<section class="thr">
  <div class="inner">
    <h2><?php echo ADMIN_ADD ?></h2>
    <div class="content">
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?id=add">
        <label for="title">
          <?php echo LABEL_TITLE ?>
          <input type="text" name="title" />
        </label>
        <label for="category">
          <?php echo LABEL_CATEGORY ?>
          <select name="category">
            <option selected="selected">Bericht</option>
            <option>Anleitung</option>
            <option>Werbung</option>
          </select>
        </label>
        <label for="content">
          <?php echo LABEL_CONTENT ?>
          <textarea name="content"></textarea>
        </label>
        <input type="submit" name="formaction" value="<?php echo SUBMIT_ADDCONTENT ?>" />
      </form>
      <?php
      if (isset($_POST['formaction'])) {
        // falls title leer ist, fehler
        if (($title = trim($_POST['title'])) == '') {
          echo '<p class="error contentform form">' . ERROR_CONTENTFORM_EMPTYTITLE . '</p>';
        // falls content leer ist, fehler
        } else if (($content = trim($_POST['content'])) == '') {
          echo '<p class="error contentform form">' . ERROR_CONTENTFORM_EMPTYCONTENT . '</p>';
        // falls category leer ist, fehler
        } else if (($category = trim($_POST['category'])) == '') {
          echo '<p class="error contentform form">' . ERROR_CONTENTFORM_EMPTYCATEGORY . '</p>';
        // ansonsten, laufen lassen
        } else {
          $sql="INSERT INTO Posts (Title, Content, Category) VALUES ('{$title}', '{$content}', '{$category}')";
          // laufen lassen
          mysqli_query($dbconnect, $sql);
          echo '<p class="message success contentform newcontent">' . SUCCESS_NEWCONTENT . '</p>';

        }
      }
      ?>
    </div>
  </div>
</section>