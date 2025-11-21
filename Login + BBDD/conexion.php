<?php 
$host = "localhost";
$user = "alberto"; 
$pass = "alberto";
$db = "proyecto_login";

$conn = new mysqli($host, $user, $pass, $db);


if($conn->connect_error) {
    die("Error de conexión".$conn->connect_error);
}
?>