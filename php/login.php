<?php
    include('config.php');
    $error = "";
    session_start();
    if (session_id())
    {
        session_destroy();
    }

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user WHERE email = '$email' and password = '$password'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_num_rows($result);
        if($row == 1) {
            session_start();
            $user = mysqli_fetch_object($result);
            $userID = $user->user_ID;
            $userType = $user->user_type;
            $_SESSION['userID'] = $userID;
            $_SESSION['userType'] = $userType;
            header("location: home.php");
        }
        else {
            $error = "Your Username or Password is invalid";
        }
    }
    ?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../style.css">
    <title>Login</title>
</head>

<body style="background-color:#dddfd4;">
    <br>
    <h1 style="text-align:center;" onclick="location.href='http://google.com.tr';" >GLASS CEILING</h1>
    <br><br><br>
    <form action="" method="post">
        <br>
        <input type="email" class="input" id="email" placeholder="Enter Email" name="email" required>
        <br>
        <input type="password" class="input" id="password" placeholder="Enter Password" name="password">
        <br>
        <button type="submit" name="input" class="button">Login</button>
    </form>
</body>
</html>
<html>

