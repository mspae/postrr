<div class="content adminmenu">
  <ul>
    <li>
      <?php
      if (isset($_GET['id'])) {
        if ($_GET['id'] == 'admin') {
          echo '<a href="?id=admin" class="active">' . ADMIN_LIST . '</a>';
        } else {
          echo '<a href="?id=admin">' . ADMIN_LIST . '</a>';
        }
      } else {
        echo '<a href="?id=admin">' . ADMIN_LIST . '</a>';
      }
      ?>
    </li>
    <li>
      <?php
      if (isset($_GET['id'])) {
        if ($_GET['id'] == 'add') {
          echo '<a href="?id=add" class="active">' . ADMIN_ADD . '</a>';
        } else {
          echo '<a href="?id=add">' . ADMIN_ADD . '</a>';
        }
      } else {
        echo '<a href="?id=add">' . ADMIN_ADD . '</a>';
      }
      ?>
    </li>

      <?php
      //if (isset($_GET['id'])) {
      //  if ($_GET['id'] == 'update') {
      //    echo '<a href="?id=update" class="active">' . ADMIN_UPDATE . '</a>';
      //  } else {
      //    echo '<a href="?id=update">' . ADMIN_UPDATE . '</a>';
      //  }
      //} else {
      //  echo '<a href="?id=update">' . ADMIN_UPDATE . '</a>';
      //}
      ?>

    <li>
      <?php
      if (isset($_GET['id'])) {
        if ($_GET['id'] == 'listusers') {
          echo '<a href="?id=listusers" class="active">' . LIST_USER . '</a>';
        } else {
          echo '<a href="?id=listusers">' . LIST_USER . '</a>';
        }
      } else {
        echo '<a href="?id=listusers">' . LIST_USER . '</a>';
      }
      ?>
    </li>
    <li>
      <?php
      if (isset($_GET['id'])) {
        if ($_GET['id'] == 'addusers') {
          echo '<a href="?id=addusers" class="active">' . ADD_USER . '</a>';
        } else {
          echo '<a href="?id=addusers">' . ADD_USER . '</a>';
        }
      } else {
        echo '<a href="?id=addusers">' . ADD_USER . '</a>';
      }
      ?>
    </li>

      <?php
      //if (isset($_GET['id'])) {
      //  if ($_GET['id'] == 'updateusers') {
      //    echo '<a href="?id=updateusers" class="active">' . UPDATE_USER . '</a>';
      //  } else {
      //    echo '<a href="?id=updateusers">' . UPDATE_USER . '</a>';
      //  }
      //} else {
      //  echo '<a href="?id=updateusers">' . UPDATE_USER . '</a>';
      //}
      ?>

    <li>
      <?php
      if (isset($_GET['id'])) {
        if ($_GET['id'] == 'logout') {
          echo '<a href="?id=logout" class="active">' . LABEL_LOGOUT . '</a>';
        } else {
          echo '<a href="?id=logout">' . LABEL_LOGOUT . '</a>';
        }
      } else {
        echo '<a href="?id=logout">' . LABEL_LOGOUT . '</a>';
      }
      ?>
    </li>
  </ul>
</div>