<?php
require_once "../../../php/includes/config-db.php";

$id = $_GET['id_category'];

try {
  $conn = new pdo('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query = "SELECT * FROM tb_product WHERE id_category = $id AND released=1;";
  $stmt = $conn->query($query);
  $products = $stmt->fetchAll(PDO::FETCH_CLASS);

  if (!empty($products))
    $result = "Produtos carregados.";
  else
    $result = "Nenhum produto.";
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
    <h5 class="mt-4"><u>Exemplo 2 - Blind SQL Injection (Ataque)</u></h5>
    <?php if (!empty($products)) { ?>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço (R$)</th>
            <th>Opções</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $product) { ?>
            <tr>
              <td><?= $product->name; ?></td>
              <td><?= $product->description; ?></td>
              <td><?= number_format($product->price, 2); ?></td>
              <td>
                <a class="btn btn-warning btn-sm" href="info-product-ataque.php?id=<?= $product->id; ?>" role="button">Editar</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } ?>
    </br>
    <p class="alert alert-info"><?= $query; ?></p>
    <p class="alert alert-warning"><?= $result; ?></p>
  </div>

  <?php
  require_once "../../../php/includes/head-script.php"
  ?>
</body>

</html>