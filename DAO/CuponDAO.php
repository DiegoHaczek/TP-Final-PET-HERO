<?php
    namespace DAO;

    use DAO\ICuponDAO as ICuponDAO;
    use Models\Cupon as Cupon;
    use DAO\Connection as Connection;
    use \Exception as Exception;

    class CuponDAO implements ICuponDAO
    {
        private $CuponList = array();
        private $tableName = "cupon";

    
        public function Add(Cupon $Cupon)
        {

            try {
                $query = "INSERT INTO ".$this->tableName." (id_reserva, monto, estado) VALUES (:id_reserva, :monto, :estado);";
                
                
                $parameters["id_reserva"] = $Cupon->getReserva();
                $parameters["monto"] = $Cupon->getMonto();
                $parameters["estado"] = "Pendiente";

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Excepcion $ex){
                throw $ex;
            }
            
        }

        public function GetIdByReserva($reserva){

            try {

                $result = array();

                $query = "SELECT id_cupon from ".$this->tableName." WHERE id_reserva = :id_reserva;";
                
                
                $parameters["id_reserva"] = $reserva;

                $this->connection = Connection::GetInstance();

                $result=$this->connection->Execute($query,$parameters);

                $id=$result[0]["id_cupon"];
                //var_dump($id);
                return $id;

            } catch (Excepcion $ex){
                throw $ex;
            }

        }

        public function updateEstado ($idCupon,$estado){

            try {

                $query = "UPDATE ".$this->tableName." SET estado=:estado WHERE id_cupon=:id_cupon ;";
                
                $parameters["estado"] = $estado;
                $parameters["id_cupon"] = $idCupon;
               
                
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Excepcion $ex){
                throw $ex;
            }

        }

        public function GetAll()
        {
            try{
                $this->CuponList = array();
                
                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $row){
                    $Cupon = new Cupon();
                    $Cupon->setId($row["id_cupon"]);
                    $Cupon->setReserva($row["id_reserva"]);
                    $Cupon->setMonto($row["monto"]);
                    $Cupon->setEstado($row["estado"]);

                    array_push($this->CuponList, $Cupon);
                }

                return $this->CuponList;
            }catch(Exception $ex){
                return $ex;
            }
        }

        public function GetByIdGuardian($id){
            try{
                $this->DatosCuponList = array();

                $query = "select (select nombre from guardian where id_guardian = :id_guardian) as nombre_guardian, m.nombre as nombre_mascota, d.nombre as nombre_dueno, r.id_reserva, r.fecha_inicio as vencimiento, c.monto, c.estado from dueno d inner join reserva r on d.id_dueno=r.id_dueno inner join mascota m on r.id_mascota=m.id_mascota inner join cupon c on r.id_reserva = c.id_reserva where r.id_guardian=:id_guardian;";

                $parameters["id_guardian"] = $id;
                $DatosReserva = array();
                $resultSet=$this->connection->Execute($query,$parameters);

                foreach ($resultSet as $row){
                    
                    $DatosReserva["g.nombre"] = $row["nombre_guardian"];
                    $DatosReserva["m.nombre"] = $row["nombre_mascota"];
                    $DatosReserva["d.nombre"] = $row["nombre_dueno"];
                    $DatosReserva["r.id_reserva"] = $row["id_reserva"];
                    $DatosReserva["c.monto"] = $row["monto"];
                    $DatosReserva["r.estado"] = $row["estado"];
                    $DatosReserva["r.fecha_inicio"] = $row["vencimiento"];
                    array_push($this->DatosCuponList, $DatosReserva);
                }

                $this->connection = Connection::GetInstance();

                

                //var_dump($result);
               return $this->DatosCuponList;

            }catch(Exception $ex){
                return $ex;
            }
        }

        public function GetById($idCupon){
            try{

                $query = "select (select nombre from guardian where id_guardian = r.id_guardian) as nombre_guardian, m.nombre as nombre_mascota, d.nombre as nombre_dueno, r.id_reserva, r.fecha_inicio as vencimiento, c.monto, c.estado from dueno d inner join reserva r on d.id_dueno=r.id_dueno inner join mascota m on r.id_mascota=m.id_mascota inner join cupon c on r.id_reserva = c.id_reserva where c.id_cupon=:id_cupon;";

                $parameters["id_cupon"] = $idCupon;

                $DatosCupon = array();

                $this->connection = Connection::GetInstance();

                $result=$this->connection->Execute($query,$parameters);


                $DatosCupon["m.nombre"] = $result[0]["nombre_mascota"];
                $DatosCupon["g.nombre"] = $result[0]["nombre_guardian"];
                $DatosCupon["d.nombre"] = $result[0]["nombre_dueno"];
                $DatosCupon["r.id_reserva"] = $result[0]["id_reserva"];
                $DatosCupon["c.id_cupon"] = $idCupon;
                $DatosCupon["c.monto"] = $result[0]["monto"];
                $DatosCupon["r.estado"] = $result[0]["estado"];
                $DatosCupon["r.fecha_inicio"] = $result[0]["vencimiento"];
                
                
               return $DatosCupon;

            }catch(Exception $ex){
                return $ex;
            }
        }

        public function calcularMonto($idReserva){

            try {
                
                $query = "select ((datediff(r.fecha_final, r.fecha_inicio) + 1) * g.tarifa)/2 as monto from reserva r inner join guardian g on r.id_guardian = g.id_guardian where r.id_reserva = :id_reserva;";

                $parameters["id_reserva"] = $idReserva;

                $this->connection = Connection::GetInstance();

                $result=$this->connection->Execute($query,$parameters);

                //var_dump($result);
                $monto = explode(".", $result[0]["monto"]);

                return $monto[0];

            } catch (Exception $ex) {
                return $ex;
            }

        }

        public function encontrarMailDAO($idReserva){
            try {
                $query = "select d.email from dueno d inner join reserva r on d.id_dueno = r.id_dueno where r.id_reserva = :id_reserva;";

                $parameters["id_reserva"] = $idReserva;

                $this->connection = Connection::GetInstance();

                $result=$this->connection->Execute($query,$parameters);

                //var_dump($result[0]["email"]);

                return $result[0]["email"];
            } catch (Exception $ex) {
                return $ex;
            }
        }

        public function encontrarNombreDAO($idReserva){
            try {
                $query = "select d.nombre from dueno d inner join reserva r on d.id_dueno = r.id_dueno where r.id_reserva = :id_reserva;";

                $parameters["id_reserva"] = $idReserva;

                $this->connection = Connection::GetInstance();

                $result=$this->connection->Execute($query,$parameters);

                //var_dump($result[0]["email"]);

                return $result[0]["nombre"];
            } catch (Exception $ex) {
                return $ex;
            }
        }

        public function encontrarIdDuenoDAO($idCupon){
            try {
                $query = "select d.id_dueno from dueno d inner join reserva r on d.id_dueno = r.id_dueno inner join cupon c on c.id_reserva = r.id_reserva where c.id_cupon = :id_cupon;";

                $parameters["id_cupon"] = $idCupon;

                $this->connection = Connection::GetInstance();

                $result=$this->connection->Execute($query,$parameters);

                //var_dump($result[0]["email"]);

                return $result[0]["id_dueno"];
            } catch (Exception $ex) {
                return $ex;
            }
        }

    }
?>