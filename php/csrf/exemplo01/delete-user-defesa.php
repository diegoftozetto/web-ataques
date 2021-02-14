<?php
session_start();

if (!isset($_SESSION['login-csrf'])) {
  exit(header("Location: auth/login.php"));
}

if (!empty($_POST['token'])) {
  if (hash_equals($_SESSION['token'], $_POST['token'])) {

    require_once "../../../php/includes/config-db.php";

    $confirmation = $_POST['confirmation'];
    $id = $_SESSION['id'];

    if ($confirmation == "CONFIRMAR") {
      try {
        $conn = new pdo('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "DELETE FROM tb_user WHERE id = :id;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION['msg-csrf']['error'] = 0;
        $_SESSION['msg-csrf']['message'] = "Conta removida com sucesso!";
        header("location: auth/login.php");
      } catch (\Exception $e) {
        $_SESSION['msg-csrf']['error'] = 1;
        $_SESSION['msg-csrf']['message'] = $e->getMessage();
        header("location: form-user-defesa.php");
      }
    } else {
      $_SESSION['msg-csrf']['error'] = 1;
      $_SESSION['msg-csrf']['message'] = "Erro ao deletar conta. Mensagem Incorreta.";
      header("location: form-user-defesa.php");
    }
  } else {
    $_SESSION['msg-csrf']['error'] = 1;
    $_SESSION['msg-csrf']['message'] = "Erro ao deletar conta. Nenhum Token.";
    header("location: auth/login.php");
  }
} else {
  $_SESSION['msg-csrf']['error'] = 1;
  $_SESSION['msg-csrf']['message'] = "Erro ao deletar conta. Token inválido.";
  header("location: auth/login.php");
}
