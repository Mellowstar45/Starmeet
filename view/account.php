<!DOCTYPE html>
<?php
session_start();
if (!array_key_exists('usermail', $_SESSION)) {
    header("Location: ../connectpage.php?error=Session ended abruptly");
    exit();
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StarMeet</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="styles/connected.css">
    <script src="script/jquery.js"></script>
    <script src="script/account.js"> </script>
</head>

<body>
    <header>
        <nav class="navbar">
            <span class="hamburger-btn material-symbols-rounded">menu</span>
            <a href="#" class="logo">
                <img src="images/test.jpg" alt="logo">
                <h2>StarMeet
                </h2>
            </a>
            <ul class="links">
                <li class="close-btn material-symbols-rounded">close</li>
                <li><a href="Homepage.php" class="not-active">Home</a></li>
                <li><a href="#" class=" active">Account</a></li>
                <li><a href="#" class="not-active">Likes</a></li>
            </ul>
            <a href="../model/logout.inc.php" class="login-btn">LOG OUT</a>
        </nav>
    </header>
    <section class="main">
        <div class="card">
            <h2>Your Account Info</h2>
            <nav>
                <ul>
                    <li>
                        <a href="#">Options</a>
                        <ul>
                            <li><a href="modifyaccount.php" class="test">Modify Account</a></li>
                            <li><a href="delete.php" class="test">Delete Account</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <p>Email :
                <?= $_SESSION['usermail']; ?>
            </p>
            <p>Firstname :
                <?= $_SESSION['useruid']; ?>
            </p>
            <p>Lastname :
                <?= $_SESSION['userlname']; ?>
            </p>
            <p>Gender :
                <?= $_SESSION['gender']; ?>
            </p>
            <p>Birthdate :
                <?= $_SESSION['birthdate']; ?>
            </p>
            <p>Password : **********</p>
            <p>City :
                <?= $_SESSION['city']; ?>
            </p>
            <p>Hobby/Hobbies :
                <?= $_SESSION['hobby']; ?>
            </p>
            <p>Orientation :
                <?= $_SESSION['orientation']; ?>
            </p>
        </div>
    </section>
</body>

</html>