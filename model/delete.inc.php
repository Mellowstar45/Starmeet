<?php
session_start();
$id = $_SESSION['userid'];
if (isset($_POST['confirm'])) {
    $pswd1 = $_POST['pswd1'];
    include("../controller/conndb.php");
    include("delete.php");
    include("../controller/deletectrl.php");
    $login = new Deletectrl($pswd1, $id);
    $login->AllowDelete();
}