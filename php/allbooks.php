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
            <th>Page</th>
        </tr>
        <!-- All books table -->
        <h1> All Books here </h1>
        <?php

       
        if (isset($_POST["name"]) || isset($_POST["min_page"]) || isset($_POST["max_page"])) {

            session_start();
            require 'ConnectServer.class.php';
            $db = ConnectServer::connect();
            $name = $_POST["name"];
            $min_page = $_POST["min_page"];
            $max_page = $_POST["max_page"];
            if ($name != "") {
                $sql = "SELECT * FROM Book
                WHERE title LIKE '%" . $name . "%'";
            } elseif ($min_page != "" && $max_page != "") {
                $sql = "SELECT * FROM Book
                WHERE page_count BETWEEN " . $min_page . " AND " . $max_page;
            } elseif ($min_page != "") {
                $sql = "SELECT * FROM Book
                WHERE page_count >= " . $min_page;
            } elseif ($max_page != "") {
                $sql = "SELECT * FROM Book
                WHERE page_count <= " . $max_page;
            } else {
                $sql = "SELECT * FROM Book";
            }
            $result = $db->query($sql) or die('<script>alert("Account already exists");');
            if (mysqli_num_rows($result) > 0) {
                echo "<h4> Found: " . mysqli_num_rows($result) . " books </h4>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr><td><a href='bookview.php?b_id=" . $row['b_id'] . "'>" . $row['title'] . "</a></td><td>" . $row['author'] . "</td><td>" . $row['page_count'] .  "</td></tr>";
                }
            } else {
                echo "<tr><td>Nothing Found</td></tr>";
            }
        } else {
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
                    echo "<tr><td><a href='bookview.php?b_id=" . $row['b_id'] . "'>" . $row['title'] . "</a></td><td>" . $row['author'] . "</td><td>" . $row['page_count'] .  "</td></tr>";
                }
            } else {
                echo "No reviews found.";
            }
        }
        ?>
    </table>
</body>
<div id='applyfilter'>
    <h1>Apply a filter! </h1>
    <form class="form" method='post' action='allbooks.php'>
        <label for="name"> Search for the name (ex. first two letters) </label>
        <input type="text" name="name" id="name"> <br>
        <label for="min_page">Minimum number of pages:</label>
        <input type="number" id="min_page" name="min_page">
        <br>
        <label for="max_page">Maximum number of pages:</label>
        <input type="number" id="max_page" name="max_page">
        <br>
        <input type="submit" value="Search">
    </form>
</div id='applyfilter'>
<h1> Couldn't find a book?</h1>
<div id='addbook'>
    <h2 class="title">Add it yourself!</h2>
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