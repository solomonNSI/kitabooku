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
    $quote = $_POST['quote'];


    $query = "SELECT COUNT(*) AS count
                FROM User
                WHERE username = '$username' 
                AND pwd = '$password'";

    $result = $db->query($query) or die('Error in query: ' . $db->error);
    $data = $result->fetch_assoc();

    if ($data['count'] > 0) {
        echo '<script>alert("Account already exists");';
        echo 'document.location = "index.php";</script>';
    } else {
        $query = "INSERT INTO User VALUES ('$username','$email', '$password')";
        $result = $db->query($query) or die('Error in query: ' . $db->error);
        
        $query = "INSERT INTO Reader VALUES ('$username','0', '0', '$quote')";
        $result = $db->query($query) or die('Error in query: ' . $db->error);
        
        $query2 = "INSERT INTO Wallet (balance) VALUES ('1000')";
        // Execute the query
        mysqli_query($db,$query2);
        $last_wid = mysqli_insert_id($db);

        $sql = "INSERT INTO has_wallet VALUES ('$username', '$last_wid')";
        mysqli_query($db,$sql);

        echo "<div> heee" . $result . "</div>";
        session_start();
        $_SESSION['userID'] = $username; // pass the username as userID to the other pages
        header('Location: homepage.php');
    }
?>
