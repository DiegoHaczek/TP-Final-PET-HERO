<?php
    namespace DAO;

    use Models\Mascota as Mascota;

    interface IMascotaDao
    {
        function Add(Mascota $Mascota);
        function GetAll();
        function Remove($id);
        function GetById($id);
        function GetByIdDueno($idDueno);
    }
?>