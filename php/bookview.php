<?php
    require 'ConnectServer.class.php';
    $db = ConnectServer::connect();
    // require_once "config.php";

    if (isset($_POST["mark-as-read"])) {
        $_SESSION["mark-as-read"] = mysqli_query($db, "INSERT INTO read_book VALUES" . $_POST['b_id'] . $_SESSION['username']);

        if ($_SESSION["mark-as-read"] == true)
            echo "<script type='text/javascript'>alert('Book is marked as read.');</script>";
        else
            echo "<script type='text/javascript'>alert('Book couldn't be marked as read.');</script>";
        
        header("location: bookview.php");
        unset($_SESSION["mark-as-read"]);
        exit;
    }

    if (isset($_POST["add-review"])) {
        $_SESSION["add-review"] = mysqli_query($db, "INSERT INTO read_book VALUES" . $_POST['r_id'] . $_POST['text'] . $_POST['rating'] );
        $_SESSION["add-review"] = mysqli_query($db, "INSERT INTO has_review VALUES" . $_POST['r_id'] . $_POST['b_id']);

        if ($_SESSION["add-review"] == true)
            echo "<script type='text/javascript'>alert('Review is added.');</script>";
        else
            echo "<script type='text/javascript'>alert('Review couldn't be added.');</script>";
        
        header("location: bookview.php");
        unset($_SESSION["add-review"]);
        exit;
    }

    if (isset($_POST["add-quote"])) {
        $_SESSION["add-quote"] = mysqli_query($db, "INSERT INTO read_book VALUES" . $_POST['q_id'] . $_POST['text'] . $_POST['page_no'] );
        $_SESSION["add-quote"] = mysqli_query($db, "INSERT INTO has_quote VALUES" . $_POST['q_id'] . $_POST['b_id']);
        
        if ($_SESSION["add-quote"] == true)
            echo "<script type='text/javascript'>alert('Quote is added.');</script>";
        else
            echo "<script type='text/javascript'>alert('Quote couldn't be added.');</script>";
        
        header("location: bookview.php");
        unset($_SESSION["add-quote"]);
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head></head> 
    <div id="book-view-container">
      <div id="book-information">
    
        <?php
            $b_id = 1;
            if ($db) {
                $bookData = mysqli_query($db, "SELECT * FROM Book WHERE b_id ='" . $b_id . "'");
                $book = mysqli_fetch_array($bookData);
                echo "<div>" . $book['title'] . "</div>";
                echo "<div>" . $book['author'] . "</div>";


                $reviewCount = mysqli_query($db, "SELECT COUNT(*) 
                                                FROM Book, Review, has_review
                                                WHERE Book['b_id'] = has_review['b_id']  AND
                                                        Review['e_id']  = has_review['e_id'] AND
                                                        Book['b_id'] = '" .  $b_id  . "'");
                echo "<div>" . $reviewCount . " Reviews</div>";
            }
            else echo "<h1>Failed to connect to database...</h1>" . $b_id;
        ?>
      </div>
      <div id="book-view-buttons">
        
        <?php
          if ($db) {
            $bookData = mysqli_query($db, "SELECT * FROM Book WHERE b_id ='" . $b_id . "'");
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
            $bookData = mysqli_query($db, "SELECT * FROM Book WHERE b_id ='" . $b_id . "'");
            $book = mysqli_fetch_array($bookData);
            echo "<div>" . "Publisher: " . $book['publisher'] . "</div>";
            echo "<div>" . "Published: " . $book['publish_year'] . "</div>";
            echo "<div>" . "Genre: " . $book['genre'] . "</div>";
            echo "<div>" . "Pages: " . $book['page_count'] . "</div>";
          }
          else echo "<h1>Failed to connect to database...</h1>"
        ?>
      </div>
      <div id="book-reviews">
        Reviews
      </div>
    </div>
</html>
