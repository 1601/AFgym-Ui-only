<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Adrenaline Fitness Gym</title>

    <!-- Contact Us -->
    <link rel="stylesheet" type="text/css" href="http://www.html-form-guide.com/files/contact-form/simple-contact-form-1/contact.css">

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet">
    
    <!-- bxSlider -->
    <link rel="stylesheet" type="text/css" href="http://bxslider.com/lib/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="<?=site_url()?>/wp-content/themes/AdrenalineFGym/style.css">
    <!-- Animation Css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css" rel="stylesheet">

    <!-- Google Maps -->
    <script src="http://maps.googleapis.com/maps/api/js"></script>
  
<script>
  var myCenter=new google.maps.LatLng(14.6127712,120.98759159);
  var marker;

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:20,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
<style type="text/css">
  .loading {
  background: url('<?=site_url()?>/wp-content/themes/AdrenalineFGym/img/gymloadingtext.gif') no-repeat center center;
}
section,div {
  opacity: 0;
  -webkit-transition:opacity .6s;
  -webkit-transition-delay:.2s;
  -moz-transition:opacity .6s;
  -moz-transition-delay:.2s;
  -o-transition:opacity .6s;
  -o-transition-delay:.2s;
  transition: opacity .6s;
  transition-delay:.2s;
}
.loaded section,.loaded div {
  opacity: 1;
}

</style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body class="loading">

<div id="pic1" class="bg-holder header" data-width="1024" data-height="768">
  <h2 class="pull-left whiteText">adrenalinefitness</h2>
  <h2 class="pull-right whiteText">logintomy<a href="<?=site_url()?>/members/">account</a></h2>
  <div class="text-center header-tagline">
    <h1 class="whiteText" href="#"><?php echo get_bloginfo ( 'description' );?>Wellness</h1>
    <h1 class="whiteText" href="#">body.mind.soul</h1>
  </div>
</div>
<!-- For header Menu -->
<div class="overlay-bottom-header">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">adrenalineFitness</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling  id="bs-example-navbar-collapse-1"-->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">home <span class="sr-only">(current)</span></a></li>
          <li><a href="#about_us">about us</a></li>
          <li><a href="#pic2">facilities</a></li>
          <li><a href="#trainors">trainors</a></li>
          <li><a href="#pic3">programs</a></li>
          <li><a href="#contact_us">contact us</a></li>
  <li><a href="<?=site_url()?>/members/">account</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</div>

<!-- Floating Menu -->
<div id="menu">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">adrenalineFitness</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling  id="bs-example-navbar-collapse-1"-->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">home <span class="sr-only">(current)</span></a></li>
          <li><a href="#about_us">about us</a></li>
          <li><a href="#pic2">facilities</a></li>
          <li><a href="#trainors">trainors</a></li>
          <li><a href="#pic3">programs</a></li>
          <li><a href="#contact_us">contact us</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</div>

<section id="about_us">
<div class="row">
  <h1 class="pull-left">About Us</h1>
</div>
    <section id="cd-timeline" class="cd-container">
      <div class="cd-timeline-block">
        <div class="cd-timeline-img cd-picture">
                    <img src="<?=site_url()?>/wp-content/themes/AdrenalineFGym/img/imgholder1.png" alt="Picture">
        </div> <!-- cd-timeline-img -->

        <div class="cd-timeline-content">
          <h2 class="font-h2">Neque porro quisquam</h2>
          <p class="font-descrip">Lorem Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          <span class="cd-date">2015</span>
        </div> <!-- cd-timeline-content -->
      </div> <!-- cd-timeline-block -->

      <div class="cd-timeline-block">
        <div class="cd-timeline-img cd-picture">
          <img src="<?=site_url()?>/wp-content/themes/AdrenalineFGym/img/imgholder2.png" alt="Picture">
        </div> <!-- cd-timeline-img -->

        <div class="cd-timeline-content">
          <h2 class="font-h2">Neque porro quisquam</h2>
          <p class="font-descrip">Lorem Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          <span class="cd-date">2015</span>
        </div> <!-- cd-timeline-content -->
      </div> <!-- cd-timeline-block -->

      <div class="cd-timeline-block">
        <div class="cd-timeline-img cd-picture">
          <img src="<?=site_url()?>/wp-content/themes/AdrenalineFGym/img/imgholder1.png" alt="Picture">
        </div> <!-- cd-timeline-img -->

        <div class="cd-timeline-content">
          <h2 class="font-h2">Neque porro quisquam</h2>
          <p class="font-descrip">Lorem Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          <span class="cd-date">2015</span>
        </div> <!-- cd-timeline-content -->
      </div> <!-- cd-timeline-block -->

      <div class="cd-timeline-block">
        <div class="cd-timeline-img cd-picture">
          <img src="<?=site_url()?>/wp-content/themes/AdrenalineFGym/img/imgholder2.png" alt="Picture">
        </div> <!-- cd-timeline-img -->

        <div class="cd-timeline-content">
          <h2 class="font-h2">Neque porro quisquam</h2>
          <p class="font-descrip">Lorem Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          <span class="cd-date">2015</span>
        </div> <!-- cd-timeline-content -->
      </div> <!-- cd-timeline-block -->
    </section>
</section>

<div id="pic2" class="bg-holder" data-width="1024" data-height="768">
  <div class="row">
  <h1 class="pull-right whiteText">Facilities</h1>
</div>
  <ul class="facilities">
    <li><img class="img-responsive img-facilities" title="ab Machine" src="<?=site_url()?>/wp-content/themes/AdrenalineFGym/img/cable-cross-over-2.png"></li>
    <li><img class="img-responsive img-facilities" title="arm curl" src="<?=site_url()?>/wp-content/themes/AdrenalineFGym/img/arm-curl.png"></li>
    <li><img class="img-responsive img-facilities" title="bicycle" src="<?=site_url()?>/wp-content/themes/AdrenalineFGym/img/bicycle.png"></li>
   <li><img class="img-responsive img-facilities" title="cable cross over" src="<?=site_url()?>/wp-content/themes/AdrenalineFGym/img/bg1_bigger.png"></li>
    <li><img class="img-responsive img-facilities" title="dumbells" src="<?=site_url()?>/wp-content/themes/AdrenalineFGym/img/bg2_bigger.png"></li>
    <li><img class="img-responsive img-facilities" title="Lat Pull Down" src="<?=site_url()?>/wp-content/themes/AdrenalineFGym/img/bg3_bigger.png"></li>
  </ul>
</div>

<section id="trainors">
<div class="container">
  <div class="row">
  <h1 class="pull-left section-title">Trainors</h1>
</div>

<div class="row">
  <div class="col-md-4">
<div class="list-group">
  <a href="#trainors" class="list-group-item active">
    Marciliano Chavez
  </a>
<a href="#trainors" class="list-group-item"><img class="profile-img-trainor img-responsive trainors-img" src="<?=site_url()?>/wp-content/themes/AdrenalineFGym/img/trainor1.png" alt="Picture"></a>
  <a href="#trainors" class="list-group-item">22 Years Old</a>
  <a href="#trainors" class="list-group-item">Batasan PH</a>
  <a href="#trainors" class="list-group-item list-group-item-success">lemarsuy@facebook.com</a>
  <a href="#trainors" class="list-group-item">''Artemisia Goldova''</a>
</div>
  </div>
  <div class="col-md-4">
<div class="list-group">
  <a href="#trainors" class="list-group-item active">
    R-jay Tedoco
  </a>
  <a href="#trainors" class="list-group-item"><img class="profile-img-trainor img-responsive clip-circle trainors-img" src="<?=site_url()?>/wp-content/themes/AdrenalineFGym/img/trainor2.png" alt="Picture"></a>
  <a href="#trainors" class="list-group-item">20 Years Old</a>
  <a href="#trainors" class="list-group-item list-group-item-info">Balic Balic PH</a>
  <a href="#trainors" class="list-group-item">makesme.wonder@facebook.com</a>
  <a href="#trainors" class="list-group-item list-group-item-danger">''Olivia Contessa''</a>
</div>
  </div>
  <div class="col-md-4">
<div class="list-group">
  <a href="#trainors" class="list-group-item active">
    Darlo Miguel Ilagan
  </a>
<a href="#trainors" class="list-group-item"><img class="profile-img-trainor img-responsive trainors-img" src="<?=site_url()?>/wp-content/themes/AdrenalineFGym/img/trainor3.png" alt="Picture"></a>
  <a href="#trainors" class="list-group-item list-group-item-warning">19 Years Old</a>
  <a href="#trainors" class="list-group-item">Batangas PH</a>
  <a href="#trainors" class="list-group-item">gelodarlo@faceboo.com</a>
  <a href="#trainors" class="list-group-item">''Mig De Angelo''</a>
</div>
  </div>
</div>
</div>
</section>

<div id="pic3" class="bg-holder" data-width="1024" data-height="768">
<h1 class="pull-right whiteText">Programs</h1>
</div>

<section id="contact_us">
 <div class="row">
    <div class="col-md-5 col-sm-offset-1">
      
      <h2>Contact Us</h2>
      
      <form class="form-horizontal">
        <div class="form-group">
              <div class="col-xs-3">
                  <input class="form-control" id="firstName" name="firstName" placeholder="First Name" required="" type="text">
              </div>
              <div class="col-xs-3">
                  <input class="form-control" id="middleName" name="firstName" placeholder="Middle Name" required="" type="text">
              </div>
              <div class="col-xs-4">
                  <input class="form-control" id="lastName" name="lastName" placeholder="Last Name" required="" type="text">
              </div>
          </div>
          <div class="form-group">
              <div class="col-xs-5">
                  <input class="form-control" name="email" placeholder="Email" required="" type="email">
              </div>
              <div class="col-xs-5">
                  <input class="form-control" name="phone" placeholder="Phone" required="" type="email">
              </div>
          </div>
          <div class="form-group">
              <div class="col-xs-10">
                  <input class="form-control" placeholder="Website URL" required="" type="homepage">
              </div>
          </div>
          <div class="form-group">
              <div class="col-xs-10">
                <button class="btn btn-primary pull-right">Submit</button>
              </div>
          </div>  
      </form>
    </div><!--/col-5-->
    <div class="col-md-6 map">
      <div id="googleMap" style="width:100%;height:380px;">
      </div>
    </div>
  </div>
</section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="<?=site_url()?>/wp-content/themes/AdrenalineFGym/jquery.parallax-scroll.min.js"></script>
    <script>
    $('.bg-holder').parallaxScroll({
      friction: 0.5
  });
    </script>

    <script> 
$('a[href^="#"]').on('click', function(event) {

    var target = $( $(this).attr('href') );

    if( target.length ) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: target.offset().top - 75
        }, 1000);
    }

});
</script>
<!-- Facilities Slider -->
<script type="text/javascript" src="http://bxslider.com/lib/jquery.bxslider.js"></script>
<!-- About Us Timeline -->
<script src="<?=site_url()?>/wp-content/themes/AdrenalineFGym/main.js"></script>
<script src="http://adrenalinefitnessgym.netau.net/wp-content/themes/AFGym/js/modernizr.js"></script>
<script type="text/javascript">
(function($) {          
    $(document).ready(function(){    
   $('.trainors-img').each(function() {
          animationHover(this, 'rubberBand');
      });                
        $(window).scroll(function(){                          
            if ($(this).scrollTop() > 600) {
                $('#menu').fadeIn(500);
            } else {
                $('#menu').fadeOut(500);
            }
        });
        $('.facilities').bxSlider({
          auto: true,
          autoControls: true,
          slideWidth: 350,
          minSlides: 2,
          maxSlides: 3,
          slideMargin: 10,
          captions: true
        });
        $('.programs').bxSlider();
    });
})(jQuery);
</script>
<script type="text/javascript">
$(document).ready(function(){

  // $(".main").onepage_scroll({
  //    sectionContainer: "section", 
  //    easing: "ease", // Easing options accepts the CSS3 easing animation such "ease", "linear", "ease-in", "ease-out", "ease-in-out", or even cubic bezier value such as "cubic-bezier(0.175, 0.885, 0.420, 1.310)"
  //    animationTime: 900, 
  //    pagination: true, 
  //    updateURL: false 
  // });
  
});

function init() {
  
  // start up after 2sec no matter what
    window.setTimeout(function(){
        start();
    }, 2000);
}

// fade in experience
function start() {
  
  $('body').removeClass("loading").addClass('loaded');
  $('figure').removeClass("loading2").addClass('loaded');
  
}

$(window).load(function() {
  
  // fade in page
  init();
  
});
</script>
<script type="text/javascript">
function animationHover(element, animation){
    element = $(element);
    element.hover(
        function() {
            element.addClass('animated ' + animation);        
        },
        function(){
            //wait for animation to finish before removing classes
            window.setTimeout( function(){
                element.removeClass('animated ' + animation);
            }, 2000);         
        });
}
</script>
  </body>
</html>