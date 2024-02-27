<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'users';

$connect = new mysqli($servername, $username, $password, $dbname);

$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';

$query = "SELECT * FROM users ORDER BY $sort ASC";
$result = $connect->query($query);

//print_r($result);

echo "<table border='1'>";
echo '<tr>
		<th><a href="?sort=id">ID</a>
		<th><a href="?sort=name">Imię</a>
		<th><a href="?sort=surname">Nazwisko</a>
		<th><a href="?sort=age">Wiek</a>
		<th>Zobacz wpis
		<th>Edytuj wpis
		<th>Usuń wpis';

while ($row = $result->fetch_assoc()) {
	echo "<tr>";
	echo "<td>" . $row['id'];
	echo "<td>" . $row['name'];
	echo "<td>" . $row['surname'];
	echo "<td>" . $row['age'];
	echo '<td><a href="select.php?id=' . $row['id'] . '">Zobacz wpis</a>';
	echo '<td><a href="update.php?id=' . $row['id'] . '">Edytuj wpis</a>';
	echo '<td><a href="delete.php?id=' . $row['id'] . '">Usuń wpis</a>';
}

echo "</table>";

echo '<a href="new.php">Dodaj wpis</a>';

$connect->close();