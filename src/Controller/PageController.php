<?php
namespace OOP_regLog\Controller;

use OOP_regLog\View\PageView;
use OOP_regLog\Model\PageModel;

class PageController
{
    private $model = null;
    private $view = null;

    public function __construct()
    {
        $this->model = new PageModel();
        $this->view = new PageView();
    }

    public function handleIndex()
    {
        $this->view->displayIndex();
    }

    public function register(array $data)
    {
        if ($this->model->registerDataIsValid($data)) {
            $this->model->register($data);
        }
        header("Location: /");
        exit;
    }
}