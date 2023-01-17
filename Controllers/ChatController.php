<?php
    namespace Controllers;

    
    use Exception;
    use Throwable;
    use Controllers\HomeController as HomeController;


    class ChatController
    {
        private $ChatDAO;

        public function mostrarChat($alert=""){

            require_once(VIEWS_PATH."chat.php");

        }

        

    }


    
?>