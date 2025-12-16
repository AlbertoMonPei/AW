<?php
session_start();
session_unset(); /*borra variables*/
session_destroy();/*destruye sesion*/
header("Location: login.php");
exit();
?>