<?php
    namespace DAO;

    use Models\Dueno as Dueno;

    interface IDuenoDao
    {
        function Add(Dueno $Dueno);
        function SetProfile(Dueno $Dueno,$tmp_name);
        function GetAll();
        function Remove($id);
    }
?>