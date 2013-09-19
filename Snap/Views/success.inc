<!DOCTYPE html>
<html lang="en-US" ng-app="Site">
<head>
    <meta charset="UTF-8">
    <title>Snap!</title>
    
    <link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
 <div id="main-wrapper">
        <header>
            <a href="#"><img src="images/logo.png" alt="Snap!" width="451" height="151" id="logo"></a>
            
            <div id="nav">
                <a href="index.php">Home</a> | 
                <a href="register.php">Sign Up</a> | 
                <a href="#">Profile</a> | 
                <a href="http://www.flickr.com/">Flickr</a> |
                <a href="views/logout.php">Log Out</a>
            </div>
            
        </header>
        <div id="listing-wrapper">
		
                <form><input type="search" placeholder="Search Images"></form>
        </div>
    </div>

<footer>
    Megan Zimmerman | MDD 1309 | API use from <a href="http://www.flickr.com/">Flickr</a>
</footer>
    
    <!--All Javascript down here-->
    <script src="js/jquery.min.js"></script>
    <script src="js/underscore.js"></script>
    <script src="js/backbone.js"></script>
    <script src="js/backbone-localstorage.js"></script> 
</body>
</html>