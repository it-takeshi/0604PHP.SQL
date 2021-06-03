<?php

// var_dump($_POST);
// exit();

// 入力チェック(未入力の場合は弾く，commentのみ任意)
if ( !isset($_POST['participant']) || $_POST['participant']=='' ||
!isset($_POST['nation']) || $_POST['nation']=='' || 
!isset($_POST['price']) || $_POST['price']=='' || 
!isset($_POST['banquet']) || $_POST['banquet']=='' || 
!isset($_POST['hotel']) || $_POST['hotel']=='' || 
!isset($_POST['type']) || $_POST['type']=='' || 
!isset($_POST['date']) || $_POST['date']=='' 
){
exit('Param Error');
}
// exit('ok');

$participant =$_POST['participant'];
$nation =$_POST['nation'];
$price =$_POST['price'];
$banquet =$_POST['banquet'];
$hotel=$_POST['hotel'];
$type =$_POST['type'];
$date =$_POST['date'];

// var_dump($paticipant);
// var_dump($nation);
// var_dump($price);
// var_dump($banquet);
// var_dump($hotel);
// var_dump($type);
// var_dump($date);
//  exit();

// // DB接続情報
$dbn = 'mysql:dbname=gsacf_l05_14;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// // DB接続
try {
$pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
echo json_encode(["db error" => "{$e->getMessage()}"]);
exit();
}
// exit('ok');

//  // SQL作成&実行
// $sql = 'INSERT INTO paticipant_table(id, paticipant, nation, price, banquet, hotel, type, date,created_at, updated_at) VALUES(NULL, :paticipant,:nation,price, :banquet,:hotel,:type, date, sysdate(), sysdate())';

$sql = 'INSERT INTO participant_table(id, participant, nation, price, banquet, hotel, type, date, created_at, updated_at) VALUES (NULL,:participant,:nation,:price ,:banquet,:hotel,:type,:date,sysdate(),sysdate())';


// var_dump($_POST);
// exit('ok');

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':participant', $participant, PDO::PARAM_STR); 
$stmt->bindValue(':nation', $nation, PDO::PARAM_STR); 
$stmt->bindValue(':price', $price, PDO::PARAM_STR); 
$stmt->bindValue(':banquet', $banquet, PDO::PARAM_STR); 
$stmt->bindValue(':hotel', $hotel, PDO::PARAM_STR); 
$stmt->bindValue(':type', $type, PDO::PARAM_STR); 
$stmt->bindValue(':date', '2021-06-06', PDO::PARAM_STR); 
$status = $stmt->execute(); // SQLを実行

// exit('ok');


// // //  // 失敗時にエラーを出力し，成功時は登録画面に戻る
if ($status==false) {
$error = $stmt->errorInfo(); // データ登録失敗次にエラーを表示 
exit('sqlError:'.$error[2]);
} else {
  // exit('ok');
// // // 登録ページへ移動
header('Location:pati_input.php'); }

