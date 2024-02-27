<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'users';

$connect = new mysqli($servername, $username, $password, $dbname);

if (!isset($_POST['delete'])) {
	
	echo '<form action="delete.php" method="POST">';
	echo '<input type="hidden" name="delete" value="yes">';
	echo '<input type="hidden" name="id" value="' . $_GET['id'] . '">';
	echo '<input type="submit" value="Usuń wpis">';
	echo '</form>';
}

if (isset($_POST['delete'])) {
	$delete = $_POST['delete'];
	
	if ($delete == 'yes') {
		$id = $_POST['id'];
		
		$query = "DELETE FROM users WHERE id = $id";
		$connect->query($query);
		header("Location: informacje.php");
	}
}

$connect->close();