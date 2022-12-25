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
        <div>
            <!-- Sidebar -->
            <div style="float: left; width: 20%;">
                <h3>Discover</h3>
                <ul>
                    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=feed">Feed</a></li>
                    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=lists">Lists</a></li>
                    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=allbooks">All Books</a></li>
                    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=leaderboard">Leaderboard</a></li>
                    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=buyebook">Buy e-books</a></li>
                    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=forums">Forums</a></li>
                    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=settings">Settings</a></li>
                    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=publishbook">Publish Book</a></li>
                </ul>
            </div>
            <!-- Main content -->
            <div style="float: right; width: 80%;">
                <!-- Display different content based on the value of the "page" parameter -->
                <?php
                    if (isset($_GET["page"])) {
                        $page = $_GET["page"];

                        if ($page == "feed") {
                            // Connect to the database
                            //$userID = $_SESSION["userID"];
                            // Check connection
                            echo "<h1>Welcome to the Homepage</h1>";
                            echo "<h3>Reviews/Quotes</h3>";

                            if (!$db) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            // Prepare the SQL query
                            $sql = "SELECT * FROM Review";
                            // Execute the query
                            $result = mysqli_query($db, $sql);

                            // Check if the query was successful
                            if (mysqli_num_rows($result) > 0) {
                                // Output the data
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<p> Review: " . $row['text'] . "</p>";
                                    echo "<p> Rating: " . $row['rating'] . "</p>";
                                    echo "<hr>";
                                }
                            } else {
                                echo "No reviews found.";
                            }

                        } elseif ($page == "lists") {
                            include "lists.php";
                        } elseif ($page == "leaderboard") {
                            include "leaderboard.php";
                        } elseif ($page == "buyebook") {
                            include "e-book.php";
                        } elseif ($page == "forums") {
                            include "forums.php";
                        } elseif ($page == "settings") {
                            include "settings.php";
                        } elseif ($page == "allbooks") {
                            include "allbooks.php";
                        } elseif ($page == "publishbook") {
                            include "publishbook.php";
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>
