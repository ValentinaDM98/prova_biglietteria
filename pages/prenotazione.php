<?php
include "../inc/config.php";
//mettere in tutte le pagine
session_start();
$_SESSION['session_id'];
$_SESSION['cod_cliente'];
$_SESSION['user'];

//prendo valore dell'Id teatro
$_SESSION['id_teatro'];
print_r($_SESSION['id_teatro']);

//valore id spettacolo
$id_spettacolo = $_SESSION['id_spettacolo'];
print_r($id_spettacolo);

//valore id replica
$id_replica = $_GET['id_replica'];
$_SESSION['id_replica'] = $id_replica;
print_r($_SESSION['id_replica']);

//prima di ogni pagina verifico se utente è loggato
if(!isset($_SESSION['cod_cliente'])){
  header('Location:../index.php');
    exit;
  } else {
?>

<!DOCTYPE html>
<html>
<head>
<title>Prenotazione</title>
<link href="../assets/CSS2.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Inserisci i dati mancanti nella prenotazione</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="prenotazione_response.php"  method="POST">
				<label class="profile_details_text">Codice cliente: </label>
				<input type="text" name = 'cod_cliente' id = 'cod_cliente' class="form-control" value = "<?php echo $_SESSION['cod_cliente']?>" readonly class="form-control-plaintext">
				<label class="profile_details_text">Nome: </label>
							<input type="text" class="form-control" value = "<?php echo $_SESSION['user']['nome'];?>" readonly class="form-control-plaintext">
							<label class="profile_details_text">Cognome: </label>
							<input type="text" name="last_name" class="form-control" value="<?php echo $_SESSION['user']['cognome'] ?>" readonly class="form-control-plaintext">	
							<label class="profile_details_text">Codice replica: </label>
							<input type="text" name="cod_replica" id= "cod_replica" class="form-control" value="<?php echo $id_replica ?>" readonly class="form-control-plaintext">
							<?php $data = $pdo->query("SELECT * FROM repliche where cod_replica = '$id_replica'")->fetchAll();
					 foreach ($data as $row) :?>
						
							<label class="profile_details_text">Data replica: </label>
							<input type="text" name="data_replica" id="data_replica" class="form-control" value="<?php echo $row['data_replica'] ?>" readonly class="form-control-plaintext">
						<?php endforeach;?>
						<?php $data = $pdo->query("SELECT * FROM spettacoli where cod_spettacolo = '$id_spettacolo'")->fetchAll();
					 foreach ($data as $row) :?>
						
							<label class="profile_details_text">Titolo: </label>
							<input type="text" name="last_name" class="form-control" value="<?php echo $row['titolo'] ?>" readonly class="form-control-plaintext">
							<label class="profile_details_text">Autore: </label>
							<input type="text" name="last_name" class="form-control" value="<?php echo $row['autore'] ?>" readonly class="form-control-plaintext">
							<label class="profile_details_text">Regista: </label>
							<input type="text" name="last_name" class="form-control" value="<?php echo $row['regista'] ?>" readonly class="form-control-plaintext">
						<?php endforeach;?>
						<label class="profile_details_text">Quantità: </label>
							<input type="text" name="quantita" id="quantita" class="form-control" value="" required>
							<label class="profile_details_text">Metodo di pagamento: </label>
							<input type="text" class="form-control-plaintext" name="tipo_pagamento" list='tipo_pagamento' required>
							<datalist id="tipo_pagamento">
							<!-- <select class="form-control-plaintext" name="tipo_pagamento" required-->
							<!-- <option value="">--- Scegli un metodo di pagamento ---</option> -->
							<option value="Carta di credito">Carta di credito</option>
							<option value="Paypal">Paypal</option>
							<option value="Contanti">Contanti (in cassa)</option>
					 </datalist>
					 <!-- </select> -->
							<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" value="SIGNUP">
				</form>
			
					 </div>
					 </div>
					 </div>
					 </div>
					 <?php } ?>
</body>
</html>


