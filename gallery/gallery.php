
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crowny Hotel</title>
  <link rel="stylesheet" href="gallery.css">
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
      <h1> <span>Book </span> Your Rooms </h1>
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
  <div class="gallery">
    <img src="https://cdn.freecodecamp.org/curriculum/css-photo-gallery/1.jpg" alt="sleeping cat">
    <img src="https://cdn.freecodecamp.org/curriculum/css-photo-gallery/2.jpg" alt="cat laying upside down">
    <img src="https://cdn.freecodecamp.org/curriculum/css-photo-gallery/3.jpg" alt="staring cat">
    <img src="https://cdn.freecodecamp.org/curriculum/css-photo-gallery/4.jpg" alt="a cat sleeping under a duvet">
    <img src="https://cdn.freecodecamp.org/curriculum/css-photo-gallery/5.jpg" alt="one worried looking cat">
    <img src="https://cdn.freecodecamp.org/curriculum/css-photo-gallery/6.jpg" alt="two cats">
    <img src="https://cdn.freecodecamp.org/curriculum/css-photo-gallery/7.jpg" alt="hiding cat">
    <img src="https://cdn.freecodecamp.org/curriculum/css-photo-gallery/8.jpg" alt="staring garfield cat">
    <img src="https://cdn.freecodecamp.org/curriculum/css-photo-gallery/9.jpg" alt="a black cat and a white cat">
  </div>

   <!-- Footers -->
   
   <?php
   require('../inc/footer.php')

?>


  <script src="https://kit.fontawesome.com/032d11eac3.js" crossorigin="anonymous"></script>
</body>

</html>