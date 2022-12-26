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
    $author = $_POST["author"];
    $publish_year = $_POST["publish_year"];
    $genre = $_POST["genre"];
    $publisher = $_POST["publisher"];
    $page_count = $_POST["page_count"];
    static $b_id = 100;


    // Use prepared statements to insert the data
    $sql = "INSERT INTO Book (title, author, publisher, publish_year, genre, page_count) 
    VALUES ('$title', '$author', '$publisher', '$publish_year', '$genre', '$page_count');";
    // Execute the query
    $result = mysqli_query($db,$sql);
    echo '<script>alert("Book Published");';
    $b_id++;


    // Redirect to the homepage
    header("Location: homepage.php?page=allbooks");
?>