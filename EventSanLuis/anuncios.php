<!DOCTYPE HTML>
<!--
  Verti by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
    <title>Anuncios</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="Shortcut Icon" href="images/icon.ico" type="image/x-icon" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
  </head>
  <body class="left-sidebar">
    <div id="page-wrapper">

      <!-- Header -->
        <div id="header-wrapper">
          <header id="header" class="container">

            <!-- Logo -->
              <div id="logo">
                <a href="http://eventsanluis.0fees.us/"><img src="images/event.png" width="50%"></img></a>
              </div>

<?php
session_start();

?>

            <!-- Nav -->
              <nav id="nav">
                <ul>
                  <li><a href="http://eventsanluis.0fees.us/">Inicio</a></li>
                  <li><a href="no-sidebar.php">Registro de Eventos</a></li>
                  <li><a href="prog-sem.php">Programación</a></li>
                  <li class="current"><a href="http://eventsanluis.0fees.us/anuncios.php">Anuncios</a></li>
                  <li><a href="http://eventsanluis.0fees.us/tickets.php">Tickets</a></li>
                  <li><a href="http://eventsanluis.0fees.us/ayuda.php">Ayuda</a></li><br/>
                 <?php //////CODIGO PARA MOSTRAR EL NOMBRE 
                  if(!empty($_SESSION['usuario'])){
                ?>
                     <li><h3 style="display: inline-block;">User: <?php echo $_SESSION['usuario']; ?></h3><img src=images/User_Circle.ico width=8% style="display: inline-block;"></img><ul>
                     <li><a href="cerrar_sesion.php">Cerrar sesión<img src=images/salir.ico width=12% align="right"></img></a></li></ul></li>                 
                <?php
                    }
                    else{
                ?>
                <li><h3 style="display: inline-block;">Iniciar sesión:</h3>
                <li><form action="validar_user.php" method="post" style="display: inline-block;">
                <li><input name="user" type="text" required="required" style="display: inline-block;" placeholder="Usuario"></li>
                <li><input name="pass" type="password" required="required" style="display: inline-block;" placeholder="Contraseña"></li>
                <li><input type="submit" style="display: inline-block;" value="Entrar"></li>
                </form></li>
            </li>
                <?php 
                    }
                ?>

                </ul>
              </nav>

          </header>
        </div>

      <!-- Main -->
        <div id="main-wrapper">
          <div class="container">
            <div class="row 200%">
              <div class="8u 12u$(medium) important(medium)">
                <div id="content">
                  <!-- Content -->
                    <article> 
                      <h3>Lista de mamparas:</h3> 
                    <footer>                    
<?php
require 'conexion.php';
$sql = "SELECT * FROM Eventos ";
$result = $conn->query($sql);
$i=0;
$j=0;
    while($row = $result->fetch_assoc()) {
        $eventos[$j].=$row["nombre_evento"];
      $i++;
        if($i%4==0){
            $j++;
        }
        else
        {
            $eventos[$j].=" , ";
        }

    }
        while($j < 6){
            $j++;
            $eventos[$j]="Mampara sin anuncios"; 
        }

        $j=0;
        $sql = "SELECT * FROM Mampara ";
        $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            ?>
        <div class="12u 6u(medium) 12u$(small)">
          <section class="box feature">
            <div class="inner"><p> 
              <?php
              echo"
              <b><img src=images/pintura-verde.ico width=3%/>Mampara: </b>" . ($row["id_mampara"]-1). "<br/>  
              <b>Medidas: </b>" . $row["medidas"]. " <br/>
              <b>Ubicación: </b>" . $row["ubicacion"]."   <br/>
              <b>Zona: </b>" . $row["zona"]. " <br/> 
              <b>Eventos Anunciados: </b>" . $eventos[$j]. " <br/>
               </p></div>
           </section>";
              $j++;
            }
            echo"</div>";
          }

       else {
          echo "0 results";
       }



$conn->close();
?>

                      </footer>                 
                    </article>
                </div>
              </div>
              <div class="4u 12u$(medium)">
                <div id="sidebar">

                  <!-- Sidebar -->
                    <section>
                      <h3>Sección de anuncios</h3>
                      <p align="justify">Event San Luis tiene distintas ubicaciones donde usted podrá encontrar fácilmente 
                      los eventos próximos en dado caso de que usted no pueda acceder a dicha información
                      por este medio.</p>
                      <footer>
                        <center><a href="http://eventsanluis.0fees.us/maps.php" class="button icon fa-info-circle" target="_blank">Ver ubicación</a></center>
                      </footer>
                    </section>
                    <section>
                      <h3><center>Reporte semanal de boletos vendidos</center></h3>
                      <p align="justify">
                      	<?php
							require 'conexion.php';
							// sql to delete a record
							$sql = "SELECT * FROM Eventos ";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
								     echo 
								          "<b>Nombre del evento:</b>".$row["nombre_evento"]."<br>"
								          ."<b>Boletos vendidos:</b>". (500-$row["boletos_disponibles"])." de 500<br>"
								          ."<b>Monto Recabado:</b> $". $row["monto_recabado"]."<br><br>";
								}

							}
							$conn->close();
						?>
                      </p>
                    </section>
                </div>
              </div>
            </div>
          </div>
        </div>
          

      <!-- Footer -->
        <div id="footer-wrapper">
          <footer id="footer" class="container">
            <div class="row">
              <div class="6u 9u(medium) 12u$(small)">

                <!-- Links -->
                  <section class="widget links">
                    <h3>Elaborado por:</h3>
                    <ul>
                      <li>Arellano Godínez Israel (150389)</li>
                      <li>Pérez Martínez Diego Alfonso (150357)</li>
                    </ul>
                  </section>

              </div>
              <div class="3u 6u(medium) 12u$(small)">

                <!-- Links -->
                  <section class="widget links">
                    
                  </section>

              </div>
              <div class="3u 6u$(medium) 12u$(small)">

                <!-- Contact -->
                  <section class="widget contact">
                    <h3><a href="http://www.upslp.edu.mx/upslp/" target="_blank">UPSLP</a></h3>
                    <ul>
                      <li><a href="https://twitter.com/upslpvinculaci" class="icon fa-twitter" target="_blank"><span class="label">Twitter</span></a></li>
                      <li><a href="https://www.facebook.com/upslp/?fref=ts" class="icon fa-facebook" target="_blank"><span class="label">Facebook</span></a></li>
                      <li><a href="https://www.instagram.com/explore/tags/upslp/" class="icon fa-instagram" target="_blank"><span class="label">Instagram</span></a></li>
                    </ul>
                    <p>Urbano Villalón No. 500<br />
                    San Luis Potosí<br />
                    01 444 812 6519</p>
                  </section>

              </div>
            </div>
            <div class="row">
              <div class="12u">
                <div id="copyright">
                  <ul class="menu">
                    <li>&copy; Event San Luis</li><li>2016</li>
                  </ul>
                </div>
              </div>
            </div>
          </footer>
        </div>

      </div>

    <!-- Scripts -->

      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/jquery.dropotron.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="assets/js/main.js"></script>

  </body>
</html>