<?php
include "../inc/config.php";
//mettere in tutte le pagine
session_start();
$_SESSION['session_id'];
$_SESSION['cod_cliente'];
$_SESSION['user'];
// print_r($_SESSION['cod_cliente']);
// print_r($_SESSION['user']['nome']);

//prendo valore dell'Id teatro
$_SESSION['id_teatro'];
print_r($_SESSION['id_teatro']);

//valore id spettacolo
$id_spettacolo = $_GET['id_spettacolo'];
$_SESSION['id_spettacolo'] = $id_spettacolo;
print_r($_SESSION['id_spettacolo']);


//prima di ogni pagina verifico se utente è loggato
if(!isset($_SESSION['cod_cliente'])){
    header('Location:../index.php');
      exit;
    } else {
      
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="../assets/CSS1.css" rel="stylesheet" type="text/css">
  
  </head>
  <body>
  <?php $data = $pdo->query("SELECT * FROM repliche where cod_spettacolo = '$id_spettacolo'")->fetchAll();?>
  <div class="container">
    <div class="row">
      <div class="col-1"></div>
      <div class="col-10">
      <section class="header">
        <h1>Repliche</h1>
        <p>Scegli la replica</p>
      </section>
      <?php foreach ($data as $row) :?>
      <section class="cards cf">
        <article class="fancy-card one">
          <div class="bg-overlay"></div>
          <div class="v-border"></div>
          <div class="h-border"></div>
          <div class="content">
            <div class="primary">
              <h2>Repliche</h2>
            </div>
            <div class="secondary">
              <h3><?php echo $_SESSION['data_replica'] = $row['data_replica'] ?></h3>
              <p>Codice replica: <?php echo $row['cod_replica']?></p>
              <a href="prenotazione.php?id_replica=<?php echo $row['cod_replica']?>">Prenota i posti</a>
            </div>
          </div>
        </article>
        <?php endforeach;?>
      </section>
   
  
          </div>
          
  <div class="col-1"></div>
          </div>
  
  </div>
  
  </body>
  </html>
  
  <?php } ?>