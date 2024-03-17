<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP-お問い合わせアプリ</title>
</head>
<body>

    <div>
        <h1>お問い合わせフォーム</h1>
        <p>以下のフォームからお問い合わせください。</p>
        <form action="complete.php" method="post">
            <p>タイトル（必須）<input type="text" name="title" placeholder="タイトル"></p>
            <p>Email（必須）<input type="email" name="email" placeholder="Emailアドレス"></p>
            <p>お問い合わせ内容（必須）
              <textarea name="content" cols="30" rows="10" placeholder="お問い合わせ内容(1000文字までをお書きください)"></textarea>
            </p>
            <button type="submit">送信</button>
        </form>
    </div>

</body>
</html>