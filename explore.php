<?php
require('inc/function.php');

$breadcrumb = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_breadcrumb WHERE brd_id = '13'"));

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
  <style>
    .footer-bg-color {
      background-color: #d9d4c5 !important;
      margin-bottom: 20px;
    }

    .typing::after {
      content: '|';
      animation: blink 0.7s infinite;
    }

    @keyframes blink {
      50% {
        opacity: 0;
      }
    }

    /* fade out before clearing */
    .fade-out {
      animation: fadeOut 1s forwards;
    }

    @keyframes fadeOut {
      to {
        opacity: 0;
      }
    }

    @media (max-width: 768px) {
      .introduction {
        margin: 10px 0px;
      }

      .introduction .card-100 {
        padding: 70px 0px;
      }
    }

    .video-row {
      display: flex;
      flex: 1;
      gap: 10px;
      margin: 20px auto;
      padding: 0px 10px;
    }

    .video-row a {
      display: block;
      width: 16.2%;
      transition: transform 0.3s ease;
      cursor: pointer;
      border-radius: 15px;
      overflow: hidden;
    }

    .video-row video {
      border: 1px dashed #000;
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      border-radius: 15px;
    }

    .video-row a:hover {
      transform: scale(1.1);
      z-index: 9;
    }

    @media (max-width: 1024px) {
      .video-row {
        padding: 0px 20px;
      }

      .video-row a {
        width: 16%;
      }
    }

    @media (max-width: 768px) {
      .update-card {
        padding: 0px !important;
      }

      .video-row a {
        width: 24%;
      }

      .video-container {
        overflow: hidden;
        padding: 0px 0px;
      }

      .video-row::-webkit-scrollbar {
        display: none;
      }

      .video-row {
        overflow: auto;
      }
    }

    @media (max-width: 480px) {
      .video-row a:hover {
        transform: scale(1);
      }

      .video-row {
        padding: 0px 20px;
      }

      .video-row a {
        width: 50%;
      }
    }
  </style>
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
      <div class="p-4 mt-4 update-card">
        <!-- Shortcuts Swiper Row -->
        <div style="width: 100%; gap: 20px;" class="d-flex justify-content-center px-2 py-3">
          <div class="d-flex col-lg-6 col-md-12 col-sm-12 px-2 py-2 justify-content-center"
            style="border-radius: 15px; background-color: #d9d4c5;">
            <div class="swiper mySwiperjdf">
              <div class="swiper-wrapper">
                <div class="swiper-slide" style="width: auto;">
                  <a href="./about-us.php" class="btns btn--bg btn--yellow-blue justify-content-between">
                    <span>About</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 26 26" class="btn__arrow">
                      <path stroke="currentColor" stroke-width="1.5" d="M17.868 8.073v9.795H8.073"></path>
                      <path stroke="currentColor" stroke-width="1.5" d="M17.868 17.868 8.073 8.073"></path>
                      <path stroke="currentColor" stroke-width="1.5"
                        d="M24.97 12.97c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12 0 6.628 5.374 12 12 12 6.628 0 12-5.372 12-12Z">
                      </path>
                    </svg>
                  </a>
                </div>
                <div class="swiper-slide" style="width: auto;">
                  <a href="./services.php" class="btns btn--bg btn--yellow-blue justify-content-between">
                    <span>Services</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 26 26" class="btn__arrow">
                      <path stroke="currentColor" stroke-width="1.5" d="M17.868 8.073v9.795H8.073"></path>
                      <path stroke="currentColor" stroke-width="1.5" d="M17.868 17.868 8.073 8.073"></path>
                      <path stroke="currentColor" stroke-width="1.5"
                        d="M24.97 12.97c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12 0 6.628 5.374 12 12 12 6.628 0 12-5.372 12-12Z">
                      </path>
                    </svg>
                  </a>
                </div>
                <div class="swiper-slide" style="width: auto;">
                  <a href="./projects.php" class="btns btn--bg btn--yellow-blue justify-content-between">
                    <span>Projects</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 26 26" class="btn__arrow">
                      <path stroke="currentColor" stroke-width="1.5" d="M17.868 8.073v9.795H8.073"></path>
                      <path stroke="currentColor" stroke-width="1.5" d="M17.868 17.868 8.073 8.073"></path>
                      <path stroke="currentColor" stroke-width="1.5"
                        d="M24.97 12.97c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12 0 6.628 5.374 12 12 12 6.628 0 12-5.372 12-12Z">
                      </path>
                    </svg>
                  </a>
                </div>
                <div class="swiper-slide" style="width: auto;">
                  <a href="./explore.php" class="btns btn--bg btn--yellow-blue justify-content-between">
                    <span>Collections</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 26 26" class="btn__arrow">
                      <path stroke="currentColor" stroke-width="1.5" d="M17.868 8.073v9.795H8.073"></path>
                      <path stroke="currentColor" stroke-width="1.5" d="M17.868 17.868 8.073 8.073"></path>
                      <path stroke="currentColor" stroke-width="1.5"
                        d="M24.97 12.97c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12 0 6.628 5.374 12 12 12 6.628 0 12-5.372 12-12Z">
                      </path>
                    </svg>
                  </a>
                </div>
                <div class="swiper-slide" style="width: auto;">
                  <a href="./blogs.php" class="btns btn--bg btn--yellow-blue justify-content-between">
                    <span>Blogs</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 26 26" class="btn__arrow">
                      <path stroke="currentColor" stroke-width="1.5" d="M17.868 8.073v9.795H8.073"></path>
                      <path stroke="currentColor" stroke-width="1.5" d="M17.868 17.868 8.073 8.073"></path>
                      <path stroke="currentColor" stroke-width="1.5"
                        d="M24.97 12.97c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12 0 6.628 5.374 12 12 12 6.628 0 12-5.372 12-12Z">
                      </path>
                    </svg>
                  </a>
                </div>
                <div class="swiper-slide" style="width: auto;">
                  <a href="./contact.php" class="btns btn--bg btn--yellow-blue justify-content-between">
                    <span>Contact</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 26 26" class="btn__arrow">
                      <path stroke="currentColor" stroke-width="1.5" d="M17.868 8.073v9.795H8.073"></path>
                      <path stroke="currentColor" stroke-width="1.5" d="M17.868 17.868 8.073 8.073"></path>
                      <path stroke="currentColor" stroke-width="1.5"
                        d="M24.97 12.97c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12 0 6.628 5.374 12 12 12 6.628 0 12-5.372 12-12Z">
                      </path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- ResponsiveImageHoverEffect (3 Expanding Video Columns) -->
        <div class="main-containers-w-100">
          <div class="containers px-2 py-3">
            <div class="box active">
              <video src="./videos/3770018-hd_1920_1080_25fps.mp4" autoPlay muted loop playsInline></video>
            </div>
            <div class="box">
              <video src="./videos/10614143-hd_2560_1440_30fps.mp4" autoPlay muted loop playsInline></video>
            </div>
            <div class="box">
              <video src="./videos/10614143-hd_2560_1440_30fps.mp4" autoPlay muted loop playsInline></video>
            </div>
          </div>
        </div>

        <!-- ResponsiveCard (Intro details and Planter Journey narrative) -->
        <div class="w-100 mt-4">
          <div class="row m-0 p-0 sjkdghf">
            <div class="col-lg-5 two-box">
              <div class="row">
                <div class="col-6">
                  <video src="./videos/Featured website animation.mp4" muted autoPlay loop playsInline
                    class="w-100 h-100 object-fit-cover rounded-4 border border-secondary" style="min-height: 200px;"></video>
                </div>
                <div class="col-6">
                  <video src="./videos/free consultation.mp4" muted autoPlay loop playsInline
                    class="w-100 h-100 object-fit-cover rounded-4 border border-secondary" style="min-height: 200px;"></video>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-12">
                  <div class="card-300 djhfjdhf">
                    <video src="./videos/videoplayback.mp4" muted autoPlay loop playsInline
                      class="w-100 h-100 object-fit-cover rounded-4 border border-secondary" style="min-height: 350px;"></video>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-7 introduction">
              <div class="w-100 h-100 radius">
                <div class="card-100 mx-auto p-5">
                  <div class="cell_desc-wrap">
                    <div class="cell_desc-eyebrow">
                      <div class="eyebrow_22-5">The Introduction</div>
                    </div>
                    <div class="cell_desc-row">
                      <div class="cell_slant">
                        <div class="slant-7">the</div>
                      </div>
                      <div class="cell_des">
                        <h2 class="h-h2">Journey<br /></h2>
                      </div>
                      <div class="cell_slant is-right">
                        <div class="slant-7">of</div>
                      </div>
                    </div>
                    <div class="cell_desc-row">
                      <div class="cell_desc-row">
                        <h2 class="h-h2">Every Planter</h2>
                      </div>
                    </div>
                  </div>
                  <div class="cell_desc-text-2 mt-4">
                    <h6 class="h-h6">At Yuccabe, every planter is more than a product—it’s a statement of design,
                      purpose, and nature working in harmony. The Explore page is your window into this world—where
                      timeless craftsmanship meets modern aesthetics. Discover our finest collections, see how our
                      planters transform real spaces, and experience the artistry, innovation, and intention behind
                      every piece. This is where green living begins, beautifully.</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- ScrollingTextSection Marquee Box -->
        <section class="animated-box mt-5">
          <div class="text-wrapper">
            <span class="animated-text">Yuccabe Planters</span>
            <span class="animated-text">Yuccabe Planters</span>
          </div>
        </section>

        <!-- VideoReelsSection Instagram Reels -->
        <section class="video-container mt-5">
          <div class="video-row">
            <a href="https://www.instagram.com/reel/DITt5O5yBzX/?igsh=MW5iNjY4c21nbzNwYQ==" target="_blank">
              <video src="./videos/1.mp4" muted loop playsInline autoPlay></video>
            </a>
            <a href="https://www.instagram.com/reel/DIButeZyOa5/?igsh=NGtmaXV1ZmZ0ZG0z" target="_blank">
              <video src="./videos/2.mp4" muted loop playsInline autoPlay></video>
            </a>
            <a href="https://www.instagram.com/reel/DH_IVzfSHLb/?igsh=cTE2cnZybmo1cDF0" target="_blank">
              <video src="./videos/3.mp4" muted loop playsInline autoPlay></video>
            </a>
            <a href="https://www.instagram.com/reel/DHlTMc8SEsK/?igsh=d2Z3Z2F5a2luM3Bu" target="_blank">
              <video src="./videos/4.mp4" muted loop playsInline autoPlay></video>
            </a>
            <a href="https://www.instagram.com/reel/DHTIFefyQhV/?igsh=dXJza2R6aGppemJ6" target="_blank">
              <video src="./videos/5.mp4" muted loop playsInline autoPlay></video>
            </a>
            <a href="https://www.instagram.com/reel/DHQjST0yCn3/?igsh=MXVub3l0c3VkbjVwbg==" target="_blank">
              <video src="./videos/6.mp4" muted loop playsInline autoPlay></video>
            </a>
          </div>
        </section>
      </div>
    </main>

    <!-- Footer Injected via JS -->
     <?php
        include 'inc/footer.php';
        ?>
  </div>

   <?php
        include 'inc/footer-data.php';
        ?>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      if (typeof AOS !== 'undefined') AOS.init();

      // Shortcuts Swiper Row Initialization
      if (typeof Swiper !== 'undefined') {
        new Swiper('.mySwiperjdf', {
          spaceBetween: 10,
          slidesPerView: 4,
          freeMode: true,
          loop: true,
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
          },
          breakpoints: {
            320: { slidesPerView: 2, spaceBetween: 5 },
            768: { slidesPerView: 3, spaceBetween: 10 },
            1024: { slidesPerView: 3, spaceBetween: 10 },
            1400: { slidesPerView: 4, spaceBetween: 10 }
          }
        });
      }

      // ResponsiveImageHoverEffect (Expanding Box Hover Toggle)
      const boxes = document.querySelectorAll('.containers .box');
      boxes.forEach(box => {
        box.addEventListener('mouseenter', () => {
          boxes.forEach(b => b.classList.remove('active'));
          box.classList.add('active');
        });
      });
    });
  </script>
</body>

</html>