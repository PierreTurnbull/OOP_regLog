<?php
namespace OOP_regLog\Model;

use OOP_regLog\Helper\Connection;

class PageModel
{
    private $connection = null;

    public function __construct()
    {
        $this->connection = Connection::getConnection();
    }

    public function userAlreadyExists(string $username)
    {
        $queryStr = "
            SELECT
                `username`
            FROM
                `users`
            WHERE
                `username` = :username
        ";
        $stmt = $this->connection->prepare($queryStr);
        $stmt->bindValue(":username", $username);
        $stmt->execute();
        if ($stmt->fetch(\PDO::FETCH_ASSOC)) {
            return true;
        }
        return false;
    }

    public function registerDataIsValid(array $data)
    {
        if (!isset($data["username"]) || $data["username"] === "") {
            array_push($_SESSION["messages"]["registerErrors"], "Please enter a user name.");
        }
        if (!isset($data["password"]) || $data["password"] === "") {
            array_push($_SESSION["messages"]["registerErrors"], "Please enter a password.");
        }
        if (!isset($data["password_verif"]) || $data["password_verif"] === "") {
            array_push($_SESSION["messages"]["registerErrors"], "Please enter your password twice.");
        } else if (isset($data["password"]) && $data["password"] !== $data["password_verif"]) {
            array_push($_SESSION["messages"]["registerErrors"], "You typed 2 different passwords.");
        }
        if ($this->userAlreadyExists($data["username"])) {
            array_push($_SESSION["messages"]["registerErrors"], "This username is already taken!");
        }
        if (count($_SESSION["messages"]["registerErrors"]) > 0) {
            return false;
        }
        return true;
    }

    public function register(array $data)
    {
        $passwordHash = password_hash($data["password"], PASSWORD_BCRYPT);
        $queryStr = "
            INSERT INTO
                `users`
            SET
                `username` = :username,
                `password` = :password
        ";
        $stmt = $this->connection->prepare($queryStr);
        $stmt->bindValue(":username", $data["username"]);
        $stmt->bindValue(":password", $passwordHash);
        if ($stmt->execute()) {
            \array_push($_SESSION["messages"]["registerInformations"], "Your account was successfully created.");
        } else {
            \array_push($_SESSION["messages"]["registerErrors"], "An unexpected error occurred. Please try again.");
        }
    }
}