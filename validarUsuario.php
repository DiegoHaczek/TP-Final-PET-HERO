<?php

    include_once 'Guardian.php';

    if (!empty($_POST)){

        if ($_POST["password"] != $_POST["passwordconfirm"]){
            echo "<script>alert('lacontraseña no es igual a la confirmacion');";
            echo "window.location = 'registroguardian.php';</script>";
        }

        $guar = new Guardian($_POST["username"],$_POST["email"],$_POST["password"]);

        $guar->mostrarUsuario();
    }

?>