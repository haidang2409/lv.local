<?php
//error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
try
{
    $conn = new PDO("mysql:host=$servername;dbname=lv_qlnongsan", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
$user = array(
//    'id' => '999',
    'name' => "Dang Nguyen'; DELETE FROM users--",
    'phone' => '01215941976',
    'email' => 'haidangdhct24@gmail.com',
    'age' => 26,
    'gender' => 1
);

$columns = implode(", ",array_keys($user));
$escaped_values = array_map('mysql_real_escape_string', array_values($user));
$values  = "'" . implode("', '", $escaped_values) . "'";
$sql = "INSERT INTO `users`($columns) VALUES ($values)";

$stmt = $conn->prepare($sql);
$stmt->execute();

echo $sql;
?>

