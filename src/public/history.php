<?php
use App\Contacts;
require '../app/Contacts.php';

$pdo = new PDO(
    'mysql:host=mysql;dbname=contactform',
    'root',
    'password'
);

$displayModel = new Contacts($pdo);
$display = $displayModel->getContacts();

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
        <h1>送信履歴</h1>
        <!-- データがあれば表示 -->
        <?php if(!empty($display)): ?>
        <?php foreach($display as $date): ?>
            <div><?php echo $date['title'] ?></div>
            <div><?php echo $date['content'] ?></div>
            <div>----------------------------------------</div>
        <? endforeach; ?>
        <?php endif; ?>
        <!-- データが無い場合 -->
        <?php if(empty($display)): ?>
            <p>送信履歴無し</p>
        <?php endif; ?>
        <!-- 共通 -->
        <a href="index.php">戻る</a>
    </div>
  
</body>
</html>