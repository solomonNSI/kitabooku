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

    $query = "SELECT COUNT(*) AS count
            FROM User
            WHERE username = '$username' AND pwd = '$password'";

    $result = $db->query($query) or die('Error in query: ' . $db->error);
    $data = $result->fetch_assoc();

    if ($data['count'] > 0) {
        session_start();
        $_SESSION['userID'] = $username; // pass the username as userID to the other pages
        header('Location: homepage.php');
    } else {
        echo '<script>alert("Login failed, wrong credentials.");';
        echo 'document.location = "index.php";</script>';
    }
?>
