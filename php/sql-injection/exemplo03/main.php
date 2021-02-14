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
      <h1 class="lead mb-4"><u>Exemplo 3 - SQL Injection (Union Attacks)</u></h1>
      <a class="btn btn-danger btn-sm" href="<?= URL_BASE; ?>/php/sql-injection/exemplo03/search-ataque.php" role="button">Ataque</a>
      <a class="btn btn-warning btn-sm" href="<?= URL_BASE; ?>/php/sql-injection/exemplo03/search-defesa.php" role="button">Defesa</a>
    </div>
  </div>

  <?php
  require_once "../../../php/includes/head-script.php"
  ?>
</body>

</html>