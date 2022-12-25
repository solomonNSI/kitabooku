<?php    
    
    require 'ConnectServer.class.php';
    $db = ConnectServer::connect();
    session_start();
    if (!empty($_SESSION)) {
        $username = $_SESSION['userID'];
    }
    
    // Get the form 
    $username = $_SESSION["userID"];
    $title = $_POST["title"];
    $publish_year = $_POST["publish_year"];
    $genre = $_POST["genre"];
    $publisher = $_POST["publisher"];
    $page_count = $_POST["page_count"];
    $price = $_POST["price"];
    $b_id = 115;


    // Use prepared statements to insert the data
    $sql = "INSERT INTO Book (b_id, title, author, publisher, publish_year, genre, page_count) 
                    VALUES ('$b_id', '$title', '$username', '$publisher', '$publish_year', '$genre', '$page_count');";
    // Execute the query
    $result = mysqli_query($db,$sql);

    $sql = "INSERT INTO E_Book (b_id, price) 
    VALUES ('$b_id', '$price')";
    $result = mysqli_query($db,$sql);
    echo '<script>alert("Book Published");';

    // Redirect to the homepage
    header("Location: e-book.php");
?>