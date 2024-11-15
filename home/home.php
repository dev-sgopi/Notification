<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crowny Hotel</title>
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
</head>

<body>


<?php
   require('../inc/header.php')

?>


  <script>
    var menulist = document.getElementById('menulist');
    menulist.style.maxHeight = "0px";

    function menutoggle() {
      if (menulist.style.maxHeight == "0px") {
        menulist.style.maxHeight = "100vh";
      } else {
        menulist.style.maxHeight = "0px";
      }
    }
  </script>


<!-- Bo0king Section -->
<section class="book">
  <div class="container flex_space">
    <div class="text">
      <h1> <span>Book </span> Your Rooms</h1>
    </div>
    <div class="form">
      <form class="grid" action="../room/room.html">
        <input type="date" placeholder="Araival Date">
        <input type="date" placeholder="Departure Date">
        <input type="number" placeholder="Adults">
        <input type="number" placeholder="Childern">
        <input type="submit" value="CHECK AVAILABILITY">
      </form>
    </div>
  </div>
</section>


  <section class="home">
    <div class="content">
      <div class="owl-carousel owl-theme">
        <div class="item">
          <img src="https://cache.marriott.com/content/dam/marriott-renditions/BLRGS/blrgs-exterior-8001-hor-pano.jpg?output-quality=70&interpolation=progressive-bilinear&downsize=1600px:*" alt="">
          <div class="text">
            <h1>Spend Your Holiday</h1>
            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
            </p>
           
          </div>
        </div>
        <div class="item">
          <img src="https://cache.marriott.com/content/dam/marriott-renditions/BLRGS/blrgs-presidential-suite-7956-hor-pano.jpg?output-quality=70&interpolation=progressive-bilinear&downsize=1600px:*" alt="">
          <div class="text">
            <h1>Spend Your Holiday</h1>
            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
            </p>
            
          </div>
        </div>
        <div class="item">
          <img src="https://cache.marriott.com/content/dam/marriott-renditions/BLRGS/blrgs-pool-7974-hor-pano.jpg?output-quality=70&interpolation=progressive-bilinear&downsize=1600px:*" alt="">
          <div class="text">
            <h1>Spend Your Holiday</h1>
            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
            </p>
            
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
  <script>
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 0,
      nav: true,
      dots: false,
      navText: ["<i class = 'fa fa-chevron-left'></i>", "<i class = 'fa fa-chevron-right'></i>"],
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 1
        },
        1000: {
          items: 1
        }
      }
    })
  </script>


  <section class="about top">
    <div class="container flex">
      <div class="left">
        <div class="heading">
          <h1>WELCOME</h1>
          <h2>Crowny Hotel</h2>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
          aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <!-- <button class="primary-btn">ABOUT US</button> -->
      </div>
      <div class="right">
        <img src="https://github.com/sunil9813/Crowny-Hotel-Using-HTML-and-CSS/blob/master/Images/about.png?raw=true" alt="">
      </div>
    </div>
  </section>

  <hr class="custom-line">

  <!-- amentites -->
  <div class="unique-amenities-container">
    <h2>FEATURED AMENITIES ON-SITE</h2>

    <div class="unique-amenities-list">
        <ul class="unique-amenities">
            <li><img src="https://img.icons8.com/?size=50&id=39764&format=png" alt="Sustainability Icon"> Sustainability</li>
            <li><img src="https://img.icons8.com/?size=32&id=SODCgmKt0n0G&format=png" alt="Restaurant Icon"> Restaurant</li>
            <li><img src="https://img.icons8.com/?size=50&id=9833&format=png" alt="Fitness Center Icon"> Fitness Center</li>
            <li><img src="https://img.icons8.com/?size=50&id=7186&format=png" alt="Spa Icon"> Spa</li>
            <li><img src="https://img.icons8.com/?size=50&id=113628&format=png" alt="Outdoor Pool Icon"> Outdoor Pool</li>
            <li><img src="https://img.icons8.com/?size=50&id=69567&format=png" alt="Meeting Space Icon"> Meeting Space</li>
            <li><img src="https://img.icons8.com/?size=80&id=dIOrhlsq07VG&format=png" alt="Free Wifi Icon"> Free Wifi</li>
            <li><img src="https://img.icons8.com/?size=50&id=hx6mDkmtPgjw&format=png" alt="Convenience Store Icon"> Convenience Store</li>
            <li><img src="https://img.icons8.com/?size=50&id=36069&format=png" alt="Gift Shop Icon"> Gift Shop</li>
        </ul>

        <div class="unique-extra-amenities" style="display: none;">
            <ul>
                <li><img src="https://img.icons8.com/?size=80&id=4LVlgaVqOraR&format=png" alt="Dry Cleaning Service Icon"> Dry Cleaning Service</li>
                <li><img src="https://img.icons8.com/?size=50&id=x0tMry5X1dKf&format=png" alt="Laundry Icon"> Laundry</li>
                <li><img src="https://img.icons8.com/?size=50&id=k8awtRz8Z1Ab&format=png" alt="Hair Salon Icon"> Hair Salon</li>
                <li><img src="https://img.icons8.com/?size=50&id=7638&format=png" alt="Room Service Icon"> Room Service</li>
                <li><img src="https://img.icons8.com/?size=80&id=8tbEVXPcsVPb&format=png" alt="24 Hour Room Service Icon"> 24 Hour Room Service</li>
                <li><img src="https://img.icons8.com/?size=80&id=xmFcnxsSuQXK&format=png" alt="Wake up Calls Icon"> Wake up Calls</li>
                <li><img src="https://img.icons8.com/?size=50&id=10213&format=png" alt="Daily Housekeeping Icon"> Daily Housekeeping</li>
                <li><img src="https://img.icons8.com/?size=50&id=3061&format=png" alt="Turndown Service Icon"> Turndown Service</li>
            </ul>
        </div>

        <button class="unique-view-more-btn" onclick="toggleAmenities()">View More</button>
        <hr class="custom">
    </div>
</div>
<script>
    function toggleAmenities() {
        const extraAmenities = document.querySelector('.unique-extra-amenities');
        const viewMoreBtn = document.querySelector('.unique-view-more-btn');

        if (extraAmenities.style.display === "none") {
            extraAmenities.style.display = "block";
            viewMoreBtn.textContent = "View Less";
        } else {
            extraAmenities.style.display = "none";
            viewMoreBtn.textContent = "View More";
        }
    }
</script>



<main>
  
  <h1>Where the world comes together</h1>
  <h1>Experience 5-star comfort in Tiruvannamalai</h1>
  
  <section class="containers">
    <!-- First Card -->
    <div class="card card-one">
      <div class="card-image"></div>
      <div class="card-bottom">
        <h1>Meet You in the Lobby</h1>
        <p>Spend time in the Sheraton lobby. We've created spaces to connect in unique and innovative ways.</p>
      </div>
    </div>

    <!-- Second Card -->
    <div class="card card-two">
      <div class="card-image"></div>
      <div class="card-bottom">
        
        <h1>Welcoming Servicea</h1>
        <p>With over 85 years of welcoming hospitality, our associates will make you want to come back again.</p>
      </div>
    </div>

    <!-- Third Card -->
    <div class="card card-three">
      <div class="card-image"></div>
      <div class="card-bottom">
       
        <h1>Global Destinations</h1>
        <p>Look for Sheraton Hotels in the heart of cities all over the world.</p>
      </div>
    </div>
  </section>
</main>
<main>


    <!-- Footers -->
   
    <?php
   require('../inc/footer.php')

?>


  <script src="https://kit.fontawesome.com/032d11eac3.js" crossorigin="anonymous"></script>
</body>

</html>