<?php
require_once "../../../php/includes/config-db.php";

try {
  $conn = new pdo('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $id = $_POST['id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  $query = "UPDATE tb_product SET name = :name, description = :description, price = :price WHERE id = :id;";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':description', $description);
  $stmt->bindParam(':price', $price);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();

  $result = "Produto Atualizado com Sucesso.";
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
    <h5 class="alert alert-info mt-4"><u>Exemplo 2 - Blind SQL Injection (Defesa)</u></h5>

    <p class="mt-4"><?= $query; ?></p>
    <p class="alert alert-warning"><?= $result; ?></p>
    </br>
    <a class="btn btn-primary btn-sm" href="<?= URL_BASE; ?>/php/sql-injection/exemplo02/main.php" role="button">Concluir</a>
  </div>

  <?php
  require_once "../../../php/includes/head-script.php"
  ?>
</body>

</html>