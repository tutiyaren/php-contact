<?php
namespace App;
use PDO;

interface ContactInterface
{
    public function getContacts(): array; 
    public function addContacts(string $title, string $email, string $content): void;
    public function getDateById($date_id);
}

abstract class AbstractContacts implements ContactInterface
{
    protected PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
}

class Contacts extends AbstractContacts
{
    public function getContacts(): array
    {
        $smt = $this->pdo->query("SELECT * FROM contacts");
        return $smt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addContacts(string $title, string $email, string $content): void 
    {
        date_default_timezone_set('Asia/Tokyo');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        $stmt = $this->pdo->prepare("INSERT INTO contacts(title, email, content, created_at, updated_at) VALUES (:title, :email, :content, :created_at, :updated_at)");
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":created_at", $created_at);
        $stmt->bindParam(":updated_at", $updated_at);
        $stmt->execute();
    }

    public function getDateById($date_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM contacts WHERE id = :date_id");
        $stmt->execute(['date_id' => $date_id]);
        $date = $stmt->fetch(PDO::FETCH_ASSOC);
        return $date;
    }
}