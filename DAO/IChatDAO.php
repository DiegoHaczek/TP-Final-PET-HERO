<?php
    namespace DAO;

    use Models\Chat as Chat;

    interface IChatDao
    {
        function Add(Chat $chat);
        function GetAll();
    }
?>