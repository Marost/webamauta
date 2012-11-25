<?php
//CONEXION CON EL SERVIDOR

$conexion=mysql_connect("localhost","istpamau_wadm12p","NnQ-!0Ig5NB%eA(9HZ");
mysql_select_db("istpamau_webdesing",$conexion);


//ZONA HORARIA
date_default_timezone_set('America/Lima');

//VARIABLES GLOBALES
global $carpeta_admin;
global $tabla_suf;
global $sesion_pre;
global $rst_empresa;
global $fila_empresa;
global $rst_prv_user;
global $fila_prv_user;
global $usuario_user;
global $usuario_nombre;
global $usuario_apellido;
global $usuario_email;
global $web;
global $fechaActual;

//VARIABLES
$carpeta_admin="panel@amauta";
$tabla_suf="ista";
$sesion_pre="istpa";
$fechaActual=date("Y-m-d H:i:s");

//EMPRESA
$rst_empresa=mysql_query("SELECT * FROM ".$tabla_suf."_empresa WHERE id=1;", $conexion);
$fila_empresa=mysql_fetch_array($rst_empresa);
$web=$fila_empresa["web"];

if ($_SESSION["user-".$sesion_pre.""]<>""){
	$usuario_user=$_SESSION["user-".$sesion_pre.""];
	$usuario_nombre=$_SESSION["user_nombre-".$sesion_pre.""];
	$usuario_apellido=$_SESSION["user_apellido-".$sesion_pre.""];
	$usuario_email=$_SESSION["user_email-".$sesion_pre.""];
	
	
}
?>