<?php
    namespace DAO;

    use DAO\IMascotaDAO as IMascotaDAO;
    use Models\Mascota as Mascota;

    class MascotaDAO implements IMascotaDAO
    {
        private $MascotaList = array();
        private $tableName = "mascota";

        public function Add(Mascota $Mascota,$tmp_name,$tmp_nameFichamedica)
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

                $nombre_imagen= $Mascota->getFotoPerfil();
                $ruta="Upload/img".$nombre_imagen;

                move_uploaded_file($tmp_name,$ruta);
                $parameters["foto_perfil"] = $ruta;

                $nombre_imagenFichamedica= $Mascota->getFichaMedica();
                $rutaFichamedica="Upload/img".$nombre_imagenFichamedica;

                move_uploaded_file($tmp_nameFichamedica,$rutaFichamedica);
                $parameters["ficha_medica"] = $rutaFichamedica;

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

            } catch (PDOException $ex){
                return $ex;
            }
        }

        public function GetById($id){
            try{

                $query = "SELECT * FROM ".$this->tableName." WHERE id_mascota = :id_mascota;";

                $parameters["id_mascota"] = $id;

                $this->connection = Connection::GetInstance();

                $result=$this->connection->Execute($query,$parameters);

                $Mascota = new Mascota();
                $Mascota->setId($result[0]["id_mascota"]);
                $Mascota->setNombre($result[0]["nombre"]);
                $Mascota->setEdad($result[0]["edad"]);
                $Mascota->setFotoPerfil($result[0]["foto_perfil"]);
                $Mascota->setFichaMedica($result[0]["ficha_medica"]);
                $Mascota->setTamano($result[0]["tamano"]);
                $Mascota->setRaza($result[0]["raza"]);
                $Mascota->setEspecie($result[0]["especie"]);
                $Mascota->setIndicaciones($result[0]["indicaciones"]);
                $Mascota->setIdDueno($result[0]["id_dueno"]);

                return $Mascota;
            }catch(Exception $ex){
                return $ex;
            }
        }

        public function GetPetProfile($id){

            try{

                $query = "SELECT m.*,d.nombre as nombre_dueno,d.email FROM mascota as m, dueno as d WHERE (m.id_dueno=d.id_dueno) and (m.id_mascota=:id_mascota);";

                $parameters["id_mascota"] = $id;

                $this->connection = Connection::GetInstance();

                $result=$this->connection->Execute($query,$parameters);

                $perfilMascota = array();
                $perfilMascota ['nombreMascota'] = $result[0]["nombre"];
                $perfilMascota ['edad'] = $result[0]["edad"];
                $perfilMascota ['foto_perfil'] = $result[0]["foto_perfil"];
                $perfilMascota ['ficha_medica'] = $result[0]["ficha_medica"];
                $perfilMascota ['tamano'] = $result[0]["tamano"];
                $perfilMascota ['raza'] = $result[0]["raza"];
                $perfilMascota ['indicaciones'] = $result[0]["indicaciones"];
                $perfilMascota ['nombre_dueno'] = $result[0]["nombre_dueno"];
                $perfilMascota ['email'] = $result[0]["email"];

                return $perfilMascota;
                
            }catch(Exception $ex){
                return $ex;
            }
        }

        public function GetByIdDueno($idDueno){
            try{
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_DUENO = :id_dueno;";

                $parameters["id_dueno"] = $idDueno;

                $this->connection = Connection::GetInstance();

                $resultSet=$this->connection->Execute($query,$parameters);

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

        public function ContarMascotas($idDueno){
            try{

                $query = "select count(*) from ".$this->tableName." Where id_dueno = :id_dueno;";

                $parameters["id_dueno"] = $idDueno;

                $this->connection = Connection::GetInstance();

                $result=$this->connection->Execute($query,$parameters);


                return $result[0];
            }catch(Exception $ex){
                return $ex;
            }
        }
    }
?>