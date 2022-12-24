<?php
  require_once "config.php";

  if (isset($_POST["mark-as-read"])) {
    $_SESSION["mark-as-read"] = mysqli_query($db, "INSERT INTO read WHERE b_id='" . $_POST['b_id'] . "' AND username='" . $_SESSION['username'] . "'");

    if ($_SESSION["mark-as-read"] == true)
        echo "<script type='text/javascript'>alert('Book is marked as read.');</script>";
    else
        echo "<script type='text/javascript'>alert('Book couldn't be marked as read.');</script>";
    
    header("location: bookview.php");
    unset($_SESSION["mark-as-read"]);
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
    <head></head> 
    <div id="book-view-container">
      <div id="book-information">
    
        <?php
          if ($db) {
            $bookData = mysqli_query($db, "SELECT * FROM book WHERE b_id ='" . $_SESSION['b_id'] . "'");
            $book = mysqli_fetch_array($bookData);
            echo "<div>" . $book['title'] . "</div>";
          }
          else echo "<h1>Failed to connect to database...</h1>"
        ?>

        <div id="book-author">J.K. Rowling</div>
        <div id="book-review-count">59 reviews</div>
        <div id="book-rating">4.8/5</div>
      </div>
      <div id="book-view-buttons">
        
        <?php
          if ($db) {
            $bookData = mysqli_query($db, "SELECT * FROM book WHERE b_id ='" . $_SESSION['b_id'] . "'");
            $book = mysqli_fetch_array($bookData);
            echo "<div>" . "<form method='POST'><input type='text' name='bookID' hidden='' value='" . $book['b_id'] . "'><input type='submit' class='button' name='mark-as-read' value='mark-as-read'></form>" . "</div>";   
          }
          else echo "<h1>Failed to connect to database...</h1>"
        ?>

        <div id="book-add-review">Add Review</div>
        <div id="book-add-quote">Add Quote</div>
      </div>
      <div id="book-about">
        <?php
          if ($db) {
            $bookData = mysqli_query($db, "SELECT * FROM book WHERE b_id ='" . $readData['b_id'] . "'");
            $book = mysqli_fetch_array($bookData);
            echo "<div>" . "Publisher: " . $book['publisher'] . "</div>";
            echo "<div>" . "Published: " $book['publish_year'] . "</div>";
            echo "<div>" . "Genre: " . $book['genre'] . "</div>";
            echo "<div>" . "Genre: " . $book['page_count'] . "</div>";
          }
          else echo "<h1>Failed to connect to database...</h1>"
        ?>
      </div>
      <div id="book-reviews">
        Reviews
      </div>
    </div>
</html>
