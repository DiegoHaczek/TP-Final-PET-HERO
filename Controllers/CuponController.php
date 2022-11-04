<?php
    namespace Controllers;

    use Models\Cupon as Cupon;
    use DAO\CuponDAO as CuponDAO;

    class CuponController
    {
        private $CuponDAO;

        public function __construct()
        {
            $this->CuponDAO = new CuponDAO();
        }

        public function Add($idReserva)
        {
            $Cupon = new Cupon();
            $Cupon->setReserva($idReserva);
            $Cupon->setMonto($this->CuponDAO->calcularMonto($idReserva));

            $this->CuponDAO->Add($Cupon);
        }  

        public function updateEstado($idCupon){

            $this->CuponDAO->updateEstado($idCupon,"Pagado");

            $alert=['tipo'=>"exito",'mensaje'=>"Reserva Abonada"];

            $controllerHome = new HomeController();
            $controllerHome->index($alert);

        }      
    

        public function verCupon($idCupon,$alert=""){

            $datosCupon =$this->CuponDAO->GetbyId($idCupon);

            //var_dump($datosCupon);
        
            require_once(VIEWS_PATH."vercupon.php");
        }

    }

    
?>