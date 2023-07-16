<?php
include "../inc/config.php";
//mettere in tutte le pagine
session_start();
$_SESSION['session_id'];
$_SESSION['cod_cliente'];
$_SESSION['user'];

// print_r($_SESSION['cod_cliente']);
// print_r($_SESSION['user']['nome']);

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
<?php $data = $pdo->query("SELECT * FROM teatri")->fetchAll();?>
<div class="container">
  <div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <section class="header">
          <h1>Teatri</h1>
          <p>Scegli il teatro più vicino a te e inizia a prenotare gli spettacoli più belli!</p>
        </section>
        <?php foreach ($data as $row) : ?>
        <section class="cards cf">
          <article class="fancy-card">
            <div class="bg-overlay"></div>
            <div class="v-border"></div>
            <div class="h-border"></div>
            <div class="content">
              <div class="primary">
                <h2>Scegli il teatro</h2>
              </div>
              <div class="secondary">
                <h3><?php echo $row['nome'] ?></h3>
                <p>Indirizzo: <?php echo $row['indirizzo']?></p>
                <p>Città: <?php echo $row['citta']?></p>
                <p>Telefono: <?php echo $row['telefono']?></p>
                <p>Posti: <?php echo $row['posti']?></p>
                <!-- attenzione a spazi, passo parametro nell'url -->
                <a href="spettacoli.php?id_teatro=<?php echo $row['cod_teatro']?>">Spettacoli</a>
              </div>
          </article>
          <?php endforeach; ?>
        </section>
 
    </div>
 
 
<div class="col-1"></div>
</div>    

</div>
</body>
</html>

<?php } ?>