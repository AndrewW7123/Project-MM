<!--
Name: Evan Burlaca
Student Number: 400574598
Date: March 12, 2025
Description: This is the main login form file. It prompts the user for a email
             and password through a form which redirects to login.php. It also 
             gives the user interactive feedback based on incorrect email/password
             combinations and invalid emails.
-->

<!doctype html>
<?php
//Feedback from login.php
$feedback = filter_input(INPUT_GET, "error", FILTER_SANITIZE_SPECIAL_CHARS);
?>

<html>

<head>
    <meta charset="utf-8">
    <title>50/50 Login Page</title>
    <link rel="stylesheet" href="css/sign-in.css">
</head>

<script src="js/sign-in.js"></script>

<body>
    <div id="container">
        <div class="right">
            <p style="margin: 20px;">Don't have an account?</p>
            <button id="signUp">Sign Up</button>
        </div>

        <div class="flex">
            <h1>Login to </h1>
            <img src="../images/5050.jpg" id="img5050">
        </div>

        <hr>

        <form action="login.php" method="POST" id="loginForm">
                <input class="inputs" type="email" name="email" id="emailBox" placeholder="Email" required>
                <input class="inputs" type="password" name="password" placeholder="Password" required>
                
                <div class="flex">
                    <p id="feedback1"></p>
                </div>

                <div class="flex">
                    <p id="feedback2"><?php echo $feedback;?></p>
                </div>

                <div class="flex">
                    <input class="inputs" type="submit" id="submit">
                </div>
        </form>
    </div>

    <img src="../images/5050small.jpg" id="redimg5050">
</body>

</html>