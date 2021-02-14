<?php
  require_once "includes/config-db.php";  

  try {
    $conn = new pdo('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "DROP TABLE IF EXISTS tb_comment;";
    $stmt = $conn->query($query);

    $query = "DROP TABLE IF EXISTS tb_product;";
    $stmt = $conn->query($query);

    $query = "DROP TABLE IF EXISTS tb_category;";
    $stmt = $conn->query($query);

    $query = "DROP TABLE IF EXISTS tb_user;";
    $stmt = $conn->query($query);

    $query = "
      CREATE TABLE `tb_user` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `name` varchar(255) NOT NULL,
        `email` varchar(255) NOT NULL,
        `pass` varchar(255) NOT NULL
      );    
    ";
    $stmt = $conn->query($query);

    $query = "
      CREATE TABLE `tb_comment` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `text` MEDIUMTEXT NOT NULL,
        `id_user` int(11) NOT NULL
      );    
    ";    
    $stmt = $conn->query($query);

    $query = "
      ALTER TABLE tb_comment
      ADD FOREIGN KEY (id_user) REFERENCES tb_user(id);      
    ";    
    $stmt = $conn->query($query);

    $query = "
      CREATE TABLE `tb_category` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `name` varchar(255) NOT NULL
      );        
    ";    
    $stmt = $conn->query($query);

    $query = "
      CREATE TABLE `tb_product` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `name` varchar(255) NOT NULL,
        `description` varchar(500) NOT NULL,
        `price` float NOT NULL,
        `released` tinyint(1) NOT NULL,
        `id_category` int(11) NOT NULL
      );           
    ";    
    $stmt = $conn->query($query);

    $query = "
      ALTER TABLE tb_product
      ADD FOREIGN KEY (id_category) REFERENCES tb_category(id);         
    ";    
    $stmt = $conn->query($query);

    $query = "
      INSERT INTO `tb_user` (`name`, `email`, `pass`) VALUES
      ('Admin', 'admin@gmail.com', 'admin'),
      ('Diego', 'diegotozetto@gmail.com', '123'),
      ('User1', 'user1@gmail.com', 'abc'),
      ('User2', 'user2@gmail.com', '123abc');    
    ";
    $stmt = $conn->query($query);

    $query = "
      INSERT INTO `tb_comment` (`id_user`, `text`) VALUES
      (1, 'Ótima aplicação para testar os conhecimentos !') 
    ";
    $stmt = $conn->query($query);

    $query = "
      INSERT INTO `tb_category` (`name`) VALUES
      ('Tecnologia'),
      ('Casa');     
    ";
    $stmt = $conn->query($query);

    $query = "
      INSERT INTO `tb_product` (`name`, `description`, `price`, `released`, `id_category`) VALUES
      ('Tablet Samsung Galaxy S6 Lite', 'O novo Galaxy Tab S6 Lite é o seu companheiro de anotações super portátil. Com uma tela grande de 10,4 polegadas em um design fino e leve. One UI 2 no Android, S Pen ergônomica e capa protetora inclusas e prontas para uso. O Tablet perfeito para mudar o seu jeito de aprender, criar, ver o mundo e se divertir.', 2149, 1, 1),
      ('Samsung Galaxy S21', 'Mantendo a proposta de oferecer dois chips, dependendo do país, o Galaxy S21 5G é o modelo mais famoso desta nova geração de smartphones premium da Samsung, agora com um bump de câmera completamente reformulado.', 7500, 0, 1),
      ('Fogão de Piso Mesa de Vidro Electrolux 5 Bocas', 'Mesa de Vidro temperado: Design moderno com acabamento superior. Facilidade de limpeza, superfícies lisas e poucos recortes. Queimador Tripla Chama: Chama mais potente que proporciona maior rapidez no preparo dos alimentos.', 1699.99, 1, 2),
      ('Ar Condicionado Split Hi Wall Dual Inverter LG Voice 18.000 Btus', 'Acesse e controle seu LG DUAL Inverter Voice de maneira remota a qualquer hora e de qualquer lugar. Com o LG ThinQ® você pode controlar o seu ar-condicionado antes mesmo de chegar em casa, utilizando o comando de voz associado ao Google Assistente ou Alexa.', 2913.99, 0, 2);
    ";
    $stmt = $conn->query($query);

  } catch (\Exception $e) {
    //Erro
  }

  header("Location: ../index.php");
