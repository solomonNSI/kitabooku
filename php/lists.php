<?php
    include('config.php');
?>

<html>
    <body>
        <form action ="" method="get">
            <label for="searchlists"> Search lists </label>
            <input type="text" name= "searchlists">
            <?php
                if(!$db) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $userID = $_SESSION["userID"];
                $sql = "SELECT List.title, create_list.date
                        FROM  List, create_list
                        WHERE create_list.username = " 
                                + $userID;
                
                $result = mysqli_query($db, $sql);
                // Check if the query was successful
                if (mysqli_num_rows($result) > 0) {
                    // Output the data
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<p>" . $row["review"] . "</p>";
                    }
                } else {
                    echo "List empty.";
                }
            ?>
        </form>
    </body>
</html>
