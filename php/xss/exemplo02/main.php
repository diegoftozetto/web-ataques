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
      <h1 class="lead mb-4"><u>Exemplo 2 - XSS (DOM Based)</u></h1>
      <a class="btn btn-danger btn-sm" href="welcome-ataque.php?name=Admin" role="button">Ataque</a>
      <a class="btn btn-warning btn-sm" href="welcome-defesa.php?name=Admin" role="button">Defesa</a>
    </div>
  </div>

  <?php
  require_once "../../../php/includes/head-script.php"
  ?>
</body>

</html>