<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>参加者リスト（入力画面）</title>
  <style>
  .form{
    padding-top: 50px;
    padding-left: 450px;
  }
  body{
    background: url(img/convention.png);
    background-repeat: no-repeat;  
  }
  </style>
</head>

<body>
<div class="form">
  <form action ="pati_create.php" method="POST">
    
      
<h1>大会参加登録</h1>

      <a href="pati_read.php">参加者一覧</a>
      <div>
        participant(参加者): <input type="text" name="participant">
      </div>
      <div>
        nation(国籍): <input type="text" name="nation">
      </div>
      <div>
        price(参加費): <input type="number" name="price">
      </div>
      <div>
        banquet(懇親会): <input type="text" name="banquet">
      </div>
      <div>
        hotel(ホテル): <input type="text" name="hotel">
      </div>
      <div>
        type(部屋タイプ): <input type="text" name="type">
      </div>
      <div>
        date(日時): <input type="date" name="date">
      </div>
      <div>
        <button>submit</button>
      </div>
    
  </form>
  </div>
</body>


</html>