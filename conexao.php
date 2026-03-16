<?php

$usuario = 'root';
$senha = '18165644';
$database = 'cinemanacional';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error) {
    die("Falha ao conectar com o banco de dados: " . $mysqli->error);
}
