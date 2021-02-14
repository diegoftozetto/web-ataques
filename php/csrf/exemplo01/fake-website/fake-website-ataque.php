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
    <h1 class="lead mt-4 mb-4"><u>Exemplo 1 - CSRF (Ataque)</u></h1>
    <form action="../delete-user-ataque.php" method="POST">
      <input type="hidden" name="confirmation" value="CONFIRMAR" />
      <div class="form-group">
        <label for="in-email">E-mail</label>
        <input type="email" class="form-control" id="in-email" name="email" required />
      </div>
      <div class="form-group">
        <label for="in-message">Mensagem</label>
        <textarea class="form-control" name="message" id="" rows="3" required></textarea>
      </div>
      <a class="btn btn-secondary btn-sm mt-2" href="main.php" role="button">Voltar</a>
      <button type="submit" class="btn btn-primary btn-sm mt-2">Enviar</button>
    </form>
  </div>

  <?php
  require_once "../../../../php/includes/head-script.php"
  ?>
</body>

</html>