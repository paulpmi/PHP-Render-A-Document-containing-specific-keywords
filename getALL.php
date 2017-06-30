<?php

session_start();


$name = $_GET['part'];
$name = strtolower($name);

$databaseCon = new mysqli("localhost", "root", "", "examen");
$stmt = $databaseCon->query("SELECT title FROM `Document` WHERE lower(title) LIKE '%".$name."%'");

foreach ($stmt as $statement) {
	foreach ($statement as $s) {
		echo "<a href='render.php?name=$s'>", $s, "</a><br>";
	}
}

?>