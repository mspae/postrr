<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('assets/inc/config.php');
require('assets/inc/functions.php');
ob_start();
require('assets/inc/head.php');

if (getUserId($dbconnect)) {
  echo '<div id="container" class="admin">';
} else {
  echo '<div id="container">';
}
?>
  <div class="wrap">

    <?php
      // sidebar muss rein
    require('assets/inc/side.php');
      // falls verbindung
    if ($dbconnect){
        // datenbank auswaehlen
      mysqli_select_db($dbconnect, $dbname);
        // falls fehler
      if (mysqli_error($dbconnect)) {
        echo '<div class="error message db">' . mysqli_error($dbconnect) . '</div>';
      } else {
          // sonst, checken if id gesetzt ist und je nachdem sachen includen
        if(isset($_GET['id'])){
          // bei login
          if ($_GET['id'] == 'login') {
            require('assets/inc/login.php');
          }
          // bei logout, login anzeigen, falls nicht eingeloggt (s.u.)
          if($_GET['id'] == 'logout') {
            echo '<div class="error message notloggedin">' . NOT_LOGGED_IN . '</div>';
          }
          // contact
          if ($_GET['id'] == 'contact') {
            require('assets/inc/contact.php');
          }
          // suche
          if ($_GET['id'] == 'search') {
            require('assets/inc/search.php');
          }
          // falls get-var id mit s besetzt ist 
          if ($_GET['id'] == 's') {
            // falls p gesetzt ist
            if (isset($_GET['p'])) {
              // einzelsicht einbinden mit p als post-id
              require('assets/inc/s.php');
            } else {
              // oder home-ansicht
              require('assets/inc/home.php');
            }
          }
          // falls get-var id mit u besetzt ist 
          if ($_GET['id'] == 'u') {
            // falls uid gesetzt ist
            if (isset($_GET['uid'])) {
              // einzelsicht einbinden mit uid als user-id
              require('assets/inc/u.php');
            } else {
              // oder home-ansicht
              require('assets/inc/home.php');
            }
          }
          
          // falls user eingeloggt ist
          if (getUserID($dbconnect)) {
            // und die get vars so sind, zeige die seiten
            if ($_GET['id'] == 'admin') {
              require('assets/inc/admin_list.php');
            }
            if ($_GET['id'] == 'add') {
              require('assets/inc/admin_add.php');
            }
            if ($_GET['id'] == 'update') {
              require('assets/inc/admin_update.php');
            }
            if ($_GET['id'] == 'listusers') {
              require('assets/inc/user_list.php');
            }
            if ($_GET['id'] == 'addusers') {
              require('assets/inc/user_add.php');
            }
            if ($_GET['id'] == 'updateusers') {
              require('assets/inc/user_update.php');
            }
            if($_GET['id'] == 'logout') {
              setcookie('UserID', '', strtotime('-1 day'));
              setcookie('Password', '', strtotime('-1 day'));
              unset($_COOKIE['UserID']);
              unset($_COOKIE['Password']);
            }
          }
          
          
          // nix gesetzt, standard anzeigen
        } else {
          require('assets/inc/home.php');
        }
      }
      // falls die verbindung nicht geht, fehler anzeigen
    } else {
      echo '<div class="error message db">' . mysqli_connect_error($dbconnect) . '</div>';
    }
      // verbindung schliessen
    mysqli_close($dbconnect);
    ?>

    

    <?php
  // foot einbinden
    require('assets/inc/foot.php')
    ?>