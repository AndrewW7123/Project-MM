<!DOCTYPE html>
<!--
Andrew Whitehead
400581822
March 12, 2025
Sign-up page redirect which adds newly made accounts to the database
-->
<?php
include "../connect.php";
?>
<html>

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/5050.css">
</head>

<body>
    <div id="container">
        <div id="login">
            <?php
            $email = filter_input(INPUT_POST, "useremail", FILTER_VALIDATE_EMAIL);
            $name = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
            $coach = filter_input(INPUT_POST, "coach", FILTER_VALIDATE_INT);
            $usedemail = false;

            if ($email !== null and $email !== false and 
                $name !== null and $name !== false and
                $password !== null and $password !== false) {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $command = "SELECT email FROM accounts";
                    $stmt = $dbh->prepare($command);
                    $success = $stmt->execute();

                    // If email used, tell user and prompt return to retry
                    if ($success) {
                        while ($row = $stmt->fetch()) {
                            if ($row["email"] == $email) {
                                $usedemail = true;
                                echo "<h1>Email already in use. Please use a different one.</h1>";
                                echo "<a href='index.php'>Back</a>";
                                break;
                            }
                        }
                    }

                    // Otherwise, insert input information to a new account
                    // If they selected coach, that is reflected in isCoach in the database with a 1 or 0 for not
                    if ($usedemail == false) {
                        if ($coach == null) {
                            $coach = 0;
                        }
                        $command = "INSERT into accounts (email, username, pass, isCoach) VALUES (?, ?, ?, ?)";
                        $stmt = $dbh->prepare($command);
                        $args = [$email, $name, $hash, $coach];
                        $success = $stmt->execute($args);

                        if ($success) {
                            echo "<h1>Account Successfully Created!</h1>";
                            echo "<h3>Please log-in to your new account</h3>";
                            echo "<a href='../sign-in/index.php'>Log In</a>";
                        }
                        else {
                            echo "There was a problem creating your account. Please try again!";
                            echo "<a href='index.php'>Create Account</a>";
                        }
                    }
            }
            else {
                echo "<h1>Redirect failed, please re-enter your information</h1>";
                echo "<a href='index.php'>Sign Up</a>";
            }
            ?>
        </div>
    </div>        

</body>

</html>