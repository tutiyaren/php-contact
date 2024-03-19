<?php
use App\Users;
require '../app/Users.php';
session_start();

$pdo = new PDO('mysql:host=mysql;dbname=contactform', 'root', 'password');
$userModel = new Users($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $user = $userModel->getUserByEmail($email);

    $userModel->together($user, $password);
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
        <form action="" method="post">
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email">
            </div>
            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password">
            </div>
            <button type="submit">ログイン</button>
        </form>
    </div>
  
</body>
</html>