<?php 
	$titulo = "Framework";  
	$descripcion = "Descripción";
	$men = "";
	
	include_once("./php/SQL.php");
	include_once("./php/AUTH.php");
	include_once("./facebook/FACEBOOK.php");

	$con =
	Q_connect();
	validate($user);
	print_rr($user);
	
	//$fbuser = FB_get("/me?fields=id,name,email",$user['facebook_token']);
	//print_rr($fbuser);
	
	$idorden = (int) $_GET['id'];
	$where['id']  = array($idorden,"=");
	$orden = Q_select("ordenes",NULL,$where);
	
	$w["id"] = $orden["data"][0]["idusuario"];
	$usuario = Q_select("usuarios",array("id","email","nombre","apellido"),$w);
	
	$tablas = array("productos","ventas");
	$fields["productos"] = array("id","codigo","ancho","alto","rin","marca","modelo");
	$fields["ventas"] = array("idorden","cantidad","precio","total","estado");
	$where2["idorden"] = $idorden;
	
	$ventas = Q_join($tablas,$fields,false,$where2,"ventas.idproducto = productos.id");
	/*
	if($con['status']){
		//$ins = Q_insert("usuarios","germi_uga@hotmail.comB","email");
		//$int = Q_insert("usuarios","áño","email");
		$where["rin"] = 15;
		$where["alto"] = 60;
		//$sel = Q_select("productos","id,rin,alto,modelo",$where);
		//$sel = Q_select_id("productos",10);
		//$cont = Q_count("productos",1,"cantidad",false);
		//$upd = Q_update("usuarios", "correo2,Luis2,Luna,1" ,2, "email,nombre,apellido,verificado" );
		$sel = Q_exists("productos","ancho",145);
	}else{
		$men .= $con['message'];
	}*/
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
<?php 
		
		//$q = Q_join(array("ordenes","productos","ventas"),NULL,false,$where,"ventas.idorden = ordenes.id AND ventas.idproducto = productos.id");
		echo '<h1>Usuario:</h1>';
		echo Q_print2($usuario['data']);
		
		echo '<br /><h1>Orden:</h1>';
		echo Q_print2($orden['data']);
		
		echo '<br /><h1>Ventas:</h1>';
		echo Q_print2($ventas['data']);
		?>
        <!-- InstanceEndEditable -->
    </div>
</body>
<?php include_once("./blocks/footer.php");?>
<script async type="text/javascript" src="./js/funciones.js"></script>
<!-- InstanceEnd --></html>