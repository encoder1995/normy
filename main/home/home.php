<!DOCTYPE html>
<!--
Template Name: Etours
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html>
<head>
<title>NORMY HOME</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="fl_left">
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
        <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
        <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a class="faicon-rss" href="#"><i class="fa fa-rss"></i></a></li>
      </ul>
    </div>
    <div class="fl_right">
      <ul class="nospace inline pushright">
        <li><i class="fa fa-user"></i> <a href="../login_register_logout/emailverification.php">Register</a></li>
        <li><i class="fa fa-sign-in"></i> <a href="../login_register_logout/login.php">Login</a></li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('images/demo/backgrounds/heading.jpg');"> 
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div id="logo" class="fl_left">
        <h1><a href="#">NORMY</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="../feed/lookatmemes.php">FEED</a></li>
          
          <li><a href="#about">ABOUT</a></li>
          <li><a href="#masters">MEME MASTERS</a></li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
      <h2 class="heading">We Live for Memes</h2>
      <p>And we don't get offended by Humor. Although ROnaldo is better than Messi, We're going to ignore that universal fact here and continue with good work.</p>
      <footer>
        <ul class="nospace inline pushright">
          <li><a class="btn inverse" href="#">something</a></li>
          <li><a class="btn inverse" href="#">something</a></li>
        </ul>
      </footer>
    </article>
    <!-- ################################################################################################ -->
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="group">
      <div class="one_third first"><a href="#"><img src="images/demo/rock.png" alt=""></a></div>
      <div class="two_third">
        <div class="btmspace-50">
          <h3 class="heading" id = "about">About Normy</h3>
          <p class="nospace">We are not we its just me. I love memes. If you are a meme lover and can't find memes youdesire, you are in the right place my friend.Here you will find memes and only memes and only memes, nothing else. You can upload your own memes and rate others memes too. The best meme will be displayed on the home page each day.</p>
			</br>
			<ul class="nospace inline pushright">
          <li><a class="btn inverse" href="#">Get In Touch</a></li>
		  <li><a class="btn inverse" href="#">Touch Us</a></li>
        </ul>
		</div>
      </div>
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper">
  <section id="shout" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="one_quarter first"><a class="btn inverse" href="#">Cause' more buttons look cool</a></div>
    <div class="three_quarter">
      <h2 class="heading btmspace-10">Our Values</h2>
      <p class="nospace"><p><strong>MISSION:</strong> My mission is to bring all the memes lovers together and create a meme nation</p>
  <p><strong>VISION:</strong> killed by Thanos</p></p>
    </div>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded" style = "background-image:url('')">
  <div class="hoc split clear">
    <article class="box clear"> 
      <!-- ################################################################################################ -->
      <h6 class="heading">Our Headquarter</h6>
      <p class="btmspace-30">Don't try to contact us but if you insist, here you go</p>
      <footer><a class="btn inverse" href="#">CONTACT</a></footer>
      <!-- ################################################################################################ -->
	  
    </article>
	
  </div>
  <div id="googleMap" style="height:400px;width:100%;"></div>
	<script>
function myMap() {
var myCenter = new google.maps.LatLng(30.9756, 76.5389);
var mapProp = {center:myCenter, zoom:12, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker = new google.maps.Marker({position:myCenter});
marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDS9deN52_Xgt3GglKdXgCfMUUj44DLkGw&callback=myMap"></script>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="btmspace-80 center">
      <h3 class="nospace" id = "masters">Our Shining Stars</h3>
      <p class="nospace">Look at the best creations of the day</p>
    </div>
	
    <div class="group">
      <article class="one_quarter first">
        <h4 class="nospace font-x1">Auctor nulla lectus</h4>
        <p class="btmspace-30">Feugiat ac praesent dignissim metus ut tellus convallis non varius nulla accumsan&hellip;</p>
        <a href="#"><img class="btmspace-30" src="images/demo/380x320.png" alt=""></a>
        
      </article>
      <article class="one_quarter">
        <h4 class="nospace font-x1">Augue congue et</h4>
        <p class="btmspace-30">Venenatis nec porttitor vel metus phasellus venenatis ex ac bibendum dictum&hellip;</p>
        <a href="#"><img class="btmspace-30" src="images/demo/380x320.png" alt=""></a>
       
      </article>
      <article class="one_quarter">
        <h4 class="nospace font-x1">Libero justo luctus</h4>
        <p class="btmspace-30">Sed congue odio venenatis fusce purus quam lacinia sed sem a viverra mollis&hellip;</p>
        <a href="#"><img class="btmspace-30" src="images/demo/380x320.png" alt=""></a>
        
      </article>
      <article class="one_quarter">
        <h4 class="nospace font-x1">Luctus consequat</h4>
        <p class="btmspace-30">Eget sed blandit eros semper vulputate lorem a efficitur purus aenean leo&hellip;</p>
        <a href="#"><img class="btmspace-30" src="images/demo/380x320.png" alt=""></a>
        
      </article>
    </div>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>