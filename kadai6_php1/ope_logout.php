<?php 
//必ずセッションスタートする
session_start();

// sessionを空にする
$_SESSION =array();

// クッキーに保存しているSessionIDを無効化する
if(isset($_COOKIE[session_name()])){
    setcookie(session_name(), '', time()-42000, '/');
}

// サーバー側で持っているセッションIDの破棄
session_destroy();

// 処理後にlogin.phpに戻る
header('Location: ope_login.php');
exit();

?>