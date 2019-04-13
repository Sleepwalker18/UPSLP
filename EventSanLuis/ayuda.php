<?php
require 'conexion.php';
?>
<!DOCTYPE HTML>
<!--
  Verti by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
    <title>Ayuda</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="Shortcut Icon" href="images/icon.ico" type="image/x-icon" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
  </head>
  <body class="no-sidebar">
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
                  <li><a href="http://eventsanluis.0fees.us/anuncios.php">Anuncios</a></li>
                  <li><a href="http://eventsanluis.0fees.us/tickets.php">Tickets</a></li>
                  <li class="current"><a href="http://eventsanluis.0fees.us/ayuda.php">Ayuda</a></li><br/>
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

              <div class="4u 12u$(medium)">
                  <div id="sidebar">

                    <!-- Sidebar -->
                      <section>
                      <h5><center>Si tienes alguna duda acerca del funcionamiento de la página, y sus procesos, envianos tu duda.</center></h5>
                    
                          <p>
                           <form method="post" name="datos" action="correo.php">
                            <textarea  name="comentarios" placeholder="Escribe aqui tus dudas"></textarea><br>
                            <center><input type="submit"></input></center>
                          </p>
                        </form>
                      </section>

                  </div>
              </div>

              <!-- Content -->
            <div class="8u 12u$(medium)">
              <div id="content">
                <article>
                <h3><center>¿Preguntas frecuentes?</center></h3>
                  <h5>¿Qué necesito para registrarme?</h5><p align="justify">Si deseas conocer los requerimientos para llevar al cabo el registro, puedes ir a la página de 
                  <a href="http://eventsanluis.0fees.us/tickets.php">Tickets</a> y buscar el botón "Registrarse", al presionarlo aparecerán los requerimientos.</p>
                  <h5>¿Dónde puedo encontrar las mamparas?</h5><p align="justify">Para localizar cada una de las mamparas que hay en la página, hay una opción que despliega un mapa
                  en la página de <a href="http://eventsanluis.0fees.us/anuncios.php">Anuncios</a>, busque el botón "Ver ubicación" y solo presionelo. (Si desea ver el mapa ahora clic <a href="http://eventsanluis.0fees.us/maps.php" target="_blank">aqui</a>)
                  <h5>¿Sólo con tarjeta puedo reservar?</h5><p align="justify">Por ahora es el único medio de pago que aceptamos.</p>
                  <h5>¿Hay horario para reservar boletos?</h5><p align="justify">Usted puede reservar boletos a la hora que lo desee.</p>
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