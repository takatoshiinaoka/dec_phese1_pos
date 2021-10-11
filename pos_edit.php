<?php
// var_dump($_GET);
// exit();

include('functions.php');
$pdo=connect_to_db();

$id = $_GET['id'];
$num = $_GET['num'];
$keyword=$_GET['keyword'];

// //資料8.3 Lile状態の調査
// $sql = 'SELECT * FROM menu_table WHERE id:id';
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':id', $id, PDO::PARAM_STR);
// $status = $stmt->execute();

// if ($status == false) {
//   $error = $stmt->errorInfo();
//   echo json_encode(["error_msg" => "{$error[2]}"]);
//   exit();
// } else {
//   //$like_count = $stmt->fetchColumn();
//   // まずはデータ確認
//   var_dump($like_count);
//   exit();
// }

//資料8.3 ライク数で条件分岐

$sql = "UPDATE `menu_table` SET `num` = :num+1 WHERE `menu_table`.`id` = :id;";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':num', $num, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header("Location:pos_select.php?keyword=$keyword");
  exit();
}
