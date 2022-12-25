<?php
require 'ConnectServer.class.php';
$conn = ConnectServer::connect();

// Get the form variables
$b_id = $_POST['b_id'];

session_start(); // start session
$userID = $_SESSION['userID'];

$query = "SELECT w.balance, w.w_id
          FROM has_wallet h, Wallet w
          WHERE h.username = '$userID' AND h.w_id = w.w_id";
$result = $conn->query($query) or die('Error in query: ' . $conn->error);
$data = $result->fetch_assoc();
$balance = $data['balance'];
$w_id = $data['w_id'];
echo "$balance <br>";
echo "$w_id<br>";

$query = "SELECT price
          FROM E_Book
          WHERE b_id = '$b_id'";
$result = $conn->query($query) or die('Error in query: ' . $conn->error);
$data = $result->fetch_assoc();
$price = $data['price'];
echo "$price<br>";

if ($balance < $price) {
    echo "not enough money";
    echo "<script>alert('Not enough money on wallet balance! Price: {$price}, Balance: {$balance}');";
    echo 'document.location = "homepage.php";</script>';
} else {
    echo "let's buy that book $$$";
    $newBalance = $balance - $price;
    $query = "UPDATE Wallet SET balance = $balance - $price WHERE w_id = $w_id";
    echo "$balance <br>";
    $result = $conn->query($query) or die('Error in query: ' . $conn->error);
    echo "<script>alert('Bought book {$b_id} for {$price}TL succesfully.');";
    echo 'document.location = "homepage.php";</script>';
}
?>