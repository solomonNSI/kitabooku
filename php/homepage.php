<?php
    require 'ConnectServer.class.php';
    $db = ConnectServer::connect();
    session_start();
    if (!empty($_SESSION)) {
        $username = $_SESSION['userID'];
    }
?>
<html>
<head>
    <title>Homepage</title>
</head>
<body>
    <h1>Reviews</h1>
    <div>
        <!-- Sidebar -->
        <div style="float: left; width: 20%;">
            <h3>Discover</h3>
            <ul>
                <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=feed">Feed</a></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=lists">Lists</a></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=leaderboard">Leaderboard</a></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=buy">Buy e-books</a></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=forums">Forums</a></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=settings">Settings</a></li>
            </ul>
        </div>
        <!-- Main content -->
        <div style="float: right; width: 80%;">
            <h1>Welcome to the Homepage</h1>
            <p>This is the homepage of our website.</p>

            <!-- Display different content based on the value of the "page" parameter -->
            <?php

                if (isset($_GET["page"])) {
                    $page = $_GET["page"];

                    if ($page == "feed") {
                        // Connect to the database
                        //$userID = $_SESSION["userID"];
                        // Check connection
                        if (!$db) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        // Prepare the SQL query
                        $sql = "SELECT * FROM Review";
                        echo "<div> hey" . $username . " yes</div";
                        // Execute the query
                        $result = mysqli_query($db, $sql);

                        // Check if the query was successful
                        if (mysqli_num_rows($result) > 0) {
                            // Output the data
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<p>" . $row['text'] . "</p>";
                                echo "<p>" . $row['rating'] . "</p>";

                            // foreach($row as $col){
                            //     echo "<p>" . $col . "</p>";
                            // }
                            }
                        } else {
                            echo "No reviews found.";
                        }
                    } elseif ($page == "lists") {
                        include "lists.php";
                    } elseif ($page == "leaderboard") {
                        include "leaderboard.php";
                    } elseif ($page == "buy") {
                        include "buy.php";
                    } elseif ($page == "forums") {
                        include "forums.php";
                    } elseif ($page == "settings") {
                        include "settings.php";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
