<?php
    session_start();
    require 'ConnectServer.class.php';
    $db = ConnectServer::connect();
    if (!empty($_SESSION)) {
        $username = $_SESSION['userID'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet">
</head>

<body>
    <h1>System Reports</h1>

    <?php
        if ($db) {
            echo "<h3>Report 1: Retrieve  the reader with the highest number of reviews<h3>";

            $sql = "WITH temp AS (SELECT Reader.username AS username, COUNT(post.r_id) AS review_count
                        FROM Reader NATURAL JOIN post)
                    SELECT Reader.username, MAX(temp.review_count) AS max_review_count
                    FROM Reader NATURAL JOIN temp
                    ";
            $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "<div style='display: flex;'>";
                echo "<div style='margin-right: 30px;'>User: " . $row['username'] . "</div>";
                echo "<div>Review Count: " . $row['max_review_count'] . "</div>";
                echo "</div><hr>";
            }
        } else echo "<h1>Failed to connect to database...</h1>" . $b_id;
    ?>

    <?php
    if ($db) {
        echo "<h3>Report 2: find the book with the highest rating<h3>";

        $sql = "WITH temp AS (SELECT Book.title AS title, Review.rating AS book_rating
                    FROM Book NATURAL JOIN Review NATURAL JOIN has_review)
                SELECT Book.title, MAX(temp.book_rating) AS max_book_rating
                FROM Book NATURAL JOIN temp
                ";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "<div style='display: flex;'>";
            echo "<div style='margin-right: 30px;'>Title: " . $row['title'] . "</div>";
            echo "<div>Rating: " . $row['max_book_rating'] . " / 5</div>";
            echo "</div><hr>";
        }
    } else echo "<h1>Failed to connect to database...</h1>" . $b_id;
    ?>
</body>

</html>