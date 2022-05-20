# kadai6_php1
## ①課題内容（どんな作品か）
- 認証不要で誰でもアクセスできるアンケート画面(questionaire.php)と、そのアンケート結果を蓄積するDBにアクセスする管理画面（ope_login.php)とを設計
- 管理画面側はログイン・ログアウト、アンケート情報のUpdate、削除などができるようにした
- 管理画面のログインID：gs 　　　　PW:dev23

## ②工夫した点・こだわった点
- DBをつくり、Php Adminにデータが格納されるようにした（アンケート結果、管理画面にログインするUserの管理）
- PHPのログイン、ログアウト、データ新規作成・格納・更新・削除を一通り習得した
- chart.jsを使って、アンケート結果のグラフ化をした
- （要素を大きい順に並べ替えをした上で描画した。
- jexcelを使ってアンケート結果のEXCELライクなテーブル化をした
  
## ③質問・疑問（あれば）
- PHPの処理がオブジェクトで返ってくるのか？配列で帰ってくるのか？がまだ良くわからない。また、配列が返ってくるはずと思ったら、ただの文字列だったりして苦労した。理解を深められる参考サイト・動画などないか？
- PHPでもJSでもどちらでもできること（描画・テーブル表示とか、HTMLを使った記述など）について、結局どの言語でどこまでの領域をカバーするのがスムーズなのか？知りたい。

## ④その他（感想、シェアしたいことなんでも）
- DBの構造や、フロントからサーバー側へのデータ受け渡し→戻しなどの構造がなんとなくわかってきた。
- JSの記述方法が少しづつこなれてきた。（forEach, mapなどがようやく実践で使えるようになり簡潔に書けるようになってきた
- 入力したデータをPHP上でjexcelを使って表形式で表示したかったが、結局Table形式に置き換えないとjexcelで使えなさそうだったので、時間切れだったが、頑張って土曜日の講義までに一通り仕上げた！
- 
## ⑤参考にしたサイト
-　　　jexcel（JSで動くEXCEL風ライブラリ）
https://paiza.hatenablog.com/entry/2020/06/10/JavaScript%E3%81%A0%E3%81%91%E3%81%A7Excel%E9%A2%A8%E3%81%AE%E3%82%B9%E3%83%97%E3%83%AC%E3%83%83%E3%83%89%E3%82%B7%E3%83%BC%E3%83%88%E3%82%92%E9%96%8B%E7%99%BA%E3%81%A7%E3%81%8D%E3%82%8B%E3%80%8CjExcel

- 配列内の要素の並べ替え
- https://keizokuma.com/javascript-array-sort/ 
- オブジェクト内の要素の並べ替え
- https://keizokuma.com/js-array-object-sort/

-　Chart.jsによる円グラフの描画 
- https://codelikes.com/chart-js-doughnut-pie/
