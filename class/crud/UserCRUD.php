<?php
namespace crud;
include "./class/config.php";
use Exception;
use models\User;
use PDO;

class UserCRUD
{

    // public function create(User $user)
    // {
    //     $query = "INSERT INTO user ( first_name, last_name, birthday, birth_city, regione_id, provincia_id, gender, username, password)
    //     -- //i parametri hanno sempre :davanti
    //              VALUES (:first_name,:last_name,:birthday,:birth_city,:regione_id,:provincia_id,:gender,:username,:password)
    //             ";
    //     $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
    //     $stm = $conn->prepare($query);
    //     // ci aspettiamo una stringa quindi PARAM_STR o un intero PARAM_INT
    //     //bind = associa il valore al parametro
    //     $stm->bindValue(':first_name', $user->first_name, \PDO::PARAM_STR);
    //     $stm->bindValue(':last_name', $user->last_name, \PDO::PARAM_STR);
    //     $stm->bindValue(':birthday', $user->birthday, \PDO::PARAM_STR);
    //     $stm->bindValue(':birth_city', $user->birth_city, \PDO::PARAM_STR);
    //     $stm->bindValue(':regione_id', $user->regione_id, \PDO::PARAM_INT);
    //     $stm->bindValue(':provincia_id', $user->provincia_id, \PDO::PARAM_INT);
    //     $stm->bindValue(':gender', $user->gender, \PDO::PARAM_STR);
    //     $stm->bindValue(':username', $user->username, \PDO::PARAM_STR);
    //     $stm->bindValue(':password', md5($user->password), \PDO::PARAM_STR);
    //     // dopo aver associato i valori ai parametri possiamo eseguire la query
    //     $stm->execute();
    //     //id oggetto inserito
    //     return $conn->lastInsertId();
    // }

    // public function update(User $user)
    // {
        

    //     if(!$this->read($user->user_id)){
    //         throw new Exception("utente inesistente", 404);
    //     }

    //     $query = "UPDATE user
    //             SET first_name = :first_name, 
    //                 last_name =  :last_name,
    //                 birthday =  :birthday,
    //                 birth_city =  :birth_city,
    //                 regione_id =  :regione_id,
    //                 provincia_id =  :provincia_id,
    //                 gender =  :gender
    //     WHERE user_id = :user_id;";

    //     $conn = new \PDO(DB_DSN,DB_USER,DB_PASSWORD);
    //     $stm = $conn->prepare($query);
    //     $stm->bindValue(':first_name',$user->first_name,\PDO::PARAM_STR);
    //     $stm->bindValue(':last_name',$user->last_name,\PDO::PARAM_STR);
    //     $stm->bindValue(':birthday',$user->birthday,\PDO::PARAM_STR);
    //     $stm->bindValue(':birth_city',$user->birth_city,\PDO::PARAM_STR);
    //     $stm->bindValue(':regione_id',$user->regione_id,\PDO::PARAM_INT);
    //     $stm->bindValue(':provincia_id',$user->provincia_id,\PDO::PARAM_INT);
    //     $stm->bindValue(':gender',$user->gender,\PDO::PARAM_STR);
    //     $stm->bindValue(':user_id',$user->user_id,\PDO::PARAM_INT);
 
    //     $stm->execute();
    //     return $conn->lastInsertId();
    // }

    //leggo le informazioni su tutti gli utenti
    //la funzione può restituire un utente, un array o un boolean
    function read(int $cod_cliente = null)
    {
        if (!is_null($cod_cliente)) {
            //variante del read passando user_id
            $query = "SELECT * FROM user WHERE cod_cliente = :cod_cliente;";
            $check = $pdo->prepare($query);
            $check->bindParam(':cod_cliente', $cod_cliente, PDO::PARAM_INT);
            $check->execute();
            //ATTENZIONE devo specificare fetch_class perchè altrimenti mi ripete
            //due volte le informazioni (di default è fetch both)
            //devo specificare il nome della classe: 'models\User'
            //oppure con User::class chiedo alla classe il nome per esteso 
            $user = $check->fetchAll(PDO::FETCH_CLASS, User::class);
        }
           
    }



    // public function delete($user_id)
    // {
    //     $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
    //     $query = "DELETE FROM user where user_id = :user_id";
    //     $stm =  $conn->prepare($query);
    //     $stm->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    //     //non si fa fetchAll perchè non ho un risultato
    //     $stm->execute();
    //     //dato da restituire: mi dice cos'ho cancellato
    //     return $stm->rowCount();
    // }
}
