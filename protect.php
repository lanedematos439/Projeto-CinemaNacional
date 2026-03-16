<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id'])) {
    die("Faça login para poder acessar!<p><a href=\"login.php\">Entrar</p>");
}

?>