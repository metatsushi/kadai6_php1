<?php 
// セッションスタート・関数呼び出し
session_start();
include('funcs.php');

// ログイン確認（セッションIDがないまたは合っていない場合はEXIT） 
loginCheck();

// データベースへの接続処理
$pdo = db_connect();

// データ登録SQL作成
$stmt = $pdo-> prepare('SELECT * FROM gs_questionaire_table');
$status =$stmt->execute();

// 3 データ表示
$view= '';
if($status === false) {
    $error =$stmt->errorInfo();
    exit('ErrorMessage:' . $error[2]);
} else {
    while( $result =$stmt->fetch(PDO::FETCH_ASSOC)){
     $view .= '<p>';  //ドットと＝の間にスペース入れるとエラーになるので注意
     $view .= '<a href="uu_detail.php?id=' . $result["id"]. '">';
     $view .= $result["id"]. ' , ' . $result["name"] . ' , ' .  $result["email"]. ' , ' .  $result["age"]. ' , ' .  $result["pref"]. ' , ' .  $result["lang"]. ' , ' .  $result["carrer"]. ' , ' .  $result["text"];
     $view .= '</a>'; 
     $view .= '    ';
     $view .= '<a href="delete.php?id=' . $result["id"]. '">';
     $view .= '[削除]';
     $view .= '</a>';
     $view .= '</p>';
  
    }
   
}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://bossanova.uk/jexcel/v4/jexcel.js"></script>
    <script src="https://bossanova.uk/jsuites/v2/jsuites.js"></script>

    <link rel="stylesheet" href="https://bossanova.uk/jexcel/v4/jexcel.css" />
    <link rel="stylesheet" href="https://bossanova.uk/jsuites/v2/jsuites.css" />
    <style>
    div{
        padding:10px; font-size:14px;
    }
    /* table,tr,td,th{
        border: solid 1px black; border-collapse: collapse;
    }
    td,th{
        min-width: 32px;
    }
    th{
        background: silver;
    } */
    </style>
    <title>Document</title>
</head>
<body id='main'>

<header>
    <nav class='navbar nabbaer-default'>
        <div class='container-fluid'>
            <div class='navbar-header'>
                <a class='navbar-brand' href='select.php'>アンケートデータ一覧</a>
          
            </div>
        </div>
    </nav>

</header>


    <div>
        <div class='container jumbotron'><?= $view ?></div>
        <!-- <div id="mytable"></div> -->
       
    </div>
    <a class='navbar-brand' href='ope_logout.php'>ログアウト</a>

</body>
<script>
//   const table = document.getElementById('mytable');
//   let js_array = ?= $json_array; ?>;
 

//   jexcel(table, {
//    data: js_array,
//    columns: [
//        { type: 'text',  title:'ID',          width:40 },
//        { type: 'text',  title:'名前',         width:120 },
//        { type: 'text',  title:'Email',       width:160 },
//        { type: 'text',  title:'年齢',         width:100 },
//        { type: 'text',  title:'都道府県',      width:80 },
//        { type: 'text',  title:'興味のある言語', width:120 },
//        { type: 'text',  title:'卒業後の方針',   width:120 },
//        { type: 'text',  title:'フリーテキスト', width:240 }
//     ]
// });

</script>
</html>