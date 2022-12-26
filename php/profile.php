<?php
require_once "config.php";
$username = $_SESSION['userID'];
?>

<!DOCTYPE html>
<html lang="en">

<div id="profile-container">
  <div id="profile-information">

  <h1>Profile</h1>  
    <?php
    if ($db) {
      $userData = mysqli_query($db, "SELECT * FROM Reader WHERE username ='" . $username. "'");
      $user = mysqli_fetch_array($userData);
      
      echo "<div> Username: " . $user['username'] . "</div>";
      echo "<div> Fav Quote: " . $user['status'] . "</div>";
      echo "<div> Book Goal: " . $user['book_goal'] . "</div>";
      echo "<div> XP: " . $user['xp'] . "</div>";

      $data = mysqli_query($db, "SELECT w.balance FROM Wallet w, has_wallet h WHERE h.username ='$username' AND w.w_id = h.w_id");
      $b = mysqli_fetch_array($data);
      echo "<div> Balance: " . $b['balance'] . "₺</div>";
    } else echo "<h1>Failed to connect to database...</h1>"
    ?>
  </div>
  <div id="reader-view-ebooks">

    <?php
    if ($db) {
/*       $sql = "SELECT balance FROM has_wallet h, Wallet w WHERE h.username = $username AND h.w_id = w.w_id";
      $result = $db->query($sql) or die('Error in query: ' . $db->error);
      $data = $result->fetch_assoc();
      $balance = $data['balance'];
      echo "<br><p> Wallet Balance: " . $balance . "₺ </p><br>"; */

      $sql = "SELECT * 
            FROM E_Book NATURAL JOIN Book NATURAL JOIN read_book NATURAL JOIN User 
            WHERE username = '$username'";
      $bookData = mysqli_query($db, $sql);
      echo "<h2 class='title'>Previously read ebooks </h2>";
      while ($row = mysqli_fetch_array($bookData)) {
        echo "<hr>";
        echo "<a href='bookview.php?b_id=" . $row['b_id'] . "'> Title: " . $row['title'] . "</a>";
        echo "<div> Author: " . $row['author'] . "</div>";
        echo "<div>   Price: " . $row['price'] . "</div>";
        echo "<hr>";
      }
/*       echo "<br>";
      $sql = "SELECT * 
            FROM Book b, read_book r 
            WHERE r.b_id = b.b_id AND r.username = $username";
      $book = mysqli_query($db, $sql);
      echo "<h2 class='title'>Previously read books </h2>";
      while ($row = mysqli_fetch_array($book)) {
        echo "<hr>";
        echo "<a href='bookview.php?b_id=" . $row['b_id'] . "'> Title: " . $row['title'] . "</a>";
        echo "<div> Author: " . $row['author'] . "</div>";
        echo "<hr>";
      } */
    } else echo "<h1>Failed to connect to database...</h1>"
    ?>

</div>

</html>