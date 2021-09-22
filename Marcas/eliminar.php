<?php
    if(isset($_GET['id'])) {
        include("../conexion.php");
        $db_conexion=mysqli_connect($db_host,$db_usr,$db_pass,$db_name,$db_puerto);
        $id = $_GET['id'];
        $sql= " DELETE FROM marcas WHERE idMarca= $id";
        if($db_conexion -> query($sql) === true){
            $db_conexion -> close();
            header('Location: ../marcas.php');

        }else{
            echo "Error" . $sql."<br>".$db_conexion -> close();
        }
    }
?>