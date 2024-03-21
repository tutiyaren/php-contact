<?php
namespace App;
use PDO;

interface FavoriteInterface
{
    public function check_favorite($user_id, $contact_id);
}

abstract class AbstractFavorites implements FavoriteInterface
{
    protected PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
}

class Favorites extends AbstractFavorites
{
    public function check_favorite($user_id, $contact_id)
    {
        $sql = "SELECT *
                FROM favorites
                WHERE user_id = :user_id AND contact_id = :contact_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(':user_id' => $user_id ,
                            ':contact_id' => $contact_id));
        $favorite = $stmt->fetch();
        return $favorite;
    }

    public function add_favorite($user_id, $contact_id)
    {
        $sql = "INSERT INTO favorites (user_id, contact_id) VALUES (:user_id, :contact_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(':user_id' => $user_id ,
                            ':contact_id' => $contact_id));
    }

    public function delete_favorite($user_id, $contact_id)
    {
        $sql = "DELETE FROM favorites WHERE user_id = :user_id AND contact_id = :contact_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(':user_id' => $user_id ,
                            ':contact_id' => $contact_id));
    }

    public function getFavoritesByUserId($user_id)
    {
        $sql = "SELECT c.title, c.content
                FROM contacts c
                INNER JOIN favorites f ON c.id = f.contact_id
                WHERE f.user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

