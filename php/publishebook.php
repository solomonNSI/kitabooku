

<!doctype html>

<html>
    <head>
        <meta charset='utf-8'/>
        <link rel="stylesheet" href="index-style.css">
        <title>Publish a Book</title>
    </head>

    <body>
    <script>
        function validateForm() {
            let x = document.forms["myForm"]["publish_year"].value;
                if (x > 2022) {
                    alert("Publish Year is in the future...");
                    return false;
                }
            }
    </script>
    <div id='publishbook'>
        <h1 class ="title">Publish an E-Book</h1>
        <form name="myForm" class="form" method='post' onsubmit='return validateForm();' action='publish.php'>
        
        <label for="title">Title:</label><br>
        <input type="text" name="title" id="title" required><br>
        <label for="publisher">Publisher</label><br>
        <input type="text" name="publisher" id="publisher" required><br>
        <label for="publish_year">Publish Year:</label><br>
        <input type="number" name="publish_year" id="publish_year" required><br>
        <label for="genre">Genre:</label><br>
        <input type="text" name="genre" id="genre" required><br>
        <label for="page_count">Page Count:</label><br>
        <input type="number" name="page_count" id="page_count" required><br>
        <label for="price">Price:</label><br>
        <input type="number" name="price" id="price" required><br>
        <button type="submit">Submit</button>
        </form>
    </div id='publishbook'>
    </body>
</html>
