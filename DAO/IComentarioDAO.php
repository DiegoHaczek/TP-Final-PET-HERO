<?php
    namespace DAO;

    use Models\Comentario as Comentario;

    interface IComentarioDao
    {
        function Add(Comentario $Comentario);
        function GetAll();
    }
?>