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
            <th>Number of Read Books</th>
        </tr>
        <?php
            include('config.php');
            $leaderboard = array(
                "Alice" => "100",
                "Bob" => "95",
                "Charlie" => "80",
            );
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $sql = "SELECT user.name, COUNT(*) AS num_books 
                        FROM read JOIN reader 
                        ON read.username = user.id 
                        GROUP BY username 
                        ORDER BY num_books 
                        DESC LIMIT 3";
                $result = mysqli_query($db,$sql);
                while ($row = $result->fetch_assoc()) {
                    $leaderboard[] = $row;
                }
            }   
            // Loop through the leaderboard array and output the data

            foreach ($leaderboard as $key => $value) {
                echo "<tr><td>$key</td><td>$value</td></tr>";
            }
        ?>
    </table>
</body>
</html>

<html>

