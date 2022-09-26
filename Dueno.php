<?php

    include_once 'clases.php';

    class Dueno extends Usuario{

        public function __construct ($userName, $mail, $contra){
            parent::__construct($userName, $mail,$contra);
        }



    }

    $due = new dueno ("os","aas","tomas");

    $due->mostrarUsuario();

?>