<?php
session_start();
if (!(isset($_SESSION['id']))) {
    header('Location: login.php');   
}
use App\Favorites;
require '../app/Favorites.php';

$pdo = new PDO(
    'mysql:host=mysql;dbname=contactform',
    'root',
    'password'
);

$favoritesModel = new Favorites($pdo);
$user_id = $_SESSION['id'];

$favorite_contacts = $favoritesModel->getFavoritesByUserId($user_id);

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
        <h1>お気に入り一覧</h1>
    
        <?php if(!empty($favorite_contacts)): ?>
        <?php foreach($favorite_contacts as $favorite_contact): ?>
            <div><?php echo $favorite_contact['title'] ?></div>
            <div><?php echo $favorite_contact['content'] ?></div>
            <div>----------------------------------------</div>
        <?php endforeach; ?>
        <?php endif; ?>
        <?php if(empty($favorite_contacts)): ?>
            <p>お気に入りはありません</p>
        <?php endif; ?>
    </div>
    <div>
        <a href="history.php">送信履歴に戻る</a>
    </div>
  
</body>
</html>