# Object oriented register/login system

## Filesystem

- **public**: files accessible from the client (index, css, images...)
- **src**: MVC + Helper
- **refs**: archives or dumps (database...)

## Database dump

To use the database dump, create an empty database _(or you can overwrite an existing one)_ and use the following command from the root directory of the server:
``mysql -u <mysql username> -p <database name> < refs/db.sql``.

## MVC detail

- Model
- View
- Controller
    - FrontController: the main controller. Is also the router.
- Helper: contains all services outside of the MVC
    - SessionChecker: checks the state of the current session.
    - Connection: create and stores a static PDO connection to the database.

## Routes

- ``/``: login page
- ``/home``: home page

Note: a user who is not logged in can only access the login or registration page.