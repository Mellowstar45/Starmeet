<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StarMeet</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="styles/home.css">
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
                <li><a href="#">Home</a></li>
                <li><a href="#">Account</a></li>
                <li><a href="#">Likes</a></li>
            </ul>
            <button class="login-btn">LOG IN</button>
        </nav>
    </header>

    <div class="blur-bg-overlay"></div>
    <div class="form-popup">
        <span class="close-btn material-symbols-rounded">close</span>
        <div class="form-box login">
            <div class="form-details">
                <h2>Welcome Back
                </h2>
                <p>Please log in using your personal information to search for your match !</p>
            </div>
            <div class="form-content">
                <h2>LOGIN</h2>
                <form action="../model/login.inc.php" method="post" name="login">
                    <div class="input-field">
                        <input type="text" name="email1" id="email1" required>
                        <label>mail</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="pswd1" id="pswd1" required>
                        <label>Password</label>
                    </div>
                    <a href="#" class="forgot-pass-link">Forgot password?</a>
                    <button type="submit" name="login" value="login">Log In</button>
                </form>
                <div class="bottom-link">
                    Don't have an account?
                    <a href="#" id="signup-link">Signup</a>
                </div>
            </div>
        </div>
        <div class="form-box signup">
            <div class="form-details">
                <h2>Welcome !</h2>
                <p>To become a part of our community and find your match, please sign up using your personal
                    information.</p>
            </div>
            <div class="form-content">
                <h2>SIGNUP</h2>
                <form action="../model/signup.inc.php" method="post">
                    <div class="input-field">
                        <input type="text" name="fname" id="fname" required>
                        <label>Enter your First Name</label>
                    </div>
                    <div class="input-field">
                        <input type="text" name="lname" id="lname" required>
                        <label>Enter your Last Name</label>
                    </div>
                    <div class="input-field">
                        <input type="email" name='email' id='email' required>
                        <label>Enter your email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="pswd" id="pswd" required>
                        <label>Create password</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="pswd_repeat" id="pswd_repeat" required>
                        <label>Repeat password</label>
                    </div>
                    <div class="birthday-text">
                        <label for="birthday" class=birthday-label>Birthdate</label>
                        <input type="date" id="birthday" name="birthday" required>
                    </div>
                    <div class="input-field" style="padding-left:15vh; height:auto;">
                        <select name="genre">
                            <option value="Man">Man</option>
                            <option value="Woman">Woman</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <input type="text" name='hobbies[]' id='hobbies' required>
                        <label>Tell us your hobby/hobbies</label>
                    </div>
                    <div class="input-field">
                        <input type="text" name="city" id="city" required>
                        <label>Choose a city</label>
                    </div>
                    <div class="input-field" style="height:20px;">
                        <select name="orientation">
                            <option value="Straight">Straight</option>
                            <option value="Gay">Gay</option>
                            <option value="Lesbian">Lesbian</option>
                            <option value="Bisexual">Bisexual</option>
                            <option value="Asexual">Asexual</option>
                        </select>
                    </div>
                    <div class="policy-text">
                        <input type="checkbox" id="policy">
                        <label for="policy">
                            I agree to the
                            <a href="#" class="option">Terms & Conditions</a>
                        </label>
                    </div>
                    <button type="submit" name="signup" value="signup">Sign Up</button>
                </form>
                <div class="bottom-link" style="margin-top:-22px;">
                    Already have an account?
                    <a href="#" id="login-link">Login</a>
                </div>
            </div>
        </div>
    </div>
    <div class=errormessage>
        <?php
        include("../model/errorhandling.php");
        ?>
    </div>
    <script src="script/home.js" defer></script>
</body>

</html>