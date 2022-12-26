<?php
    require 'ConnectServer.class.php';
    $db = ConnectServer::connect();
    
    session_start();
    if (session_id())
    {
        session_destroy();
    }
    // Get the form variables
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql = "INSERT INTO User VALUES ('$username','$email', '$password')";
    mysqli_query($db,$sql);
    echo "$username";

    //wallet is auto incremented
    $balance = "100";
    $sql = "INSERT INTO Wallet (balance) 
            VALUES ('$balance');";
    // Execute the query
    mysqli_query($db,$sql);
    $last_wid = mysqli_insert_id($db);
    echo "$last_wid";

    $sql = "INSERT INTO has_wallet VALUES ('$username', '$last_wid')";
    mysqli_query($db,$sql);

    session_start();
    $_SESSION['userID'] = $username; // pass the username as userID to the other pages
    header('Location: homepage.php');
    // if ($data['count'] > 0) {
    //     session_start();
    //     $_SESSION['userID'] = $username; // pass the username as userID to the other pages
    //     header('Location: homepage.php');
    // } else {
    //     echo '<script>alert("Login failed, wrong credentials.");';
    //     echo 'document.location = "index.php";</script>';
    // }
?>
