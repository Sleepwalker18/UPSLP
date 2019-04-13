<!DOCTYPE HTML>
<!--
  Verti by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
<script type=text/javascript>
function noreservo(){
alert('Reservación cancelada');
		window.location.assign('http://eventsanluis.0fees.us/tickets.php');}
		</script>
    <title>Reservación</title>
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
                require 'conexion.php';
                session_start();
                $event=$_POST['evento'];
                $nino=$_POST['nin'];
                $jove=$_POST['juv'];
                $viejo=$_POST['may'];
 if(is_numeric($nino)==false OR  is_numeric($viejo)==false OR is_numeric($jove)==false){
 echo"<script type=text/javascript>
		alert('Error:Datos no numericos');
		window.location.assign('http://eventsanluis.0fees.us/tickets.php');
		</script>";
}
                $sql = "SELECT * FROM Eventos WHERE nombre_evento='$event'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $fecha=$row["fecha"];
                $precio=$row["precio"];
                session_start();
                $_SESSION['boletos']=$nino+$jove+$viejo;
                $_SESSION['evento']=$event;
                ?>

            <!-- Nav -->
              <nav id="nav">
                <ul>
                  <br/>
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
                      <h3>Verifique que los datos de su reservación sean correctos:</h3> 
                    <footer>                    
                                                <?php

                                                // sql to delete a record
                                                $usuario=$_SESSION['usuario'];
                                                $sql = "SELECT * FROM Cliente WHERE user='$usuario'";
                                                $result = $conn->query($sql);


                                                if ($result->num_rows > 0) {
                                                    
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<b>RFC: </b>".$row["RFC"];
                                                    echo "<br>";
                                                    echo "<b>Nombre: </b>". $row["nombre"]." ". $row["apellidos"];
                                                    echo "<br>";
                                                    echo "<b>Usuario: </b>".$usuario;
                                                    echo "<br>";
                                                    echo "<b>Evento: </b>". $event;
                                                    echo "<br>";
                                                    echo "<b>Fecha: </b>". $fecha;
                                                    echo "<br>";
                                                    echo "<h5>No. de Boletos: </h5>";
                                                    echo "<b>Infantil: </b>". $nino;
                                                    echo "<br/><b>Juvenil: </b>". $jove;
                                                    echo "<br/><b>Adulto Mayor: </b>". $viejo;
                                                    echo "<h5>Precio por Boleto Infantil: $". $precio*.5;
                                                    $bn=$nino*$precio*.5;
                                                    echo "</h5>";                                                   
                                                    echo "<h5>Precio por Boleto Juvenil: $". $precio*.7;
                                                    $bj=$jove*$precio*.7;
                                                    echo "</h5>";                                              
                                                    echo "<h5>Precio por Boleto Adulto Mayor: $". $precio*.6;
                                                    $bv=$viejo*$precio*.6;
                                                    echo "</h5>";
                                                    echo "<h5>Total a pagar: $". ($bn+$bj+$bv);
                                                    echo "</h5>";
                                                    echo "<br/><br/>";
$_SESSION['dinero']=$bn+$bj+$bv;
                                                    echo "<form id=resp1 action=resta_boletos.php style=display:inline-block;>";

                                                ?>
                                                    <input type="submit" id="formsubmint" name="formsubmimt" value="Confirmar Compra" style="display: inline-block;">
                                                    </form>
                                                    <form id="resp" action="#" onSubmit="return false;" style="display: inline-block;">
                                                    <input type="submit" id="formsubmit" name="formsubmit" value="Cancelar Compra" onClick="noreservo();" style="display: inline-block;">
                                                <?php
                                                    echo "</form>";
                                                    }
                                                 }
                                                $conn->close();
                                                ?>

                      </footer>                 
                    </article>
                </div>
              </div>
            </div>
          </div>
        </div>
          

      <!-- Footer -->
        <div id="footer-wrapper">
          <footer id="footer" class="container">
            <div class="row">
              <div class="3u 6u(medium) 12u$(small)">

                <!-- Links -->
                  <section class="widget links">
                    <h3>Random Stuff</h3>
                    <ul class="style2">
                      <li><a href="#">Etiam feugiat condimentum</a></li>
                      <li><a href="#">Aliquam imperdiet suscipit odio</a></li>
                      <li><a href="#">Sed porttitor cras in erat nec</a></li>
                      <li><a href="#">Felis varius pellentesque potenti</a></li>
                      <li><a href="#">Nullam scelerisque blandit leo</a></li>
                    </ul>
                  </section>

              </div>
              <div class="3u 6u$(medium) 12u$(small)">

                <!-- Links -->
                  <section class="widget links">
                    <h3>Random Stuff</h3>
                    <ul class="style2">
                      <li><a href="#">Etiam feugiat condimentum</a></li>
                      <li><a href="#">Aliquam imperdiet suscipit odio</a></li>
                      <li><a href="#">Sed porttitor cras in erat nec</a></li>
                      <li><a href="#">Felis varius pellentesque potenti</a></li>
                      <li><a href="#">Nullam scelerisque blandit leo</a></li>
                    </ul>
                  </section>

              </div>
              <div class="3u 6u(medium) 12u$(small)">

                <!-- Links -->
                  <section class="widget links">
                    <h3>Random Stuff</h3>
                    <ul class="style2">
                      <li><a href="#">Etiam feugiat condimentum</a></li>
                      <li><a href="#">Aliquam imperdiet suscipit odio</a></li>
                      <li><a href="#">Sed porttitor cras in erat nec</a></li>
                      <li><a href="#">Felis varius pellentesque potenti</a></li>
                      <li><a href="#">Nullam scelerisque blandit leo</a></li>
                    </ul>
                  </section>

              </div>
              <div class="3u 6u$(medium) 12u$(small)">

                <!-- Contact -->
                  <section class="widget contact">
                    <h3>Contact Us</h3>
                    <ul>
                      <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                      <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                      <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                      <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
                      <li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
                    </ul>
                    <p>1234 Fictional Road<br />
                    Nashville, TN 00000<br />
                    (800) 555-0000</p>
                  </section>

              </div>
            </div>
            <div class="row">
              <div class="12u">
                <div id="copyright">
                  <ul class="menu">
                    <li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
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