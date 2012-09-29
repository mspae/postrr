<section class="one">
  <div class="inner" >
    <header>
      <h1>
        <a href='?'>
          <?php echo SITE_TITLE ?>
        </a>
      </h1>
      <p>
        <?php echo SITE_CLAIM ?>
      </p>
    </header>
    <nav>
      <ul>
        <li>
          <?php
          if (isset($_GET['id'])) {
            if ($_GET['id'] == NULL) {
              echo '<a href="?" class="active">' . HOME_TITLE . '</a>';
            } else {
              echo '<a href="?">' . HOME_TITLE . '</a>';
            }
          } else {
            echo '<a href="?" class="active">' . HOME_TITLE . '</a>';
          }
          ?>
        </li>
        <li>
          <?php
          if (isset($_GET['id'])) {
            if ($_GET['id'] == 'search') {
              echo '<a href="?id=search" class="active">' . SEARCH_TITLE . '</a>';
            } else {
              echo '<a href="?id=search">' . SEARCH_TITLE . '</a>';
            }
          } else {
            echo '<a href="?id=search">' . SEARCH_TITLE . '</a>';
          }
          ?>
        </li>

        <li>
          <?php
          if (isset($_GET['id'])) {
            if ($_GET['id'] == 'contact') {
              echo '<a href="?id=contact" class="active">' . CONTACT_TITLE . '</a>';
            } else {
              echo '<a href="?id=contact">' . CONTACT_TITLE . '</a>';
            }
          } else {
            echo '<a href="?id=contact">' . CONTACT_TITLE . '</a>';
          }
          ?>
        </li>
        <li>
          <?php
          // falls nicht eingeloggt
          if (!getUserId($dbconnect)) {
            // falls Get gesetzt ist
            if (isset($_GET['id'])) {
              // und login lautet
              if ($_GET['id'] == 'login') {
                echo '<a href="?id=login" class="active">' . LOGIN_TITLE . '</a>';
              } else {
                echo '<a href="?id=login">' . LOGIN_TITLE . '</a>';
              }
            } else {
              echo '<a href="?id=login">' . LOGIN_TITLE . '</a>';
            }
          }
          ?>
        </li>
      </ul>
    </nav>
    <?php
      if (getUserId($dbconnect)) {
        require('adminmenu.php');
      }
    ?>
  </div>
</section>