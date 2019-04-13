<!DOCTYPE HTML>
<!--
  Verti by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
    <title>Home | Event San Luis</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="Shortcut Icon" href="images/icon.ico" type="image/x-icon" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]--> 
  </head>
  <body class="homepage">
    <div id="page-wrapper">

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
                <li  class="current"><a href="http://eventsanluis.0fees.us/">Inicio</a></li>
                <li><a href="no-sidebar.php">Registro de Eventos</a></li>
                <li><a href="prog-sem.php">Programación</a></li>
                <li><a href="http://eventsanluis.0fees.us/anuncios.php">Anuncios</a></li>
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

      <!-- Banner -->
        <div id="banner-wrapper">
          <div id="banner" class="box container">
            <div class="row">
              <div class="7u 12u(medium)">
                <h2>Bienvenido</h2>
                <p>Esto es Event San Luis</p>
              </div>
              <div class="5u 12u(medium)">
                <ul>
                  <li><a href="http://eventsanluis.0fees.us/prog-sem.php" class="button big icon fa-arrow-circle-right">Ir a eventos</a></li>
                  <li><a href="#info" class="button alt big icon fa-question-circle">Información</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      <!-- Features -->
      <a name="info"></a>
        <div id="features-wrapper">
          <div class="container">
            <div class="row">
              <div class="4u 12u(medium)">

                <!-- Box -->
                  <section class="box feature">
                    <span class="image featured"><img src="images/proceso.png" alt="" /></span>
                    <div class="inner">
                      <header>
                        <h2>Nos encargamos de...</h2>
                      </header>
                      <p>Procesos relacionados con la publicación en prensa de la programación, y la venta de boletos para diferentes eventos.</p>
                    </div>
                  </section>

              </div>
              <div class="4u 12u(medium)">

                <!-- Box -->
                  <section class="box feature">
                    <span class="image featured"><img src="images/registros.jpg" alt="" style="width: 82%" /></span>
                    <div class="inner">
                      <header>
                        <h2>¿Cómo lo hacemos?</h2>
                      </header>
                      <p>Manejamos registro de eventos, y registro de usuarios para la reservación de boletos, para los múltiples eventos que hay o habrá</p>
                    </div>
                  </section>

              </div>
              <div class="4u 12u(medium)">

                <!-- Box -->
                  <section class="box feature">
                    <span class="image featured"><img src="images/eventos.png" alt="" style="width: 82%" /></span>
                    <div class="inner">
                      <header>
                        <h2>Presentamos...</h2>
                      </header>
                      <p>Obras de teatro, conciertos,exposiciones, encuentros culturales, semana de festivales de cine, etc.</p>
                    </div>
                  </section>

              </div>
            </div>
          </div>
        </div>

      <!-- Main -->
      
        <div id="main-wrapper">
          <div class="container">
            <div class="row 200%">
              <div class="4u 12u(medium)">

                <!-- Sidebar -->
                  <div id="sidebar">
                    <section class="widget thumbnails">
                      <center><h3>La mejor opción</h3>
                      <div class="grid">
                        <div class="row 50%">
                          <div class="6u"><span class="image fit"><img src="images/ev1-1-1.jpg" alt="" style="height: 80%" /></span></div>
                          <div class="6u"><span class="image fit"><img src="images/ev2.jpg" alt="" style="width: 87%"/></span></div>
                          <div class="6u"><span class="image fit"><img src="images/ev3.jpg" alt="" style="width: 90%"/></span></div>
                          <div class="6u"><span class="image fit"><img src="images/ev4.jpg" alt="" style="width: 90%"/></span></div>
                        </div>
                      </div></center>
                    </section>
                  </div>

              </div>
              <div class="8u 12u(medium) important(medium)">

                <!-- Content -->
                  <div id="content">
                    <section class="last">
                      <h2>Asi que...</h2>
                      <p align="justify">Si tienes algún evento que organizar<strong> Event San Luis</strong> es la mejor opción, tenemos respaldo de infinidad de eventos con todo tipo de artistas.<br/><br/>
                      Procurando la satisfacción del cliente y que la gente de la ciudad de San Luis Potosí disfrute de un buen espectáculo en las distintas localidades de la capital.
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