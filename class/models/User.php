<?php
namespace models;
include "inc/config.php";

class User
{
    public $cod_cliente;
    public $nome;
    public $cognome;
    public $telefono;
    public $email;
   

    //$class_array array associativo che contiene tutte le informazioni degli attributi dell'oggetto 
    //cliente che verrà creato.
    public static function arrayToUser(array $class_array):User
    {
        $user = new User;
        foreach ($class_array as $class_attribute => $value_of_class_attribute) {
            $user->$class_attribute = $value_of_class_attribute;
        }
        return $user;
    }
}
