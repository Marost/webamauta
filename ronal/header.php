<header class="limpiar">
	
    <div class="interior limpiar">
    
    	<link rel="stylesheet" type="text/css" href="imageScroller.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
        <div id="header_contenido" class="limpiar">
        
            <div id="header_sup" class="limpiar">
            	<div id="cnt_logo">
                <h1><a href="#" id="logo_sup">Instituto Superior Tecnológico Privado Amauta</a></h1>
                 </div>
                <div id="outerContainer">
            <div id="imageScroller">
            <div id="viewer" class="js-disabled">
					<a class="wrapper" href="http://facebook.com/amauta.istp" title="Facebook"><img class="logo" id="facebook" src="logos/facebook.jpg" alt="Facebook"></a>
					<a class="wrapper" href="http://twitter.com/istp_amauta" title="Twitter"><img class="logo" id="twitter" src="logos/twitter.jpg" alt="Twitter"></a>
					<a class="wrapper" href="http://www.youtube.com" title="Youtube"><img class="logo" id="youtube" src="logos/youtube.jpg" alt="youtube"></a>
					<a class="wrapper" href="http://www.istpamauta.edu.pe/carrera-gst.php" title="Gastronomia"><img class="logo" id="gastronomia" src="logos/gastronomia.jpg" alt="Gastronomia"></a>
					<a class="wrapper" href="http://www.istpamauta.edu.pe/carrera-cmp.php" title="Computacion"><img class="logo" id="computacion" src="logos/computacion.jpg" alt="Computacion e Informatica"></a> 
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
		
         
                
               <!-- <div id="wg_social">
                    <ul id="wgsc_items">
                        <li><a target="_blank" class="wgsc_facebook" href="http://facebook.com/amauta.istp">Facebook</a></li>
                        <li><a target="_blank" class="wgsc_twitter" href="http://twitter.com/istp_amauta">Twitter</a></li>
                    </ul>
                </div>-->
      </div>        
      </div>
        </div>         
            </div><!-- FIN HEADER SUP -->
            
          
            
           
                    
            <nav>
                <ul id="nav" class="sf-menu">
                    <li class="first bgr"><a class="mains" href="/" title="">Inicio</a></li>
                    <li class="bgr"><a class="mains" href="nosotros.php" title="">Nosotros</a></li>
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
            
            <link rel="stylesheet" href="imageflow.packed.css" type="text/css" />
		<script type="text/javascript" src="imageflow.packed.js"></script>
            
            <div id="myImageFlow" class="imageflow">
            <img src="img/slide/amauta1.jpg" longdesc="http://www.istpamauta.edu.pe/carrera-adm.php" width="300" height="400" alt="Administración de Empresas" />
			<img src="img/slide/amauta2.jpg" longdesc="http://www.istpamauta.edu.pe/carrera-cmp.php" width="300" height="400" alt="Computación e Informática" />
			<img src="img/slide/amauta3.jpg" longdesc="http://www.istpamauta.edu.pe/carrera-gst.php" width="300" height="400" alt="Gastronomía y Arte Culinario" />
			<img src="img/slide/amauta4.jpg" longdesc="http://www.istpamauta.edu.pe/carrera-mkt.php" width="300" height="400" alt="Marketing Empresarial" />
			<!--<img src="img/any (2).jpg" longdesc="img/any (2).jpg" width="300" height="400" alt="Image 5" />
			<img src="img/any.jpg" longdesc="img/any.jpg" width="400" height="300" alt="Image 6" />
			<img src="img/any (2).jpg" longdesc="img/any (2).jpg" width="300" height="400" alt="Image 7" />
			<img src="img/any (3).jpg" longdesc="img/any (3).jpg" width="400" height="400" alt="Image 8" />
			<img src="img/any.jpg" longdesc="img/any.jpg" width="400" height="300" alt="Image 9" />
			<img src="img/any.jpg" longdesc="img/any.jpg" width="400" height="300" alt="Image 10" />
			<img src="img/any (2).jpg" longdesc="img/any (2).jpg" width="300" height="400" alt="Image 11" />
			<img src="img/any (3).jpg" longdesc="img/any (3).jpg" width="400" height="400" alt="Image 12" />
			<img src="img/any (2).jpg" longdesc="img/any (2).jpg" width="300" height="400" alt="Image 13" />
			<img src="img/any (3).jpg" longdesc="img/any (3).jpg" width="400" height="400" alt="Image 14" />
			<img src="img/any (3).jpg" longdesc="img/any (3).jpg" width="400" height="400" alt="Image 15" />-->
		</div>
            
            <!--<?php if($script_slidersup==true){ ?>
            <div id="slide_superior">
            	<div id="slsup_items">
                	<a href="carrera-adm.php">
           	  			<img src="imagenes/slide/amauta1.jpg" alt="Imagen" width="940" height="415" />
                    </a>
                    <a href="carrera-cmp.php">
           	  			<img src="imagenes/slide/amauta2.jpg" alt="Imagen" width="940" height="415" />
                    </a>
                    <a href="carrera-gst.php">
           	  			<img src="imagenes/slide/amauta3.jpg" alt="Imagen" width="940" height="415" />
                    </a>
                    <a href="carrera-mkt.php">
           	  			<img src="imagenes/slide/amauta4.jpg" alt="Imagen" width="940" height="415" />
                    </a>
                </div>
            </div>
            <?php } ?>-->
        
        </div><!-- FIN CONTENIDO HEADER -->
        
    </div><!-- FIN INTERIOR -->
    
</header><!-- FIN HEADER -->