<!doctype html>
<html>
    <head>
        <meta charset='utf-8'/>
        <link rel="stylesheet" href="index-style.css">
        <title>Publish a Book</title>
    </head>

    <body>
    
    <div id='publishbook'>
        <h1 class ="title">Publish a Book</h1>
        <form class="form" method='post' onsubmit='return validateForm();' action='publish.php'>
        
        <label for="title">Title:</label><br>
        <input type="text" name="title" id="title"><br>
        <label for="publish_year">Publish Year:</label><br>
        <input type="number" name="publish_year" id="publish_year"><br>
        <label for="genre">Genre:</label><br>
        <input type="text" name="genre" id="genre"><br>
        <label for="cover">Cover:</label><br>
        <input type="text" name="cover" id="cover"><br>
        <label for="movie_link">Movie Link (optional):</label><br>
        <input type="text" name="movie_link" id="movie_link"><br>
        <label for="page_count">Page Count:</label><br>
        <input type="number" name="page_count" id="page_count"><br>
        <button type="submit">Submit</button>
        </form>
    </div id='publishbook'>
    </body>
</html>
