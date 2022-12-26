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
    <!-- Leaderboard table -->
    <table>
        <tr>
            <th>Book Title</th>
            <th>Author</th>
        </tr>
        <h1> E-Books </h1>
        <?php
        if (isset($_POST["filter"])) {
            session_start();
            require 'ConnectServer.class.php';
            $db = ConnectServer::connect();
            $value = $_POST["filter"];
            echo "<h4> Your search input was: " . $value . "</h4>";
            $sql = "SELECT * FROM Book
                        WHERE title LIKE '%" . $value . "%'";

            echo $sql;
            $result = $db->query($sql) or die('<script>alert("Account already exists");');
            if (mysqli_num_rows($result) > 0) {
                echo "<h4> Found: " . mysqli_num_rows($result) . " books </h4>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr><td><a href='bookview.php?b_id=" . $row['b_id'] . "'>" . $row['title'] . "</a></td><td>" . $row['author'] .  "</td></tr>";
                }
            } else {
                echo "<tr><td>Nothing Found</td></tr>";
            }
        } else {
            $sql = "SELECT * 
                FROM E_Book NATURAL JOIN Book 
                ORDER BY title 
                DESC";
            $result = mysqli_query($db, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr><td><a href='bookview.php?b_id=" . $row['b_id'] . "'>" . $row['title'] . "</a></td><td>" . $row['author'] .  "</td></tr>";
                }
            } else {
                echo "nope";
            }
        }
        ?>
    </table>

    <div id='applyfilter'>
        <h1>Apply a filter! </h1>
        <form class="form" method='post' action='e-book.php'>
            <label for="filter"> Search for the name (ex. first two letters) </label>
            <input type="text" name="filter" id="filter"> <br>
            <button type="submit">Search!</button>
        </form>
    </div id='applyfilter'>
</body>

</html>

<html>