
<!DOCTYPE html>
<html>

<head>
    <title>Leaderboard</title>
    <style>
        /* CSS for the leaderboard table */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* CSS for the table header */
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <th>Book Title</th>
            <th>Author</th>
        </tr>
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
            echo "<h4> Total num of books: " . mysqli_num_rows($result) . "</h4>";
            // Output the data
            while ($row = mysqli_fetch_assoc($result)) {
                // Create a clickable link using the title as the anchor text
                // Pass the title as a parameter in the URL using the "title" query string variable
                echo "<tr><td><a href='bookview.php?b_id=" . $row['b_id'] . "'>" . $row['title'] . "</a></td><td>" . $row['author'] .  "</td></tr>";
                //echo "<tr><td>" . $place . "</td><td><a href='user.php?username=" . $row['username'] . "'>" . $row['username'] . "</a></td><td>" . $row['num_books'] . "</td></tr>";

            }
        } else {
            echo "No reviews found.";
        }
        ?>
    </table>
</body>
<h1> Couldn't find your book?</h1>
<div id='addbook'>
    <h1 class="title">Publish a Book</h1>
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