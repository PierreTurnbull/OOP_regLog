<?php
namespace OOP_regLog\Controller;

use OOP_regLog\Helper\SessionChecker;

session_start();

class FrontController
{
    /**
     * FrontController constructor. Call a page or 404 MVC function depending on the url.
     */
    public function __construct()
    {
        $path = basename($_SERVER["PHP_SELF"]);
        if ($path === "index.php" && SessionChecker::userIsLoggedIn()) {
            $this->home();
        } else if ($path === "index.php") {
            $this->index();
        } else if ($path === "home") {
            $this->home();
        } else {
            $this->error404();
        }
    }

    public function index()
    {
        echo "index!";
    }

    public function home()
    {
        echo "home!";
    }

    public function error404()
    {
        http_response_code(404);
        // todo: view;
        echo "The page you are looking for doesn't exist.";
    }
}