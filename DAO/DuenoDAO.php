<?php
    namespace DAO;

    use DAO\IDuenoDAO as IDuenoDAO;
    use Models\Dueno as Dueno;
    use DAO\Connection as Connection;
    use \Exception as Exception;

    class DuenoDAO implements IDuenoDAO
    {
        private $DuenoList = array();
        private $tableName = "dueno";

    
        public function Add(Dueno $Dueno)
        {

            try {
                $query = "INSERT INTO ".$this->tableName." (email, password) VALUES (:email, :password);";
                
                
                $parameters["email"] = $Dueno->getMail();
                $parameters["password"] = $Dueno->getPassWord();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Excepcion $ex){
                throw $ex;
            }
            
        }

        public function EditProfile(Dueno $PerfilDueno,$tmp_name){

            try {

                $query = "UPDATE ".$this->tableName." SET nombre=:nombre, apellido=:apellido, edad=:edad, foto_perfil=:foto_perfil WHERE id_dueno = ".$_SESSION["id"].";";
                
                $parameters["nombre"] = $PerfilDueno->getNombre();
                $parameters["apellido"] = $PerfilDueno->getApellido();
                $parameters["edad"] = $PerfilDueno->getEdad();


                if($PerfilDueno->getFotoPerfil()){
                    
                    $nombre_imagen= $PerfilDueno->getFotoPerfil();
                    $ruta="Upload/img".$nombre_imagen;
                    move_uploaded_file($tmp_name,$ruta);
                }
                    else{$ruta=null;}
    
                    $parameters["foto_perfil"] = $ruta;
    
                    $_SESSION["fotoPerfil"] =  $ruta;

                
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Excepcion $ex){
                throw $ex;
            }
        }

        public function GetIdByMail($mail){

            try {

                $result = array();

                $query = "SELECT id_dueno from ".$this->tableName." WHERE EMAIL = :email;";
                
                
                $parameters["email"] = $mail;

                $this->connection = Connection::GetInstance();

                $result=$this->connection->Execute($query,$parameters);

                $id=$result[0]["id_dueno"];
                //var_dump($id);
                return $id;

            } catch (Excepcion $ex){
                throw $ex;
            }

        }

        public function Remove($id)
        {            
            try {
                $query = "delete from ".$this->tableName." WHERE id_dueno = :id_dueno;";

                $parameters["id_dueno"] = $id;

                $this->connection = Connection::GetInstance();

                $result=$this->connection->ExecuteNonQuery($query,$parameters);

                //var_dump($id);
            } catch (Excepcion $ex){
                throw $ex;
            }
        }

        public function GetAll()
        {
            try{
                $this->DuenoList = array();
                
                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $row){
                    $Dueno = new Dueno();
                    $Dueno->setId($row["id_dueno"]);
                    $Dueno->setMail($row["email"]);
                    $Dueno->setNombre($row["nombre"]);
                    $Dueno->setApellido($row["apellido"]);
                    $Dueno->setEdad($row["edad"]);
                    $Dueno->setFotoPerfil($row["foto_perfil"]);
                    $Dueno->setPassWord($row["password"]);

                    array_push($this->DuenoList, $Dueno);
                }

                return $this->DuenoList;
            }catch(Exception $ex){
                return $ex;
            }
        }

        /*private function SaveData()
        {
            /*$arrayToEncode = array();

            foreach($this->DuenoList as $Dueno)
            {
                $valuesArray = array();
                $valuesArray["id"] = $Dueno->getId();
                $valuesArray["password"] = $Dueno->getPassWord();
                $valuesArray["mail"] = $Dueno->getMail();
                $valuesArray["nombre"] = $Dueno->getNombre();
                $valuesArray["apellido"] = $Dueno->getApellido();
                $valuesArray["edad"] = $Dueno->getEdad();
                $valuesArray["fotoperfil"] = $Dueno->getFotoPerfil();
                $valuesArray["mascotas"] = $Dueno->getMascotas();
                $valuesArray["historial"] = $Dueno->getHistorial();
                array_push($arrayToEncode, $valuesArray);
            }

            $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

            file_put_contents($this->fileName, $fileContent);

            try {
                $arrayToEncode = array();

                $query = "INSERT INTO ".$this->tableName." (email, password, nombre, apellido, edad, fotoperfil) VALUES (:email, :password, :nombre, :apellido, :edad, :foto_perfil);";

                foreach ($this->DuenoList as $Dueno) {
                    
                }

            } catch (Exception $ex) {
                return $ex;
            }
        }*/

        public function GetById($id){
            try{
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_DUENO = :id_dueno;";

                $parameters["id_dueno"] = $id;

                $this->connection = Connection::GetInstance();

                $result=$this->connection->Execute($query,$parameters);

                //var_dump($result);
                $Dueno = new Dueno();
                $Dueno->setId($result[0]["id_dueno"]);
                $Dueno->setMail($result[0]["email"]);
                $Dueno->setNombre($result[0]["nombre"]);
                $Dueno->setApellido($result[0]["apellido"]);
                $Dueno->setEdad($result[0]["edad"]);
                $Dueno->setFotoPerfil($result[0]["foto_perfil"]);
                $Dueno->setPassWord($result[0]["password"]);

                return $Dueno;
            }catch(Exception $ex){
                return $ex;
            }
        }

        public function GetByMail($mail)
        {
            try{
                $query = "SELECT * FROM ".$this->tableName." WHERE email = :email;";

                $parameters["email"] = $mail;
                //var_dump($mail);
                $this->connection = Connection::GetInstance();

                $result=$this->connection->Execute($query,$parameters);

                //var_dump($result);
                if (isset($result[0])) {
                    $Dueno = new Dueno();
                    $Dueno->setId($result[0]["id_dueno"]);
                    $Dueno->setMail($result[0]["email"]);
                    $Dueno->setNombre($result[0]["nombre"]);
                    $Dueno->setApellido($result[0]["apellido"]);
                    $Dueno->setEdad($result[0]["edad"]);
                    $Dueno->setFotoPerfil($result[0]["foto_perfil"]);
                    $Dueno->setPassWord($result[0]["password"]);
                } else {
                    $Dueno = null;
                }
                
                return $Dueno;
            }catch(Exception $ex){
                return $ex;
            }
        }
    }
?>