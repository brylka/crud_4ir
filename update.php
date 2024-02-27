<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'users';

$connect = new mysqli($servername, $username, $password, $dbname);

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$query = "SELECT * FROM users WHERE id = " . $id;
	$result = $connect->query($query);

	$row = $result->fetch_assoc();

	echo '<form action="update.php" method="POST">';
	echo "<table>";
	echo "<tr><td>id: <td>" . $row['id'];
	echo '<tr><td>imię: <td><input name="name" value="' . $row['name'] . '">';
	echo '<tr><td>nazwisko: <td><input name="surname" value="' . $row['surname'] . '">';
	echo '<tr><td>wiek: <td><input name="age" value="' . $row['age'] . '">';
	echo '<tr><td><td><input type="submit" value="Edytuj wpis">';
	echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
	echo "</table></form>";
}

if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$age = $_POST['age'];
	
	$query = "UPDATE users SET name = '$name', surname = '$surname', age = '$age' WHERE id = $id";
	$connect->query($query);
	//echo "<h3>Wpis zmieniony</h3>";
	//echo '<a href="informacje.php">Wróć na listę</a>';
	header("Location: informacje.php");
	
}

$connect->close();