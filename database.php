<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$server   = "localhost";
$username = "id4489618_admin";
$password = "admin";
$database = "id4489618_libreria";


$mysqli = new mysqli($server, $username, $password, $database);

mysqli_set_charset($mysqli,'utf8');
if ($mysqli->connect_error) {
    die('error'.$mysqli->connect_error);
}
?>