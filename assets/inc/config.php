<?php
// Site Details
define('SITE_TITLE', 'postrr');
define('SITE_CLAIM', 'the new php microlog.');

// Page Titles
define('HOME_TITLE', 'Home');
define('SEARCH_TITLE', 'Suche');
define('LOGIN_TITLE', 'Anmeldung');
define('CONTACT_TITLE', 'Kontakt');

// Admin Title
define('ADMIN_ADD', 'Beitrag hinzufügen');
define('ADMIN_UPDATE', 'Beitrag aktualisieren');
define('ADMIN_LIST', 'Beiträge auflisten');
define('ADMIN', 'Verwaltung');
define('LIST_USER', 'Kontos auflisten');
define('UPDATE_USER', 'Konto aktualisieren');
define('ADD_USER', 'Konto hinzufügen');

// Form Errors
define('ERROR_FORM', 'Fehler beim verarbeiten des Formulars.');
define('ERROR_FORM_EMPTY', 'Bitte füllen Sie das Formular vollständig aus.');

// Feld spezifisch
define('ERROR_USERFORM_EMPTYUSERNAME', 'Bitte geben Sie den Benutzernamen an.');
define('ERROR_USERFORM_USERNAME', 'Der Benutzername muss zwischen 3 und 30 Zeichen lang sein und darf keine Leerzeichen enthalten.');
define('ERROR_USERFORM_EMPTYPASSWORD', 'Bitte geben Sie das Passwort an.');
define('ERROR_USERFORM_PWMISMATCH', 'Bitte geben Sie das Passwort zweimal an.');
define('ERROR_USERFORM_EMPTYINFO', 'Bitte geben Sie den Infotext für das Konto ein.');
define('ERROR_USERFORM_EMPTYEMAIL', 'Bitte geben Sie die Email-Adresse an.');
define('ERROR_USERFORM_DOUBLEUSERNAME', 'Diesen Benutzernamen gibt es bereits.');
define('ERROR_USERFORM_NOID', 'Bitte wählen Sie einen Benutzer aus.');

define('ERROR_CONTENTFORM_EMPTYTITLE', 'Bitte geben Sie einen Titel an.');
define('ERROR_CONTENTFORM_EMPTYCATEGORY', 'Bitte geben Sie eine Kategorie an.');
define('ERROR_CONTENTFORM_EMPTYCONTENT', 'Bitte geben Sie den Inhalt an.');
define('ERROR_CONTENTFORM_NOID', 'Bitte wählen Sie einen Beitrag aus.');

define('ERROR_SEARCHFORM_NOQUERY', 'Bitte geben Sie ein Suchwort ein.');


// fuer login
define('ERROR_LOGIN_USERNAME', 'Falscher Benutzername.');
define('ERROR_LOGIN_PASSWORD', 'Falsches Passwort.');


// Form Labels
define('LABEL_USERNAME', 'Benutzername');
define('LABEL_PASSWORD', 'Passwort');
define('LABEL_PASSWORDREPEAT', 'Passwort wiederholen');
define('LABEL_EMAIL', 'Email-Adresse');
define('LABEL_INFO', 'Infotext');
define('LABEL_LOGOUT', 'Abmelden');
define('LABEL_TITLE', 'Titel');
define('LABEL_CATEGORY', 'Kategorie');
define('LABEL_CONTENT', 'Inhalt');
define('LABEL_SEARCH', 'Suchbegriff eingeben');

define('LABEL_CONTENT_EDIT', 'Beitrag bearbeiten');
define('LABEL_USER_EDIT', 'Konto bearbeiten');

// Submit Labels
define('SUBMIT_ADDUSER', 'Konto hinzufügen');
define('SUBMIT_UPDATEUSER', 'Konto aktualisieren');
define('SUBMIT_DELETEUSER', 'Konto löschen');
define('SUBMIT_ADDCONTENT', 'Beitrag hinzufügen');
define('SUBMIT_UPDATECONTENT', 'Beitrag aktualisieren');
define('SUBMIT_DELETECONTENT', 'Beitrag löschen');
define('SUBMIT_LOGIN', 'Anmelden');
define('SUBMIT_SEARCH', 'Suchen');

// Messages
define('SUCCESS_NEWUSER', 'Konto wurde angelegt');
define('SUCCESS_NEWCONTENT', 'Beitrag wurde hinzugefügt');
define('SUCCESS_LOGIN', 'Erfolgreich angemeldet');
define('SUCCESS_LOGOUT', 'Erfolgreich abgemeldet');

// Misc UI Labels
define('POSTED_ON', 'Geschrieben am ');
define('POSTED_IN', 'in ');
define('NOT_LOGGED_IN', 'Sie sind nicht angemeldet');
define('SHOW_INFO', 'Infotext');
define('FOOTER_INFO', 'postrr Copyright 2012 Martin Spencer & Mulugeta Ghebremethin');

define('SEARCH_RESULTS1', 'Es gab ');
define('SEARCH_RESULTS2', ' Treffer.');


$dbhost='localhost';
$dbuser='root';
$dbpw='';
$dbname='postrr';
$dbconnect=@mysqli_connect($dbhost, $dbuser, $dbpw);
?>