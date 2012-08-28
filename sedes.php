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
    
    <!-- SEDES -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script>
    	var jSedes = jQuery.noConflict();
		jSedes(document).ready(function(){
			jSedes("#progressbar").removeClass("ocultar");
			jSedes("#olivos").addClass("active");
			jSedes.post("maps.php", {sedes: "olivos"},
			function(data){
				jSedes("#progressbar").addClass("ocultar");
				jSedes("#sedes_mapas").html(data);
			});
			
			jSedes("#sedes_item ul li a").click(function(){
				jSedes("#progressbar").removeClass("ocultar");
				jSedes("#sedes_item ul li a").removeClass("active");
				jSedes(this).addClass("active");
				var sedes = jSedes(this).attr("id");
				jSedes.post("maps.php", {sedes: sedes},
				function(data){
					jSedes("#progressbar").addClass("ocultar");
					jSedes("#sedes_mapas").html(data);
				});
			})
			
		});
    </script>
    
    
</head>

<body>

<?php require_once("header.php"); ?>

<section>
	<div class="interior">
    	
        <section id="news-carrera">
        
        	<h2>Sedes</h2>
        	
          <div id="sedes_item">
            	<ul>
                	<li><a href="javascript:;" id="olivos">Los Olivos</a></li>
                    <li><a href="javascript:;" id="comas">Comas</a></li>
                    <li><a href="javascript:;" id="puente-piedra">Puente Piedra</a></li>
                </ul>
                
              <div id="sedes_progressbar">
               	  <img id="progressbar" class="ocultar" src="/imagenes/progressbar.gif" width="220" height="19">
              </div>
                
          </div>
            
            <div id="sedes_mapas">
            
            </div>
            
                    
        </section><!-- FIN SECTION -->
        
        <aside id="sidebar">
        	
            <article class="wgFb">
            
            	<h3>Buscanos en Facebook</h3>
            	
                <div id="fb-root"></div>
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
        	
        </aside><!-- FIN ASIDE -->
        
    </div>
</section><!-- FIN SECTION -->

<?php require_once("footer.php"); ?>

<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>

</body>
</html>