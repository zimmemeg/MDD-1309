<!DOCTYPE html>
<html lang="en-US" ng-app="Site">
<head>
    <meta charset="UTF-8">
    <title>Snap!</title>
    
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="brand" href="#/page/home">Welcome to Snap!</a>
                <header>
                    <form><input type="search" placeholder="Search Images"><h3><a href="views/logout.php">Log Out</a></h3></form>
                </header>
            </div>
        </div>
    </div>
    
    <header>
        <h2>Welcome to Snap!</h2>
        <p>To begin, enter a description in the field above!</p>
    </header>
    <ul class="results"></ul>
    
    <footer>
        Megan Zimmerman | MDD 1309 | API use from <a href="http://www.flickr.com/">Flickr</a>
    </footer>
    
    <!--All Templates here-->
    <script type="text/template" id="searchresults">
        <li><img class="<%= tick ? 'tick' : '' %>" src="http://farm<%= farm %>.static.flickr.com/<%= server %>/<%= id %>_<%= secret %>_t.jpg" /><span class="action"></span></li>
        <img class="<%= tick ? 'tick' : ''%>" src="http://farm<%= farm%>.static.flickr.com/<%= server %>/<%= id %>_<%= secret %>_z.jpg">
    </script>
    
    <article></article>
    
    <!--All Javascript down here-->
    <script src="js/jquery.min.js"></script>
    <script src="js/underscore.js"></script>
    <script src="js/backbone.js"></script>
    <script src="js/backbone-localstorage.js"></script>
    <script src="js/script.js"></script>
</body>
</html>