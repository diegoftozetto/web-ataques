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
      <h1 class="lead mb-4"><u>Exemplo 1 - CSRF (Defesa)</u></h1>
      <h5 class="lead mb-4">Logado com <?= $_SESSION['name']; ?></h5>
      <form action="delete-user-defesa.php" method="POST">
        <p>Digite "CONFIRMAR" para deletar a conta.</p>
        <input type="hidden" name="token" value="<?php echo $token; ?>" />
        <input type="text" class="form-control" name="confirmation" id="in-confirmation" required />
        <a class="btn btn-primary btn-sm mt-2" href="main.php" role="button">Voltar</a>
        <button type="submit" class="btn btn-danger btn-sm mt-2">Concluir</button>
      </form>

      <?php if (isset($_SESSION['msg-csrf'])) { ?>
        <div class="alert alert-<?= ($_SESSION['msg-csrf']['error'] == 1 ? 'danger' : 'success'); ?> mt-4">
          <p><?= $_SESSION['msg-csrf']['message']; ?></p>
        </div>
      <?php } ?>
      <?php unset($_SESSION['msg-csrf']); ?>
    </div>
  </div>

  <?php
  require_once "../../../php/includes/head-script.php"
  ?>
</body>

</html>