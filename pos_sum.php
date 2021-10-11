<?php
// var_dump($_GET);
// exit();
//SELECT * FROM menu_table WHERE num >0;

include('functions.php');
$pdo=connect_to_db();

$sql = 'SELECT * FROM menu_table WHERE num >0;';

$stmt = $pdo->prepare($sql);

$status = $stmt->execute();
$sum=0;

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output = "";
  foreach ($result as $record) {
    $kake=$record["num"]*$record["price"];
    $sum+=$kake;
    $output .= "
      <tr>
        <td>{$record["menu"]}</td>
        <td>{$record["price"]}円　</td>
        <td> {$record["num"]}</td>
        <td>¥{$kake}</td>
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
  <title>データ検索フォーム</title>
</head>

<body>
  
  <fieldset>
    <legend>検索結果</legend>
    <a href="pos_select.php?keyword=">戻る</a>
    <a href="pos_allreset.php">  全てリセット</a>
    <br><h2>合計金額：<?= $sum ?>円</h2>
    
    <table>
      <thead>
        <tr>
          <th>menu</th>
          <th>price</th>
          <th>個数</th>
          <ht></th>
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