<?php
session_start();
?>
<?php
$pdo = new PDO("mysql:host=localhost;port=3306;dbname=cinemanacional", "root", "18165644");

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "Filme não encontrado.";
    exit;
}

$sql = "SELECT * FROM filmes WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();

$filme = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$filme) {
    echo "Filme não encontrado.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/filme.css?v=<?= time() ?>">
    <title><?= $filme['nome'] ?> | Cinema Nacional</title>
</head>

<body>
    <nav class="navbar1">
    <div class="nav-content">

        <a href="index.php">
        <h1 class="logo-marca">Cinema<span>Nacional</span></h1>
        </a>

        <div class="container_pesquisa">
            <div class="barra_pesquisa">
                <input type="text" id="barraPesquisa" placeholder="Pesquisar...">
            </div>
            <button id="button_pesquisa" onclick="IniciarBusca()">Buscar</button>
        </div>

        <div class="nav-li">
                <ul>
                <li class="inicio">
                <a class="inicio" href="index.php">Início</a>
                </li>
                <li class="filmes">
                <a class="filmes" href="todos-filmes.php">Filmes</a>
                </li>

                <li class="menu-wrapper">
                Categorias
                <div class="submenu">
                    <a href="categoria.php?categoria=Comédia">Comédia</a>
                    <a href="categoria.php?categoria=Drama">Drama</a>
                    <a href="categoria.php?categoria=Aventura">Aventura</a>
                    <a href="categoria.php?categoria=Novela">Novelas</a>
                    <a href="categoria.php?categoria=Romance">Romances</a>
                </div>
                </li>

            <li class="menu-usuario">
                <?php if (isset($_SESSION['id'])): ?>
                    <img src="src/logo_usuario.png" alt="logo-usuario" class="icone-usuario">

                <div class="submenu-usuario">
                    <a href="perfil.php">Perfil</a>
                    <a href="logout.php">Sair</a>
                </div>
                <?php else: ?>
                    <a class="login"href="login.php">Iniciar Sessão</a>
                <?php endif; ?>
                </li>
                </ul>
        </div>

    </div>
    </div>
</nav>
        


      <!-- BANNER / TOPO -->
    
        <nav class="banner" style="background: <?= $filme['cor_card'] ?>;">
          <div class="overlay"></div>
        </nav>

<!-- CONTEÚDO PRINCIPAL -->
<main class="container-filme">

    <div class="card-filme">
        <img src="<?= $filme['capa'] ?>" class="capa" alt="<?= $filme['nome'] ?>">
    </div>

          <div class="info">
            <h1><?= $filme['nome'] ?></h1>
          </div>
          <div class="linha-info">
            <span class="marcador-ano-categoria"><?= $filme['ano'] ?></span>
            <span><?= $filme['categoria'] ?></span>
          </div>

          <div class="linha-classificacao">
            <span class="marcador-classificacao"><?= $filme['marcador_classificacao'] ?></span>
            <span><?= $filme['classificacao_indicativa'] ?></span>
          </div>

          <div class="linha-duracao">
            <span class="marcador-duracao"><?= $filme['marcador_duracao'] ?></span>
            <span><?= $filme['duracao'] ?></span>
          </div>

          <div class="sinopse">
              <span class="marcador-sinopse"><?= $filme['marcador_sinopse'] ?></span>
              <p class="sinopse-filme"><?= nl2br($filme['sinopse']) ?></p>
          </div>
          <div class="container-botoes">
            <div class="botao-play">
                <button class="Play">PLAY</button>
            </div>
            <div class="botao-salvar">
                <img src="src/botoes/adicionar.png">
            </div>
            </div>
</main>

        <script src="javascript.js"></script>
</body>
</html>