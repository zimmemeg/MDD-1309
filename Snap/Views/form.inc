<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <link href="Libraries/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/main.css">
        
    <title>Log In - Snap!</title>
</head>
<body>
    <div id="main-wrapper">
        <header>
            <a href="index.php"><img src="images/logo.png" alt="Snap!" width="451" height="151" id="logo"></a>
            
            <div id="nav">
                <a href="index.php">Home</a> | 
                <a href="register.php">Sign Up</a> | 
                <a href="#">Profile</a> | 
                <a href="http://www.flickr.com/">Flickr</a>
            </div>
            
        </header>
        <div id="login-wrapper">
            <h1>Already registered for Snap?<br>
            Log In below!</h1>
            
            <form method="post" action="?">
                <input type="text" name="username" class="textinput" placeholder="Username" required autofocus>
                    <br>
                <input type="password" name="password" class="textinput" placeholder="Password" required autofocus>
                    <br>
                <input type="submit" name="Log In" value="Log In" id="loginbutton">

            </form>
            
            <h2>Not yet registered?</h2>
            <p>Click the button below to register now!</p>
            <input type="button" name="Register" value="Register" id="registerbutton" onclick="location.href='register.php'">
        </div>
    </div>
</body>

<footer>
    Megan Zimmerman | MDD 1309 | API use from <a href="http://www.flickr.com/">Flickr</a>
</footer>
</html>