<!DOCTYPE html>
<?php
session_start();
if (!array_key_exists('usermail', $_SESSION)) {
    header("Location: ../connectpage.php?error=noconnection");
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
                <li><a href="#" class="active">Home</a></li>
                <li><a href="Account.php" class="not-active">Account</a></li>
                <li><a href="#" class="not-active">Likes</a></li>
                <li class="name">Hey
                    <?= $_SESSION['useruid']; ?> !
                </li>
            </ul>
            <a href="../model/logout.inc.php" class="login-btn">LOG OUT</a>
        </nav>
    </header>
    <section class="main">
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
        <h1>Start your search for your fated one.</h1>
        <form method="post" class="beauty card">
            <label for="cities">Search By Cities</label>
            <input type="text" name="cities" id="cities">
            <label for="hobbies">Search By Hobbies</label>
            <input type="text" list="hobby" name="hobbies">
            <datalist id="hobby">
                <option value="Basket">
                <option value="Gaming">
                <option value="Manga">
                <option value="Cooking">
                <option value="Dance">
            </datalist>
            <input type="text" list="hobby2" name="hobbies2">
            <datalist id="hobby2">
                <option value="Basket">
                <option value="Gaming">
                <option value="Manga">
                <option value="Cooking">
            </datalist>
            <label for="sex-select">Search By Gender</label>
            <select name="sex" id="sex-select">
                <option value="none">None</option>
                <option value="Man">Man</option>
                <option value="Woman">Woman</option>
                <option value="Other">Other</option>
            </select>
            <label for="min_age">Minimum Age:</label>
            <input type="range" id="min_age" name="min_age" min="18" max="100" value="18">
            <output for="min_age">18</output>

            <label for="max_age">Maximum Age:</label>
            <input type="range" id="max_age" name="max_age" min="18" max="100" value="100">
            <output for="max_age">100</output>
            </div>
            <input type="submit" name="search">
        </form>
    </section>
    <section class="searchresults">
        <h2>Your Results :</h2>
        <?php
        include("../model/search.inc.php");
        include("../model/errorhandling.php");
        ?>
    </section>
    <script src="script/home.js" defer></script>
</body>

</html>