<?php
    include('config.php');

    if ($_SESSION['usertype'] == "author") {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {

            $u_id = $_SESSION['u_id'];
            $sql = "SELECT * FROM author NATURAL JOIN book WHERE u_id = '$u_id'";
            $result = mysqli_query($db,$sql);
            
            while ($row = mysqli_fetch_array($result)) {
                $authorbooks[] = array('title' => $row['title'],
                'publish_year' => $row['publish_year'],
                'genre' => $row['genre']);
            }
        }
    } else {
        $error = "You do not own an author page.";
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
            <th>Authors Ebooks</th>
        </tr>
        <?php
            echo "<tr><td>" . $u_id;

            // Loop through the leaderboard array and output the data
            foreach ($authorbooks as $entry) {
                echo "<tr><td>" . $entry['title'] . "</td><td>" . $entry['publish_year'] . "</td></tr>" . $entry['genre'];
            }
        ?>
    </table>
</body>
</html>

<html>

