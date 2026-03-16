<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro</title>
  <link rel="stylesheet" href="css/cadastro.css?v=<?= time() ?>">
  
</head>
<body background="../src/fundositehist.png">
  <div class="page">
    <form class="formCadastro" method="POST" action="cadastrar.php">
      <?php
      if(isset($_SESSION['status_cadastro'])):
      ?>
      <div class="notification is-sucess">
      <p>Cadastro efetuado!</p>
      </div>
      <?php
      endif;
      unset($_SESSION['status_cadastro']);
      ?>
      <?php
      if(isset($_SESSION['email_existe'])):
      ?>
      <div class="notification is-info">
        <p>O usuário escolhido já existe. Informe outro e tente novamente.</p>
      </div>
      <?php
      endif;
      unset($_SESSION['email_existe']);
      ?>
      <h1>Cadastro</h1>
      <div class="form-row">
        <div class="form-group">
          <label for="nome">Nome de Usuário</label>
          <input type="text" id="nome" name="nome"/>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" id="email" name="email"/>
        </div>

      <div class="form-row">
        <div class="form-groupSE">
          <label for="senha">Senha</label>
          <input type="password" id="senha" name="senha"/>
        </div>
      </div>

      <div class="form-row">
        <div class="form-groupSE">
          <label for="confirmar">Confirmar senha</label>
          <input type="password" id="confirmar" />
        </div>
      </div>
      </div>

      <a href="login.php">Já é cadastrado? Faça o login</a>
      <button type="submit" class="btn">Cadastrar</button>

       <!-- Aqui vai aparecer o erro -->
    <p id="erro" style="color: red; display: none;">Preencha todos os campos!</p>

    </form>
  </div>
  <!-- <script>

 

// Validação do formulário completo
document.querySelector('.formCadastro').addEventListener('submit', async function (event) {
    event.preventDefault();

    const nome = document.getElementById('nome').value.trim();
    const email = document.getElementById('email').value.trim();
    const senha = document.getElementById('senha').value;
    const confirmar = document.getElementById('confirmar').value;
    const erro = document.getElementById("erro"); 

    if (!nome || !email || !senha || !confirmar) {
        erro.style.display = "block";
        return;
    } else {
        erro.style.display = "none";
    }

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        alert('E-mail inválido.');
        return;
    }

    if (senha !== confirmar) {
        alert('As senhas não coincidem.');
        return;
    }

    alert('Cadastro realizado com sucesso!');
    // Aqui poderia enviar os dados para um backend ou redirecionar
    window.location.href = "login.php";

});
</script> -->

</body>
</html>


