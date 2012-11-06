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
					<a class="wrapper" href="http://facebook.com/amauta.istp" title="Facebook"><img class="logo" id="facebook" src="logos/facebook.png" alt="Facebook"></a>
					<a class="wrapper" href="http://twitter.com/istp_amauta" title="Twitter"><img class="logo" id="twitter" src="logos/twitter.png" alt="Twitter"></a>
					<a class="wrapper" href="http://www.youtube.com" title="Youtube"><img class="logo" id="youtube" src="logos/youtube.png" alt="youtube"></a>
					<a class="wrapper" href="http://www.istpamauta.edu.pe/carrera-adm.php" title="Administración de Empresas"><img class="logo" id="administración" src="logos/administracion.png" alt="Administración"></a>
					<a class="wrapper" href="http://www.istpamauta.edu.pe/carrera-cmp.php" title="Computación e Informática"><img class="logo" id="computación" src="logos/computacion.png" alt="Computación"></a> 
                    <a class="wrapper" href="http://www.istpamauta.edu.pe/carrera-gst.php" title="Gastronomía y Arte Culinario"><img class="logo" id="gastronomía" src="logos/gastronomia.png" alt="Gastronomía"></a>
                    <a class="wrapper" href="http://www.istpamauta.edu.pe/carrera-mkt.php" title="Marketing Empresarial"><img class="logo" id="marketing" src="logos/marketing.png" alt="Marketing"></a>
                    
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
            
            <div class="2_animations">
            
            <link rel="stylesheet" href="imageflow.packed.css" type="text/css" />
		<script type="text/javascript" src="imageflow.packed.js"></script>
        
            
            <div id="myImageFlow" class="imageflow">
            <img src="img/slide/amauta1.jpg" longdesc="http://www.istpamauta.edu.pe/carrera-adm.php" width="300" height="400" alt="Administración de Empresas" />
			<img src="img/slide/amauta2.jpg" longdesc="http://www.istpamauta.edu.pe/carrera-cmp.php" width="300" height="400" alt="Computación e Informática" />
			<img src="img/slide/amauta3.jpg" longdesc="http://www.istpamauta.edu.pe/carrera-gst.php" width="300" height="400" alt="Gastronomía y Arte Culinario" />
			<img src="img/slide/amauta4.jpg" longdesc="http://www.istpamauta.edu.pe/carrera-mkt.php" width="300" height="400" alt="Marketing Empresarial" />
            
             </div>  
				   
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/> 
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
	<script src="js/cufon-yui.js" type="text/javascript"></script>
	<!--	<script src="js/Bebas_400.font.js" type="text/javascript"></script>-->
		<!--<script type="text/javascript">
			Cufon('.cn_wrapper h1,h2', {
				textShadow: '-1px 1px black'
			});
		</script>-->
            
  		<div class="cn_wrapper">
			<div id="cn_list" class="cn_list">
				<div class="cn_page" style="display:block;">
					<div class="cn_item selected">
						<h2>Administracion de Empresas</h2>
						<p><a href="http://www.istpamauta.edu.pe/carrera-adm.php">Ver más...</a></p>
                    </div>
					<div class="cn_item">
						<h2>Computacion e Informatica</h2>
						<p><a href="http://www.istpamauta.edu.pe/carrera-cmp.php">Ver más...</a></p>
					</div>
					<div class="cn_item">
						<h2>Gastronomia y Arte Culinario</h2>
						<p><a href="http://www.istpamauta.edu.pe/carrera-gst.php">Ver más...</a></p>
					</div>
					<div class="cn_item">
						<h2>Marketing Empresarial</h2>
						<p><a href="http://www.istpamauta.edu.pe/carrera-mkt.php">Ver más...</a></p>
					</div>
                    <div class="cn_item">
						<h2>Administracion de Empresas</h2>
						<p><a href="http://www.istpamauta.edu.pe/carrera-adm.php">Ver más...</a></p>
					</div>
				</div>
				<div class="cn_page">
					<div class="cn_item">
						<h2>Music Portfolio Template</h2>
						<p>A template for a music portfolio website with an HTML5 audio player</p>
					</div>
					<div class="cn_item">
						<h2>Related Posts Slide Out Boxes</h2>
						<p>Show users more of your articles with these slide out boxes</p>
					</div>
					<div class="cn_item">
						<h2>Latest Tweets Tooltip with jQuery</h2>
						<p>A Plugin for showing the latest tweets with a certain word in your article</p>
					</div>
					<div class="cn_item">
						<h2>Slide Down Box Menu with jQuery and CSS3</h2>
						<p>A menu with a nice effect</p>
					</div>
                    <div class="cn_item">
						<h2>Slide Down Box Menu with jQuery and CSS3</h2>
						<p>A menu with a nice effect</p>
					</div>
				</div>
				<div class="cn_page">
					<div class="cn_item">
						<h2>Minimalistic Slideshow Gallery</h2>
						<p>A compact image gallery for your website</p>
					</div>
					<div class="cn_item">
						<h2>Image Highlighting and Preview</h2>
						<p>Highlight and preview images that are integrated in an article</p>
					</div>
					<div class="cn_item">
						<h2>Interactive Photo Desk</h2>
						<p>Creating a photo desk with some real world interaction</p>
					</div>
                    <div class="cn_item">
						<h2>Slide Down Box Menu with jQuery and CSS3</h2>
						<p>A menu with a nice effect</p>
					</div>
                    <div class="cn_item">
						<h2>Slide Down Box Menu with jQuery and CSS3</h2>
						<p>A menu with a nice effect</p>
					</div>
				</div>
				<div class="cn_nav">
					<a id="cn_prev" class="cn_prev disabled"></a>
					<a id="cn_next" class="cn_next"></a>
				</div>
			</div>
		</div>
        
     </div>   
       
        <!-- The JavaScript -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="jquery.easing.1.3.js"></script>
        <script type="text/javascript">
            $(function() {
                //caching
				//next and prev buttons
				var $cn_next	= $('#cn_next');
				var $cn_prev	= $('#cn_prev');
				//wrapper of the left items
				var $cn_list 	= $('#cn_list');
				var $pages		= $cn_list.find('.cn_page');
				//how many pages
				var cnt_pages	= $pages.length;
				//the default page is the first one
				var page		= 1;
				//list of news (left items)
				var $items 		= $cn_list.find('.cn_item');
				//the current item being viewed (right side)
				var $cn_preview = $('#cn_preview');
				//index of the item being viewed. 
				//the default is the first one
				var current		= 1;
				
				/*
				for each item we store its index relative to all the document.
				we bind a click event that slides up or down the current item
				and slides up or down the clicked one. 
				Moving up or down will depend if the clicked item is after or
				before the current one
				*/
				$items.each(function(i){
					var $item = $(this);
					$item.data('idx',i+1);
					
					$item.bind('click',function(){
						var $this 		= $(this);
						$cn_list.find('.selected').removeClass('selected');
						$this.addClass('selected');
						var idx			= $(this).data('idx');
						var $current 	= $cn_preview.find('.cn_content:nth-child('+current+')');
						var $next		= $cn_preview.find('.cn_content:nth-child('+idx+')');
						
						if(idx > current){
							$current.stop().animate({'top':'-300px'},600,'easeOutBack',function(){
								$(this).css({'top':'310px'});
							});
							$next.css({'top':'310px'}).stop().animate({'top':'5px'},600,'easeOutBack');
						}
						else if(idx < current){
							$current.stop().animate({'top':'310px'},600,'easeOutBack',function(){
								$(this).css({'top':'310px'});
							});
							$next.css({'top':'-300px'}).stop().animate({'top':'5px'},600,'easeOutBack');
						}
						current = idx;
					});
				});
				
				/*
				shows next page if exists:
				the next page fades in
				also checks if the button should get disabled
				*/
				$cn_next.bind('click',function(e){
					var $this = $(this);
					$cn_prev.removeClass('disabled');
					++page;
					if(page == cnt_pages)
						$this.addClass('disabled');
					if(page > cnt_pages){ 
						page = cnt_pages;
						return;
					}	
					$pages.hide();
					$cn_list.find('.cn_page:nth-child('+page+')').fadeIn();
					e.preventDefault();
				});
				/*
				shows previous page if exists:
				the previous page fades in
				also checks if the button should get disabled
				*/
				$cn_prev.bind('click',function(e){
					var $this = $(this);
					$cn_next.removeClass('disabled');
					--page;
					if(page == 1)
						$this.addClass('disabled');
					if(page < 1){ 
						page = 1;
						return;
					}
					$pages.hide();
					$cn_list.find('.cn_page:nth-child('+page+')').fadeIn();
					e.preventDefault();
				});
				
            });
        </script>
            
            <!--<?php if($script_slidersup==true){ ?>
           
            <?php } ?>-->
        
        </div><!-- FIN CONTENIDO HEADER -->
        
    </div><!-- FIN INTERIOR -->
    
</header><!-- FIN HEADER -->