<?php
require_once "../../../php/includes/config-db.php";

try {
  $conn = new pdo('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query = "SELECT name, text FROM tb_comment 
      INNER JOIN tb_user ON tb_user.id = tb_comment.id_user 
      ORDER BY tb_comment.id DESC";

  $stmt = $conn->query($query);
  $comments = $stmt->fetchAll(PDO::FETCH_OBJ);
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
    <h1 class="lead mt-4"><u>Exemplo 3 - XSS (Stored) - Ataque</u></h1>
    <form action="insert-comment-ataque.php" method="POST">
      <div class="form-group mt-4">
        <label for="in-text"></label>
        <input type="text" class="form-control" name="text" id="in-text" placeholder="Deixe sua avaliação" required>
      </div>
      <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
    </form>
    <?php if (!empty($comments)) { ?>
      <div class="jumbotron mt-4">
        <h4 class="mb-2">Comentários:</h4>
        <?php foreach ($comments as $comment) { ?>
          <div class="card">
            <div class="card-body">
              <h5><?= $comment->name; ?></h5>
              <h6>"<?= $comment->text; ?>"</h6>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>

  <?php
  require_once "../../../php/includes/head-script.php"
  ?>
</body>

</html>