<?php
require_once "../../../php/includes/config-db.php";

$id = $_GET['id'];

try {
  $conn = new pdo('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query = "SELECT * FROM tb_product WHERE id = $id AND released=1;";
  $stmt = $conn->query($query);
  $product = $stmt->fetchObject();

  if (!empty($product))
    $result = "Produtos carregado.";
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
    <?php if (!empty($product)) { ?>
      <form action="update-product-ataque.php" method="POST">
        <h5 class="mt-4"><b>Atualizar Produto</b></h5>
        <div class="form-group">
          <label for="in-name">Nome</label>
          <input type="text" class="form-control" name="name" id="in-name" placeholder="Nome do produto" maxlength="150" value="<?= $product->name; ?>" required>
        </div>
        <div class="form-group">
          <label for="in-description">Descrição</label>
          <textarea class="form-control" name="description" id="in-description" placeholder="Descrição do produto" maxlength="500" rows="3" required style="resize: none"><?= $product->description; ?></textarea>
        </div>
        <div class="form-group">
          <label for="in-price">Preço</label>
          <input type="number" class="form-control" name="price" id="in-price" placeholder="Preço do produto" maxlength="30" value="<?= $product->price; ?>" required>
        </div>
        <input type="hidden" name="id" value="<?= $id; ?>">
        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
      </form>
      </br>
    <?php } ?>
    <p class="alert alert-info mt-4"><?= $query; ?></p>
    <p class="alert alert-warning"><?= $result; ?></p>
  </div>

  <?php
  require_once "../../../php/includes/head-script.php"
  ?>
</body>

</html>