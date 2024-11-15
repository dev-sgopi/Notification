
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crowny Hotel</title>
  <link rel="stylesheet" href="explore.css">
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

  <!-- Bokking Section -->
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



  <section class="home">
    <div class="content">
      <div class="owl-carousel owl-theme">
        <div class="item">
          <img src="https://cache.marriott.com/content/dam/marriott-renditions/BLRGS/blrgs-exterior-8001-hor-pano.jpg?output-quality=70&interpolation=progressive-bilinear&downsize=1600px:*" alt="">
          <div class="text">
            <h1>Spend Your Holiday</h1>
            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
            </p>
            <div class="flex">
              <button class="primary-btn">READ MORE</button>
              <button class="secondary-btn">CONTACT US</button>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="https://cache.marriott.com/content/dam/marriott-renditions/BLRGS/blrgs-exterior-8001-hor-pano.jpg?output-quality=70&interpolation=progressive-bilinear&downsize=1600px:*" alt="">
          <div class="text">
            <h1>Spend Your Holiday</h1>
            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
            </p>
            <div class="flex">
              <button class="primary-btn">READ MORE</button>
              <button class="secondary-btn">CONTACT US</button>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="https://cache.marriott.com/content/dam/marriott-renditions/BLRGS/blrgs-pool-7974-hor-pano.jpg?output-quality=70&interpolation=progressive-bilinear&downsize=1600px:*" alt="">
          <div class="text">
            <h1>Spend Your Holiday</h1>
            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
            </p>
            <div class="flex">
              <button class="primary-btn">READ MORE</button>
              <button class="secondary-btn">CONTACT US</button>
            </div>
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


<div class="hero-section">
  <div class="containers1">
    <div class="hero-content">
      <!-- <h1>WELCOME TO SREE LAKSHMI V</h1> -->
      <h1>Visit popular attractions near our residency</h1>
      <div class="hero-features">
        <div class="feature">
          <div class="vertical-line">
          <p>Arunachala Temple: Perched on top of the Malai hill, this holy town is famous for its Arunachala temple, dedicated to Lord Shiva.</p>
        </div>
        </div>
        <div class="feature">
          <div class="vertical-line">
          <p>Sathanur Dam: A popular tourist spot, this dam offers scenic views and is a great place for relaxation.</h3>
        </div>
      </div>
        <div class="feature">
          <div class="vertical-line">
          <p>Jawadhu Hills: Known for their natural beauty, these hills offer trekking opportunities and stunning vistas.</h3>
        </div>
      </div>
      </div>
      <!-- <div class="hero-cta">
        <p>Nearby things to do</p>
        <button id="book-now-btn" class="book-now">Book Now</button>
      </div> -->
    </div>
  </div>
</div>

<hr class="custom-line">


  <section class="about top">
    <div class="container flex">
      <div class="left">
        <div class="heading">
          <h1>Arunachalesvara Temple</h1>
          <h2>Arunachalesvara Temple</h2>
        </div>
        <p><h1>Girivalam:</h1> A unique worship practice where pilgrims circumnavigate the temple base and the Arunachala hills, a 14-mile route, on the day preceding each full moon, attracting over one million devotees annually.
          <h1>Representation of Fire Element:</h1> As one of the Pancha Bhoota Stalams (five element temples) of Lord Shiva, the temple represents the element of Fire (Agni), with Lord Shiva worshipped in the form of Agni Lingam.</p>
        <!-- <button class="primary-btn">ABOUT US</button> -->
      </div>
      <div class="right">
        <img src="https://imgs.search.brave.com/HzT4t9Tbc4fy_Far1cfIS1yHC9siOs6o0OF-i9DIH1U/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9jZG4u/d2FsbHBhcGVyc2Fm/YXJpLmNvbS8zOC80/OS9pcEpyQXcuanBn" alt="">
      </div>
    </div>
  </section>

  <hr class="custom-line">
  
<div class="things-to-do">
  <h2>Nearby Things To Do</h2>
  <div class="buttons-container">
    <button class="btn active">All</button>
    <button class="btn">Area Sightseeing</button>
    <button class="btn">Family & Children's Activities</button>
    <button class="btn">Fitness</button>
    <button class="btn">Golf</button>
    <button class="btn">Spa</button>
  </div>
</div>

<div class="cards">
  <!-- Card 1: Area Sightseeing -->
  <div class="card">
    <h3>AREA SIGHTSEEING</h3>
    <h2><a href="#">Tiruvannamalai City Tour</a></h2>
    <p>Tiruvannamalai City</p>
    <p>Tour By: Tiru Arunachala tours </p>
    <a href="tel:+918024444444" class="phone">+91 80-2444444</a>
  </div>

  <!-- Card 2: Family & Children's Activities -->
  <div class="card">
    <h3>FAMILY & CHILDREN'S ACTIVITIES</h3>
    <h2>Javadhu hills</h2>
    <p>102 KM</p>
    <p>An Uncommericalised Place - Much wanted Hideout from Digital/ Corporate/ External World</p>
    <a href="tel:+918022010333" class="phone">+91 80-22010333</a>
  </div>

  <!-- Card 3: Fitness -->
  <div class="card">
    <h3>FAMILY & CHILDREN'S ACTIVITIES</h3>
    <h2>ARUNACHALA TEMPLE</h2>
    <p>3.4 KM</p>
    <p>Perched on top of the Malai hill, this holy town is famous for its Arunachala temple, dedicated to Lord Shiva.</p>
    <a href="tel:+918022010333" class="phone">+91 80-22010333</a>
  </div>

  <div class="card">
    <h3>AREA SIGHTSEEING</h3>
    <h2><a href="#">SRI RAMANA ASHRAM</a></h2>
    <p>4.6 KM</p>
    <p>A significant spiritual center, this ashram is dedicated to the teachings of Sri Ramana Maharshi, a renowned saint.</p>
    <a href="tel:+918024444444" class="phone">+91 80-2444444</a>
  </div>

  <!-- Card 2: Family & Children's Activities -->
  <div class="card">
    <h3>AREN SIGHTSEEING</h3>
    <h2>SATHANUR DAM</h2>
    <p>39.0 KM</p>
    <p>A popular tourist spot, this dam offers scenic views and is a great place for relaxation.
    </p>
    <a href="tel:+918022010333" class="phone">+91 80-22010333</a>
  </div>
</div>

<hr class="custom-line">

<section class="activities-section">
  <h2>More Activities and Local Info</h2>
  <ul class="activity-list">
    <li>
      <div class="activity-item">
        <h3>Arunachala Hill</h3>
        <p>The hill itself is considered a lingam, or iconic representation of Lord Shiva, and is believed to be a manifestation of the divine.</p>
      </div>
    </li>
    <li>
      <div class="activity-item">
        <h3>Annamalaiyar Temple</h3>
        <p>The grand temple dedicated to Lord Shiva is one of the most famous in India, attracting millions of devotees annually. Its rich history, architecture, and festivals make it a significant pilgrimage center.</p>
      </div>
    </li>
    <li>
      <div class="activity-item">
        <h3>Ramana Ashram</h3>
        <p> A peaceful retreat where Sri Ramana Maharshi lived, offering meditation and spiritual teachings.</p>
      </div>
    </li>
    <li>
      <div class="activity-item">
        <h3>Virupaksha Cave</h3>
        <p>A serene cave on Arunachala Hill, where devotees meditate.</p>
      </div>
    </li>
    </ul>
</section>
<!-- FOOters -->
<?php
   require('../inc/footer.php')

?>



  <script src="https://kit.fontawesome.com/032d11eac3.js" crossorigin="anonymous"></script>
</body>

</html>