<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'users';

$connect = new mysqli($servername, $username, $password, $dbname);

if (!isset($_POST['name'])) {
	
	echo '<form action="new.php" method="POST">';
	echo "<table>";
	echo '<tr><td>imię: <td><input name="name">';
	echo '<tr><td>nazwisko: <td><input name="surname">';
	echo '<tr><td>wiek: <td><input name="age">';
	echo '<tr><td><td><input type="submit" value="Dodaj wpis">';
	echo "</table></form>";
}

if (isset($_POST['name'])) {
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$age = $_POST['age'];
	
	$query = "INSERT INTO users (id, name, surname, age) VALUES (NULL, '$name', '$surname', '$age')";
	$connect->query($query);
	header("Location: informacje.php");
}

$connect->close();