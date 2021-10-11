# プロダクトの名前 : dec_phese1_pos

## Auther

- **03\_稲岡天駿**

## プロダクト URL

- 画面収録：ファイル名

- GitHub の URL：[https://github.com/takatoshiinaoka/dec_phese1_pos](https://github.com/takatoshiinaoka/dec_phese1_pos)へアクセス

## プロダクトの紹介

私は，現在居酒屋でアルバイトをしております．しかし，注文が手書きだったり，会計も電卓で計算したりしています．今回は，その中でも会計をする時，商品とその個数から小計と合計を計算する POS システムの様なアプリを作成しました．

## プロダクトの機能，操作方法

主な機能の紹介と操作方法を記述する．

画面収録の場合は，この手順で動画を作成する．

### 主な機能

- データベースの検索
- 商品数の追加
- 商品数の初期化
- 合計金額の計算

### 操作方法

- メニュー画面のページ

  - メニューの一覧が見れる
  - 「検索画面」の文字を押すと検索画面のページに移動する

- 検索画面のページ

  - テキストボックスにキーワードを入力しメニューを検索できる
  - 検索すると検索結果画面のページに移動し，検索結果が得られる
  - 「メニュー表」の文字を押すと検索画面のページに移動する
  - 各キーワードの文字を押すと検索結果画面のページに移動し，押した文字での検索結果が得られる

- 検索結果画面のページ

  - 検索ページで入力したキーワードでの検索結果が見れる
  - 「追加」の文字を押すと選択したメニューの個数が増える
  - 「reset」の文字を押すと選択したメニューの個数が 0 になる
  - 「検索画面」の文字を押すと検索画面のページに移動する
  - 「メニュー表」の文字を押すとメニュー表画面のページに移動する
  - 「合計結果」の文字を押すと合計結果画面のページに移動する

- 合計表示画面のページ
  - 選択した(個数が 1 以上)メニューの一覧が見れる
  - 選択した(個数が 1 以上)メニューの合計金額を計算して表示する
  - 「戻る」の文字を押すと検索結果画面のページに移動する
  - 「メニュ表」の文字を押すとメニュー表画面のページに移動する

### **画面遷移図:**

![pos](pos1.jpg "pos")

### **pos アプリケーションの全体像:**

![pos](pos1.jpg "pos")

### **データベース：**

|  id | menu               | price | class      | num | keyword              |
| --: | ------------------ | ----: | ---------- | --- | -------------------- |
|   1 | 小鉢               |   350 | お通し     | 0   | 料理こばち           |
|   2 | レバー             |   200 | みつせ鶏串 | 0   | 料理ればー           |
|   3 | トリトロ           |   220 | みつせ鶏串 | 0   | 料理とりとろ         |
| ... | ...                |    .. | ...        | ... | ...                  |
|  31 | トマトスライス     |   300 | 先発陣     | 0   | 料理トマスラとますら |
| ... | ...                |    .. | ...        | ... | ...                  |
|  77 | アサヒ生ビール     |   530 | ビール     | 0   | ドリンク飲み物       |
|  78 | アサヒ生ビール(小) |   430 | ビール     | 0   | ドリンク飲み物       |
|  79 | アサヒビン(中)     |   560 | ビール     | 0   | ドリンク飲み物       |
| ... | ...                |    .. | ...        | ... | ...                  |

## 工夫した点

検索で「トマトスライス」というメニューを調べる時に，「とまと」や「トマスラ」でも検索できるようにしました．具体的には,データベースにキーワードカラムを作成し，あいまいに検索しても探しやすい様にしました。

<p class="info">SELECT * FROM menu_table WHERE menu LIKE "%":keyword"%" OR class LIKE "%":keyword"%" OR keyword LIKE "%":keyword"%";</p>

## 苦戦した点

苦労した点は，メニューを１つずつデータベースに登録したところです．簡単に登録する方法がありましたら，ご教授願います．

実装しようとしたけど諦めた事は，ララベルを使おうと思っていた事です．WSL2 の Vmmem プロセスがメモリを多く使っており，動作が重くなるので諦めました．また，Docker は開発環境を揃えるためのツールであり，ララベルはフレームワークなので xampp でも使えるのだろうか？という疑問も出てきた．今回は環境を壊したく無かったので，講義と同じ環境で作った．
