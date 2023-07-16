<!-- <?php echo "spettacoli";?> -->
<?php
include "../inc/config.php";
//mettere in tutte le pagine
session_start();
$_SESSION['session_id'];
$_SESSION['cod_cliente'];
$_SESSION['user'];
// print_r($_SESSION['cod_cliente']);
// print_r($_SESSION['user']['nome']);


//prendo valore dell'ID
$id_teatro = $_GET['id_teatro'];
$_SESSION['id_teatro'] = $id_teatro;
print_r($id_teatro);

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
<?php $data = $pdo->query("SELECT * FROM spettacoli where cod_teatro = '$id_teatro'")->fetchAll();?>
<div class="container">
  <div class="row">
    <div class="col-1"></div>
    <div class="col-10">
    <section class="header">
      <h1>Spettacoli</h1>
      <p>Scegli lo spettacolo</p>
    </section>
    <?php foreach ($data as $row) :?>
    <section class="cards cf">
      <article class="fancy-card one">
        <div class="bg-overlay"></div>
        <div class="v-border"></div>
        <div class="h-border"></div>
        <div class="content">
          <div class="primary">
            <h2>Spettacoli</h2>
          </div>
          <div class="secondary">
            <h3><?php echo $row['titolo'] ?></h3>
            <p>Indirizzo: <?php echo $row['autore']?></p>
            <p>Città: <?php echo $row['regista']?></p>
            <p>Telefono: <?php echo $row['prezzo']?></p>
            <a href="repliche.php?id_spettacolo=<?php echo $row['cod_spettacolo']?>">Repliche</a>
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