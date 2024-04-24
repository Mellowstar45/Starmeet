<?php
session_start();
$id = $_SESSION['userid'];
if (isset($_POST['search'])) {
    $cities = $_POST['cities'];
    $sex = $_POST['sex'];
    $hobbies = $_POST['hobbies'];
    $hobbies2 = $_POST['hobbies2'];
    $min_age = $_POST["min_age"];
    $max_age = $_POST["max_age"];
    include("../controller/conndb.php");
    include("search.php");
    include("../controller/searchctrl.php");
    $login = new Searchctrl($cities, $hobbies, $hobbies2, $sex, $min_age, $max_age);
    $login->SearchUser();
}