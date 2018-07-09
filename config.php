<?php
try {
	$pdo= new PDO("mysql:dbname=bd_reservas;host=localhost","root","");
} catch (PDOException $e) {
	echo "Erro:". $e->getMessage();
	exit;
}
?>