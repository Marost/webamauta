<?php
session_start();

if ($usuario_user==""){
	header("Location:".$fila_empresa["web"]."".$carpeta_admin."/index.php?nosesion=1");
}
?>