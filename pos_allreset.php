<?php
session_start();
include("functions.php");

$pdo = connect_to_db();

$sql = "UPDATE `menu_table` SET `num` = '0';";

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header("Location:pos_menulist.php");
  exit();
}
