<?php 
	$titulo = "Framework";  
	$descripcion = "Descripción";
	include_once("./php/SQL.php");
	include_once("./php/AUTH.php");
	$print = "";
	if(isset($_GET['c'])){
	//El comando está puesto
		if($_GET['c']=="receive"){
		//Se va a recibir una verificación
			if( isset($_GET['ja']) && isset($_GET['xa']) ){
				$ja = decryptInt($_GET['ja']);
				$xa = urldecode($_GET['xa']);
				$W['id_usuario'] = $ja;
				$W['contrasena'] = $xa;
				$con = Q_connect();
				$sel = Q_select("tUsuarios",array("id_usuario","email","contrasena"),$W);

				if($sel['status']){
					if(sizeof($sel['data'])!=0){
						$print .= "Login!";
					}else{
						$print .= "* Los datos del correo de validación no son correctos.<br />";
					}
				}else{
					$print .= "* Error al verificar los datos : ". $sel['men']."<br />";
				}
			}else{
				$print .= "* Los elementos del correo no están presentes.<br />";
			}
		}
	}
	echo $print;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html lang="es-MX" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
	<?php 
        include_once("./blocks/metas.php"); 
        include_once("./blocks/scripts.php");
    ?>
    <link href="css/estructura.css" rel="stylesheet" type="text/css" />
    <link href="css/estilo.css" rel="stylesheet" type="text/css" />
    <!-- InstanceBeginEditable name="head" -->
    <style type="text/css">
		
    </style>
    <!-- InstanceEndEditable -->
</head>

<?php include_once("./blocks/header.php");?>
<body onresize="spanner();" onload="spanner();">
    <!-- InstanceBeginEditable name="PreContainer" -->
    PreContainer
	<!-- InstanceEndEditable -->
    <div class="container">
		<!-- InstanceBeginEditable name="Container" -->
        Container
        <!-- InstanceEndEditable -->
    </div>
</body>
<?php include_once("./blocks/footer.php");?>
<script async type="text/javascript" src="./js/funciones.js"></script>
<!-- InstanceEnd --></html>