<?php
require 'ConnectServer.class.php';
$conn = ConnectServer::connect();

// Get the form variables
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT COUNT(*) AS count
          FROM User
          WHERE username = '$username' AND pwd = '$password'";

$result = $conn->query($query) or die('Error in query: ' . $conn->error);
$data = $result->fetch_assoc();

if ($data['count'] > 0) {
    session_start();
    $_SESSION['username'] = $password; // pass the username to the other pages
    header('Location: homepage.php');
} else {
    echo '<script>alert("Login failed, wrong credentials.");';
    echo 'document.location = "index.php";</script>';
}
$conn->close();
?>
