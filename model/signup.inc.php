<?php
if (isset($_POST['signup'])){
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $genre =$_POST['genre'];
    $birthdate = $_POST['birthday'];
    $pswd = $_POST['pswd'];
    $pswd_repeat=$_POST['pswd_repeat'];
    $city=$_POST['city'];
    $hobbies=$_POST['hobbies'];
    foreach($hobbies as $hobby){}
    $orientation=$_POST['orientation'];
    include("../controller/conndb.php");
    include("signup.php");
    include("../controller/signupctrl.php");
    $signup= new Registerctrl($email,$fname,$lname,$genre,$birthdate,$pswd,$pswd_repeat,$city,$hobby,$orientation);
    $signup->SignupUser();
    header("Location: ../view/connectpage.php?error=registered");
} 
