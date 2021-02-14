<?php
  require_once "../../../php/includes/config-db.php";

  try {
    $conn = new pdo('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $text = $_POST['text'];

    $query = "INSERT INTO tb_comment(id_user, text) VALUES (1, :text)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":text", $text);
    $stmt->execute();
  } catch (\Exception $e) {
    //Erro
  }

  header("Location: add-comment-ataque.php");
