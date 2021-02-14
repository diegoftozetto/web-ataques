<?php
session_start();

if (!isset($_SESSION['login-csrf'])) {
  exit(header("Location: auth/login.php"));
}

if (empty($_SESSION['token'])) {
  $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];

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
      <h1 class="lead mb-4"><u>Exemplo 2 - CSRF - Transferência (Defesa)</u></h1>
      <h5 class="lead mb-4">Logado com <?= $_SESSION['name']; ?></h5>
      <form action="add-transfer-defesa.php" method="POST">
        <input type="hidden" name="token" value="<?php echo $token; ?>" />
        <div class="form-group mt-4">
          <label for="in-agency">Agência</label>
          <input type="number" class="form-control" name="agency" id="in-agency" placeholder="Informe a agência" required>
        </div>
        <div class="form-group mt-4">
          <label for="in-account">Conta</label>
          <input type="number" class="form-control" name="account" id="in-account" placeholder="Informe o número da conta" required>
        </div>
        <div class="form-group mt-4">
          <label for="in-value">Valor</label>
          <input type="number" class="form-control" name="value" id="in-value" placeholder="Valor" required>
        </div>
        <a class="btn btn-secondary btn-sm mt-2" href="main.php" role="button">Voltar</a>
        <button type="submit" class="btn btn-success btn-sm mt-2">Confirmar Transferência</button>
      </form>
    </div>
  </div>

  <?php
  require_once "../../includes/head-script.php"
  ?>
</body>

</html>