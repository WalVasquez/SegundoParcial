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
        <a href="index.php">
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

      <div class="text">Formulario Marcas</div>
      <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="well well-sm">
                        <form class="form-horizontal" action="Marcas/insertarMarcas.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <label for="lbl_marca" class="form-label"><b>Marca</b></label>
                                        <input id="txt_marca" name="txt_marca" type="text" placeholder="Marca: Qwerty" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <br>
                                        <input type="submit" name="btn_agregar_marca" id="btn_agregar_marca" class="btn btn-success" value="Agregar">
                                        
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        <table class="table table-striped table-responsive">
                            <thead class="table-dark">
                                <tr>
                                    <th>Marca</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                            include("conexion.php");
                                            $db_conexion=mysqli_connect($db_host,$db_usr,$db_pass,$db_name,$db_puerto);
                                            $db_conexion -> real_query ("SELECT idMarca as id,marca FROM marcas;");
                                            $resultado = $db_conexion -> use_result();
                                            while ($fila = $resultado ->fetch_assoc()){
                                                echo "<tr data-id=" . $fila['id'].">";
                                                    echo "<td>". $fila['marca']."</td>";
                                                    echo "<td>"."<a href=".'"eliminar.php?id='. $fila['id'].'" class="btn btn-danger" > <i class="fas fa-trash-alt"></i></a><a href="Marcas/modificar.php?id=' .$fila['id'].'" class="btn btn-secondary"><i class="fas fa-marker"></i></a></td>';
                                                
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