<?php
require('inc/function.php');

$breadcrumb = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_breadcrumb WHERE brd_id = '6'"));

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $breadcrumb['brd_name']; ?> | Yuccabe Planters</title>
  <meta name="description" content="<?php echo $breadcrumb['metadesc']; ?>" />
  <meta name="keywords" content="<?php echo $breadcrumb['metakeyword']; ?>" />
   <?php
        include 'inc/head.php';
        ?>
</head>

<body>
  <!-- Preloader Overlay -->
  <div id="overlay">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
  </div>

  <div id="content" style="opacity: 0;">
    <!-- Header Injected via JS -->
        <?php
        include 'inc/header.php';
        ?>

    <!-- Main Content -->
    <main>
      <div class="ab-inner-hero-area ab-inner-hero-bg position-relative"
        style="background-image: url('https://www.yuccabeplanters.co.in/img/fleur-trio-lifestyle2.jpg')">
        <div class="container container-1480 position-relative" style="z-index: 2;">
          <div class="row">
            <div class="col-xl-8">
              <div class="ab-inner-hero-title-box">
                <span class="ab-inner-hero-subtitle">Premium <br />Planter Craftsmanship</span>
                <h1 class="ab-inner-hero-title">The<br />Yuccabe<br />Vibe</h1>
                <p class="text-white fs-4">Planters That Breathe Life Into Spaces.</p>
              </div>
            </div>
          </div>
          <div class="row justify-content-end mt-4">
            <div class="col-xl-5 col-lg-8">
              <div class="ab-inner-hero-content">
                <p>Our journey began with a simple idea to bring nature closer to the spaces we live and work in,
                  through design that speaks of elegance and endurance.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Scrapbook Animation Section -->
      <section class="scrapbook">
        <img src="./img/About Us (PolaRoid)/1.png" class="scrap-img" style="top: 10%; left: 10%;" />
        <img src="./img/About Us (PolaRoid)/2.png" class="scrap-img" style="top: 20%; left: 30%;" />
        <img src="./img/About Us (PolaRoid)/3.png" class="scrap-img" style="top: 15%; right: 20%;" />
        <img src="./img/About Us (PolaRoid)/4.png" class="scrap-img" style="top: 40%; left: 15%;" />
        <img src="./img/About Us (PolaRoid)/5.png" class="scrap-img" style="top: 50%; right: 10%;" />
        <img src="./img/About Us (PolaRoid)/6.png" class="scrap-img" style="top: 60%; left: 35%;" />
      </section>

      <div class="container my-5 py-5" id="about-info">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h2 class="display-4 fw-bold mb-4">Hi! We’re Yuccabe.</h2>
            <p class="fs-5 text-muted lh-lg">
              We don’t just design planters—we craft experiences that grow with you. Rooted in a passion for form and
              functionality, Yuccabe Planters brings together timeless craftsmanship, sustainable materials, and design
              that elevates every space it touches.
            </p>
          </div>
        </div>
      </div>

      <!-- Client Logos Slider -->
      <section class="image-section">
        <div class="image-row row-1">
          <img alt="Airtel" src="./img/LOGOS/airtel.jpg" />
          <img alt="Andaz" src="./img/LOGOS/Andaz-hotel.jpg" />
          <img alt="Ansal" src="./img/LOGOS/ansal-plaza.jpg" />
          <img alt="APT9" src="./img/LOGOS/APT9.jpg" />
          <img alt="BLR" src="./img/LOGOS/bglr-airport.jpg" />
          <img alt="BPTP" src="./img/LOGOS/bptp.jpg" />
          <img alt="Brookfield" src="./img/LOGOS/brookfield.jpg" />
          <img alt="Capital" src="./img/LOGOS/capital-developers.jpg" />
          <img alt="Chanakya" src="./img/LOGOS/chanakya.jpg" />
          <img alt="Chennai" src="./img/LOGOS/chennai-apt.jpg" />
          <!-- Repeat for smooth infinite scroll -->
          <img alt="Airtel" src="./img/LOGOS/airtel.jpg" />
          <img alt="Andaz" src="./img/LOGOS/Andaz-hotel.jpg" />
          <img alt="Ansal" src="./img/LOGOS/ansal-plaza.jpg" />
        </div>
        <div class="image-row row-2 mt-4">
          <img alt="VKT" src="./img/LOGOS/VKT-HOSPITALS.jpg" />
          <img alt="Vivanta" src="./img/LOGOS/vivanta.jpg" />
          <img alt="Vegas" src="./img/LOGOS/vegas.jpg" />
          <img alt="Unitech" src="./img/LOGOS/UNITECH.jpg" />
          <img alt="Leela" src="./img/LOGOS/the-leela.jpg" />
          <img alt="Terrain" src="./img/LOGOS/TERRAIN-GREENS.jpg" />
          <img alt="Tata" src="./img/LOGOS/TATA-PROJECTS.jpg" />
          <img alt="Reliance" src="./img/LOGOS/reliance.jpg" />
          <img alt="Rajput" src="./img/LOGOS/rajput-apt.jpg" />
          <!-- Repeat for smooth infinite scroll -->
          <img alt="VKT" src="./img/LOGOS/VKT-HOSPITALS.jpg" />
          <img alt="Vivanta" src="./img/LOGOS/vivanta.jpg" />
          <img alt="Vegas" src="./img/LOGOS/vegas.jpg" />
        </div>
      </section>
    </main>

    <!-- Footer Injected via JS -->
     <?php
        include 'inc/footer.php';
        ?>
  </div>

  <!-- Scripts -->
  <?php
        include 'inc/footer-data.php';
        ?>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      if (!document.querySelector('.scrapbook')) return; // GUARD
      if (typeof AOS !== 'undefined') AOS.init();

      // Scrapbook animation using GSAP
      if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);
        const images = gsap.utils.toArray('.scrap-img');
        const tl = gsap.timeline({
          scrollTrigger: {
            trigger: '.scrapbook',
            start: 'top center',
            end: `+=${images.length * 100}`,
            scrub: true,
            anticipatePin: 1,
          }
        });
        tl.to(images, {
          opacity: 1,
          scale: 1,
          y: 0,
          duration: 0.5,
          ease: 'power2.out',
          stagger: 0.2,
        });
      }
    });
  </script>
</body>

</html>