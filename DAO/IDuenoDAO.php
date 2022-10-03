<?php
    namespace DAO;

    use Models\Dueno as Dueno;

    interface IDuenoDao
    {
        function Add(Dueno $Dueno);
        function EditProfile(Dueno $Dueno);
        function GetAll();
        function Remove($id);
    }
?>