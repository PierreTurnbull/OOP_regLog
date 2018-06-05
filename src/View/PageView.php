<?php
namespace OOP_regLog\View;

class PageView
{
    public function __construct()
    {
    }

    public function displayUserForms()
    {
        ?>
        <section>
            <form action="">
                <h2>Login</h2>
                <label for="username">Username:</label>
                <input type="text" name="username">
                <label for="password">Password:</label>
                <input type="password" name="password">
                <input type="submit">
            </form>
            <form action="">
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
        ?>
        <section>
            <h1>Home page</h1>
            <h2>what's up?</h2>
            <p>blablablab lablbl balblael lblablelbllblblba BLA BLA BLA bla BLa lba</p>
        </section>
        <?php
    }
}