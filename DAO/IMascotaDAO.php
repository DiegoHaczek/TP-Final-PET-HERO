<?php
    namespace DAO;

    use Models\Mascota as Mascota;

    interface IMascotaDao
    {
        function Add(Mascota $Mascota);
        function EditProfile(Mascota $Mascota);
        function GetAll();
        function Remove($id);
    }
?>