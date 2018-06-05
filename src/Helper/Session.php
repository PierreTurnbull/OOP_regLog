<?php
namespace OOP_regLog\Helper;

class Session
{
    /**
     * Session constructor. Session cannot be instantiated.
     */
    private function __construct()
    {}

    /**
     * Create a session.
     */
    public static function createSession()
    {
        if (!isset($_SESSION)) {
            session_start();
            $_SESSION["messages"] = [
                "registerErrors" => [],
                "registerInformations" => []
            ];
        }
    }

    public static function unsetSessionErrors(string $category)
    {
        $_SESSION["messages"][$category] = [];
    }

    /**
     * If a user is logged in, return true. Else, return false.
     * @return bool
     */
    public static function userIsLoggedIn()
    {
        if (isset($_SESSION["registerErrors"]) && $_SESSION["registerErrors"] !== "")
        {
            return true;
        }
        return false;
    }
}