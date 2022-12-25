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
        echo "<div style='display: flex;'>";
        echo "<h4>Search: <h4>";
        echo "<input type='text' name='search'></div>";
        // Output the data
        while ($row = mysqli_fetch_assoc($result)) {
            // Create a clickable link using the title as the anchor text
            // Pass the title as a parameter in the URL using the "title" query string variable
            echo "<a href='bookview.php?b_id=" . $row['b_id'] . "'> Title: " . $row['title'] . "</a>";
            echo "<div> Author: " . $row['author'] . "</div>";
            echo "<hr>";
        }
    } else {
        echo "No books found.";
    }
    ?>
    <h1> Couldn't find your book?</h1>
    <div id='addbook'>
        <h1 class="title">Request a Book</h1>
        <form class="form" method='post' onsubmit='return validateForm();' action='addbook.php'>
            <label for="title">Title:</label><br>
            <input type="text" name="title" id="title"><br>
            <label for="publisher">Publisher</label><br>
            <input type="text" name="publisher" id="publisher"><br>
            <label for="author">Author</label><br>
            <input type="text" name="author" id="author"><br>
            <label for="publish_year">Publish Year:</label><br>
            <input type="number" name="publish_year" id="publish_year"><br>
            <label for="genre">Genre:</label><br>
            <input type="text" name="genre" id="genre"><br>
            <label for="page_count">Page Count:</label><br>
            <input type="number" name="page_count" id="page_count"><br>
            <button type="submit">Add Here!</button>
        </form>
    </div id='addbook'>
</body>

</html>

<html>