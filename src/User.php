<?php

declare(strict_types=1);

class User
{
    public function create()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email    = $_POST['email'];
            $password = $_POST['password'];

            $_SESSION['email'] = $email;

            
            $db   = DB::connect();
            $stmt = $db->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $result = $stmt->execute();

            echo $result ? header('Location: /') : 'Something went wrong';
        }
    }

    public function login () {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email    = $_POST['email'];
            $password = $_POST['password'];

            $db   = DB::connect();
            $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $result = $stmt->fetch();
            if ($result){
                $_SESSION['email'] = $email;
                header('Location: /');
            }

            echo 'Something went wrong';

        }
    }

    public function register () {
        if ($this -> isUserExists()) {
            echo 'User already exists';
            return;
        }
        $this -> create();
        header('Location: /home');
    }

    public function isUserExists(): bool
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $db = DB::connect();
            $stmt = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $result = $stmt->fetch();
            echo $result ? "User exists" : 'User does not exist';
            return $result ? true : false;
        }
        return false;
    }

    public  function  Logout()
    {
        session_destroy();
        header('Location: /');
        exit();

    }

}