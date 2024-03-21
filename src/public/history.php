<?php
session_start();
if (!(isset($_SESSION['id']))) {
    header('Location: login.php');   
}

use App\Contacts;
require '../app/Contacts.php';

$pdo = new PDO(
    'mysql:host=mysql;dbname=contactform',
    'root',
    'password'
);

$displayModel = new Contacts($pdo);
$display = $displayModel->getContacts();

if(isset($_POST['csv']) && (isset($_POST['date_id']))) {
    $date_id = $_POST['date_id'];
    $date = $displayModel->getDateById($date_id); 
        
    $csv = fopen('../csv/file.csv', 'a');
    if ($csv && $date) { 
        $fields = array($date['title'], $date['content']);
        fputcsv($csv, $fields);
        fclose($csv);
    }
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
                <input type="hidden" name="date_id" value="<?php echo $date['id']; ?>">
                <button type="submit" name="csv">CSV出力</button>
            </form>
            <div>----------------------------------------</div>
        <? endforeach; ?>
        <?php endif; ?>
        <!-- データが無い場合 -->
        <?php if(empty($display)): ?>
            <p>送信履歴無し</p>
        <?php endif; ?>
    </div>
  
</body>
</html>