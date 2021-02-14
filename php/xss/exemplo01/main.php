<?php
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
      <h5 class="mb-4">Exemplo 1 - XSS (Reflected)</h5>
      <h1 class="lead mb-4"><u>Pesquisa</u></h1>
      <a class="btn btn-danger btn-sm" href="search-ataque.php" role="button">Ataque</a>
      <a class="btn btn-warning btn-sm" href="search-defesa.php" role="button">Defesa</a>
      </br>
      <h1 class="lead mt-4"><u>Autenticação</u></h1>
      <a class="btn btn-primary btn-sm" href="./auth/login.php" role="button">Login</a>
      <a class="btn btn-secondary btn-sm" href="./auth/logado.php" role="button">Logado</a>
    </div>
  </div>

  <?php
  require_once "../../../php/includes/head-script.php"
  ?>
</body>

</html>