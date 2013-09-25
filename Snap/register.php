<?php
//Includes the user class so that if the user is new, they can
//register before attempting to log in
include_once "Class/user.php";
?>

<?php if(!(isset($_POST['register']))){?>

<!--HTML coding to display the main page. Includes the form to fill
out to register, a button to take you to the sign up page and a navigation-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <link href="Libraries/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/main.css">
        
    <title>Sign Up - Snap!</title>
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
        <div id="register-wrapper">
            <h1>Why to register for Snap?</h1>
                <ul>
                    <li>It's 100% free!</li>
                    <li>Very easy to use!</li>
                    <li>Create your own profile to search for images.</li>
                </ul>
            <h2>Already registered? <a href="index.php">Click here</a> to log in!</h2>
        
            <form method="post">
                <input type="text" name="username" class="textinput" required placeholder="Username">
                    <br>
                <input type="password" name="password" class="textinput" required placeholder="Password">
                    <br>
                <input type="password" name="confirm" required placeholder="Confirm Password">
                    <br>
                <input type="submit" name="Register" value="Register" id="registerbutton">
                <input type="button" name="Cancel" value="Cancel" id="cancelbutton" onclick="location.href='index.php'">

            </form>
        </div>
    </div>
</body>
<footer>
    Megan Zimmerman | MDD 1309 | API use from <a href="http://www.flickr.com/">Flickr</a>
</footer>
</html>
<?php
//if the user does not exist the new info is posted into the usr variable.
//It is stored in a storeFormValue function in the Users class. if both passwords match,
//the information is posted to the register document, if not an error is displayed.
} else {
    $usr = new Users;
    $usr->storeFormValues($_POST);
    
    if($_POST['password'] == $_POST['confirm']){
        echo $usr->register($_POST);
    } else {
        echo "Passwords do not match.";
    }
}
?>