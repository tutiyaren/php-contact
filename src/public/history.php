<?php
session_start();
if (!(isset($_SESSION['id']))) {
    header('Location: login.php');   
}

use App\Contacts;
use App\Favorites;
require '../app/Contacts.php';
require '../app/Favorites.php';

$pdo = new PDO(
    'mysql:host=mysql;dbname=contactform',
    'root',
    'password'
);

$displayModel = new Contacts($pdo);
$display = $displayModel->getContacts();

$favoritesModel = new Favorites($pdo);

$user_id = $_SESSION['id'];

if(isset($_POST['contact_id'])) {
    $contact_id = $_POST['contact_id'];

    $is_favorite = $favoritesModel->check_favorite($user_id, $contact_id);

    if ($is_favorite) {
        $favoritesModel->delete_favorite($user_id, $contact_id);
    } 
    if (!($is_favorite)) {
        $favoritesModel->add_favorite($user_id, $contact_id);
    }

    header('Location: history.php'); 
    exit();
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
        <h1>送信履歴</h1>
        <!-- データがあれば表示 -->
        <?php if(!empty($display)): ?>
        <?php foreach($display as $date): ?>
            <div><?php echo $date['title'] ?></div>
            <div><?php echo $date['content'] ?></div>
            <form action="history.php" method="post">
                <input type="hidden" name="contact_id" value="<?php echo $date['id']; ?>">
                <button type="submit" name="favorite">
                    <?php $is_favorite = $favoritesModel->check_favorite($_SESSION['id'], $date['id']) ?>
                    <?php if (!$is_favorite): ?>
                    いいね
                    <?php endif; ?>
                    <?php if ($is_favorite): ?>
                    いいね解除
                    <?php endif; ?>
                </button>
            </form>
            <div>----------------------------------------</div>
        <? endforeach; ?>
        <?php endif; ?>
        <!-- データが無い場合 -->
        <?php if(empty($display)): ?>
            <p>送信履歴無し</p>
        <?php endif; ?>
    </div>
    <div>
        <a href="favorite.php">ブックマーク一覧へ</a>
    </div>
  
</body>
</html>