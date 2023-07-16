<!-- creo un link nell’ultima pagina che mi porta alla pagina di logout.php dove metto il messaggio di addio -->
<?php
session_start();
// elimina le variabili di sessione impostate
$_SESSION = array();
// elimina la sessione
session_destroy();
echo "Disconnessione riuscita, arrivederci!"
?>