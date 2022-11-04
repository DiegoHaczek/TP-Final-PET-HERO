<?php
    namespace DAO;

    use Models\Cupon as Cupon;

    interface ICuponDao
    {
        function Add(Cupon $cupon);
        function GetAll();
    }
?>