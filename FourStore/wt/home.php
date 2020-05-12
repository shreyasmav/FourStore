<?php include('server.php');
//if user is not logged in they cannot access this page
    if(empty($_SESSION['username']))
    {
        header('location: login.php');
    } 
    include('header.php');
    //include('footer.php');
?>
<!DOCTYPE html>  
<html>  
    <head>
        <link rel="stylesheet" type="text/css" href="home.css?ver=<?php echo rand(111,999)?>">  
        <title>Home</title>
    </head>  
    <body>
              <!-- Slideshow container -->
      <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
          <div class="numbertext">1 / 5</div>
          <img src="slideshow/ad-2.jpg" style="width:100%">
          
        </div>

        <div class="mySlides fade">
          <div class="numbertext">2 / 5</div>
          <img src="slideshow/ad-3.png" style="width:100%">
          
        </div>

        <div class="mySlides fade">
          <div class="numbertext">3 / 5</div>
          <img src="slideshow/ad-6.jpg" style="width:100%">
          
        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">4 / 5</div>
          <img src="slideshow/ad-7.png" style="width:100%">
          
        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">5 / 5</div>
          <img src="slideshow/ad-8.jpg" style="width:100%">
          
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>
      <br>

      <!-- The dots/circles -->
      <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span> 
        <span class="dot" onclick="currentSlide(5)"></span> 
      </div>

          <script>
            var slideIndex = 1;
      showSlides(slideIndex);

      // Next/previous controls
      function plusSlides(n) {
        showSlides(slideIndex += n);
      }

      // Thumbnail image controls
      function currentSlide(n) {
        showSlides(slideIndex = n);
      }

      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1} 
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none"; 
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block"; 
        dots[slideIndex-1].className += " active";
      }
          </script>
  </body>
  <?php 
include('footer.php');
 ?>
</html>