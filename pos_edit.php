<?php
// var_dump($_GET);
// exit();

//データベースに接続
include('functions.php');
$pdo=connect_to_db();

//GETのデータを変数に代入
$id = $_GET['id'];
$num = $_GET['num'];
$keyword=$_GET['keyword'];

//sumに1ずつ追加するSQL文
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
  //SQLが実行出来たら検索結果画面に移動
  header("Location:pos_select.php?keyword=$keyword");
  exit();
}
