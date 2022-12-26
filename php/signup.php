<!doctype html>
<html>
    <head>
        <meta charset='utf-8'/>
        <link rel="stylesheet" href="index-style.css">
        <title>New user, yay, KITABOOKU!</title>
    </head>

    <body>  
        <div id='login'>
            <h1 class ="title">New user, yay!</h1>
            <h4> Hey you - KITABOOKU!</h4>
            <span>Please Enter All the details </span>
                <form class="form" method='post' action='sign.php'>
                <input type='text' placeholder="Username" id='usernameInput' name='username' required>
                <input type='text' placeholder="email" id='emailInput' name='email' required>
                <input type='password' placeholder="Password" id='passwordInput' name='password' required>
                <input type='text' placeholder="Your Favorite Quote" id='quote' name='quote' required>
                <button type='submit'>Login</button>
            </form>
        </div id='login'>
    </body>
</html>
