<section class="thr">
  <div class="inner">
    <h2><?php echo ADMIN_UPDATE ?></h2>
    <div class="content">
    <?php
      // falls keine post-id mit get gesetzt wurde, zeige fehlermeldung und beende
      if (!isset($_GET['p'])) {
        echo ERROR_CONTENTFORM_NOID;
        return;
      }
      // post-id aus get-variable ziehen
      $p=$_GET['p'];
      // post auswaehlen durch die id
      $sql="SELECT * FROM Posts WHERE ID={$p}";
      // query definieren
      $query=mysqli_query($dbconnect,$sql);
      // array mit beitragsinhalten machen
      $post=mysqli_fetch_array($query);
    ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?id=update&p=' . $post['ID'];?>">
      <label for="title">
        <?php echo LABEL_TITLE ?>
        <input type="text" name="title" value="<?php echo $post['Title']; ?>" />
      </label>
      <label for="category">
        <?php echo LABEL_CATEGORY ?>
        <select name="category">
          <option selected="selected"><?php echo $post['Category']; ?></option>
          <option>Bericht</option>
          <option>Anleitung</option>
          <option>Werbung</option>
        </select>
      </label>
      <label for="content">
        <?php echo LABEL_CONTENT ?>
        <textarea name="content"><?php echo $post['Content']; ?></textarea>
      </label>
      <input type="submit" name="formaction" value="<?php echo SUBMIT_UPDATECONTENT ?>" />
      <input type="submit" name="deleteaction" value="<?php echo SUBMIT_DELETECONTENT ?>" />
    </form>
    <?php

    if (isset($_POST['formaction'])) {
      if (($title = trim($_POST['title'])) == '') {
        echo '<p class="error contentform form">' . ERROR_CONTENTFORM_EMPTYTITLE . '</p>';
      } else if (($content = trim($_POST['content'])) == '') {
        echo '<p class="error contentform form">' . ERROR_CONTENTFORM_EMPTYCONTENT . '</p>';
      } else if (($category = trim($_POST['category'])) == '') {
        echo '<p class="error contentform form">' . ERROR_CONTENTFORM_EMPTYCATEGORY . '</p>';
      } else {
        // query definieren mit formular inhalten
        $sql="UPDATE Posts SET Title='{$title}', Content='{$content}', Category='{$category}' WHERE ID={$p}";
        mysqli_query($dbconnect, $sql);
        // zuerueck zur einzelansicht
        header("Location: {$_SERVER['PHP_SELF']}?id=s&p={$post['ID']}");
      }
    }
    // falls delete button gedrueckt wurde
    if (isset($_POST['deleteaction'])) {
      // diesen query
      $sql="DELETE FROM Posts WHERE ID={$p}";
      // laufen lassen
      mysqli_query($dbconnect, $sql);
      // und zur homepage zurueck
      header("Location: {$_SERVER['PHP_SELF']}");
    }
    ?>
    </div>
  </div>
</section>