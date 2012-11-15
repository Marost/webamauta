<header class="limpiar">
	
    <div class="interior limpiar">
    
    	<link rel="stylesheet" type="text/css" href="css/imageScroller.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
        <div id="header_contenido" class="limpiar">
        
            <div id="header_sup" class="limpiar">
            	<div id="cnt_logo">
                <h1><a href="#" id="logo_sup">Instituto Superior Tecnológico Privado Amauta</a></h1>
                 </div>
                <div id="outerContainer">
            <div id="imageScroller">
            <div id="viewer" class="js-disabled">
					<a class="wrapper" href="http://facebook.com/amauta.istp" title="Facebook"><img class="logo" id="facebook" src="imagenes/slides/logos/facebook.png" alt="Facebook"></a>
					<a class="wrapper" href="http://twitter.com/istp_amauta" title="Twitter"><img class="logo" id="twitter" src="imagenes/slides/logos/twitter.png" alt="Twitter"></a>
					<a class="wrapper" href="http://www.youtube.com" title="Youtube"><img class="logo" id="youtube" src="imagenes/slides/logos/youtube.png" alt="youtube"></a>
					<a class="wrapper" href="carrera-adm.php" title="Administración de Empresas"><img class="logo" id="administración" src="imagenes/slides/logos/administracion.png" alt="Administración"></a>
					<a class="wrapper" href="carrera-cmp.php" title="Computación e Informática"><img class="logo" id="computación" src="imagenes/slides/logos/computacion.png" alt="Computación"></a> 
                    <a class="wrapper" href="carrera-gst.php" title="Gastronomía y Arte Culinario"><img class="logo" id="gastronomía" src="imagenes/slides/logos/gastronomia.png" alt="Gastronomía"></a>
                    <a class="wrapper" href="carrera-mkt.php" title="Marketing Empresarial"><img class="logo" id="marketing" src="imagenes/slides/logos/marketing.png" alt="Marketing"></a>
                    
            <script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
            <script type="text/javascript">
			$(function() {
						  //remove js-disabled class
			$("#viewer").removeClass("js-disabled");
						  //create new container for images
			$("<div>").attr("id", "container").css({ position:"absolute"}).width($(".wrapper").length * 170).height(170).appendTo("div#viewer");
			  			//add images to container
				$(".wrapper").each(function() {
					$(this).appendTo("div#container");
				});
					//work out duration of anim based on number of images (1 second for each image)
				var duration = $(".wrapper").length * 3000;
				
				//store speed for later (distance / time)
				var speed = (parseInt($("div#container").width()) + parseInt($("div#viewer").width())) / duration;
								
				//set direction
				var direction = "rtl";
				
				//set initial position and class based on direction
				(direction == "rtl") ? $("div#container").css("left", $("div#viewer").width()).addClass("rtl") : $("div#container").css("left", 0 - $("div#container").width()).addClass("ltr") ;
				
				//animator function
				var animator = function(el, time, dir) {
				 
					//which direction to scroll
					if(dir == "rtl") {
					  
					  //add direction class
						el.removeClass("ltr").addClass("rtl");
					 		
						//animate the el
						el.animate({ left:"-" + el.width() + "px" }, time, "linear", function() {
												
							//reset container position
							$(this).css({ left:$("div#imageScroller").width(), right:"" });
							
							//restart animation
							animator($(this), duration, "rtl");
							
							//hide controls if visible
							($("div#controls").length > 0) ? $("div#controls").slideUp("slow").remove() : null ;			
											
						});
					} else {
					
					  //add direction class
						el.removeClass("rtl").addClass("ltr");
					
						//animate the el
						el.animate({ left:$("div#viewer").width() + "px" }, time, "linear", function() {
												
							//reset container position
							$(this).css({ left:0 - $("div#container").width() });
							
							//restart animation
							animator($(this), duration, "ltr");
							
							//hide controls if visible
							($("div#controls").length > 0) ? $("div#controls").slideUp("slow").remove() : null ;			
						});
					}
				}
				
				//start anim
				animator($("div#container"), duration, direction);
				
				//pause on mouseover
				$("a.wrapper").live("mouseover", function() {
				  
					//stop anim
					$("div#container").stop(true);
					
					//show controls
					($("div#controls").length == 0) ? $("<div>").attr("id", "controls").appendTo("div#outerContainer").css({ opacity:0.7 }).slideDown("slow") : null ;
					($("a#rtl").length == 0) ? $("<a>").attr({ id:"rtl", href:"#", title:"rtl" }).appendTo("#controls") : null ;
					($("a#ltr").length == 0) ? $("<a>").attr({ id:"ltr", href:"#", title:"ltr" }).appendTo("#controls") : null ;
					
					//variable to hold trigger element
					var title = $(this).attr("title");
					
					//add p if doesn't exist, update it if it does
					($("p#title").length == 0) ? $("<p>").attr("id", "title").text(title).appendTo("div#controls") : $("p#title").text(title) ;
				});
				
				//restart on mouseout
				$("a.wrapper").live("mouseout", function(e) {
				  
					//hide controls if not hovering on them
					(e.relatedTarget == null) ? null : (e.relatedTarget.id != "controls") ? $("div#controls").slideUp("slow").remove() : null ;
					
					//work out total travel distance
					var totalDistance = parseInt($("div#container").width()) + parseInt($("div#viewer").width());
														
					//work out distance left to travel
					var distanceLeft = ($("div#container").hasClass("ltr")) ? totalDistance - (parseInt($("div#container").css("left")) + parseInt($("div#container").width())) : totalDistance - (parseInt($("div#viewer").width()) - (parseInt($("div#container").css("left")))) ;
					
					//new duration is distance left / speed)
					var newDuration = distanceLeft / speed;
				


					//restart anim
					animator($("div#container"), newDuration, $("div#container").attr("class"));

				});
												
				//handler for ltr button
				$("#ltr").live("click", function() {
				 					
					//stop anim
					$("div#container").stop(true);
				
					//swap class names
					$("div#container").removeClass("rtl").addClass("ltr");
										
					//work out total travel distance
					var totalDistance = parseInt($("div#container").width()) + parseInt($("div#viewer").width());
					
					//work out remaining distance
					var distanceLeft = totalDistance - (parseInt($("div#container").css("left")) + parseInt($("div#container").width()));
					
					//new duration is distance left / speed)
					var newDuration = distanceLeft / speed;
					
					//restart anim
					animator($("div#container"), newDuration, "ltr");
				});
				
				//handler for rtl button
				$("#rtl").live("click", function() {
										
					//stop anim
					$("div#container").stop(true);
					
					//swap class names
					$("div#container").removeClass("ltr").addClass("rtl");
					
					//work out total travel distance
					var totalDistance = parseInt($("div#container").width()) + parseInt($("div#viewer").width());

					//work out remaining distance
					var distanceLeft = totalDistance - (parseInt($("div#viewer").width()) - (parseInt($("div#container").css("left"))));
					
					//new duration is distance left / speed)
					var newDuration = distanceLeft / speed;
				
					//restart anim
					animator($("div#container"), newDuration, "rtl");
				});
			});
		</script>
        
      </div>        
      </div>
        </div>         
            </div><!-- FIN HEADER SUP -->
            
          
           <nav>
                <ul id="nav" class="sf-menu">
                    <li class="first bgr"><a class="mains" href="/" title="">Inicio</a></li>
                    <li class="bgr"><a class="mains" href="javascript:;" title="">Nosotros</a>
                    <ul class="submenu">
                            <li><a href="mis_vis.php">Nuestra Misión y Visión</a></li>
                            <li><a href="pqfe.php">¿Por qué formamos emprendedores?</a></li>
                         </ul>
                    </li>
                    <li class="bgr"><a class="mains" href="javascript:;" title="">Carreras Profesionales</a>
                    	<ul class="submenu">
                            <li><a href="carrera-adm.php">Administración de Empresas</a></li>
                            <li><a href="carrera-cmp.php">Computación e Informática</a></li>
                            <li><a href="carrera-gst.php">Gastronomia</a></li>
                            <li><a href="carrera-mkt.php">Marketing Empresarial</a></li>
                        </ul>
                    </li>
                    <li class="bgr"><a class="mains" href="#" title="">Centro de Emprendimiento</a>
                    	<ul class="submenu">
                            <li><a href="empr-chef.php">Chef de Alta Cocina</a></li>
                            <li><a href="empr-compu.php">Computación e Informática</a></li>
                            <li><a href="empr-gastro.php">Gastronomia y Arte Culinario</a></li>
                            <li><a href="empr-markt.php">Marketing Empresarial</a></li>
                        </ul>
                    </li>
                    <li class="bgr"><a class="mains" href="idiomas.php" title="">Centro de Idiomas</a></li>
                    <li class="bgr"><a class="mains" href="sedes.php" title="">Sedes</a></li>
                    <li class="last bgr"><a class="mains last" href="#" title="">Contactenos</a></li>
                </ul><!-- FIN MENU -->
            </nav><!-- FIN NAV -->
            
            <div class="2_animations">
            
            <link rel="stylesheet" href="css/imageflow.packed.css" type="text/css" />
		<script type="text/javascript" src="js/imageflow.packed.js"></script>
        
            
            <div id="myImageFlow" class="imageflow">
            <img src="imagenes/slides/principal/amauta1_chico.jpg" longdesc="carrera-adm.php" width="300" height="400" alt="Administración de Empresas" />
			<img src="imagenes/slides/principal/amauta2_chico.jpg" longdesc="carrera-cmp.php" width="300" height="400" alt="Computación e Informática" />
			<img src="imagenes/slides/principal/amauta3_chico.jpg" longdesc="carrera-gst.php" width="300" height="400" alt="Gastronomía y Arte Culinario" />
			<img src="imagenes/slides/principal/amauta4_chico.jpg" longdesc="carrera-mkt.php" width="300" height="400" alt="Marketing Empresarial" />
            <img src="imagenes/slides/principal/chef_chico.jpg" longdesc="empr-chef.php" width="300" height="400" alt="Chef de Alta Cocina" />
            <img src="imagenes/slides/principal/computacion_chico.jpg" longdesc="empr-compu.php" width="300" height="400" alt="Computacion e Informatica" />
             </div>  
             
             <?php require_once("menud_header.php"); ?>
                    
          <!--<?php if($script_slidersup==true){ ?>
           
            <?php } ?>-->
        
        </div><!-- FIN CONTENIDO HEADER -->
        
    </div><!-- FIN INTERIOR -->
    
</header><!-- FIN HEADER -->

      