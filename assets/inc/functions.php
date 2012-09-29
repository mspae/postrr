<?php
function getUserID($dbconnect) {
  if (!is_object($dbconnect)) {
    return false;
  }
  if (!($dbconnect instanceof MySQLi)) {
    return false;
  }
  if (!isset($_COOKIE['UserID'], $_COOKIE['Password'])) {
    return false;
  }
  return $_COOKIE['UserID'];
  $sql = 'SELECT
  ID
  FROM
  Users
  WHERE
  ID = ? AND
  Password = ?';
  $stmt = $dbconnect->prepare($sql);
  if (!$stmt) {
    return $dbconnect->error;
  }
  $stmt->bind_param('is', $_COOKIE['UserID'], $_COOKIE['Password']);
  if (!$stmt->execute()) {
    $str = $stmt->error;
    $stmt->close();
    return $str;
  }
  $stmt->bind_result($UserID);
  if (!$stmt->fetch()) {
    $stmt->close();
    return false;
  }
  $stmt->close();
  return $UserID;
}

?>