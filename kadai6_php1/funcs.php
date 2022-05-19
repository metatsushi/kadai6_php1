<?php 
// ログイン認証ができているかのチェック関数
  function loginCheck() {
    if(!isset($_SESSION['chk_ssid']) ||$_SESSION['chk_ssid']!= session_id()){
        echo "LOGIN Error";
        exit();
    } else {
        session_regenerate_id();
        $_SESSION['chk_ssid'] =session_id(); //リジェネレートしたら新しいIDをチェックIDに入れておく（そうしないと次のページが読み込めない）
    }
}


// 1 DB接続関数
function db_connect(){
    try {
        $pdo = new PDO ('mysql:dbname=gs_db; charset=utf8; host=localhost', 'root','root');
    } catch (PDOException $e) {
        exit ('データベースに接続できませんでした'. $e->getMessage());
    }
    return $pdo;
}


?>