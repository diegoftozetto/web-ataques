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
    <h5 class="mt-4"><u>Exemplo 1 - SQL Injection</u></h5>
    <ul id="tab-options" class="nav nav-tabs mt-4">
      <li class="nav-item">
        <a href="#ex01-ataque" class="nav-link active">Ataque</a>
      </li>
      <li class="nav-item">
        <a href="#ex01-defesa" class="nav-link" id="tab-list-products">Defesa</a>
      </li>
    </ul>

    <div class="tab-content ml-4 mr-4">
      <div class="tab-pane fade show active mt-4" id="ex01-ataque">
        <img src="../../../img/computer-screen.png" alt="" class="logo">
        <span class="title-logo">Entre em sua conta</span>
        <form action="verificar-login-ataque.php" method="POST">
          <div class="form-group">
            <label for="in-email">E-mail</label>
            <input type="text" class="form-control" name="email" placeholder="Informe seu e-mail" maxlength="150">
          </div>
          <div class="form-group">
            <label for="in-password">Senha</label>
            <input type="password" class="form-control" name="password" placeholder="Informe sua senha" maxlength="150">
          </div>
          <button type="submit" class="btn btn-primary btn-sm signin">Entrar</button>
        </form>
        <a href="" class="register">Ainda não é inscrito?<strong> Cadastre-se</strong></a>
      </div>

      <div class="tab-pane fade mt-4" id="ex01-defesa">
        <img src="../../../img/computer-screen.png" alt="" class="logo">
        <span class="title-logo">Entre em sua conta</span>
        <form action="verificar-login-defesa.php" method="POST">
          <div class="form-group">
            <label for="in-email">E-mail</label>
            <input type="text" class="form-control" name="email" placeholder="Informe seu e-mail" maxlength="150">
          </div>
          <div class="form-group">
            <label for="in-password">Senha</label>
            <input type="password" class="form-control" name="password" placeholder="Informe sua senha" maxlength="150">
          </div>
          <button type="submit" class="btn btn-primary btn-sm signin">Entrar</button>
        </form>
        <a href="" class="register">Ainda não é inscrito?<strong> Cadastre-se</strong></a>
      </div>
    </div>
  </div>

  <?php
  require_once "../../../php/includes/head-script.php"
  ?>
</body>

</html>