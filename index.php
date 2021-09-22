<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
        <meta charset="UTF-8">
        <title>Segundo Examen Parcial </title>
        <link rel="stylesheet" href="estilo.css">
        <!-- Boxicons CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
        <i class='bx bx-code-block icon'></i>
        <div class="logo_name">Desarrollo Web</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Productos</span>
        </a>
         <span class="tooltip">Productos</span>
      </li>
      <li>
       <a href="#">
            <i class='bx bxl-apple'></i>
            <span class="links_name">Marcas</span>
       </a>
       <span class="tooltip">Marcas</span>
     </li>

     <li class="profile">
         <div class="profile-details">
           <img src="p.jpg" alt="profileImg">
           <div class="name_job">
             <div class="name">Walter Vásquez</div>
             <div class="job">1290-18-18389</div>
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" ></i>
     </li>
    </ul>
  </div>
  <section class="home-section">
         <!-- Bootstrap CSS v5.0.2 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Font Awsome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

      <div class="text">Formulario Productos</div>
      <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="well well-sm">
                        <form class="form-horizontal" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <label for="lbl_producto" class="form-label"><b>Producto</b></label>
                                        <input id="lbl_producto" name="lbl_producto" type="text" placeholder="Producto: producto" class="form-control">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="lbl_marca" class="form-marca"><b>Marca</b></label>
                                        <select class="form-select" name="drop_marca" id="drop_marca">
                                        <option value=0>------Marca--------</option>
                                            <?php
                                                include("conexion.php");
                                                $db_conexion=mysqli_connect($db_host,$db_usr,$db_pass,$db_name,$db_puerto);
                                                $db_conexion -> real_query ("SELECT idmarca as id,marca FROM marcas;");
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
                                        <textarea class="form-control" id="lbl_descripcion" name="lbl_descripcion" placeholder="Ingrese la descripcion del producto." rows="7"></textarea>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="lbl_precio_costo" class="form-label"><b>Precio Costo</b></label>
                                        <input id="lbl_precio_costo" name="lbl_precio_costo" type="number" placeholder="" class="form-control">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="lbl_precio_venta" class="form-label"><b>Precio Venta</b></label>
                                        <input id="lbl_precio_venta" name="lbl_precio_venta" type="number" placeholder="" class="form-control">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="lbl_existencia" class="form-label"><b>Existencia</b></label>
                                        <input id="lbl_existencia" name="lbl_existencia" type="number" placeholder="Existencia: 4" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <br>
                                        <input type="submit" name="btn_agregar" id="btn_agregar" class="btn btn-success" value="Agregar">
                                        
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        <table class="table table-striped table-responsive">
                            <thead class="table-dark">
                                <tr>
                                    <th>Producto</th>
                                    <th>Marca</th>
                                    <th>Descripción</th>
                                    <th>Precio Costo</th>
                                    <th>Precio Venta</th>
                                    <th>Existencia</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                            include("conexion.php");
                                            $db_conexion=mysqli_connect($db_host,$db_usr,$db_pass,$db_name,$db_puerto);
                                            $db_conexion -> real_query ("SELECT p.idProducto as id,p.producto,m.marca,p.Descripcion,p.precio_costo,p.precio_venta,p.existencia
                                            FROM productos as p inner join marcas as m on p.idmarca = m.idmarca;");
                                            $resultado = $db_conexion -> use_result();
                                            while ($fila = $resultado ->fetch_assoc()){
                                                echo "<tr data-id=" . $fila['id'].">";
                                                    echo "<td>". $fila['producto']."</td>";
                                                    echo "<td>". $fila['marca']."</td>";
                                                    echo "<td>". $fila['Descripcion']."</td>";
                                                    echo "<td>". $fila['precio_costo']."</td>";
                                                    echo "<td>". $fila['precio_venta']."</td>";
                                                    echo "<td>". $fila['existencia']."</td>";
                                                    echo "<td>"."<a href=".'"eliminar.php?id='. $fila['id'].'" class="btn btn-danger" > <i class="fas fa-trash-alt"></i></a><a href="modificar.php?id=' .$fila['id'].'" class="btn btn-secondary"><i class="fas fa-marker"></i></a></td>';
                                                
                                                echo "</tr>";
                
                                            }
                                            $db_conexion -> close();
                                        ?>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
  </section>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();
  });

  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");
   }
  }
  </script>
</body>
</html>