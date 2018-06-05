<?php
namespace OOP_regLog\Controller;

use OOP_regLog\Helper\SessionChecker;

session_start();

class FrontController
{
    private $session = null;
    private $connection = null;
    /**
     * FrontController constructor. Call a page or 404 MVC function depending on the url.
     */
    public function __construct()
    {
        $path = basename($_SERVER["PHP_SELF"]);
        if ($path === "index.php" && SessionChecker::userIsLoggedIn()) {
            $this->index(true);
        } else if ($path === "index.php") {
            $this->index(false);
        } else {
            $this->error404();
        }
    }

    public function index(bool $isLoggedIn)
    {
        $pageController = new PageController();
        $pageController->handleIndex($isLoggedIn);
    }

    public function error404()
    {
        http_response_code(404);
        // todo: view;
        echo "The page you are looking for doesn't exist.";
    }
}