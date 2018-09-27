<!DOCTYPE html>

<html>
<!--<div class = "marquee">
	<h3>Tons of Memes are served here &nbsp &nbsp &nbsp &nbsp &nbsp memes are created and destroyed here &nbsp &nbsp &nbsp &nbsp &nbsp Your Momma gay </h3>
</div>-->
<link rel="stylesheet" type="text/css" href="home.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--<div class = "page-header">
<p class = "bg-info">get the memes you always wanted</p>
</div>-->
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
 <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">ABOUT</a></li>
        <li><a href="../login_register_logout/login.php">LOG IN</a></li>
        <li><a href="../login_register_logout/emailverification.php">REGISTER</a></li>
		 <li><a href="#meme-masters">MEME MASTERS</a></li>
      </ul>
    </div>
  </div>
</nav> 
<div class = "text-center">
	<img src = "heading.png" class = "img-responsive" style = "padding-top:50px; border: 5px solid; border-color: white">
</div>
<div class = "text-center">
	<!-- <ul>
		<li><a href="lookatmemes.php">Look at Memes</a></li>
		<li><a href="memeordered.php">Get your Dream Meme</a></li>
		<li><a href="criticizeme.php">Criticize Me</a></li>
		<li><a href=".php">CHAT</a></li>
	</ul> -->
	<!--<div class = "btn-group">
	<a href="lookatmemes.php" class = "btn btn-primary" role = "button">Look at Memes</a>
	<a href="memeordered.php" class = "btn btn-primary" role = "button">Get your Dream Meme</a>
	<a href="criticizeme.php" class = "btn btn-primary" role = "button">Criticize Me</a>
	<a href=".php" class = "btn btn-primary" role = "button">CHAT</a>
	</div>-->
</div>

<!--<div id= "last">
	<ul id="icons">
		<li><a href="https://www.facebook.com/" class="fa fa-facebook"></a></li>
		<li><a href="https://www.twitter.com/" class="fa fa-twitter"></a></li>
		<li><a href="https://www.instagram.com/" class="fa fa-instagram"></a></li>
	</ul>
</div>-->

<div id = "about" class = "container">
	<h2>About Us</h2>
	<p>We are not we its just me. I love memes. If you are a meme lover and can't find memes youdesire, you are in the right place my friend.Here you will find memes and only memes and only memes, nothing else. You can upload your own memes and rate others memes too. The best meme will be displayed on the home page each day.</p>
	<a href="../login_register_logout/login.php" class = "btn btn-default" role = "button">Get in touch</a>
</div>
	
<div class="container-fluid bg-grey text-center">
  <h2>Our Values</h2>
  <p><strong>MISSION:</strong> My mission is to bring all the memes lovers together and create a meme nation</p>
  <p><strong>VISION:</strong> killed by Thanos</p>
</div>
	
<!--<div id = "portfolio" class="container-fluid text-center bg-grey">
  <h2>Portfolio</h2>
  <h4>What we have created</h4>
  <div class="row text-center">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="car1.jpeg" alt="Paris">
        <p><strong>a meme</strong></p>
        <p>Yes, we built memes</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="car2.jpg" alt="New York">
        <p><strong>another meme</strong></p>
        <p>We built meme too</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="car3.jpg" alt="San Francisco">
        <p><strong>extra meme</strong></p>
        <p>Yes, meme is our passion</p>
      </div>
    </div>
</div>-->
	<div class = 'text-center'><h3>OUR HEADQUARTERS</h3></div>
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

 <script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

   // Make sure this.hash has a value before overriding default behavior
  if (this.hash !== "") {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){

      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
      });
    } // End if
  });
})
</script> 

<div class = "container-fluid text-center" id = "meme-masters">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="car1.jpg" alt="meme1">
	  <div class="carousel-caption">
        <h3>meme</h3>
        <p>made by x</p>
      </div>
    </div>

    <div class="item">
      <img src="car2.jpg" alt="meme2">
	  <div class="carousel-caption">
        <h3>meme</h3>
        <p>made by y</p>
      </div>
    </div>

    <div class="item">
      <img src="car3.jpg" alt="meme3">
	  <div class="carousel-caption">
        <h3>meme</h3>
        <p>made by z</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

</body>
</html>