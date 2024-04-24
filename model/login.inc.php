<?php
include("../controller/conndb.php");
include("login.php");
include("../controller/loginctrl.php");
if (isset($_POST['login'])) {
    /*  echo 'feur'; */
    $email1 = $_POST['email1'];
    $pswd1 = $_POST['pswd1'];
    $login = new Loginctrl($email1, $pswd1);
    $login->LoginUser();
    /* var_dump($pswd1); */
    header("Location: ../view/Homepage.php");
}