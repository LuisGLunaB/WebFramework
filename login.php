<?php 
	$titulo = "Framework";  
	$descripcion = "Descripción";
	include_once("./php/SQL.php");
	include_once("./php/AUTH.php");
	include_once("./facebook/FACEBOOK.php");
	$con = Q_connect();
	
	//Regular Post
	if(isset($_POST["entrar"])){
		login( $user , $_POST['email'] , $_POST['contrasena'], "index.php?resultado=1");
		if(!$user['status']){
			echo $user['men'];
		}
	}else{
	//Facebook Login
		if(!isset($_GET['code'])){
			$loginUrl = FB_login($fb,"login.php");
			echo '<a href="' .($loginUrl). '">Entrar con Facebook</a>';
		}else{
			$Token = FB_catchToken($fb);
			
			if (isset($Token)) {
				$fb->setDefaultAccessToken($Token);
				$fbuser = FB_get("/me?fields=id,first_name,last_name,email");
				$contrasena = ($fbuser['id']*1808).$sal;
				
				login( $user , $fbuser['email'] , $contrasena, "index.php?resultado=2");		
					
				if(!$user['status']){
					echo $user['men'];
				}else{
					//Actualizar Token, si hay un error, imprimirlo.
					$user["facebook_token"] = $Token;
					$sus = FB_save_token( $user['id'] , $user["facebook_token"] );
					if(!$sus){echo $sus;}
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
    
	<!-- InstanceEndEditable -->
    <div class="container">
		<!-- InstanceBeginEditable name="Container" -->
        <form id="login" action="" method="post" enctype="multipart/form-data" name="login" target="_self">
        
        <input name="email" placeholder="Correo electrónico" type="text" size="50" /><br />
        <input name="contrasena" placeholder="Contraseña" type="password" size="50" /><br />
        <input name="entrar" type="submit" value="Entrar" />
		
        </form>
        <!-- InstanceEndEditable -->
    </div>
</body>
<?php include_once("./blocks/footer.php");?>
<script async type="text/javascript" src="./js/funciones.js"></script>
<!-- InstanceEnd --></html>