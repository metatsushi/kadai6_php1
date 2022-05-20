<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="select.php">データ一覧</a>
            <a class="navbar-brand" href="questionaire.php">アンケートフォームを確認</a>
        </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->



<!-- Main[Start] -->
<form method="post" action="ope_login_act.php">
  <div class="jumbotron">
   <fieldset>
    <legend>管理画面ログイン</legend>
     <label>User ID：<input type="text" name="loginId"></label><br>
     <label>User PW：<input type="text" name="loginPw"></label><br>
     <input type="submit" value="ログイン">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
</body>
</html>