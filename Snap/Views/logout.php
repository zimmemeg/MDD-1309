<?php

session_start();

unset($_SESSION['userInfo']);
session_regenerate_id(true);
session_destroy();

header('Location: ../index.php');
exit;

?>