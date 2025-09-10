<!DOCTYPE html>
<!--
Andrew Whitehead
400581822
March 12, 2025
HTML form responsible for user account creation (coaches and users)
-->
<html>

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/5050.css">
    <script src="js/sign-up.js"></script>
</head>

<body>
    <div id="container">
        <form id="form" action="created.php" method="post">
            <div id="login">
                <img src="../images/5050small.jpg">
                <h2>Create Account</h2>
                <input class="inputs" id="email" name="useremail" type="email" placeholder="Email" required>
                <input class="inputs" id="name" name="username" type="text" placeholder="Username" required>
                <input class="inputs" id="password" name="password" type="password" placeholder="Password" required>
                <h3>Are you a coach?</h3>
                <input id="coach" name="coach" type="checkbox" value="1">
                <input id="submit" type="submit" value="Create">
                <h3 id="error"></h3>
            </div>
        </form>
    </div>
</body>

</html>