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
    <h5 class="mt-4">Resultado da Transferência:</h5>
    <?php if (isset($_SESSION['msg-transfer'])) { ?>
      <div class="alert alert-<?= ($_SESSION['msg-transfer']['error'] == 1 ? 'danger' : 'success'); ?> mt-4">
        <p><?= $_SESSION['msg-transfer']['message']; ?></p>
      </div>
    <?php } ?>
    <a class="btn btn-secondary btn-sm mt-4" href="main.php" role="button">Voltar</a>
  </div>

  <?php
  require_once "../../../php/includes/head-script.php"
  ?>
</body>

</html>