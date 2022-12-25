<?php
    require 'ConnectServer.class.php';
    $b_id = 2;
    $db = ConnectServer::connect();
    if (!empty($_SESSION)) {
        $username = $_SESSION['userID'];
    }

    if(isset($_POST['Mark As Read']))
    {
        $sql = "INSERT INTO read_book VALUES ('" .  $username . "', '" . $b_id . "', '12/12/2022', '22/12/2022')";
        $result = mysqli_query($db, $sql);

        echo "<div>". $result . "</div>";
        echo "<script type='text/javascript'>alert('Book is marked as read.');</script>";
    }

    if(isset($_POST['Add Review']))
    {
        $sql = "INSERT INTO Review VALUES ('" .  $username . "', '" . $b_id . "', '12/12/2022', '22/12/2022')";
        $result = mysqli_query($db, $sql);

        echo "<div>". $result . "</div>";
        echo "<script type='text/javascript'>alert('Book is marked as read.');</script>";
    }

    // if (isset($_POST["add-review"])) {
    //     $_SESSION["add-review"] = mysqli_query($db, "INSERT INTO read_book VALUES" . $_POST['r_id'] . $_POST['text'] . $_POST['rating'] );
    //     $_SESSION["add-review"] = mysqli_query($db, "INSERT INTO has_review VALUES" . $_POST['r_id'] . $_POST['b_id']);

    //     if ($_SESSION["add-review"] == true)
    //         echo "<script type='text/javascript'>alert('Review is added.');</script>";
    //     else
    //         echo "<script type='text/javascript'>alert('Review couldn't be added.');</script>";
        
    //     header("location: bookview.php");
    //     unset($_SESSION["add-review"]);
    //     exit;
    // }

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
    <head>
        <link rel="stylesheet" href="bookviewstyle.css"> 
    </head> 
    <body>
        <div id="book-view-container">
            <div id="book-information">
            
                <?php
                    if ($db) {
                        $bookData = mysqli_query($db, "SELECT * FROM Book WHERE b_id ='" . $b_id . "'");
                        $book = mysqli_fetch_array($bookData);
                        echo "<div>" . $book['title'] . "</div>";
                        echo "<div>" . $book['author'] . "</div>";

                        $reviewCount = mysqli_query($db, "SELECT COUNT(*) as count
                                                        FROM Book, Review, has_review
                                                        WHERE Book.b_id = has_review.b_id  AND
                                                                Review.r_id  = has_review.r_id AND
                                                                Book.b_id = '" .  $b_id  . "'");
                        $rc = mysqli_fetch_array($reviewCount);
                        echo "<div>" . $rc['count'] . " Reviews</div>";
                    }
                    else echo "<h1>Failed to connect to database...</h1>" . $b_id;
                ?>
            </div>
            <form method="post">
                <div id="book-view-buttons" style="display: flex; margin: 10px;">
                    
                    <button id="mark-as-read-button">Mark As Read</button>
                    <button id="add-review-button">Add Review</button>
                    <input type="submit" name="Add Quote" value="Add Quote"/>
                </div>
            </form>
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
                <h2>Reviews</h2>
                
                <?php
                    // Display reviews of the book
                    if ($db) {
                        // Prepare the SQL query
                        $sql = "SELECT Review.text 
                                FROM Book, Review, has_review
                                WHERE Book.b_id = has_review.b_id  AND
                                    Review.r_id  = has_review.r_id AND
                                    Book.b_id = '" .  $b_id  . "'";

                        $result = mysqli_query($db, $sql);

                        // Check if the query was successful
                        if (mysqli_num_rows($result) > 0) {
                            // Output the data
                            while ($row = mysqli_fetch_assoc($result)) {
                                foreach($row as $col){
                                    echo "<p>" . $col . "</p>";
                                }
                            }
                        } else {
                            echo "<div>No reviews found.</div>";
                        }
                    } else {
                        echo "<div>Couldn't connect to the database</div>";
                    }
                ?>
            </div>

            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <form action="" method="">
                        <label>Rating: </label><input type="text" name="rating"><br>
                        <label>Review: </label><input type="text" name="review"><br>
                        <button type="submit" name="submit">Submit</button>
                    </form>
                </div>
            </div>
            <script>
                var modal = document.getElementById('myModal');
                var btn = document.getElementById('add-review-button');
                var span = document.getElementsByClassName('close')[0];
                
                btn.onclick = function() { modal.style.display = 'block'; }
                span.onclick = function() { modal.style.display = 'none'; }
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = 'none';
                    }
                }
            </script>
        </div>
    </body>
</html>
