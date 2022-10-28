<?php
    namespace DAO;

    use Models\Reserva as Reserva;

    interface IReservaDao
    {
        function Add(Reserva $Reserva);
        function GetAll();
        function Remove($id);
    }
?>