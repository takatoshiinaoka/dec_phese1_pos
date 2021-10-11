<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>検索</title>
</head>

<body>
  <form action="pos_select.php" method="GET">
    <fieldset>
      <legend>検索キーワード入力画面</legend>
      <a href="pos_menulist.php">メニュー表</a>
      <table>
      <tr>
      <td>keyword:<input type="text" size="20" style="width:160px;"  name="keyword"/></td>
      <td><button>検索</button></td>
      </tr>
      </table>
      <a href="pos_select.php?keyword=ドリンク">ドリンク</a>
      <a href="pos_select.php?keyword=料理">料理</a>
      <a href="pos_select.php?keyword=串">串</a>
      <a href="pos_select.php?keyword=先発">先発陣</a>
      <a href="pos_select.php?keyword=揚げ物">揚げ物</a>
      <a href="pos_select.php?keyword=焼物">焼物</a>
      <a href="pos_select.php?keyword=みつせ">みつせ鷄</a>
    </fieldset>
  </form>

</body>

</html>