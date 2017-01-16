<?php
$filename = basename($_SERVER['PHP_SELF']);
if(!isset($fullURL)){
	$fullURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

$titulo = ($titulo);
$descripcion = ($descripcion);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html lang="es-MX" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">

<title><?php echo $titulo; ?></title>
<meta itemprop="name" content="<?php echo $titulo; ?>" /> 
<meta property="og:title" content="<?php echo $titulo; ?>" />
<meta name="twitter:title" content="<?php echo $titulo; ?>" />
<meta property="og:site_name" content="<?php echo $titulo; ?>" />

<meta name="description" content="<?php echo $descripcion; ?>" />
<meta itemprop="description" content="<?php echo $descripcion; ?>" />
<meta property="og:description" content="<?php echo $descripcion; ?>" />
<meta name="twitter:description" content="<?php echo $descripcion; ?>" />
<meta property="og:url" content="<?php echo $fullURL; ?>" />
<meta name="twitter:url" content="<?php echo $fullURL; ?>" />
<link href="<?php echo $fullURL; ?>" rel="canonical" />
<link rel="alternate" href="<?php echo $fullURL; ?>" hreflang="es-mx" />  

<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" />
<link href="css/estructura.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="all / index / follow" />
<link href='/favicon.ico' rel='shortcut icon' type='image/x-icon'/>
<meta name="dc.language" content="es">

