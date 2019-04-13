<!DOCTYPE HTML>
<!--
  Verti by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
    <title>Tickets</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="Shortcut Icon" href="images/icon.ico" type="image/x-icon" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
<script type="text/javascript">
            function mostrar(){
            document.getElementById('oculto').style.display = 'block';}
</script>
  </head>
  <body class="right-sidebar">
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
                <li><a href="http://eventsanluis.0fees.us/no-sidebar.php">Registro de Eventos</a></li>
                <li><a href="prog-sem.php">Programación</a></li>
                <li><a href="anuncios.php">Anuncios</a></li>
                <li class="current"><a href="http://eventsanluis.0fees.us/tickets.php">Tickets</a></li>
                                
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
<?php
if(empty($_SESSION['usuario'])){
?>
      <!-- Main -->
        <div id="main-wrapper">
          <div class="container">
            <div class="row 200%">
              <div class="8u 12u$(medium)">
                <div id="content">
                  <!-- Content -->


                  <article>
                    <p align="justify">Si desea conseguir entradas para alguno de los eventos que Event San Luis presenta, lo único que tiene que hacer es iniciar sesión con su cuenta y apartar el número de boletos que usted requiera, 
                    en la sección para apartar dichos boletos se le mostrará a detalle todo lo referente al evento.</p>

                    <center><h2>¿Aún no se registrá?</h2>
                    <a href="#reg"><input type="button" value="Registrarse" onclick="mostrar();" width="50%"></input></a></form></center>
                    <a name="reg"></a>
                      <div id='oculto' style='display:none;'>
                        <br/><center><h2>Registro</h2></center>
                        <form action="subir_users.php" method="post">
                          Nombre: <input name="name" type="text" required="required"><br/>
                          Apellidos: <input name="ape" type="text" required="required"><br/>
                          Fecha de Nacimiento<br/><input name="date" type="date" value="1980-01-01" required="required"><br/>
                          <br/>RFC <input name="RFC" type="text" required="required"><br/>
                          Telefono <input name="tel" type="text" required="required"><br/>
                          Genero:<select name="genero" required="required">
                          <option value=masculino> Masculino </option>"
                          <option value=femenino> Femenino </option>"
                          </select><br/>
                          Direccion:<input name="dir" type="text" required="required"><br/>
                          Correo:<input name="email" type="email" required="required"><br/>
                          Usuario:<input name="user" type="text" required="required"><br/>
                          Contraseña <input name="pass" type="password" required="required"><br/>
                        <center><input type="submit"></center>
                        </form>
                      </div>
                  </article>

                </div>
              </div>
              <div class="4u 12u$(medium)">
                <div id="sidebar">

                  <!-- Sidebar -->
                    <section>
                      <span class="image fit"><img src="images/slp-luz.jpg"/></span>
                    </section>

                </div>
              </div>
                              <?php
}
                                                                                                        /////////////////////////////////////Aqui inicia el codigo para comprar boletos 
                              else
                              {
                                require 'conexion.php';         //falta estilo
?>                                                                                 
<!-- Main -->
        <div id="main-wrapper">
          <div class="container">
            <div class="row 200%">
              <div class="8u 12u$(medium)">
                <div id="content">
                  <!-- Content -->                        
                                  <h2>Boletos</h2>
                                  <h5>Evento</h5>    
                  <?php 
                     $sql = "SELECT * FROM Eventos ";
                    $result = $conn->query($sql);   
                        echo "<form method=post name=datos action=imprime.php>";
                        echo "<select name=evento>";

                        while($row = $result->fetch_assoc()) {

                            $nombre=$row["nombre_evento"];

                          echo " <option value='$nombre'> $nombre </option>";
                        }
                    echo "</select>";
                    echo "<br>";

                                 
                                 ?>
     

                                <h2>Cantidad de boletos</h2>
                                <h5>Infantil:</h5><input name="nin" type="text" required="required"><br>
                                <h5>Juvenil:</h5><input name="juv" type="text" required="required"><br>
                                <h5>Adulto Mayor:</h5><input name="may" type="text" required="required"><br>
                                <h5>Número de Tarjeta:</h5><input name="cre" type="text" required="required"><br>
                                <h5>Tipo de Tarjeta:</h5><select name="typ"> <option value="Credito"> Credito </option><option value="Debito"> Debito </option><option value="Prepago"> Prepago </option></select><br>
                                <h5>Fecha de caducidad:</h5><input name="exp" type="date" required="required"><br>
                                <br/><center><input  name="formsubmit" type="submit"  id="formsubmit"  value="Reservar"></center>
                                </form>           
                </div>    

              <?php
                              }
                            ?>    
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