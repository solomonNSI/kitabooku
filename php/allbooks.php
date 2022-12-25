<?php
    session_start();
?>


<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <!-- All books table -->
    <h1> All Books here </h1>
    <?php
        if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
        }
        // Prepare the SQL query
        $sql = "SELECT * FROM Book";
        // Execute the query
        $result = mysqli_query($db, $sql);

        // Check if the query was successful
        if (mysqli_num_rows($result) > 0) {
            // Output the data
            while ($row = mysqli_fetch_assoc($result)) {
                // Create a clickable link using the title as the anchor text
                // Pass the title as a parameter in the URL using the "title" query string variable
                echo "<a href='bookview.php?b_id=" . $row['b_id'] . "'> Title: " . $row['title'] . "</a>";
                echo "<div> Author: " . $row['author'] . "</div>";
                echo "<hr>";
            }
        } else {
            echo "No reviews found.";
        }
    ?>
</body>
</html>

<html>

