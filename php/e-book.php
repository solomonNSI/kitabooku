<?php
    include('config.php');

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $sql = $query = "SELECT * FROM ebook ORDER BY title DESC";
        $result = mysqli_query($db,$sql);
        while ($row = mysqli_fetch_array($result)) {
            $ebook[] = array('title' => $row['title'],
                    'publisher' => $row['publisher'], 
                    'publish_year' => $row['publish_year'],
                    'genre' => $row['genre'],
                    'price' => $row['price']);
        }
    }
    ?>


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

        th, td {
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
            <th>Username</th>
            <th>Score</th>
        </tr>
        <?php
            // Loop through the leaderboard array and output the data
            foreach ($ebook as $entry) {
            echo "<tr><td>" . $entry['title'] . "</td><td>" . $entry['publisher'] . "</td></tr>"
                . $entry['publish_year'] . "</td></tr>" . $entry['genre'] . "</td></tr>" . $entry['price'];
            }
        ?>
    </table>
</body>
</html>

<html>

