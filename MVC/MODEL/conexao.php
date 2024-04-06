<?php
$servidor = "localhost";
$usuario = "root";
$senha = getenv('MYSQL_SECURE_PASSWORD');
$dbname = "pdv";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

// Nueva fila agregada
mysqli_set_charset($conn, 'utf8');
