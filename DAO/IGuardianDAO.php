<?php
    namespace DAO;

    use Models\Guardian as Guardian;

    interface IGuardianDao
    {
        function Add(Guardian $guardian);
        function EditProfile(Guardian $guardian,$tmp_name);
        function GetAll();
        function Remove($id);
    }
?>