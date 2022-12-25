<?php
    require 'ConnectServer.class.php';
    if(isset($_GET['b_id'])) { 
        $b_id = $_GET['b_id'];
    }
    
    $db = ConnectServer::connect();

    if (!empty($_SESSION)) {
        $username = $_SESSION['userID'];
    }

    // TODO: fix this
    if(isset($_POST['mark-as-read-button']))
    {
        $query = "INSERT INTO read_book VALUES ('" . $username . "', '" . $b_id . "', '".CURDATE()."', '".CURDATE()."')";

        $run = mysqli_query($db, $query) or die(mysqli_error());

        if ($run ) { echo "<script type='text/javascript'>alert('Book is marked as read.');</script>"; }
        else  { echo "<script type='text/javascript'>alert('Book couldn't be marked as read.');</script>"; }
    }

    if(isset($_POST['submit']))
    {
        if (!empty($_POST['review']) && !empty($_POST['review'])) {
            $review = $_POST['review'];
            $rating = $_POST['rating'];

            // put total review count + 1 as r_id
            $totalReviewCount = mysqli_query($db, "SELECT COUNT(*) as count FROM Review");
            $temp = mysqli_fetch_array($totalReviewCount);
            $count = $temp['count'] + 1;

            // prepare SQLs
            $query = "INSERT INTO Review VALUES ('". $count . "', '" . $review . "', '" . $rating ."')";
            $query2 = "INSERT INTO has_review VALUES ('". $b_id . "', '" . $count ."')";            $query = "INSERT INTO Review VALUES ('". $count . "', '" . $review . "', '" . $rating ."')";

            $run = mysqli_query($db, $query) or die(mysqli_error());
            $run2 = mysqli_query($db, $query2) or die(mysqli_error());

            if ($run && $run2 ) { echo "<script type='text/javascript'>alert('Review is added.');</script>"; }
            else  { echo "<script type='text/javascript'>alert('Review couldn't be added.');</script>"; }
        }
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
                        echo "<h1>" . $book['title'] . "</h1>";
                        echo "<h3>" . $book['author'] . "</h3>";

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
                <?php
                    // Display the average rating
                    if ($db) {
                        // Prepare the SQL query
                        $sql = "SELECT ROUND(AVG(Review.rating), 1) as avg
                                FROM Book, Review, has_review
                                WHERE Book.b_id = has_review.b_id  AND
                                    Review.r_id  = has_review.r_id AND
                                    Book.b_id = '" .  $b_id  . "'";
                        $result = mysqli_query($db, $sql);
                        $avg_rating = mysqli_fetch_array($result);

                        // Check if the query was successful
                        if ($avg_rating) {
                          echo "<div>Rating: " . $avg_rating['avg'] ." / 5</div>";
                        } else {
                            echo "<div>No rating found</div>";
                        }
                    } else {
                        echo "<div>Couldn't connect to the database</div>";
                    }
                ?>
            </div>
            <form method="post">
                <div id="book-view-buttons" style="display: flex; margin: 10px;">
                    <button type="submit" name="mark-as-read-button">Mark As Read</button>
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
                        $sql = "SELECT Review.text, Review.rating
                                FROM Book, Review, has_review
                                WHERE Book.b_id = has_review.b_id  AND
                                    Review.r_id  = has_review.r_id AND
                                    Book.b_id = '" .  $b_id  . "'";
                        $result = mysqli_query($db, $sql);

                        // Check if the query was successful
                        if (mysqli_num_rows($result) > 0) {
                            // Output the data
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<p> Review: " . $row['text'] . "</p>";
                                echo "<p> Rating: " . $row['rating'] . "</p>";
                                echo "<hr>";
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
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <form action="" method="post">
                        <label>Review: </label><input class="reviewInput" type="text" name="review" required><br>
                        <label>Rating: </label><input class="ratingInput" type="text" name="rating" required> / 5<br>
                        <button class="review-submit-button" type="submit" name="submit">Submit</button>
                    </form>
                </div>
            </div>

            <script>
                var modal = document.getElementById('myModal');
                var btn = document.getElementById('add-review-button');
                var span = document.getElementsByClassName('close')[0];
                
                btn.onclick = function() { modal.style.display = 'block';}
                span.onclick = function() { modal.style.display = 'none';}
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = 'none';
                    }
                }
            </script>
        </div>
    </body>
</html>
