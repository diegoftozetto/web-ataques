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
      <h1 class="lead mb-4"><u>Exemplo 2 - CSRF</u></h1>
      <h5 class="lead mb-4">Logado com <?= $_SESSION['name']; ?></h5>
      <a class="btn btn-primary btn-sm" href="auth/login.php" role="button">Sair</a>
      <a class="btn btn-danger btn-sm" href="form-account-ataque.php" role="button">Transferência (Ataque)</a>
      <a class="btn btn-warning btn-sm" href="form-account-defesa.php" role="button">Transferência (Defesa)</a>
    </div>
  </div>

  <?php
  require_once "../../../php/includes/head-script.php"
  ?>
</body>

</html>