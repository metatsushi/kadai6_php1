<?php 

// 入力チェック(POST送信受け取ってないのに処理が走らないようにする)
if(
!isset($_POST['name']) || $_POST['name']=='' ||
!isset($_POST['email']) || $_POST['email']=='' ||
!isset($_POST['age']) || $_POST['age']=='' ||
!isset($_POST['pref']) || $_POST['pref']=='' ||
!isset($_POST['lang']) || $_POST['lang']=='' ||
!isset($_POST['carrer']) || $_POST['carrer']=='' 
) {
    exit ('ParamError');
}

// 1.POSTデータ取得
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$pref = $_POST['pref'];
$lang = $_POST['lang'];
$text = $_POST['text'];
$carrer = $_POST['carrer'];

// 2DB接続する（エラー処理追加 host=localhost, id=root ,PW=なしの場合）
try {
    $pdo = new PDO('mysql:dbname=gs_db; charset=utf8; host=localhost','root','root');
}catch(PDOException $e) {
  exit('DBConnectError:' . $e->getMessage());
 }

// データ登録SQL作成
$stmt = $pdo-> prepare('INSERT INTO gs_questionaire_table(id, name, email, age, pref, lang, carrer, text, indate)
VALUES(NULL, :name, :email, :age, :pref, :lang, :carrer,:text, sysdate())'); //stmtに入れて

$stmt->bindValue(':name', $name, PDO::PARAM_STR); //危険な文字を弾いてもらう（最後のPARM＿の後は文字ならSTR、数値ならINT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR); //危険な文字を弾いてもらう
$stmt->bindValue(':age', $age, PDO::PARAM_STR); //危険な文字を弾いてもらう
$stmt->bindValue(':pref', $pref, PDO::PARAM_STR);
$stmt->bindValue(':lang', $lang, PDO::PARAM_STR);
$stmt->bindValue(':carrer', $carrer, PDO::PARAM_STR);
$stmt->bindValue(':text', $text, PDO::PARAM_STR);
$status = $stmt->execute();

//4. データ登録処理後
if($status === false) {
    $error = $stmt->errorInfo();
    exit('ErrorMessage:' . print_r($error, true));
} else {
    header('Location: questionaire.php');
}
?>