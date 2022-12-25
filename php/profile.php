<?php
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<div id="profile-container">
  <div id="profile-information">

  <h1>Profile</h1>  
    <?php
    if ($db) {
      $userData = mysqli_query($db, "SELECT * FROM Reader WHERE username ='" . $_SESSION['userID'] . "'");
      $user = mysqli_fetch_array($userData);
      echo "<div>" . $user['username'] . "</div>";
    } else echo "<h1>Failed to connect to database...</h1>"
    ?>

    <div id="reader-following">23 Following</div>
    <div id="reader-rank">Rank: 1472</div>
    <div id="reader-xp">4721 XP</div>
  </div>
  <div id="reader-view-ebooks">

    <?php
    if ($db) {
      $sql = "SELECT * 
            FROM E_Book NATURAL JOIN Book NATURAL JOIN read_book NATURAL JOIN Reader";
      $bookData = mysqli_query($db, $sql);
      echo "<h2 class='title'>Previously read books </h2>";
      while ($row = mysqli_fetch_array($bookData)) {
        echo "<hr>";
        echo "<a href='bookview.php?b_id=" . $row['b_id'] . "'> Title: " . $row['title'] . "</a>";
        echo "<div> Author: " . $row['author'] . "</div>";
        echo "<div>   Price: " . $row['price'] . "</div>";
        echo "<hr>";
    }
    } else echo "<h1>Failed to connect to database...</h1>"
    ?>

</div>

</html>