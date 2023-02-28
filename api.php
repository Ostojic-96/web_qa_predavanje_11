<?php
$servername = 'localhost';
$dbname = 'web_qa';
$dbusername = 'root';
$dbpassword = '123456';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
$query = "SELECT * FROM users";
$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$json = json_encode($result);
header('Content-Type: application/json; charset=utf-8');

echo $json;
