<?php
require_once "../../../php/includes/config-db.php";

try {
  $conn = new pdo('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query = "-";
  $search = "";
  if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = htmlentities($_GET['search'], ENT_QUOTES, 'UTF-8');
    //<a href="https://www.site.com">Abrir Site</a>
    //&lt;a href=&quot;https://www.site.com&quot;&gt;Abrir Site&lt;/a&gt;

    $query = 'SELECT * FROM tb_user WHERE name LIKE :search';
    $stmt = $conn->prepare($query);
    $nsearch = "%" . $search . "%";
    $stmt->bindParam(':search', $nsearch);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_OBJ);
  }

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
    <h5 class="mt-4"><u>Exemplo 1 - XSS (Reflected) - Defesa</u></h5>
    <form action="search-defesa.php" method="GET">
      <div class="form-group mt-4">
        <label for="in-search">Pesquisar Usuários</label>
        <input autocomplete="off" type="text" class="form-control" name="search" id="in-search" placeholder="Nome do usuário" value="<?= $search; ?>" required />
      </div>
      <a class="btn btn-secondary btn-sm" href="<?= URL_BASE; ?>/php/xss/exemplo01/main.php" role="button">Voltar</a>
      <button type="submit" class="btn btn-primary btn-sm">Pesquisar</button>
    </form>
    <?php if (isset($_GET['search']) && !empty($_GET['search'])) { ?>
      <h4>Resultados para: "<?= $search; ?>"</h4>
    <?php } ?>
    <?php if (!empty($users)) { ?>
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