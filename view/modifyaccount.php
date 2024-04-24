<!DOCTYPE html>
<?php
session_start();
if (!array_key_exists('userid', $_SESSION)) {
    header("Location: ../connectpage.php?error=camarchepas");
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
                            <li><a href="delete.php" class="test">Delete Account</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <form method="post" action="../model/update.inc.php">
                <div class="input-field">
                    <input type="text" name='email2' id='email' style="color:lightblue;"
                        value="<?= $_SESSION['usermail']; ?>" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-field">
                    <input type="text" name="fname2" id="fname" style="color:lightblue;"
                        value="<?= $_SESSION['useruid']; ?>" required>
                    <label for="fname">First Name</label>
                </div>
                <div class="input-field">
                    <input type="text" name="lname2" id="lname" style="color:lightblue;"
                        value=" <?= $_SESSION['userlname']; ?>" required>
                    <label for="lname">Last Name</label>
                </div>
                <div class="input-field">
                    <p>Birthdate :
                        <?= $_SESSION['birthdate']; ?>
                    </p>
                </div>
                <div class="input-field">
                    <select name="genre2">
                        <option value="Man">Man</option>
                        <option value="Woman">Woman</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="input-field">
                    <input type="password" name="old_pswd" id="old_pswd" required>
                    <label for="old_pswd">Old Password</label>
                </div>
                <div class="input-field">
                    <input type="password" name="new_pswd" id="new_pswd" required>
                    <label for="new_pswd">New Password</label>
                </div>
                <div class="input-field">
                    <input type="text" name='hobbies2[]' id='hobbies' style="color:lightblue;"
                        value="<?= $_SESSION['hobby']; ?>" required>
                    <label for="hobbies">Hobby/Hobbies</label>
                </div>
                <div class="input-field">
                    <input type="text" name="city2" id="city" style="color:lightblue;" value="<?= $_SESSION['city']; ?>"
                        required>
                    <label for="city">Write a city</label>
                </div>
                <div class="input-field" style="height:20px;">
                    <select name="orientation2">
                        <option value="Straight">Straight</option>
                        <option value="Gay">Gay</option>
                        <option value="Lesbian">Lesbian</option>
                        <option value="Bisexual">Bisexual</option>
                        <option value="Asexual">Asexual</option>
                    </select>
                </div>
                <button type="submit" name="change" id="change" value="change">Confirm Change</button>
            </form>
            <?php
            include("../model/errorhandling.php");
            ?>
        </div>
    </section>
</body>

</html>