<?php
// 「dbname」「port」「host」「username」「password」を設定
// DB接続情報
$dbn = 'mysql:dbname=gsacf_l05_14;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}
// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる.

 // 参照はSELECT文!
$sql = 'SELECT * FROM todo_table ORDER BY id DESC LIMIT 5'; 

$stmt = $pdo->prepare($sql); 
$status = $stmt->execute();

if ($status==false) {
$error = $stmt->errorInfo(); exit('sqlError:'.$error[2]);
//   // 失敗時􏰂エラー出力

} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC); $output = "";
  foreach ($result as $record) {
  $output .= "<tr>";
  $output .= "<td>{$record["deadline"]}</td>"; $output .= "<td>{$record["todo"]}</td>"; 
  $output .= "</tr>";
} }

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>DB連携型todoリスト（一覧画面）</legend>
    <a href="todo_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>deadline</th>
          <th>todo</th>
        </tr>
      </thead>
      <tbody>
        <?=$output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>