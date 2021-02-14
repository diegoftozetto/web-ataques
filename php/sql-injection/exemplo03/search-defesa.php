<?php
require_once "../../../php/includes/config-db.php";

try {
  $conn = new pdo('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = 'SELECT * FROM tb_user WHERE name LIKE :search;';
    $stmt = $conn->prepare($query);
    $nsearch = "%" . $search . "%";
    $stmt->bindParam(':search', $nsearch);
  } else {
    $search = null;
    $query = "SELECT * FROM tb_user;";
    $stmt = $conn->prepare($query);
  }

  $stmt->execute();
  $users = $stmt->fetchAll(PDO::FETCH_CLASS);

  if (!empty($users))
    $result = "Pesquisa realizada com sucesso.";
  else
    $result = "Nenhum usuário.";
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
    <h5 class="mt-4"><u>Exemplo 3 - SQL Injection (Union Attacks) - Defesa</u></h5>
    <form action="search-defesa.php" method="GET">
      <div class="form-group mt-4">
        <label for="in-search">Pesquisar Usuários</label>
        <input autocomplete="off" type="text" class="form-control" name="search" id="in-search" placeholder="Nome do usuário" value="<?= $search; ?>" required>
      </div>
      <a class="btn btn-secondary btn-sm" href="<?= URL_BASE; ?>/php/sql-injection/exemplo03/main.php" role="button">Voltar</a>
      <button type="submit" class="btn btn-primary btn-sm">Pesquisar</button>
    </form>
    <table class="table">
      <tr>
        <th>Nome</th>
        <th>E-mail</th>
      </tr>
      <?php foreach ($users as $user) { ?>
        <tr>
          <td><?= $user->name; ?></td>
          <td><?= $user->email; ?></td>
        </tr>
      <?php } ?>
    </table>
    <p class="alert alert-info mt-4"><?= $query; ?></p>
    <p class="alert alert-warning"><?= $result; ?></p>
  </div>

  <?php
  require_once "../../../php/includes/head-script.php"
  ?>
</body>

</html>