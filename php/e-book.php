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
        <?php
        $sql = "SELECT * 
                FROM E_Book NATURAL JOIN Book 
                ORDER BY title 
                DESC";
        $result = mysqli_query($db, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo "<a href='bookview.php?b_id=" . $row['b_id'] . "'> Title: " . $row['title'] . "</a>";
            echo "<div> Author: " . $row['author'] . "</div>";
            echo "<div>   Price: " . $row['price'] . "</div>";
            echo "<hr>";
        }


        ?>
    </table>
</body>

</html>

<html>