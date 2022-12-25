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
            <th>Ebooks</th>
        </tr>
        <?php
        $sql = "SELECT * 
                FROM E_Book NATURAL JOIN Book 
                ORDER BY title 
                DESC";
        $result = mysqli_query($db, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td>" . $row['title'] .
                "</td><td>" . $row['author'] .
                "</td><td>" . $row['publisher'] . 
                "</td></tr>" . $row['publish_year'] .
                "</td></tr>" . $row['genre'] .
                "</td></tr>" . $row['page_count'] .
                "</td></tr>" . $row['price'];
        }


        ?>
    </table>
</body>

</html>

<html>