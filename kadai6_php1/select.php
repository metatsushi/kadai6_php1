<?php 
// セッションスタート・関数呼び出し
session_start();
include('funcs.php');

// ログイン確認（セッションIDがないまたは合っていない場合はEXIT） 
loginCheck();

// データベースへの接続処理
$pdo = db_connect();

// データ登録SQL作成
$stmt = $pdo-> query('SELECT * FROM gs_questionaire_table');
$status =$stmt->execute();

// データ表示
$arr=[];
$arrAll=[];
$arrAge=[];
$arrPref=[];
// $arrPref=[];
// $arrLang=[];
// $arrCarrer=[];

if($status === false) {
    $error =$stmt->errorInfo();
    exit('ErrorMessage:' . $error[2]);
} else {
    while( $result =$stmt->fetch(PDO::FETCH_ASSOC)){
    
    array_push($arrAll,$result);
    $json_arrAll = json_encode($arrAll); 
    
    $age = $result['age'];
    array_push($arrAge,$age);
    $age_output = array_count_values($arrAge);

    $pref = $result['pref'];
    array_push($arrPref,$pref);
    $pref_output = array_count_values($arrPref);
   
   
    
    
    }
    $json_age = json_encode($age_output); 
    $json_pref = json_encode($pref_output); 
    

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <style>
    div{padding:10px; font-size:14px;}
    </style>
    <title>Document</title>
</head>
<body id='main'>

<header>
    <nav class='navbar nabbaer-default'>
        <div class='container-fluid'>
            <div class='navbar-header'>
                <a class='navbar-brand' href='select.php'>アンケートデータ一覧</a>
                <a class="navbar-brand" href="questionaire.php">アンケートフォームを確認</a></div>
            </div>
        </div>
    </nav>

</header>

<!-- 年代別分析エリア -->
  <div class ="wrap" style="display:flex;width:500px;height:250px;align-content:center;">
  <table class="content-table" style="table-layout:fixed;width:100px;">
    <thead>
      <tr>
        <th style="width:100px;">年代</th>
        <th style="width:100px;">人数</th>
      </tr>
    </thead>
    <tbody id="ageTable" style="text-align:center"></tbody>  
  </table>

  <canvas id="pieChart"></canvas>
  </div>

<!-- 出身地別分析エリア -->
<div class ="wrap" style="display:flex;width:500px;height:250px;align-content:center;">
  <table class="content-table" style="table-layout:fixed;width:100px;">
    <thead>
      <tr>
        <th style="width:100px;">出身地</th>
        <th style="width:100px;">人数</th>
      </tr>
    </thead>
    <tbody id="prefTable" style="text-align:center"></tbody>  
  </table>

  <canvas id="pieChart2"></canvas>
  </div>


<!-- データ一覧 -->
    <h4 style='font-weight:bold'>データ一覧</h4>
    <div style='display:flex'>    
        <label>ID番号<input type='text' name='name' id='selectId'> </label><br>
        <button id='edit'>編集</button>
        <button id='delete'>削除</button>
    </div>
    <div id="mytable"></div>       
    
    <a class='navbar-brand' href='ope_logout.php'>ログアウト</a>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>


<script>
// PHPからJSにデータ受け渡し
let js_age = <?=$json_age?>;
let js_pref = <?=$json_pref?>;


// 年齢別分析（データを数が多い順に並べ替え）
let arrayAge = Object.keys(js_age).map((key)=>({ key: key, value: js_age[key] }));
  arrayAge.sort((a, b) => b.value - a.value);
  js_age = Object.assign({}, ...arrayAge.map((item) => ({
      [item.key]: item.value,
  })));
//   console.log(js_age);

// 年齢別分析（テーブル作成）
  Object.keys(js_age).forEach(function(key) {// 配列の中のオブジェクトの数だけ処理を繰り返す
    let val = js_age[key];
    let tr = document.createElement('tr');  
    $("#ageTable").append(tr); 
    let td1 = document.createElement('td');
    td1.textContent = key; 
    tr.appendChild(td1);
    let td2 = document.createElement('td');
    td2.textContent = val; 
    tr.appendChild(td2);
    },js_age);

 
// 年齢別分析（円グラフ作成）
  let ctx_age = document.getElementById("pieChart");
  let label_age = Object.keys(js_age);
  let data_age = Object.values(js_age);

  let pieChart = new Chart(ctx_age, {
    type: 'pie',
    data: {
      labels: label_age,
      datasets: [{
          backgroundColor: [
              "#F5DEB3",
              "#9ACD32",
              "#AFEEEE",
              "#0000CD",
              "#FFFFE0",
              "#ADFF2F",
              "#228B22",
              "#FFD700",
              "#8B008B",
              "#00FFFF",
              "#BB5179",
              "#FAFF67",
              "#58A27C",
              "#3C00FF",
              "#F4A460",
          ],
          data: data_age,
      }]
    },
    options: {
      title: {
        display: true,
        text: '年代別構成'
      }
    }
  });


// 出身地分析（データを数が多い順に並べ替え）
let arrayPref = Object.keys(js_pref).map((key)=>({ key: key, value: js_pref[key] }));
  arrayPref.sort((a, b) => b.value - a.value);
  js_pref = Object.assign({}, ...arrayPref.map((item) => ({
      [item.key]: item.value,
  })));
//   console.log(js_age);

// 出身地分析（テーブル作成）
  Object.keys(js_pref).forEach(function(key) {// 配列の中のオブジェクトの数だけ処理を繰り返す
    let val = js_pref[key];
    let tr = document.createElement('tr');  
    $("#prefTable").append(tr); 
    let td1 = document.createElement('td');
    td1.textContent = key; 
    tr.appendChild(td1);
    let td2 = document.createElement('td');
    td2.textContent = val; 
    tr.appendChild(td2);
    },js_pref);

 
// 出身地分析（円グラフ作成）
  let ctx_pref = document.getElementById("pieChart2");
  let label_pref = Object.keys(js_pref);
  let data_pref = Object.values(js_pref);

  let pieChart2 = new Chart(ctx_pref, {
    type: 'pie',
    data: {
      labels: label_pref,
      datasets: [{
          backgroundColor: [
              "#F5DEB3",
              "#9ACD32",
              "#AFEEEE",
              "#0000CD",
              "#FFFFE0",
              "#ADFF2F",
              "#228B22",
              "#FFD700",
              "#8B008B",
              "#00FFFF",
              "#BB5179",
              "#FAFF67",
              "#58A27C",
              "#3C00FF",
              "#F4A460",
          ],
          data: data_pref,
      }]
    },
    options: {
      title: {
        display: true,
        text: '地域別構成'
      }
    }
  });







//一覧表領域（PHPからJSにデータ受け渡し）
let js_arrAll = <?=$json_arrAll?>;
// console.log(js_arrAll);  

//jexcelによるチャート描画
const table = document.getElementById('mytable');
jexcel(table, {
   data: js_arrAll,

   columns: [
     
       { type: 'text',  title:'ID',          width:40 },
       { type: 'text',  title:'名前',         width:80 },
       { type: 'text',  title:'Email',       width:120 },
       { type: 'text',  title:'年齢',         width:100 },
       { type: 'text',  title:'都道府県',      width:80 },
       { type: 'text',  title:'興味のある言語', width:120 },
       { type: 'text',  title:'卒業後の方針',   width:120 },
       { type: 'text',  title:'フリーテキスト', width:240 },
       { type: 'text',  title:'登録日',        width:140 }
    ]
});

//クリックイベント（編集押したら個別データページに
$('#edit').on('click',function(){
    const rinkId = $('#selectId').val();
    window.location.href =`uu_detail.php?id=${rinkId}`;
});

//クリックイベント（削除押したら個別データを削除
$('#delete').on('click',function(){
    const rinkId = $('#selectId').val();
    window.location.href =`delete.php?id=${rinkId}`;
});

</script>
</html>