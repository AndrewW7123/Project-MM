<!--
Name: Evan Burlaca
Student Number: 400574598
Date: March 12, 2025
Description: Accepts email and password POST parameters from the form sign-in/index.php
             If the email/password combination is invalid, the user is redirected to
             index.php with a GET feedback message. If the email/password combination is
             valid, the user's username is svaed under $_SESSION["name"] and they are
             redirected to the main index.php file
-->

<?php
session_start(); //Start the session to track whether the user is logged in

?><!DOCTYPE html>
<?php
include "../connect.php";

//Get email and password POST parameters
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

$paramsOK = false; //At first assume parameters are invalid

if ($email !== null && $password !== null){
    $paramsOK = true;

    //Get all accounts with matching email(0 or 1 accounts)
    $command = "SELECT * FROM accounts WHERE email = ?";
    $stmt = $dbh->prepare($command);
    
    $args = [$email];
    $success = $stmt->execute($args);
}


?>
<html>

<head>
    <title>Logging In...</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <?php
    if ($paramsOK){
        if ($success) { //Command succeeded
            
            if ($stmt->rowCount() === 0){ //Email not found
                header('Location: index.php?error=That email does not exist');
                exit();

            } else { //Email was found
                $account = $stmt->fetch();

                if (!password_verify($password, $account['pass'])){ //Password doesn't match
                    header('Location: index.php?error=Incorrect password for the given username');
                    exit();

                } else { //Password Matches: Login Successful
                    $_SESSION["name"] = $account['username'];

                    header('Location: ../index.php');
                    exit();
                }
            }

        } else { //Command failed
            echo "<p>Something went wrong with accessing your profile…</p>";
        }
    } else { //Parameters were invalid
        echo "<p>Something was wrong with your email and password…</p>";
    }
    ?>
</body>

</html>