<?php
session_start();

if (!isset($_SESSION['login-csrf'])) {
  exit(header("Location: auth/login.php"));
}

require_once "../../../php/includes/config.php";
?>

<html lang="pt-br">

<head>
  <?php
  require_once "../../../php/includes/head.php";
  ?>
</head>

<body>
  <?php
  require_once "../../../php/includes/navbar.php"
  ?>

  <div class="container">
    <div class="jumbotron mt-4">
      <h1 class="lead mb-4"><u>Exemplo 1 - CSRF</u></h1>
      <h5 class="lead mb-4">Logado com <?= $_SESSION['name']; ?></h5>
      <a class="btn btn-primary btn-sm" href="auth/login.php" role="button">Sair</a>
      <a class="btn btn-danger btn-sm" href="form-user-ataque.php" role="button">Deletar Conta (Ataque)</a>
      <a class="btn btn-warning btn-sm" href="form-user-defesa.php" role="button">Deletar Conta (Defesa)</a>
    </div>
  </div>

  <?php
  require_once "../../../php/includes/head-script.php"
  ?>
</body>

</html>