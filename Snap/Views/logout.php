<?php

//THe session is started
session_start();

//Once the user logs out the session is destroyed
unset($_SESSION['userInfo']);
session_regenerate_id(true);
session_destroy();

//After the session is destroyed and the user is logged out, they
//are automatically redirected back to the index page.
header('Location: ../index.php');
exit;

?>