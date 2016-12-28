<?php 
if(!isset($debugging)){$debugging=false;}
function mensaje($x){
	global $debugging;
	if($debugging){
		return $x;
	}else{
		$split = explode(":",$x);
		return ($split[0]."<br />");
	}
}
?>

<style>
	#logo{
		
	}
	
	.menu{
		
	}
	
	.menu a{
		text-decoration: none;
	}
	
	/*TABLETS*/
	@media screen and (max-width:1101px;) {
	}
	/*CELULARES*/
	@media screen and (max-width:761px) {
	}
</style>

<!--MENU PARA CELULARES-->
<div id="mobile-menu">
<a style="text-align:right !important;" id="boton-menu2">
<img src="./img/menuclose.png" alt="Contraer Menú" width="50px" height="auto" onclick="js_animate('mobile-menu','top','-100%','0.4s','ease');mobile_hide();" /></a>
    <a href="contacto.php">Contacto</a>
    <a href="consultoria-marketing.php">Marketing y Branding</a>
    <a href="disenografico.php">Diseño Gráfico y Publicitario</a>
    <a href="medios-btl.php">Medios y BTL</a>
    <a href="redessociales.php">Social Media Marketing</a>
    <a href="marketingdigital.php">Marketing Digital</a>
    <a href="disenoweb.php">Diseño Web</a> 
</div>

<header id="spanner" style="height:auto;">
  <div class="row menu">
	<div class="c12">&nbsp;</div>
  </div>
</header>

<!--BOTON PARA MOSTRAR MENU EN CELULARES-->
<a id="boton-menu1"><img src="./img/menu2.png" alt="Desplegar Menú" width="50" height="50" 
onclick="js_animate('mobile-menu','top','5px','0.4s','ease');mobile_show();" /></a>

<!--"SPANNED" Sirve para ajustar donde inicia el cuerpo del sitio, justo del tamaño del menú-->
<div id="spanned" style="display:block; height:100px;"> </div>

<!--LO QUE SIGUE ES PARA MOSTRAR MENSAJES, CASI NUNCA LO USO-->
<div id="men" onclick="men_visible = esconder_mensaje();" style="opacity: 0.0; display: none;"></div>
<script type="text/javascript">men_visible = false;</script>
<?php 
	if(isset($men)){
		if($men==""){
			echo '<script type="text/javascript">men = "";</script>';
		}else{
			echo '<script type="text/javascript">men = "'.mensaje(utf8_encode($men)).'";</script>';
		}
	}else{
		echo '<script type="text/javascript">men = "";</script>';
	}
?>

