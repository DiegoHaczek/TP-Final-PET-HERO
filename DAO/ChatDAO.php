<?php
    namespace DAO;

    use DAO\IChatDAO as IChatDAO;
    use Models\Chat as Chat;
    use DAO\Connection as Connection;
    use \Exception as Exception;

    class ChatDAO implements IChatDAO
    {
        private $ChatList = array();
        private $tableName = "chat";

    
        public function Add(Chat $chat)
        {

            try {
                $query = "INSERT INTO ".$this->tableName." (id_reserva, mensaje, emisor) VALUES (:id_reserva, :mensaje, :emisor);";
                
                
                $parameters["id_reserva"] = $chat->getIdReserva();
                $parameters["mensaje"] = $chat->getMensaje();
                $parameters["emisor"] =  $chat->getEmisor();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Excepcion $ex){
                throw $ex;
            }
            
        }

        public function GetChatListDueno($idDueno){

            try {

                $result=array();

                $query = "select g.id_guardian,g.nombre,g.foto_perfil,r.id_reserva from guardian g inner join reserva r on g.id_guardian=r.id_guardian 
                where g.id_guardian in (select distinct id_guardian from reserva where (id_dueno = :id_dueno and estado='Confirmada'))
                and r.id_reserva in(select id_reserva from reserva where(id_dueno = :id_dueno and estado='Confirmada'));";
                
                $parameters["id_dueno"] = $idDueno;
                
                $this->connection = Connection::GetInstance();

                $result=$this->connection->Execute($query,$parameters);

                return $result;

            } catch (Excepcion $ex){
                throw $ex;
            }

        }


        public function GetChatListGuardian($idGuardian){

            try {

                $result=array();

                $query = "select d.id_dueno,d.nombre,d.foto_perfil,r.id_reserva from dueno d inner join reserva r on d.id_dueno=r.id_dueno
                where d.id_dueno in (select distinct id_dueno from reserva where (id_guardian = :id_guardian and estado='Confirmada'))
                and r.id_reserva in(select id_reserva from reserva where(id_guardian = :id_guardian and estado='Confirmada'));";
                
                $parameters["id_guardian"] = $idGuardian;
                
                $this->connection = Connection::GetInstance();

                $result=$this->connection->Execute($query,$parameters);

                return $result;

            } catch (Excepcion $ex){
                throw $ex;
            }

        }


        public function GetIdByReserva($reserva){

            try {

            } catch (Excepcion $ex){
                throw $ex;
            }

        }

        public function GetMensajes($idReserva){

            try {

                $result=array();

                $query = "select mensaje, emisor from chat where id_reserva= :id_reserva;";
                
                $parameters["id_reserva"] = $idReserva;
                
                $this->connection = Connection::GetInstance();

                $result=$this->connection->Execute($query,$parameters);

                return $result;

            } catch (Excepcion $ex){
                throw $ex;
            }
        }



        public function GetAll()
        {
            try{
               
            }catch(Exception $ex){
                return $ex;
            }
        }


    }
?>