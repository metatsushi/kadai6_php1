<?php
session_start();
include('funcs.php');

//1.GETでid値を取得
$id = $_GET['id'];

// 1. ログインチェック
loginCheck();

//2.DB接続
$pdo = db_connect();

//3.SELECT * FROM gs_an_table WHERE id=:id;
$sql = "SELECT * FROM gs_questionaire_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


//4.データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //１データのみ抽出の場合はwhileループで取り出さない
  $row = $stmt->fetch();
}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method='post' action='update.php'>
    <div class='jumbotron'>
        <fieldset>
            <legend>アンケート</legend>
            <label>お名前：<input type='text' name='name' value="<?=$row['name']?>"> </label><br>
            <label>メールアドレス：<input type='text' name='email' value="<?=$row['email']?>"></label><br>
            <label>年齢：
                <select name='age' id='age'>年齢：
                    <option><?=$row['age']?></option>
                </select>
            </label><br>
            <label>都道府県：
                <select name='pref' id='pref'>
                    <option><?=$row['pref']?></option>
                </select>
            </label><br>
            <label  id='lang'>興味のある言語：<br>
            </label><br>
            <label>卒業後の方針：
                <select name='carrer' id='carrer'>
                    <option><?=$row['carrer']?></option>
                </select>
            </label><br>
            <label>フリーテキスト：<br><textArea name='text' rows='4' cols='40'><?=$row['text']?></textArea> </label><br>
            <input type='hidden' name='id' value="<?=$row['id']?>">
            <input type='submit' value='送信'>
           
            
        </fieldset>
    </div>
</form>

<script>
 let i =10;
 let num=[];
 while(i<60) {
    i =i+10;
    $('#age').append(`<option value="${i}~${i+10}歳">${i}~${i+10}歳</option>`);
 }    

 const prefs =["北海道","青森県","岩手県","宮城県","秋田県","山形県","福島県",
"茨城県","栃木県","群馬県","埼玉県","千葉県","東京都","神奈川県",
"新潟県","富山県","石川県","福井県","山梨県","長野県","岐阜県",
"静岡県","愛知県","三重県","滋賀県","京都府","大阪府","兵庫県",
"奈良県","和歌山県","鳥取県","島根県","岡山県","広島県","山口県",
"徳島県","香川県","愛媛県","高知県","福岡県","佐賀県","長崎県",
"熊本県","大分県","宮崎県","鹿児島県","沖縄県"]

prefs.forEach((pref) =>{
    $('#pref').append(`<option value="${pref}">${pref}</option>`); 
});

const langs = ['HTML','CSS','Javascript','PHP','Python','Swift','React','Vue','Ruby','Java','C','Go','その他'];
langs.map((lang) => {
    $('#lang').append(`<input type="radio" name='lang' value="${lang}">${lang}  `);
     if("input[value =='<?=$row['lang']?>']"){$('input[name=lang]').prop('checked', true);}
    
});

const carrers =['転職','起業','新規事業'];

carrers.map((carrer) =>{
    $('#carrer').append(`<option value="${carrer}">${carrer}</option>`); 
});

</script> 

</body>
</html>
<!-- Main[End] -->


</body>
</html>


