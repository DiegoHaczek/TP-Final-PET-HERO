<?php
    include_once 'clases.php';

    class Guardian extends Usuario {
        public function __construct ($userName, $mail, $contra){
            parent::__construct($userName, $mail,$contra);
        }

    }




?>