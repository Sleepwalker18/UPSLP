<!DOCTYPE HTML>
<!--
  Verti by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
    <title>Programación semanal</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="Shortcut Icon" href="images/icon.ico" type="image/x-icon" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
  </head>
  <body class="homepage">
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
                  <li class="current"><a href="prog-sem.php">Programación</a></li>
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
						<div align="center">
							<h2>Eventos</h2>
						</div>
							<p>Evento concluido<img src="images/pintura-roja.ico" width="5%"><br/></img>Evento próximo<img src="images/pintura_azul.ico" width="5%"></img></p>
					</div>
				</div>


      <!-- Banner -->
        <div id="features-wrapper">
          <div class="box container">
            <div class="row">
              
				<?php
				require 'conexion.php';
				function fecha($fecha){
				   $fecha_actual = strtotime(date("Y-m-d",time()));
				   $fecha_entrada = strtotime($fecha);
						  if($fecha_actual < $fecha_entrada){
						        echo "<br/><img src=images/pintura_azul.ico width=15%></img>";
						  }
						  else{
						        echo "<br/><img src=images/pintura-roja.ico width=15%></img>";
							}
				} 

				// sql to delete a record
				$sql = "SELECT * FROM Eventos ";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()){
				?>

				<div class="4u 12u(medium)">
	                  <section class="box feature">
	                    <img class="image featured">
	                    <?php
switch($row["ubicacion"]){
case 1: $ubic="Teatro de la Paz";break;
case 2: $ubic="El Domo";break;
case 3: $ubic="Salon Montecarlo";break;
case 4: $ubic="Cineteca Alameda";break;
}
	                     $precio=$row["precio"];
	                     if($precio<=200){
	                        $img="images/publico-baj.jpg";
	                     }
	                     if($precio>200 && $precio<=1000){
	                        $img="images/publico-me.jpg";
	                     }
	                     else if($precio>1000)
	                     {
	                        $img="images/publico-ca.jpg";
	                     }
	                      echo"<img src=$img width=100%></img>"; //0-200 barato 201-1000 medio 1000+ 
	                    ?>
	                 
	                    <div class="inner">
	                        <?php
	                        echo"<header><h2>"                      
	                          ."Nombre:".$row["nombre_evento"]."<h2></header><br><p>"
	                          ."<b>Ubicacion:</b>".$ubic."<br>"
	                          ."<b>Precio:</b>".$row["precio"]."<br>"
	                          ."<b>Boletos Disponibles:</b>".$row["boletos_disponibles"]."<br>"
	                          ."<b>Fecha:</b>".$row["fecha"];
	                          fecha($row["fecha"]);
	                          echo"</p>";
	                        ?>
	                    </div>
	                  </section>
              </div>
<?php    
						}
				}

				 else {
				    echo "0 results";
				 }

?>              
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