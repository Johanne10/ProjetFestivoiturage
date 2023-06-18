<?php

namespace app\Controllers;

use app\models\Utilisateur;

class Authentification_loginController extends BaseController
{

    public static function indexAction()
    {


        // View (afficher les données)
        static::view("authentication-login");
    }


    public static function logout()
    {
        session_start();

        // Unset all of the session variables.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();

        // Add here route after redirection
        header('Location: index.php');
    }

    public static function authenticate()
    {
        // Start session
        session_start();
        // Get the user's email and password from the login form
        $email = $_POST['user_login'];
        $password = $_POST['user_password'];
        // Authenticate the user using the model
        $user = (new Utilisateur)->authenticate($email, $password);

        // If authentication was successful
        if ($user !== false) {
            // Set the user's ID in the session
            $_SESSION['user_id'] = $user['id_utilis'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['user'] = $user;

            // Redirect the user to the home page or dashboard
            header('Location: index.php');
            exit;
        } else {
            // If authentication failed, show an error message
            $_SESSION['error'] = 'Invalid email or password';
        }

        // Render the login form
        // include 'views/login.php';
    }
}
