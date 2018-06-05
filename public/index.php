<?php
use OOP_regLog\Controller\FrontController;

require_once dirname(__DIR__) . "/vendor/autoload.php";
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>regLog</title>
        <style>
            input {
                display: block;
            }
        </style>
    </head>
    <body>
        <?php $frontController = new FrontController(); ?>
    </body>
</html>
