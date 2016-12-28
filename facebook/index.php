<?php 
include_once("../facebook/FACEBOOK.php");
$loginUrl = FB_login($fb);
echo '<a href="' .($loginUrl). '">Entra con Facebook!</a>';

?>