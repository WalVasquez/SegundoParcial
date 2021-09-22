<?php
        if(isset($_POST["btn_agregar_producto"])){
            include("../conexion.php");
            $db_conexion=mysqli_connect($db_host,$db_usr,$db_pass,$db_name,$db_puerto);
            $txt_producto=utf8_decode($_POST["txt_producto"]);
            $drop_marca=utf8_decode($_POST["drop_marca"]);
            $txt_descripcion=utf8_decode($_POST["txt_descripcion"]);
            $txt_precio_costo=utf8_decode($_POST["txt_precio_costo"]);
            $txt_precio_venta=utf8_decode($_POST["txt_precio_venta"]);
            $txt_existencia=utf8_decode($_POST["txt_existencia"]);
            $sql= "INSERT INTO productos(producto,Descripcion,precio_costo,precio_venta,existencia,idMarca) VALUES ('".$txt_producto."','".$txt_descripcion."','".$txt_precio_costo."','".$txt_precio_venta."','".$txt_existencia."',".$drop_marca.")";
            if($db_conexion -> query($sql) === true){
                $db_conexion -> close();
                echo "Exito";
                header('Location: ../index.php');

            }else{
                echo "Error" . $sql."<br>".$db_conexion -> close();
            }
        }
    ?>