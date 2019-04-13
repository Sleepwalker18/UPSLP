<?php
 session_start ();
 if(!empty($_SESSION['usuario']))
 {
 session_destroy ();

echo"<script type=text/javascript>
						alert('Sesion Finalizada');
						window.location.assign('http://eventsanluis.0fees.us/');
					</script>";
 }
?>
