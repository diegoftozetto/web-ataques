<?php
session_start();

if (!isset($_SESSION['login-csrf'])) {
  $_SESSION['msg-transfer']['error'] = 1;
  $_SESSION['msg-transfer']['message'] = "Erro ao fazer transferência. Sessão inválida.";
  exit(header("Location: auth/login.php"));
}

$agency = $_GET['agency'];
$account = $_GET['account'];
$value = $_GET['value'];

$_SESSION['msg-transfer']['error'] = 0;
$_SESSION['msg-transfer']['message'] = "Transferência realizada com sucesso! Para:</br>-Agência: $agency</br>-Conta: $account</br>-Valor(R$): $value";
header("location: result-transfer.php");
