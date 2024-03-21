<?php
namespace App;
use PDO;

interface UserInterface
{
    public function getUserByEmail($email);
    public function together($user, $password);
}

abstract class AbstractUsers implements UserInterface
{
    protected PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
}

class Users extends AbstractUsers
{
    public function getUserByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function together($user, $password)
    {
        if ($user && $password === $user['password']) {
            $_SESSION['logged_in'] = true;
            $_SESSION['id'] = $user['id'];
            header('Location: history.php');
            exit();
        }
    }
}