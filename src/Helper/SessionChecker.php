<?php
namespace OOP_regLog\Helper;

class SessionChecker
{
    /**
     * SessionChecker constructor. SessionChecker cannot be instantiated.
     */
    private function __construct()
    {}

    /**
     * If a user is logged in, return true. Else, return false.
     * @return bool
     */
    public static function userIsLoggedIn()
    {
        if (isset($_SESSION["user"]) && $_SESSION["user"] !== "")
        {
            return true;
        }
        return false;
    }
}