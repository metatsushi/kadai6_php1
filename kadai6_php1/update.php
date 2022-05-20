<?php
// セッションスタート・関数呼び出し
session_start();
include('funcs.php');

// ログイン確認（セッションIDがないまたは合っていない場合はEXIT） 
loginCheck();

//1.POSTで変数取得
$id =$_POST['id'];
$name =$_POST['name'];
$email =$_POST['email'];
$age =$_POST['age'];
$pref =$_POST['pref'];
$lang =$_POST['lang'];
$carrer =$_POST['carrer'];
$text =$_POST['text'];


// データベースへの接続処理
$pdo = db_connect();


//3.UPDATE gs_an_table SET ....; で更新(bindValue)
$sql = 'UPDATE gs_questionaire_table SET name=:name,email=:email,age=:age, pref=:pref, lang=:lang, carrer=:carrer,text=:text WHERE id=:id';
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':name', $name, PDO::PARAM_STR); //危険な文字を弾いてもらう（最後のPARM＿の後は文字ならSTR、数値ならINT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR); //危険な文字を弾いてもらう
$stmt->bindValue(':age', $age, PDO::PARAM_STR); //危険な文字を弾いてもらう
$stmt->bindValue(':pref', $pref, PDO::PARAM_STR);
$stmt->bindValue(':lang', $lang, PDO::PARAM_STR);
$stmt->bindValue(':carrer', $carrer, PDO::PARAM_STR);
$stmt->bindValue(':text', $text, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();
var_dump($stmt);

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  //select.phpへリダイレクト
  header("Location: select.php");
  exit;

}



?>
