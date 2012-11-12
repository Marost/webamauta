<?php
$script_slidercarrera=true;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Instituto de Educación Superior Tecnológico Privado Amauta">
    <meta property="og:title" content="Instituto de Educación Superior Tecnológico Privado Amauta">
    <meta property="og:description" content="Formamos profesionales técnicos en Computación e Informática, Gestión Empresarial (Administración y Marketing) con calidad académica y administrativa, generando creatividad y mentalidad emprendedora empresarial.">
    <meta property="og:url" content="http://istpamauta.edu.pe">
	<title>Instituto de Educación Superior Tecnnológico Privado Amauta</title>
    
    <?php require_once("header-scripts.php"); ?>

<!-- SPRY -->
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">

<!-- FORMULARIO -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
var jForm = jQuery.noConflict();
jForm(document).ready(function(){
	jForm("#contact_boton").click(function(){
		jForm("#progressbar").removeClass("ocultar");
		var contact_nombre = jForm("#contact_nomb").val();
		var contact_email = jForm("#contact_email").val();
		validacion_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
		
		if (contact_nombre == "") {
		    jForm("#contact_nomb").focus();
			jForm("#contact_nomb_msj").removeClass("ocultar");
		    return false;
		}else if(contact_email == "" || !validacion_email.test(contact_email)){
		    jForm("#contact_email").focus();
			jForm("#contact_email_msj").removeClass("ocultar");
		    return false;
		}else {
			var datos = jForm("#form_contacto").serialize();
			jForm.ajax({
				type: "POST",
				url: "index.php",
				data: datos,
				success: function() {
					jForm("#progressbar").addClass("ocultar");
					alert("enviado");
				},
				error: function() {
					alert("hola");
				}
			});
			return false;
		}
		
		
		
	});
});
</script>

</head>

<body>

<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<?php require_once("header.php"); ?>

<section>
	<div class="interior">
    	
        <section id="news-carrera">
        
        	<h2>Contactenos</h2>
        	
            <div class="nwc-info">
            	
                <p>Estimado alumno y/o visitante, si deseas comunicarte con nosotros, no dudes en llenar el formulario y enviarnoslo. Te estaremos respondiendo a la brevedad. Gracias</p>
                
            	<form method="post" id="form_contacto">
                
               	  <fieldset>
                    	<label for="contact_nomb">Nombre y Apellidos</label>
               		<span id="spry_contact_nomb">
                    	<input id="contact_nomb" name="contact_nomb" type="text">
                    	<span id="contact_nomb_msj" class="textfieldRequiredMsg ocultar">(*)</span></span>
               	  </fieldset>
                    
                  <fieldset>
                    	<label for="contact_email">Email</label>
                   	<span id="spry_contact_email">
                    <input id="contact_email" name="contact_email" type="text">
                    <span id="contact_email_msj" class="textfieldRequiredMsg ocultar">(*)</span></span>
                  </fieldset>
                    
                  <fieldset>
                    	<label for="contact_telf">Teléfono</label>
                   	<span id="spry_contact_telf">
                    <input id="contact_telf" name="contact_telf" type="text">
					</span>
                  </fieldset>
                    
                  <fieldset>
                    	<label for="contact_inst">Institución o Empresa</label>
                   		<span id="spry_contact_inst">
                    	<input id="contact_inst" name="contact_inst" type="text">
						</span>
                  </fieldset>
                    
                  <fieldset>
                    	<label>Mensaje</label>
                        <textarea></textarea>
                    </fieldset>
                    
                  <fieldset class="texto_centro">
                  		<img src="/imagenes/progressbar.gif" width="220" height="19" class="ocultar">
                    	<button id="contact_boton" class="green gradient">Enviar</button>
                    </fieldset>
                
                </form>
            
          </div>
        
        </section><!-- FIN SECTION -->
        
        <aside id="sidebar">
        	
            <article class="wgFb">
            
            	<h3>Buscanos en Facebook</h3>
                
			  <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=217179171676130";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
                
                <div class="fb-like-box" data-href="https://www.facebook.com/amauta.istp" data-width="240" 
                data-height="360" data-show-faces="true" data-stream="false" data-header="false"></div>
                
            </article>
            
            <?php require_once("menud_header.php"); ?>
        	
        </aside><!-- FIN ASIDE -->
        
    </div>
    
</section><!-- FIN SECTION -->

<?php require_once("footer.php"); ?>

<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>

</body>
</html>