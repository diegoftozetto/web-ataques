<?php
session_start();

require_once "../../../../php/includes/config-db.php";

try {
  $conn = new pdo('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $email = $_POST["email"];
  $pass = $_POST['password'];

  $query = "SELECT * FROM tb_user WHERE email = :email AND pass = :pass;";
  $email = filter_var($email, FILTER_VALIDATE_EMAIL);
  if (!$email) {
    throw new Exception("O e-mail não é válido.");
  }

  $result = $conn->prepare($query);
  $result->bindParam(':email', $email);
  $result->bindParam(':pass', $pass);
  $result->execute();
  $user = $result->fetchObject();

  if (!empty($user->id)) {
    $_SESSION['login'] = true;
    $_SESSION['query'] = $query;
    $_SESSION['name'] = $user->name;
    exit(header("Location: logado.php"));
  } else
    $result = "Não logou. Tente novamente.";
} catch (\Exception $e) {
  $_SESSION['msg']['error'] = 1;
  $_SESSION['msg']['message'] = $e->getMessage();
  exit(header("Location: login.php"));
}
?>

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
    <p class="alert alert-warning mt-4"><?= $result; ?></p>
    </br>
    <a class="btn btn-primary btn-sm" href="<?= URL_BASE; ?>/php/xss/exemplo01/auth/login.php" role="button">Voltar</a>
  </div>

  <?php
  require_once "../../../../php/includes/head-script.php"
  ?>
</body>

</html>