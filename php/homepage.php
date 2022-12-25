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
                    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=ebook">E-Books</a></li>
                    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=leaderboard">Leaderboard</a></li>
                    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=buyebook">Buy e-books</a></li>
                    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=forums">Forums</a></li>
                    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=profile">Profile</a></li>
                    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=publishebook">Publish E-Book</a></li>
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
                            $sql = "SELECT * FROM Review NATURAL JOIN has_review NATURAL JOIN Book NATURAL JOIN post";
                            // Execute the query
                            $result = mysqli_query($db, $sql);

                            // Check if the query was successful
                            if (mysqli_num_rows($result) > 0) {
                                // Output the data
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<p> Review: " . $row['text'] . "</p>";
                                    echo "<p> Rating: " . $row['rating'] . "</p>";
                                    echo "<p> Book: " . $row['title'] . "</p>";
                                    echo "<p> From: " . $row['username'] . "</p>";
                                    echo "<hr>";
                                }
                            } else {
                                echo "No reviews found.";
                            }

                        } elseif ($page == "lists") {
                            include "lists.php";
                        } elseif ($page == "leaderboard") {
                            include "leaderboard.php";
                        } elseif ($page == "ebook") {
                            include "e-book.php";
                        } elseif ($page == "forums") {
                            include "forums.php";
                        } elseif ($page == "profile") {
                            include "profile.php";
                        } elseif ($page == "allbooks") {
                            include "allbooks.php";
                        } elseif ($page == "publishebook") {
                            include "publishebook.php";
                        }
                        elseif ($page == "lists") {
                            include "lists.php";
                        } elseif ($page == "leaderboard") {
                            include "leaderboard.php";
                        } elseif ($page == "buyebook") {
                            if (!$db) {
                                die("Connection failed: " . mysqli_connect_error());
                            }



                            // Prepare the SQL query
                            $sql = "SELECT e.b_id, b.title, e.price FROM E_Book e, Book b WHERE b.b_id = e.b_id";
                            echo "<p> hey " . $username . "! You can buy your favorite ebooks from here...</p";
                            echo "<p></p>";
                            $result = mysqli_query($db, $sql);

                            
                            
                            // Check if the query was successful
                            if (mysqli_num_rows($result) > 0) {
                                // Output the data
                                $bookSelect = "<br><br>BookID: <select name='b_id' required><option value=''>None</option>";
                                $table = "<table border = '1'>";
                                $table .= "<caption>All E-Books</caption>";
                                $table .= '<tr> <th>ID</th> <th>Title</th> <th>Price</th>';
                                while ($row = mysqli_fetch_assoc($result)){
                                    $table .= '<tr>';
                                    $b_id = $row['b_id'];
                                    $title = $row['title'];
                                    $price = $row['price'];
                                    $table .= '<td>' . $b_id . '</td>';
                                    $table .= '<td>' . $title . '</td>';
                                    $table .= '<td>' . $price . '</td>';
                                    
                                    //echo "<tr><td>id</td><td>{$row['title']}</td><td>{$row['price']}</td><td><button>Buy</button></td></tr>";
                                    $bookSelect .= "<option value='$b_id'>$b_id, $title</option>";
                                    $table .= '</tr>';
                                }
                                $bookSelect .= '</select>';
                                $table .= "</table>";
                                echo $table;
                                $buy = "<br> <button type='submit'>Buy</button>";
                                
                                echo "<form method='post' action='buy_e-book.php'" . $bookSelect . $buy . '</form>';
                            } else {
                                echo "No ebooks found.";
                            }
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
