<?php
class ErrorHandling
{
    public static function displayError()
    {
        if (isset($_GET['error'])) {
            $error_message = htmlspecialchars($_GET['error']);
            echo "<h1>$error_message</h1>";
        }
    }
}

ErrorHandling::displayError();