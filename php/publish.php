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
    $cover = $_POST["cover"];
    $movie_link = $_POST["movie_link"];
    $page_count = $_POST["page_count"];


    // Prepare the query
    $sql = "INSERT INTO book ($username, $title, $publish_year, $genre, $cover, $movie_link, $page_count)";

    // Execute the query
    $result = mysqli_query($db,$sql);
    echo '<script>alert("Book Published");';

    // Redirect to the homepage
    header("Location: bookview.php");
?>