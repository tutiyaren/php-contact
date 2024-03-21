<?php
use App\Contacts;
require '../app/Contacts.php';

$title = $_POST['title'];
$email = $_POST['email'];
$content = $_POST['content'];

$pdo = new PDO(
    'mysql:host=mysql;dbname=contactform',
    'root',
    'password'
);

$sendModel = new Contacts($pdo);
$send = $sendModel->addContacts($title, $email, $content);

if(empty($title) || empty($email) || empty($content)) {
    $errorMessage = "「タイトル」「Email」「お問い合わせ内容」のどれかが記入されていません";
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP-お問い合わせアプリ</title>
</head>
<body>

    <div>
      <!-- OKな場合 -->
        <?php if(!(isset($errorMessage))): ?>
            <h1>送信完了！！！</h1>
            <div><a href="index.php">送信画面へ</a></div>
        <? endif; ?>
      <!-- 問題がある場合 -->
        <?php if(isset($errorMessage)): ?>
            <p><?php echo $errorMessage ?></p>
            <a href="index.php">送信画面へ</a>
        <? endif; ?>
    </div>
  
</body>
</html>