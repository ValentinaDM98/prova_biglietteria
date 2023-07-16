<?php
include "inc/config.php";

//inizio sessione
session_start();

if (isset($_POST['cod_cliente'])) {
    $cod_cliente = $_POST['cod_cliente'] ?? '';   
        $query = "SELECT * FROM clienti WHERE cod_cliente = :cod_cliente";
        $check = $pdo->prepare($query);
        $check->bindParam(':cod_cliente', $cod_cliente, PDO::PARAM_INT);
        $check->execute();
        $user = $check->fetch(PDO::FETCH_ASSOC);
        // print_r($query);
        
        if (($user === false) || ($user['cod_cliente'] === false)) {
          echo "Codice cliente errato";
        } else {
            session_regenerate_id();
            //setto i dati che deve memorizzare la sessione
            $_SESSION['session_id'] = session_id();
            $_SESSION['cod_cliente'] = $user['cod_cliente'];    
            $_SESSION['user'] = $user;
            // $_SESSION['nome'] = $user['nome'];
            header('Location: pages/dashboard.php');
           
        }}   

// ALTRI ESEMPI DI LOGIN PRENDENDO I DATI DA FORM DI REGISTRAZIONE E NON
//Vedi: https://guidaphp.it/tutorial/form-registrazione-login-php-mysql 
?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Homepage</title>
            <link href="assets/CSS.css" rel="stylesheet" type="text/css">
            <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
        </head>
        <body>
        <div class="form-main">
              <div class="main-wrapper">
                <h2 class="form-head">Biglietteria</h2>
                <form class="form-wrapper" action="index.php" method="post">
                  <div class="form-card">
                  <!-- <label for="cod_cliente" class="form-label"></label>
                      <input type="number" class="form-control" name = "cod_cliente" id="cod_cliente"> -->
                    <input
                      class="form-input"
                      type="text"
                      name="cod_cliente"
                      required="required"
                      id="cod_cliente"
                    />
                    <label class="form-label" for="full_name">Codice cliente</label>
                  </div>

                  <!-- <div class="form-card">
                    <input
                      class="form-input"
                      type="email"
                      name="email"
                      required="required"
                    />
                    <label class="form-label" for="email">Email</label>
                  </div>

                  <div class="form-card">
                    <input
                      class="form-input"
                      type="number"
                      name="phone_number"
                      required="required"
                    />
                    <label class="form-label" for="phone_number">Phone number</label>
                  </div>

                  <div class="form-card">
                    <textarea
                      class="form-textarea"
                      maxlength="420"
                      rows="3"
                      name="phone_number"
                      required="required"
                    ></textarea>
                    <label class="form-textarea-label" for="phone_number"
                      >Address</label
                    >
                  </div> -->
                
                  <div class="btn-wrap">
                    <button> Accedi</button>
                  </div>
                </form>
              </div>
            </div>
            </body>
        </html>
