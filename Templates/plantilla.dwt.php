<?php 
	$titulo = "Framework";  
	$descripcion = "Descripción";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html lang="es-MX" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php 
        include_once("./blocks/metas.php"); 
        include_once("./blocks/scripts.php");
    ?>
    <link href="../css/estructura.css" rel="stylesheet" type="text/css" />
    <link href="../css/estilo.css" rel="stylesheet" type="text/css" />
    <!-- TemplateBeginEditable name="head" -->
    <style type="text/css">
		
    </style>
    <!-- TemplateEndEditable -->
</head>

<?php include_once("./blocks/header.php");?>
<body onresize="spanner();" onload="spanner();">
    <!-- TemplateBeginEditable name="PreContainer" -->
    PreContainer
	<!-- TemplateEndEditable -->
    <div class="container">
		<!-- TemplateBeginEditable name="Container" -->
        Container
        <!-- TemplateEndEditable -->
    </div>
</body>
<?php include_once("./blocks/footer.php");?>
<script async type="text/javascript" src="./js/funciones.js"></script>
</html>