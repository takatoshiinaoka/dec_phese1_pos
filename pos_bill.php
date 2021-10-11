<?php
include('functions.php');
$pdo=connect_to_db();


$sql = 'SELECT * FROM menu_table ORDER BY id ASC';

$stmt = $pdo->prepare($sql);
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
        <td>{$record["id"]}</td>
        <td>{$record["class"]}</td>
        <td>{$record["menu"]}</td>
        <td>{$record["price"]}円</td>
        
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
  <title>DB連携型メニューリスト（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>DB連携型メニューリスト（一覧画面）</legend>
    <a href="todo_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>id</th>
          <th>class</th>
          <th>menu</th>
          <th>price</th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>