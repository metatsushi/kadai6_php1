   
<?php
// セッションスタート・関数呼び出し
session_start();
include('funcs.php');

// ope_login.phpからIDとPWを取得
$loginId = $_POST["loginId"];
$loginPw = $_POST["loginPw"];

//DB接続
$pdo = db_connect();

//データ登録SQLの作成
$sql = "SELECT * FROM gs_user_table WHERE userid=:loginId AND userpw=:loginPw";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':loginId', $loginId);
$stmt->bindValue(':loginPw', $loginPw);
$res = $stmt->execute();

//SQL実行時にエラーがある場合
if($res==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

//抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //1レコードだけ取得する方法

//４. 該当レコードがあればSESSIONに値を代入
if( $val["id"] != "" ){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["username"]   = $val['username'];
  //Login処理OKの場合select.phpへ遷移
  header("Location: select.php");
}else{
  //Login処理NGの場合login.phpへ遷移
  header("Location: login.php");
}
//処理終了
exit();
?>
