<?php
  require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head></head> 
    <div id="profile-container">
      <div id="profile-information">
    
        <?php
          if ($db) {
            $userData = mysqli_query($db, "SELECT * FROM reader WHERE username ='" . $_SESSION['username'] . "'");
            $user = mysqli_fetch_array($userData);
            echo "<div>" . $reader['username'] . "</div>";
          }
          else echo "<h1>Failed to connect to database...</h1>"
        ?>

        <div id="reader-following">23 Following</div>
        <div id="reader-rank">Rank: 1472</div>
        <div id="reader-xp">4721 XP</div>
      </div>
      <div id="reader-view-ebooks">
        
        <?php
          if ($db) {
            $bookData = mysqli_query($db, "SELECT * FROM book WHERE b_id ='" . $_SESSION['b_id'] . "'");
            $book = mysqli_fetch_array($bookData);
          }
          else echo "<h1>Failed to connect to database...</h1>"
        ?>
        
        <div id="reader-view-wallet">Add Review</div>
        <div id="reader-settings">Add Quote</div>
      </div>
      <div id="reader-status">
        Status
        <?php
          if ($db) {
            $readerData = mysqli_query($db, "SELECT * FROM reader WHERE username ='" . $_SESSION['username'] . "'");
            $reader = mysqli_fetch_array($readerData);

            echo "<div>" . $reader['status'] . "</div>";
          }
          else echo "<h1>Failed to connect to database...</h1>"
        ?>
      </div>
      <div id="reader-badges">
        Badges
        <?php
          if ($db) {
            $readerData = mysqli_query($db, "SELECT * FROM reader WHERE username ='" . $_SESSION['username'] . "'");
            $reader = mysqli_fetch_array($readerData);
          }
          else echo "<h1>Failed to connect to database...</h1>"
        ?>
      </div>
      <div id="reader-read-books">
        Read Books
      </div>
      <div id="reader-quotes">
        Quotes
      </div>
    </div>
</html>
