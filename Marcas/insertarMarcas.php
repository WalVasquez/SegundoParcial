<?php
        if(isset($_POST["btn_agregar_marca"])){
            include("../conexion.php");
            $db_conexion=mysqli_connect($db_host,$db_usr,$db_pass,$db_name,$db_puerto);
            $txt_marca=utf8_decode($_POST["txt_marca"]);
            $sql= "INSERT INTO marcas(marca) VALUES ('".$txt_marca."')";
            if($db_conexion -> query($sql) === true){
                $db_conexion -> close();
                echo "Exito";
                header('Location: ../marcas.php');

            }else{
                echo "Error" . $sql."<br>".$db_conexion -> close();
            }
        }
    ?>