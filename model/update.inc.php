<?php
session_start();
$id = $_SESSION['userid'];
if (isset($_POST['change'])) {
    /* echo "feur"; */
    $email2 = $_POST['email2'];
    $fname2 = $_POST['fname2'];
    $lname2 = $_POST['lname2'];
    $genre2 = $_POST['genre2'];
    $old_pswd = $_POST['old_pswd'];
    /*  var_dump($old_pswd); */
    $new_pswd = $_POST['new_pswd'];
    $city2 = $_POST['city2'];
    /*    var_dump($city2); */
    $hobbies2 = $_POST['hobbies2'];
    foreach ($hobbies2 as $hobby2) {
    }
    $orientation2 = $_POST['orientation2'];
    include("../controller/conndb.php");
    include("update.php");
    include("../controller/updatectrl.php");
    $login = new Updatectrl($id, $fname2, $lname2, $email2, $old_pswd, $new_pswd, $genre2, $city2, $hobby2, $orientation2);
    $login->AllowUpdate();
    header("Location: ../view/account.php");
}