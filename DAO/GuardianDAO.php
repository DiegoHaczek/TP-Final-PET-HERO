<?php
    namespace DAO;

    use DAO\IGuardianDAO as IGuardianDAO;
    use Models\Guardian as Guardian;

    class GuardianDAO implements IGuardianDAO
    {
        private $GuardianList = array();
        private $fileName = ROOT."Data/Guardianes.json";

        public function comprobarUser(Guardian $Guardian)
        {
            $this->RetrieveData();

            foreach ($this->GuardianList as $UnGuardian) {
                if ($Guardian->getUserName() == $UnGuardian->getUserName()) {
                    return true;
                }
            }

            return false;
        }

        public function comprobarMail(Guardian $Guardian)
        {
            $this->RetrieveData();

            foreach ($this->GuardianList as $UnGuardian) {
                if ($Guardian->getMail() == $UnGuardian->getMail()) {
                    return true;
                }
            }

            return false;
        }
        
        public function Add(Guardian $Guardian)
        {
            $this->RetrieveData();
            
            $Guardian->setId($this->GetNextId());
            
            if (!$this->comprobarUser($Guardian) ) {
                if (!$this->comprobarMail($Guardian)) {
                    array_push($this->GuardianList, $Guardian);

                    $this->SaveData();
                } else {
                    echo "<script>alert('¡La dirección de mail ya está en uso!')</script>";
                    require_once(VIEWS_PATH."home.php");
                }
            } else {
                echo "<script>alert('¡El usuario ya existe!')</script>";
                require_once(VIEWS_PATH."home.php");
            }
        }

        public function EditProfile(Guardian $PerfilGuardian){

            $this->RetrieveData();

            $id = count ($this->GuardianList); ///cuenta los elementos que hay y calcula el ultimo id,
                                               ///por ahora funciona, pero cuando se puedan borrar usuarios, no van a coincidir, 
                                              ///o el usuario puede registrarse y salir sin completar el perfil y generaria problemas tmb

            foreach ($this->GuardianList as $guardian){

                if ($guardian->getId()==$id){

                    $guardian->setNombre($PerfilGuardian->getNombre());
                    $guardian->setApellido($PerfilGuardian->getApellido());
                    $guardian->setEdad($PerfilGuardian->getEdad());
                    $guardian->setFotoPerfil($PerfilGuardian->getFotoPerfil());
                    $guardian->setRemuneracion($PerfilGuardian->getRemuneracion());
                    $guardian->setTipoPerro($PerfilGuardian->getTipoPerro());
                    $guardian->setDisponibilidad($PerfilGuardian->getDisponibilidad());

                }
            }

            $this->SaveData();

        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->GuardianList;
        }

        public function Remove($id)
        {            
            $this->RetrieveData();
            
            $this->GuardianList = array_filter($this->GuardianList, function($Guardian) use($id){                
                return $Guardian->getId() != $id;
            });
            
            $this->SaveData();
        }

        private function RetrieveData()
        {
             $this->GuardianList = array();

             if(file_exists($this->fileName))
             {
                 $jsonToDecode = file_get_contents($this->fileName);

                 $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();
                 
                 foreach($contentArray as $content)
                 {
                     $Guardian = new Guardian();
                     $Guardian->setId($content["id"]);
                     $Guardian->setUserName($content["username"]);
                     $Guardian->setPassWord($content["password"]);
                     $Guardian->setMail($content["mail"]);
                     $Guardian->setNombre($content["nombre"]);
                     $Guardian->setApellido($content["apellido"]);
                     $Guardian->setEdad($content["edad"]);
                     $Guardian->setFotoPerfil($content["fotoperfil"]);
                     $Guardian->setTipoPerro($content["tipoperro"]);
                     $Guardian->setRemuneracion($content["remuneracion"]);
                     $Guardian->setDisponibilidad($content["disponibilidad"]);

                     array_push($this->GuardianList, $Guardian);
                 }
             }
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->GuardianList as $Guardian)
            {
                $valuesArray = array();
                $valuesArray["id"] = $Guardian->getId();
                $valuesArray["username"] = $Guardian->getUserName();
                $valuesArray["password"] = $Guardian->getPassWord();
                $valuesArray["mail"] = $Guardian->getMail();
                $valuesArray["nombre"] = $Guardian->getNombre();
                $valuesArray["apellido"] = $Guardian->getApellido();
                $valuesArray["edad"] = $Guardian->getEdad();
                $valuesArray["fotoperfil"] = $Guardian->getFotoPerfil();
                $valuesArray["tipoperro"] = $Guardian->getTipoPerro();
                $valuesArray["remuneracion"] = $Guardian->getRemuneracion();
                $valuesArray["disponibilidad"] = $Guardian->getDisponibilidad();
                array_push($arrayToEncode, $valuesArray);
            }

            $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

            file_put_contents($this->fileName, $fileContent);
        }

        private function GetNextId()
        {
            $id = 0;

            foreach($this->GuardianList as $Guardian)
            {
                $id = ($Guardian->getId() > $id) ? $Guardian->getId() : $id;
            }

            return $id + 1;
        }
    }
?>