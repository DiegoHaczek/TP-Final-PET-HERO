<?php
    namespace DAO;

    use DAO\IComentarioDAO as IComentarioDAO;
    use Models\Comentario as Comentario;
    use DAO\Connection as Connection;
    use \Exception as Exception;

    class ComentarioDAO implements IComentarioDAO
    {
        private $ComentarioList = array();
        private $tableName = "Comentario";

    
        public function Add(Comentario $Comentario)
        {

            try {
                $query = "INSERT INTO ".$this->tableName." (id_reserva, puntaje, mensaje, fecha) VALUES (:id_reserva, :puntaje, :mensaje, :fecha);";
                
                $parameters["id_reserva"] = $Comentario->getReserva();
                $parameters["puntaje"] = $Comentario->getPuntaje();
                $parameters["mensaje"] = $Comentario->getMensaje();
                $parameters["fecha"] = $Comentario->getFecha();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Excepcion $ex){
                throw $ex;
            }
            
        }

        public function GetAll()
        {
            try{
                $this->ComentarioList = array();
                
                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $row){
                    $Comentario = new Comentario();
                    $Comentario->setId($row["id_comentario"]);
                    $Comentario->setReserva($row["id_reserva"]);
                    $Comentario->setPuntaje($row["puntaje"]);
                    $Comentario->setMensaje($row["mensaje"]);
                    $Comentario->setFecha($row["fecha"]);

                    array_push($this->ComentarioList, $Comentario);
                }

                return $this->ComentarioList;
            }catch(Exception $ex){
                return $ex;
            }
        }

        public function GetByIdGuardian($idGuardian){
            try{
                $this->DatosComentarioList = array();

                $query = "select d.nombre as nombre_dueno, d.foto_perfil as foto_perfil, g.id_guardian as id_guardian, c.mensaje as mensaje, c.puntaje as puntaje, c.fecha as fecha
                from comentarios c inner join reserva r on c.id_reserva = r.id_reserva
                inner join dueno d on r.id_dueno = d.id_dueno
                inner join guardian g on r.id_guardian = g.id_guardian
                where g.id_guardian = :id_guardian;";

                $parameters["id_guardian"] = $idGuardian;
                $DatosComentario = array();

                $this->connection = Connection::GetInstance();
                $resultSet=$this->connection->Execute($query,$parameters);

                foreach ($resultSet as $row){
                    
                    $DatosComentario["d.nombre"] = $row["nombre_dueno"];
                    $DatosComentario["g.id_guardian"] = $row["id_guardian"];
                    $DatosComentario["c.mensaje"] = $row["mensaje"];
                    $DatosComentario["c.puntaje"] = $row["puntaje"];
                    $DatosComentario["c.fecha"] = $row["fecha"];
                    $DatosComentario["d.foto_perfil"] = $row["foto_perfil"];

                    array_push($this->DatosComentarioList, $DatosComentario);
                }

               return $this->DatosComentarioList;

            }catch(Exception $ex){
                return $ex;
            }
        }
    }
?>