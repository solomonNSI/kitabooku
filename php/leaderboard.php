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
            <th>Place</th>
            <th>Username</th>
            <th>Number of Read Books</th>
        </tr>
        
        <h1> The Leaderboard </h1>
        <?php
        $sql = "SELECT Reader.username, COUNT(*) AS num_books 
                        FROM read_book NATURAL JOIN Reader
                        GROUP BY username 
                        ORDER BY num_books 
                        DESC";
        $result = mysqli_query($db, $sql);
        $place = 1;
        while ($row = $result->fetch_assoc()) {
            $leaderboard[] = $row;
            echo "<tr><td>" . $place . "</td><td><a href='user.php?username=" . $row['username'] . "'>" . $row['username'] . "</a></td><td>" . $row['num_books'] . "</td></tr>";

            $place++;
        }
        ?>
    </table>
</body>

</html>

<html>