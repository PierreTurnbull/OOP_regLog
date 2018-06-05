<?php
namespace OOP_regLog\View;

use OOP_regLog\Helper\Session;

class PageView
{
    public function __construct()
    {
    }

    public function displayMessages()
    {
        if (count($_SESSION["messages"]["registerErrors"]) > 0) {
            ?>
            <ul>
                <h3>Errors:</h3>
                <?php
                foreach ($_SESSION["messages"]["registerErrors"] as $error) {
                    ?>
                    <li><?= $error ?></li>
                    <?php
                }
                ?>
            </ul>
            <?php
        }
        Session::unsetSessionErrors("registerErrors");
        if (count($_SESSION["messages"]["registerInformations"]) > 0) {
            ?>
            <ul>
                <h3>Informations:</h3>
                <?php
                foreach ($_SESSION["messages"]["registerInformations"] as $info) {
                    ?>
                    <li><?= $info ?></li>
                    <?php
                }
                ?>
            </ul>
            <?php
        }
        Session::unsetSessionErrors("registerInformations");
    }

    public function displayUserForms()
    {
        ?>
        <section>
            <form action="login">
                <h2>Login</h2>
                <label for="username">Username:</label>
                <input type="text" name="username">
                <label for="password">Password:</label>
                <input type="password" name="password">
                <input type="submit">
            </form>
            <form action="register" method="POST">
                <h2>Register</h2>
                <label for="username">Username:</label>
                <input type="text" name="username">
                <label for="password">Password:</label>
                <input type="password" name="password">
                <label for="password_verif">Verify your password:</label>
                <input type="password" name="password_verif">
                <input type="submit">
            </form>
        </section>
        <?php
    }

    public function displayLogout()
    {
        echo "logout";
    }

    public function displayIndex()
    {
        $this->displayMessages();
        if (!Session::userIsLoggedIn()) {
            $this->displayUserForms();
        } else {
            $this->displayLogout();
        }
        ?>
        <section>
            <h1>Home page</h1>
            <h2>what's up?</h2>
            <p>blablablab lablbl balblael lblablelbllblblba BLA BLA BLA bla BLa lba</p>
        </section>
        <?php
    }
}