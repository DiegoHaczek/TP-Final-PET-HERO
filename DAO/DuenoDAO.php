<?php
    namespace DAO;

    use DAO\IDuenoDAO as IDuenoDAO;
    use Models\Dueno as Dueno;
    use DAO\Connection as Connection;
    use \Exception as Exception;

    class DuenoDAO implements IDuenoDAO
    {
        private $DuenoList = array();
        private $fileName = ROOT."Data/Duenos.json";
        private $tableName = "dueno";

    
        public function Add(Dueno $Dueno)
        {
            /*$this->RetrieveData();
            
            $Dueno->setId($this->GetNextId());
            array_push($this->DuenoList, $Dueno);
            $this->SaveData();*/

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

        public function EditProfile(Dueno $PerfilDueno){

            try {

                $query = "UPDATE ".$this->tableName." SET nombre=:nombre, apellido=:apellido, edad=:edad, foto_perfil=:foto_perfil WHERE id_dueno = ".$_SESSION["id"].";";
                
                $parameters["nombre"] = $PerfilDueno->getNombre();
                $parameters["apellido"] = $PerfilDueno->getApellido();
                $parameters["edad"] = $PerfilDueno->getEdad();
                $parameters["foto_perfil"] = $PerfilDueno->getFotoPerfil();
                

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Excepcion $ex){
                throw $ex;
            }


            /*
            $this->RetrieveData();

            $id = count ($this->DuenoList); ///cuenta los elementos que hay y calcula el ultimo id,
                                               ///por ahora funciona, pero cuando se puedan borrar usuarios, no van a coincidir, 
                                              ///o el usuario puede registrarse y salir sin completar el perfil y generaria problemas tmb

            foreach ($this->DuenoList as $Dueno){

                if ($Dueno->getId()==$id){

                    $Dueno->setNombre($PerfilDueno->getNombre());
                    $Dueno->setApellido($PerfilDueno->getApellido());
                    $Dueno->setEdad($PerfilDueno->getEdad());
                    $Dueno->setFotoPerfil($PerfilDueno->getFotoPerfil());
                    $Dueno->setMascotas($PerfilDueno->getMascotas());
                    $Dueno->setHistorial($PerfilDueno->getHistorial());

                }
            }

            $this->SaveData();*/
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

        

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->DuenoList;
        }

        public function Remove($id)
        {            
            $this->RetrieveData();
            
            $this->DuenoList = array_filter($this->DuenoList, function($Dueno) use($id){                
                return $Dueno->getId() != $id;
            });
            
            $this->SaveData();
        }

        private function RetrieveData()
        {
             $this->DuenoList = array();

             if(file_exists($this->fileName))
             {
                 $jsonToDecode = file_get_contents($this->fileName);

                 $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();
                 
                 foreach($contentArray as $content)
                 {
                     $Dueno = new Dueno();
                     $Dueno->setId($content["id"]);
                     $Dueno->setPassWord($content["password"]);
                     $Dueno->setMail($content["mail"]);
                     $Dueno->setNombre($content["nombre"]);
                     $Dueno->setApellido($content["apellido"]);
                     $Dueno->setEdad($content["edad"]);
                     $Dueno->setFotoPerfil($content["fotoperfil"]);
                     $Dueno->setMascotas($content["mascotas"]);
                     $Dueno->setHistorial($content["historial"]);

                     array_push($this->DuenoList, $Dueno);
                 }
             }
        }

        private function SaveData()
        {
            $arrayToEncode = array();

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
        }

        public function GetByName($name)
        {
            $this->RetrieveData();

            foreach ($this->DuenoList as $dueno) {
                if ($dueno->getNombre() == $name) {
                    return $dueno;
                }
            }

            return null;
        }

        public function GetByMail($mail)
        {
            $this->RetrieveData();

            foreach ($this->DuenoList as $dueno) {
                if ($dueno->getMail() == $mail) {
                    return $dueno;
                }
            }

            return null;
        }

        private function GetNextId()
        {
            $id = 0;

            foreach($this->DuenoList as $Dueno)
            {
                $id = ($Dueno->getId() > $id) ? $Dueno->getId() : $id;
            }

            return $id + 1;
        }
    }
?>