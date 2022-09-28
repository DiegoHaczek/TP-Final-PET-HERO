<?php
        namespace Models;

    include_once 'Usuario.php';
    include_once 'Perfil.php';




    class Dueño extends Usuario{
    

        public function __construct ($userName, $mail, $contra){
            parent::__construct($userName, $mail,$contra);
        }



    }


?>