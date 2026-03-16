<?php
session_start();
include('conexao.php');

$nome = mysqli_real_escape_string($mysqli, trim($_POST['nome']));
$email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$sql = "select count(*) as total from usuarios where email = '$email'";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
    $_SESSION['email_existe'] = true;
    header('Location: cadastro.php');
    exit;
}

$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

if($mysqli->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = true;
}

$mysqli->close();

header('Location: login.php');
exit;
?>