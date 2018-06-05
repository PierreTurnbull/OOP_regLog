<?php
namespace OOP_regLog\Controller;

use OOP_regLog\Helper\Connection;
use OOP_regLog\Helper\Session;

session_start();

class FrontController
{
    /**
     * Contains a PDO object corresponding to the connection to the database.
     * @var null|\PDO
     */
    private $connection = null;

    /**
     * FrontController constructor. Call a page or 404 MVC function depending on the url.
     */
    public function __construct()
    {
        Session::createSession();
        $this->connection = Connection::getConnection();
        $path = basename($_SERVER["PHP_SELF"]);
        if ($path === "index.php") {
            $this->index();
        } else if ($path === "register") {
            $this->register($_POST ?? []);
        } else {
            $this->error404();
        }
    }

    public function index()
    {
        $pageController = new PageController();
        $pageController->handleIndex();
    }

    public function register(array $data)
    {
        $pageController = new PageController();
        $pageController->register($data);
    }

    public function error404()
    {
        http_response_code(404);
        // todo: view;
        echo "The page you are looking for doesn't exist.";
    }
}