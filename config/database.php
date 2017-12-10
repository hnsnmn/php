<?php
// used to connect to the database
$host = "localhost";
$db_name = "php_beginner_crud_level_1";
$username = "root";
$password = "111111";

try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
} catch(PDOException $exception) {
    // show error
    echo "Connection error: " . $exception->getMessage();
}
?>