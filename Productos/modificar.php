<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="../estilo.css">
<!-- Bootstrap CSS v5.0.2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<?php
include("../conexion.php");
$db_conexion=mysqli_connect($db_host,$db_usr,$db_pass,$db_name,$db_puerto);   
$producto='';
$marca= '';
$descripcion= '';
$precio_costo= '';
$precio_venta= '';
$existencia = '';
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql= "SELECT * from productos where idProducto=$id";
        $result = mysqli_query($db_conexion, $sql);
            if (mysqli_num_rows($result) == 1) {
                $fila = mysqli_fetch_array($result);
                $producto = $fila['producto'];
                $marca = $fila['idMarca'];
                $descripcion = $fila['Descripcion'];
                $precio_costo = $fila['precio_costo'];
                $precio_venta = $fila['precio_venta'];
                $existencia = $fila['existencia'];
         }
    }

    if(isset($_POST['update'])) {
        $id = $_GET['id'];
        $producto=$_POST["txt_producto"];
        $marca=$_POST["drop_marca"];
        $descripcion=$_POST["txt_descripcion"];
        $precio_costo=$_POST["txt_precio_costo"];
        $precio_venta=$_POST["txt_precio_venta"];
        $existencia=$_POST["txt_existencia"];
        $sql= " UPDATE productos SET producto='$producto',Descripcion='$descripcion',precio_costo='$precio_costo',precio_venta='$precio_venta',existencia='$existencia',idMarca='$marca' 
        WHERE idProducto=$id;";
        if($db_conexion -> query($sql) === true){
            $db_conexion -> close();
            header('Location: ../index.php');

        }else{
            echo "Error" . $sql."<br>".$db_conexion -> close();
        }
    }
?>
  <section class="home-section">
      <div class="text">Formulario de Modificacion de Productos</div>
      <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="well well-sm">
                        <form class="form-horizontal" action="modificar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <label for="lbl_producto" class="form-label"><b>Producto</b></label>
                                        <input id="txt_producto" value="<?php echo $producto;?>" name="txt_producto" type="text" placeholder="Producto: producto" class="form-control">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="lbl_marca" class="form-marca"><b>Marca</b></label>
                                        <select class="form-select" name="drop_marca" id="drop_marca">
                                            <?php $db_conexion -> real_query ("SELECT * from marcas where idMarca= $marca;");
                                            $resultado = $db_conexion -> use_result();
                                            while ($marca = $resultado ->fetch_assoc()){
                                                
                                                echo "<option value=". $marca['idMarca'].">". $marca['marca']."</option>";
                                            }
                                            $db_conexion -> close();
                                            ?> 
                                        
                                            <?php
                                                include("../conexion.php");
                                                $db_conexion=mysqli_connect($db_host,$db_usr,$db_pass,$db_name,$db_puerto);
                                                $db_conexion -> real_query ("SELECT idMarca as id,marca FROM marcas;");
                                                $resultado = $db_conexion -> use_result();
                                                while ($fila = $resultado ->fetch_assoc()){
                                                echo "<option value=". $fila['id'].">". $fila['marca']."</option>";
                                                }
                                                $db_conexion -> close();
                                            ?>
                                        </select>     
                                        </div>
                                    <div class="col-md-8">
                                        <label for="lbl_descripcion" class="form-label"><b>Descripción</b></label>
                                        <input class="form-control" value="<?php echo $descripcion;?>" id="txt_descripcion" name="txt_descripcion" placeholder="Ingrese la descripcion del producto." ></input>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="lbl_precio_costo" class="form-label"><b>Precio Costo</b></label>
                                        <input id="txt_precio_costo" value="<?php echo $precio_costo;?>" name="txt_precio_costo" type="number" placeholder="" class="form-control">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="lbl_precio_venta" class="form-label"><b>Precio Venta</b></label>
                                        <input id="txt_precio_venta" value="<?php echo $precio_venta;?>" name="txt_precio_venta" type="number" placeholder="" class="form-control">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="lbl_existencia" class="form-label"><b>Existencia</b></label>
                                        <input id="txt_existencia" value="<?php echo $existencia;?>" name="txt_existencia" type="number" placeholder="Existencia: 4" class="form-control">
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
</section>