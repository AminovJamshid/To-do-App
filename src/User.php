<?php

namespace src;
use DB;
class User {
    private $pdo;

    public function __construct()
    {
        $this->pdo  = DB::connect();
    }

    public function save_user(int $chat_id)
    {
        $check = $this->pdo->prepare("SELECT * FROM `users` WHERE `chat_id` = :chat_id");
        $check->bindParam(':chat_id', $chat_id);
        $check->execute();
        $check = $check->fetch();
        if (!($check)) {
            $query = "INSERT INTO `users` (`chat_id`, `created_at`) VALUES (:chat_id, NOW())";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':chat_id', $chat_id);
            $stmt->execute();
        }
    }
    public function  setStatus(int $chatId, $status='add') {
        $query  = "UPDATE `users` SET `status` = :status WHERE `chat_id` = :chat_id";
        $stmt   = $this->pdo->prepare($query);
        $stmt->bindParam(':chat_id', $chatId);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
    }

    public function getUserInfo (int $chatId) {
        $stmt = $this->pdo->prepare("SELECT * FROM users where chat_id = :chat_id LIMIT 1");
        $stmt->execute(['chat_id' => $chatId]);
        return $stmt->fetchObject();
    }
}