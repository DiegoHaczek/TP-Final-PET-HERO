<?php
    namespace DAO;

    use DAO\IGuardianDAO as IGuardianDAO;
    use Models\Guardian as Guardian;

    class GuardianDAO implements IGuardianDAO
    {
        private $GuardianList = array();
        private $fileName = ROOT."Data/Guardianes.json";

        public function Add(Guardian $Guardian)
        {
            $this->RetrieveData();
            
            $Guardian->setId($this->GetNextId());
            
            array_push($this->GuardianList, $Guardian);

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