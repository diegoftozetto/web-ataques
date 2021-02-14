<?php
session_start();

if (!isset($_SESSION['login'])) {
  exit(header("Location: login.php"));
}

require_once "../../../../php/includes/config.php";
?>

<html lang="pt-br">

<head>
  <?php
  require_once "../../../../php/includes/head.php";
  ?>
</head>

<body>
  <?php
  require_once "../../../../php/includes/navbar.php"
  ?>

  <div class="container">
    <h5 class="alert alert-success mt-4">Login realizado com sucesso !</h5>
    <h1>Bem-vindo, <?= $_SESSION['name']; ?>.</h1>
    <p class="alert alert-warning">Consulta executada: <?= $_SESSION['query']; ?></p>
    <a class="btn btn-primary btn-sm" href="login.php" role="button">Sair</a>
  </div>

  <?php
  require_once "../../../../php/includes/head-script.php"
  ?>
</body>

</html>