<?php
    session_start();
?>

<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
        <link rel="stylesheet" href="../style.css">
        <title>Welcome to Kitabooku</title>
    </head>

    <body style="background-color:#dddfd4;">
        <br>
        <h1 style="text-align:center;" >Do you have an account already?</h1>
        <br><br><br>
        <button class="button" onclick="location = 'login.php'";>Login</button>
        <br><br>
        <br>
        <br>
        <button disabled class="button" onclick="location = 'signup.php'"; >Create Account</button>
    </body>
</html>

