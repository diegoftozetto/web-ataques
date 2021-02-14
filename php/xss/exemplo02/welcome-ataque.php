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
    <h5 class="mt-4"><u>Exemplo 1 - XSS (Dom Based) - Ataque</u></h5>
    <div class="jumbotron mt-4">
      <div class="container">
        <h5 class="alert alert-success">Login realizado com sucesso !</h5>
        <h1 class="alert alert-warning">Bem-vindo,
          <script>
            let nameParams = new URLSearchParams(window.location.search);
            var param = nameParams.get('name');
            document.write(param);
          </script>
        </h1>
      </div>
    </div>
  </div>

  <?php
  require_once "../../../php/includes/head-script.php"
  ?>
</body>

</html>