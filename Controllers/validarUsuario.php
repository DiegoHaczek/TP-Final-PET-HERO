<?php

    namespace Controllers;

    if (!empty($_POST)){

        if ($_POST["password"] != $_POST["passwordconfirm"]){
            echo "<script>alert('lacontraseña no es igual a la confirmacion');";
            echo "window.location = '../vistas/registroguardian.php';</script>";
        }

        $guar = new Guardian(NULL,NULL,NULL,NULL,$_POST["username"],$_POST["email"],$_POST["password"],NULL,NULL,NULL,NULL);

        $guar->mostrarUsuario();
    }

?>