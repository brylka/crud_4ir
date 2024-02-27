<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'users';

$connect = new mysqli($servername, $username, $password, $dbname);

$id = $_GET['id'];

$query = "SELECT * FROM users WHERE id = " . $id;
$result = $connect->query($query);

$row = $result->fetch_assoc();

echo "id: " . $row['id'] . "<br>";
echo "imię: " . $row['name'] . "<br>";
echo "nazwisko: " . $row['surname'] . "<br>";
echo "wiek: " . $row['age'] . "<br>";

$connect->close();