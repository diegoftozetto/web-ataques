<?php
require_once "../../../php/includes/config-db.php";

try {
  $conn = new pdo('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $email = $_POST["email"];
  $pass = $_POST['password'];

  $query = "SELECT * FROM tb_user WHERE email = '$email' AND pass = '$pass';";
  $result = $conn->query($query);
  $fetch = $result->fetchObject();

  if (!empty($fetch->id))
    $result = "Logado com sucesso.";
  else
    $result = "Não logou. Tente novamente.";
} catch (\Exception $e) {
  $result = $e;
}
?>

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
    <p class="alert alert-info mt-4"><?= $query; ?></p>
    <p class="alert alert-warning"><?= $result; ?></p>
    </br>
    <a class="btn btn-primary btn-sm mt-2" href="<?= URL_BASE; ?>/php/sql-injection/exemplo01/main.php" role="button">Voltar</a>
  </div>

  <?php
  require_once "../../../php/includes/head-script.php"
  ?>
</body>

</html>