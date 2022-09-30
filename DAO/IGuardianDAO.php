<?php
    namespace DAO;

    use Models\Guardian as Guardian;

    interface IGuardianDao
    {
        function Add(Guardian $guardian);
        function GetAll();
        function Remove($id);
    }
?>