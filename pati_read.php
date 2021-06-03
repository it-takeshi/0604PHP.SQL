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
  
}
// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる.

 // 参照はSELECT文!
$sql = 'SELECT * FROM participant_table ORDER BY id DESC LIMIT 10'; 
$stmt = $pdo->prepare($sql); 
$status = $stmt->execute();

if ($status==false) {
$error = $stmt->errorInfo(); 
exit('sqlError:'.$error[2]);
//   // 失敗時􏰂エラー出力
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
  // var_dump($result);
  // exit();

  $output = "";
  foreach ($result as $record){
  $output .= "<tr>";
  $output .= "<td>{$record["participant"]}</td>"; 
  $output .= "<td>{$record["nation"]}</td>"; 
  $output .= "<td>{$record["price"]}</td>"; 
  $output .= "<td>{$record["banquet"]}</td>"; 
  $output .= "<td>{$record["hotel"]}</td>"; 
  $output .= "<td>{$record["type"]}</td>"; 
  $output .= "<td>{$record["date"]}</td>"; 
  $output .= "</tr>";
} }

?>

<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>参加リスト（一覧画面）</title>
  </head>
<body>

      <fieldset>
          <legend>参加者リスト一覧</legend>
          <a href="pati_input.php">入力画面</a>
          <table>
            <thead>
              <tr>
                <th>participant</th>
                <th>nation</th>
                <th>price</th>
                <th>banquet</th>
                <th>hotel</th>
                <th>type</th>
                <th>date</th>
              </tr>
            </thead>
            <tbody> 
            <?=$output ?>
            </tbody>
          </table>
        </fieldset>


        <script>
        const data = <?= json_encode($result)?>;
        console.log(data);

        </script>

</body>

</html>