<?php
include('conexao.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senhaDigitada = $_POST['senha']; // senha normal

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql_query = $mysqli->query($sql_code)
            or die("Falha na execução do código SQL: " . $mysqli->error);

        if ($sql_query->num_rows == 1) {

            $usuario = $sql_query->fetch_assoc();

            // verifica o hash
            if (password_verify($senhaDigitada, $usuario['senha'])) {

                if (!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                header("Location: index.php");
                exit;

            } else {
                echo "Senha incorreta";
            }

        } else {
            echo "E-mail não encontrado";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css?v=<?= time() ?>">
</head>

<body background="../src/fundositehist.png">

<center>
<form method="POST" action="login.php" class="formLogin" onsubmit="return validarFormulario()">
    <h1>Login</h1>
    <p>Digite os seus dados de acesso no campo abaixo.</p>

    <label for="email">E-mail</label>
    <input type="email" id="email" name="email" placeholder="Digite seu e-mail">

    <label for="senha">Senha</label>
    <input type="password" id="senha" name="senha" placeholder="Digite sua senha">

    <a href="https://accounts.google.com/v3/signin/identifier">Esqueci minha senha</a>
    <a href="cadastro.php">Não é cadastrado? Cadastre-se agora</a>

    <input type="submit" value="Acessar" class="btn">

    <p id="erro" style="color: red; display: none;">Preencha todos os campos!</p>
</form>
</center>

<script>
function validarFormulario() {
    const email = document.getElementById("email").value.trim();
    const senha = document.getElementById("senha").value.trim();
    const erro = document.getElementById("erro");

    if (email === "" || senha === "") {
        erro.style.display = "block";
        return false;
    }

    erro.style.display = "none";
    return true; 
}
</script>

</body>
</html>