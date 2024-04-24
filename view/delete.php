<!DOCTYPE html>
<?php
session_start();
if (!array_key_exists('userid', $_SESSION)) {
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
                            <li><a href="account.php" class="test">Cancel</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <form method="post" action="../model/delete.inc.php">
                <div class="input-field">
                    <p> Are you sure you want to delete your account
                        <?= $_SESSION['usermail']; ?>?
                    </p>
                </div>
                <div class="input-field">
                    <input type="password" name="pswd1" id="pswd1" required>
                    <label>Please enter your password to confirm</label>
                </div>
                <button type="submit" name="confirm" id="confirm" value="confirm">Confirm Delete</button>
            </form>
        </div>
    </section>
</body>

</html>