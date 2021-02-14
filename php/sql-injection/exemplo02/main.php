<?php
require_once "../../../php/includes/config-db.php";

try {
  $conn = new pdo('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query = "SELECT * FROM tb_category";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $categories = $stmt->fetchAll(PDO::FETCH_CLASS);

  $result = "";
} catch (\Exception $e) {
  $result = $e->getMessage();
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
    <h5 class="mt-4"><u>Exemplo 2 - Blind SQL Injection</u></h5>
    <ul id="tab-options" class="nav nav-tabs mt-4">
      <li class="nav-item">
        <a href="#ex02-ataque" class="nav-link active">Ataque</a>
      </li>
      <li class="nav-item">
        <a href="#ex02-defesa" class="nav-link" id="tab-list-products">Defesa</a>
      </li>
    </ul>
    <div class="tab-content ml-4 mr-4">
      <div class="tab-pane fade show active mt-4" id="ex02-ataque">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>Categoria</th>
              <th>Opções</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($categories as $category) { ?>
              <tr>
                <td><?= $category->name; ?></td>
                <td>
                  <a class="btn btn-warning btn-sm" href="get-products-ataque.php?id_category=<?= $category->id; ?>" role="button">Visualizar</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <div class="tab-pane fade mt-4" id="ex02-defesa">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>Categoria</th>
              <th>Opções</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($categories as $category) { ?>
              <tr>
                <td><?= $category->name; ?></td>
                <td>
                  <a class="btn btn-warning btn-sm" href="get-products-defesa.php?id_category=<?= $category->id; ?>" role="button">Visualizar</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="Badge bg-dark text-light"><?= $result; ?></p>
  </div>

  <?php
  require_once "../../../php/includes/head-script.php"
  ?>
</body>

</html>