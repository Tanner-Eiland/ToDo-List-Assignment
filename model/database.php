<?php
$dsn ="mysql:host=localhost; dbname=todolist";
$username = 'root';
// $password = 'sesame';

try{
$db = new PDO($dsn, $username);
} catch (PDOException $e) {
$error_message = 'Database Error!';
$error_message .= $e->getMessage();
//echo $error_message;
include('view.error.php');
exit();
}