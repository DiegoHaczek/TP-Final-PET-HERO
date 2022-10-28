<?php
    namespace DAO;

    use DAO\IMascotaDAO as IMascotaDAO;
    use Models\Mascota as Mascota;

    class MascotaDAO implements IMascotaDAO
    {
        private $MascotaList = array();
        private $tableName = "mascota";

        public function Add(Mascota $Mascota)
        {
            try {
                $query = "INSERT INTO ".$this->tableName." (nombre, edad, tamano, raza, especie, indicaciones, id_dueno, foto_perfil, ficha_medica) VALUES (:nombre, :edad, :tamano, :raza, :especie, :indicaciones, :id_dueno, :foto_perfil, :ficha_medica);";
                
                
                $parameters["nombre"] = $Mascota->getNombre();
                $parameters["edad"] = $Mascota->getEdad();
                $parameters["tamano"] = $Mascota->getTamano();
                $parameters["raza"] = $Mascota->getRaza();
                $parameters["especie"] = $Mascota->getEspecie();
                $parameters["indicaciones"] = $Mascota->getIndicaciones();
                $parameters["id_dueno"] = $_SESSION["id"];
                $parameters["foto_perfil"] = $Mascota->getFotoPerfil();
                $parameters["ficha_medica"] = $Mascota->getFichaMedica();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Excepcion $ex){
                throw $ex;
            }
        }

        public function GetAll()
        {
            try{
                $this->MascotaList = array();
                
                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $row){
                    $Mascota = new Mascota();
                    $Mascota->setId($row["id_mascota"]);
                    $Mascota->setNombre($row["nombre"]);
                    $Mascota->setEdad($row["edad"]);
                    $Mascota->setFotoPerfil($row["foto_perfil"]);
                    $Mascota->setFichaMedica($row["ficha_medica"]);
                    $Mascota->setTamano($row["tamano"]);
                    $Mascota->setRaza($row["raza"]);
                    $Mascota->setEspecie($row["especie"]);
                    $Mascota->setIndicaciones($row["indicaciones"]);
                    $Mascota->setIdDueno($row["id_dueno"]);


                    array_push($this->MascotaList, $Mascota);
                }

                return $this->MascotaList;
            }catch(Exception $ex){
                return $ex;
            }
        }

        public function Remove($id)
        {            
            try {
                $query = "delete from ".$this->tableName." WHERE id_mascota = :id_mascota;";

                $parameters["id_mascota"] = $id;

                $this->connection = Connection::GetInstance();

                $result=$this->connection->ExecuteNonQuery($query,$parameters);

                //var_dump($id);
            } catch (Excepcion $ex){
                throw $ex;
            }
        }

        public function GetById($id){
            try{
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_MASCOTA = :id_mascota;";

                $parameters["id_mascota"] = $id;

                $this->connection = Connection::GetInstance();

                $result=$this->connection->Execute($query,$parameters);

                //var_dump($result);
                $Mascota = new Mascota();
                $Mascota->setId($row[0]["id_mascota"]);
                $Mascota->setNombre($row[0]["nombre"]);
                $Mascota->setEdad($row[0]["edad"]);
                $Mascota->setFotoPerfil($row[0]["foto_perfil"]);
                $Mascota->setFichaMedica($row[0]["ficha_medica"]);
                $Mascota->setTamano($row[0]["tamano"]);
                $Mascota->setRaza($row[0]["raza"]);
                $Mascota->setEspecie($row[0]["especie"]);
                $Mascota->setIndicaciones($row[0]["indicaciones"]);
                $Mascota->setIdDueno($row[0]["id_dueno"]);

                return $Mascota;
            }catch(Exception $ex){
                return $ex;
            }
        }

        public function GetByIdDueno($idDueno){
            try{
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_DUENO = :id_dueno;";

                $parameters["id_dueno"] = $idDueno;

                $this->connection = Connection::GetInstance();

                $result=$this->connection->Execute($query,$parameters);

                //var_dump($result);
                $Mascota = new Mascota();
                $Mascota->setId($row[0]["id_mascota"]);
                $Mascota->setNombre($row[0]["nombre"]);
                $Mascota->setEdad($row[0]["edad"]);
                $Mascota->setFotoPerfil($row[0]["foto_perfil"]);
                $Mascota->setFichaMedica($row[0]["ficha_medica"]);
                $Mascota->setTamano($row[0]["tamano"]);
                $Mascota->setRaza($row[0]["raza"]);
                $Mascota->setEspecie($row[0]["especie"]);
                $Mascota->setIndicaciones($row[0]["indicaciones"]);
                $Mascota->setIdDueno($row[0]["id_dueno"]);

                return $Mascota;
            }catch(Exception $ex){
                return $ex;
            }
        }
    }
?>