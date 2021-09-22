<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="../estilo.css">
<!-- Bootstrap CSS v5.0.2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<?php
include("../conexion.php");
$db_conexion=mysqli_connect($db_host,$db_usr,$db_pass,$db_name,$db_puerto);   
$marca= '';
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql= "SELECT * from marcas where idMarca=$id";
        $result = mysqli_query($db_conexion, $sql);
            if (mysqli_num_rows($result) == 1) {
                $fila = mysqli_fetch_array($result);
                $marca = $fila['marca'];
         }
    }

    if(isset($_POST['update'])) {
        $id = $_GET['id'];
        $marca=$_POST["txt_marca"];
        $sql= " UPDATE marcas SET marca='$marca' WHERE idMarca=$id;";
        if($db_conexion -> query($sql) === true){
            $db_conexion -> close();
            header('Location: ../marcas.php');

        }else{
            echo "Error" . $sql."<br>".$db_conexion -> close();
        }
    }
?>
  <section class="home-section">
      <div class="text">Formulario de Modificacion de Marcas</div>
      <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="well well-sm">
                        <form class="form-horizontal" action="modificar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <label for="lbl_producto" class="form-label"><b>Producto</b></label>
                                        <input id="txt_marca" value="<?php echo $marca;?>" name="txt_marca" type="text" placeholder="Producto: producto" class="form-control">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <br>
                                        <button class="btn btn-success" name="update">Update</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>