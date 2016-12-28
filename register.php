<?php 
	$titulo = "Framework";  
	$descripcion = "Descripción";
	include_once("./php/SQL.php");
	include_once("./php/AUTH.php");
	include_once("./facebook/FACEBOOK.php");
	
	$con = Q_connect();
	$imprimir = "";
	if(isset($_GET['resultado'])){
		$imprimir = 
		"* Tu cuenta fue creada con éxito.<br />
		Revisa tu bandeja de entrada y de SPAM para verificar tu cuenta.<br />";
	}else{
		//Regular POST
		if(isset($_POST["registrar"])){
			$otros['nombre'] = $_POST['nombre'];
			$otros['apellido'] = $_POST['apellido'];
			
			register( $user , $_POST['email'] , $_POST['contrasena'] ,  $_POST['contrasena2'] , 
			$otros, "index.php?resultado=1");
			
			if(!$user['status']){echo $user['men'];}
		}else{
			//Facebook Register
			if(!isset($_GET['code'])){
					$loginUrl = FB_login($fb);
					echo '<a href="' .($loginUrl). '">Registro con Facebook</a>';
			}else{
				$Token = FB_catchToken($fb);
				
				if (isset($Token)) {
					$fb->setDefaultAccessToken($Token);
					$fbuser = FB_get("/me?fields=id,first_name,last_name,email");
					$contrasena = ($fbuser['id']*1808).$sal;
					
					$otros['nombre'] = $fbuser['first_name'];
					$otros['apellido'] = $fbuser['last_name'];
					$otros['facebook_id'] = $fbuser['id'];
					$otros['facebook_token'] = $Token;
					$otros['verificado'] = 1;
					
					register( $user , $fbuser['email'] , $contrasena, $contrasena, $otros, "index.php?resultado=2",false);
					if(!$user['status']){
						echo $user['men'];
					}
				}
			}
		}
	}
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
        <form id="register" action="" method="post" enctype="multipart/form-data" name="register" target="_self">
        
        <input name="email" placeholder="Correo electrónico" type="text" size="50" /><br />
        <input name="contrasena" placeholder="Contraseña" type="password" size="50" /><br />
        <input name="contrasena2" placeholder="Repetir contraseña" type="password" size="50" /><br />
        
        <input name="nombre" placeholder="Nombres(s)" type="text" size="50" /><br />
        <input name="apellido" placeholder="Apellido(s)" type="text" size="50" /><br />
        
        <input name="registrar" type="submit" value="Crear cuenta" />
		
        </form>
        <!-- InstanceEndEditable -->
    </div>
</body>
<?php include_once("./blocks/footer.php");?>
<script async type="text/javascript" src="./js/funciones.js"></script>
<!-- InstanceEnd --></html>