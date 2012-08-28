<link href="/css/normalize.css" rel="stylesheet" type="text/css">
<link href="/css/estilos.css" rel="stylesheet" type="text/css">

<!-- FONTS -->
<link href='http://fonts.googleapis.com/css?family=Amaranth|Acme|Electrolize' rel='stylesheet' type='text/css'>

<?php if($script_slidersup==true){ ?>
<!-- SLIDER -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="/libs/coinslider/coin-slider.min.js"></script>
<link rel="stylesheet" href="/libs/coinslider/coin-slider-styles.css" type="text/css" />
<script type="text/javascript">
var jcsl = jQuery.noConflict();
jcsl(document).ready(function() {
    jcsl('#slsup_items').coinslider({
        width: 940, height: 415, spw: 7, sph: 5, delay: 5000, sDelay: 30, opacity: 0.7, 
        titleSpeed: 500, effect: 'random', navigation: true, links : true, hoverPause: true
    });
});
</script>
<?php } ?>

<?php if($script_slidercarrera==true){ ?>
<!-- SLIDER -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="/libs/coinslider/coin-slider.min.js"></script>
<link rel="stylesheet" href="/libs/coinslider/coin-slider-styles.css" type="text/css" />
<script type="text/javascript">
var jcsl = jQuery.noConflict();
jcsl(document).ready(function() {
    jcsl('#coin-slider').coinslider({
        width: 680, height: 300, spw: 7, sph: 5, delay: 7000, sDelay: 30, opacity: 0.7, 
        titleSpeed: 500, effect: 'random', navigation: true, links : false, hoverPause: true
    });
});
</script>
<?php } ?>

<!-- MENU -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
var jMenu=jQuery.noConflict();
jMenu(document).ready(function(){
	jMenu('#nav>li').hover(
		function(){
		jMenu('.submenu',this).stop(true,true).slideDown('fast');
		},
		function(){
		jMenu('.submenu',this).slideUp('fast');
		}
	);		
});
</script>

<!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="js/html5.js"></script>
    <link href="css/ie.css" rel="stylesheet" type="text/css">
<![endif]-->

<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20229980-19']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>