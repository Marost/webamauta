<?php
//VARIABLE
$sedes=$_POST["sedes"];

if($sedes=="olivos"){
?>
<iframe width="670" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
src="https://maps.google.com.pe/maps/ms?msa=0&amp;msid=217338416310728973847.0004c80ccc850b287329f&amp;ie=UTF8&amp;t=m&amp;ll=-11.992644,-77.064757&amp;spn=0.004198,0.007178&amp;z=17&amp;output=embed"></iframe>
<img src="imagenes/slides/sedes/sedes-olivos.jpg"  width="670" height="250"/>
<?php }elseif($sedes=="comas"){ ?>
<iframe width="670" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
src="https://maps.google.com.pe/maps/ms?msa=0&amp;msid=217338416310728973847.0004c80ce509e9f243469&amp;hl=es&amp;ie=UTF8&amp;t=m&amp;ll=-11.958555,-77.053728&amp;spn=0.004198,0.007178&amp;z=17&amp;output=embed"></iframe>
<img src="imagenes/slides/sedes/sedes-comas.jpg"  width="670" height="250"/>
<?php }elseif($sedes=="puente-piedra"){ ?>
<iframe width="670" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
src="https://maps.google.com.pe/maps/ms?msa=0&amp;msid=217338416310728973847.0004c8197204dc2e6a0d8&amp;hl=es&amp;ie=UTF8&amp;t=m&amp;z=17&amp;output=embed"></iframe>
<img src="imagenes/slides/sedes/sedes-puente.jpg"  width="670" height="250"/>
<?php } ?>