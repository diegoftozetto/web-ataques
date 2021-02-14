<?php
require_once "config.php";
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Segurança WEB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= URL_BASE; ?>/index.php">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          SQL Injection
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?= URL_BASE; ?>/php/sql-injection/exemplo01/main.php">Exemplo 1</a>
          <a class="dropdown-item" href="<?= URL_BASE; ?>/php/sql-injection/exemplo02/main.php">Exemplo 2</a>
          <a class="dropdown-item" href="<?= URL_BASE; ?>/php/sql-injection/exemplo03/main.php">Exemplo 3</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          XSS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?= URL_BASE; ?>/php/xss/exemplo01/main.php">Exemplo 1</a>
          <a class="dropdown-item" href="<?= URL_BASE; ?>/php/xss/exemplo02/main.php">Exemplo 2</a>
          <a class="dropdown-item" href="<?= URL_BASE; ?>/php/xss/exemplo03/main.php">Exemplo 3</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          CSRF
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?= URL_BASE; ?>/php/csrf/exemplo01/main.php">Exemplo 1</a>
          <a class="dropdown-item" href="<?= URL_BASE; ?>/php/csrf/exemplo02/main.php">Exemplo 2</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= URL_BASE; ?>/php/restore-db.php">Restaurar DB</a>
      </li>
    </ul>
  </div>
</nav>