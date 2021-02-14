<?php
session_start();

require_once "../../../../php/includes/config-db.php";

try {
  $conn = new pdo('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $email = $_POST["email"];
  $pass = $_POST['password'];

  $query = "SELECT * FROM tb_user WHERE email = :email AND pass = :pass;";
  
  $email = filter_var($email, FILTER_VALIDATE_EMAIL);
  if (!$email) {
    throw new Exception("O e-mail não é válido.");
  }

  $result = $conn->prepare($query);
  $result->bindParam(':email', $email);
  $result->bindParam(':pass', $pass);
  $result->execute();
  $user = $result->fetchObject();

  if (!empty($user->id)) {
    $_SESSION['login-csrf'] = true;
    $_SESSION['id'] = $user->id;
    $_SESSION['name'] = $user->name;
    exit(header("Location: ../main.php"));
  } else {
    $_SESSION['msg-csrf']['error'] = 1;
    $_SESSION['msg-csrf']['message'] = "Não logou. Tente novamente.";
    exit(header("Location: login.php"));
  }
} catch (\Exception $e) {
  $_SESSION['msg-csrf']['error'] = 1;
  $_SESSION['msg-csrf']['message'] = $e->getMessage();
  exit(header("Location: login.php"));
}