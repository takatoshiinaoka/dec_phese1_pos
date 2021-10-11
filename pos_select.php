<?php
include('functions.php');
$pdo=connect_to_db();

$keyword = $_GET['keyword'];

$sql = 'SELECT * FROM menu_table WHERE menu LIKE "%":keyword"%" OR class LIKE "%":keyword"%" OR keyword LIKE "%":keyword"%";';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':keyword', $keyword, PDO::PARAM_STR);//バインド変数
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output = "";
  foreach ($result as $record) {
    $output .= "
      <tr>
        <td>{$record["class"]} </td>
        <td>{$record["menu"]}</td>
        <td>{$record["price"]}円　</td>
        <td> {$record["num"]}</td>
        <td>
        <a href='pos_edit.php?id={$record["id"]}&num={$record["num"]}&keyword=$keyword'>追加</a>
        </td>
        <td>
          <a href='pos_reset.php?id={$record["id"]}&keyword=$keyword'>reset</a>
        </td>
      </tr>
    ";
  }
  unset($record);
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>検索結果</title>
</head>

<body>
  <fieldset>
    <legend>検索結果</legend>
    <a href="pos_input.php">検索画面</a>
    <a href="pos_menulist.php">メニュー表</a>
    <a href="pos_sum.php">合計金額</a>
    <table>
      <thead>
        <tr>
          <th>class</th>
          <th>menu</th>
          <th>price</th>
          <th>個数</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに`<tr><td>'id'</td><td>'name'</td><td>'hero'</td><td>'rival'</td></tr>`の形式でデータが表示する -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>