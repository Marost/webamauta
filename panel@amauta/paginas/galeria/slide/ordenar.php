<?php
include("../../../conexion/conexion.php");
foreach ($_GET['listItem'] as $position => $item) :
	$sql[] = mysql_query("UPDATE ".$tabla_suf."_galeria_slide SET orden = $position WHERE id = $item", $conexion);
endforeach;
?>