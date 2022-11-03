<?php
    namespace DAO;

    use Models\Guardian as Guardian;

    interface IGuardianDao
    {
        function Add(Guardian $guardian);
        function SetProfile(Guardian $guardian,$tmp_name);
        function GetAll();
        function Remove($id);
    }
?>