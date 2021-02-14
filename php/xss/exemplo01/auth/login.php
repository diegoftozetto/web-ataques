<?php
session_start();
require_once "../../../../php/includes/config.php";

if (isset($_SESSION['login'])) {
  unset($_SESSION['login']);
}
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
    <h5 class="mt-4"><u>Exemplo 1 - XSS</u></h5>
    <img src="../../../../img/computer-screen.png" alt="" class="logo" class="mt-4">
    <span class="title-logo">Entre em sua conta</span>
    <form action="verificar-login.php" method="POST">
      <div class="form-group">
        <label for="in-email">E-mail</label>
        <input type="email" class="form-control" name="email" id="in-email" placeholder="Informe seu e-mail" maxlength="150" required>
      </div>
      <div class="form-group">
        <label for="in-password">Senha</label>
        <input type="password" class="form-control" name="password" id="in-password" placeholder="Informe sua senha" maxlength="150" required>
      </div>
      <button type="submit" class="btn btn-primary btn-sm signin">Entrar</button>

      <?php if (isset($_SESSION['msg'])) { ?>
        <div class="alert alert-<?= ($_SESSION['msg']['error'] == 1 ? 'danger' : 'success'); ?> mt-4">
          <p><?= $_SESSION['msg']['message']; ?></p>
        </div>
      <?php } ?>
      <?php unset($_SESSION['msg']); ?>
    </form>
    <a href="" class="register">Ainda não é inscrito?<strong> Cadastre-se</strong></a>
  </div>

  <?php
  require_once "../../../../php/includes/head-script.php"
  ?>
</body>

</html>