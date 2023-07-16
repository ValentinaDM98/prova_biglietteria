<?php
include "../inc/config.php";
//mettere in tutte le pagine
session_start();

//prima di ogni pagina verifico se utente è loggato
if(!isset($_SESSION['cod_cliente'])){
  header('Location:../index.php');
    exit;
  } else {
  

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário
    $cod_cliente = $_POST['cod_cliente'];
    $cod_replica = $_POST['cod_replica'];
    $data_replica = $_POST['data_replica'];
    $tipo_pagamento = $_POST['tipo_pagamento'];
    $quantita = $_POST['quantita'];

    $query = "INSERT INTO biglietti (cod_cliente, cod_replica, data_replica, tipo_pagamento, quantita) VALUES (:cod_cliente, :cod_replica, :data_replica, :tipo_pagamento, :quantita)";
    $check = $pdo->prepare($query);
    $check->bindParam(':cod_cliente', $cod_cliente);
    $check->bindParam(':cod_replica', $cod_replica);
    $check->bindParam(':data_replica', $data_replica);
    $check->bindParam(':tipo_pagamento', $tipo_pagamento);
    $check->bindParam(':quantita', $quantita);
    $check->execute();
  }
  

  }