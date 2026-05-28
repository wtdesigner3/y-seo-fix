<?php

if ($_SERVER['SERVER_NAME'] === 'localhost') {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', '0');
}

require('inc/function.php');

$tblHomeExtra = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_home_extra`"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $profile['pro_title'] ?></title>
    <meta name="description" content="<?= $profile['pro_detail'] ?>" />
    <meta name="keywords" content="<?= $profile['pro_keyword'] ?>" />
    <?php
    $canonical_url = rtrim(SITE_URL, '/') . '/';
    $meta_robots = 'index, follow';
    ?>
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= $profile['pro_title'] ?>">
    <meta property="og:description" content="<?= $profile['pro_detail'] ?>">    
    <meta property="og:url" content="https://yuccabeplanters.co.in/">
    <meta property="og:site_name" content="Yuccabe Planters">
    <meta property="og:image" content="https://yuccabeplanters.co.in/img/YP-Logo-black-.png">
    <meta property="og:image:secure_url" content="https://yuccabeplanters.co.in/img/YP-Logo-black-.png">
    <meta property="og:image:width" content="1600">
    <meta property="og:image:height" content="587">
    <link property="image_src" href="https://yuccabeplanters.co.in/img/YP-Logo-black-.png">
    <meta name="msapplication-TileColor" content="#2196f3">
    <meta name="msapplication-TileImage" content="https://yuccabeplanters.co.in/img/YP-Logo-black-.png">
    <meta name="pinterest-logo" content="https://yuccabeplanters.co.in/img/YP-Logo-black-.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="Yuccabe Planters">
    <meta name="twitter:creator" content="Yuccabe Planters">
    <meta name="twitter:title" content="<?= $profile['pro_title'] ?>">
    <meta property="twitter:description" content="<?= $profile['pro_detail'] ?>">
    <meta property="twitter:image" content="https://yuccabeplanters.co.in/img/YP-Logo-black-.png">
    <meta name="DESIGNER" content="Web Tycoons Designer and Promoter"/>
    <meta name="DEVELOPER" content="Web Tycoons Designer and Promoter"/>
    
    <script type="application/ld+json">
     {
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Yuccabe Planters",
  "description": "<?= $profile['pro_detail'] ?>",
  "url": "https://yuccabeplanters.co.in/",
  "image": "https://yuccabeplanters.co.in/img/YP-Logo-black-.png",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "police station, 2/1 WHS, Kirti Nagar Main Rd, beside Kirti nagar, market, Delhi, 110015",
    "addressLocality": "Delhi",
    "addressRegion": "Delhi",
    "postalCode": "110015",
    "addressCountry": "India"
  },
  "telephone": "099716 14948",
  "email": "yuccabeplanters@gmail.com",
  "openingHours": "Mo-Sat 10:00-19:00",
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "28.6480",
    "longitude": "77.1416"
  },
  "sameAs": [
    "https://www.instagram.com/yuccabeplanters/"
  ]
}
    </script>
    
    
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
            <div class="scroll-container" style="width: 100vw; overflow: hidden;">

            <?php
$banner = mysqli_query($conn, "SELECT * FROM `tbl_banner` WHERE `bnr_status` = '1' LIMIT 1");
if (mysqli_num_rows($banner) > 0) {
    $rowBanner = mysqli_fetch_assoc($banner);
            ?>
                <!-- Hero Banner -->
                <section class="hb-section" id="hero-banner">
                    <div class="hb-bg">
                        <img src="<?= SITE_URL ?>uploads/banner/<?= $rowBanner['bnr_image'] ?>" alt="Yuccabe premium planters lifestyle"
                            class="hb-bg-img" loading="eager" />
                        <div class="hb-bg-overlay"></div>
                    </div>
                    <div class="hb-container">
                        <div class="hb-left">
                            <p class="hb-eyebrow"><span class="hb-eyebrow-dot"></span><?= $rowBanner['bnr_title'] ?></p>
                            <h1 class="hb-title"><?= $rowBanner['bnr_subtitle'] ?></h1>
                            <p class="hb-desc"><?= strip_tags($rowBanner['bnr_desc']) ?></p>
                        </div>
                        <div class="hb-right">
                            <div class="hb-form-card">
                                <div class="hb-form-header">
                                    <h2 class="hb-form-title">Get a Custom Quote</h2>
                                    <p class="hb-form-subtitle">Tell us about your space and we'll design the perfect
                                        planter solution for you.</p>
                                </div>
                                <form  method="POST" action="<?= SITE_URL ?>mail/mail" class="hb-form" >
                                    <div class="hb-field-row">
                                        <div class="hb-field">
                                            <label for="hb-name" class="hb-label">Full Name *</label>
                                            <input id="hb-name" name="name" type="text" class="hb-input"
                                                placeholder="e.g. Rahul Sharma" required />
                                        </div>
                                        <div class="hb-field">
                                            <label for="hb-phone" class="hb-label">Phone *</label>
                                            <input id="hb-phone"  name="phone" type="tel" class="hb-input"
                                                placeholder="10-digit mobile" required maxlength="10" />
                                        </div>
                                    </div>
                                    <div class="hb-field">
                                        <label for="hb-email" class="hb-label">Email Address *</label>
                                        <input id="hb-email"  name="email" type="email" class="hb-input" placeholder="you@example.com"
                                            required />
                                    </div>
                                    <div class="hb-field">
                                        <label for="hb-spaceType" class="hb-label">Space / Project Type</label>
                                        <select id="hb-spaceType"  name="project" class="hb-input hb-select">
                                            <option value="">Select your space type</option>
                                            <option value="Residential">Residential / Home</option>
                                            <option value="Commercial">Commercial Office</option>
                                            <option value="Hospitality">Hotel / Resort / Restaurant</option>
                                            <option value="Landscape">Landscape / Garden</option>
                                            <option value="Retail">Retail / Mall</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="hb-field">
                                        <label for="hb-message" class="hb-label">Message / Requirements</label>
                                        <textarea id="hb-message" name="message" class="hb-input hb-textarea"
                                            placeholder="Describe your space, quantity needed, preferred finishes…"
                                            rows="3"></textarea>
                                    </div>
                                    <div id="hb-alert" class="hb-alert" style="display:none;"></div>
                                    <div style="margin-bottom: 14px;">
                                        <div class="g-recaptcha" data-sitekey="6LcKuZAsAAAAACJIjQSSjX-gOScY16uJPnkgUY_z"
                                            data-theme="dark"></div>
                                    </div>
                                    <button type="submit" class="hb-submit">
                                        Request Free Quote
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true">
                                            <path d="M3 9H15M15 9L10 4M15 9L10 14" stroke="currentColor"
                                                stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
<?php } ?>                

                <!-- Featured Products Swiper Section -->
                <section class="ypc-carousel-section">
                    <span class="ypc-bg-watermark" aria-hidden="true">collections</span>

                    <div class="ypc-carousel-header" data-aos="fade-up">
                        <p class="ypc-carousel-eyebrow"><?= $tblHomeExtra['prd_mini_heading']; ?></p>
                        <h2 class="ypc-carousel-title">
                            <?= $tblHomeExtra['prd_heading']; ?>
                        </h2>
                        <p class="ypc-carousel-subtitle">
                           <?= $tblHomeExtra['prd_subheading']; ?>
                        </p>
                    </div>

                    <div class="swiper mySwiperjdf ypc-track-wrapper" >
                        <div class="swiper-wrapper">
<?php
$productList = mysqli_query($conn, "SELECT ssc.*, sc.name as Category_name FROM sub_sub_categories ssc LEFT JOIN sub_categories sc ON ssc.subcategory_id = sc.id WHERE ssc.status = '1' ORDER BY ssc.created_at DESC LIMIT 8");
if(mysqli_num_rows($productList) > 0) {
    while($product = mysqli_fetch_assoc($productList)) {
?>
                            <!-- Card 1: BEAD -->
                            <div class="swiper-slide">
                                <div class="ypc-card">
                                    <span class="ypc-card-badge">Planter</span>
                                    <div class="ypc-card-img-wrap">
                                        <img src="<?= SITE_URL ?>uploads/<?= $product['image'] ?>" alt="<?= $product['alt'] ?>"
                                            class="ypc-card-img" loading="lazy" />
                                        <div class="ypc-card-overlay"></div>
                                    </div>
                                    <div class="ypc-card-info">
                                        <span class="ypc-card-category"><?= $product['Category_name'] ?></span>
                                        <h3 class="ypc-card-name"><?= $product['name'] ?></h3>
                                        <a href="<?= SITE_URL ?>explore" class="ypc-card-cta">
                                            Explore
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path d="M2 8H14M14 8L9 3M14 8L9 13" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
<?php } } ?>

                        </div>
                    </div>
                </section>

                <!-- Co-Create Section -->
                <div style="z-index: 1;" class="h-100vh bg-color position-relative h-100vh stagger">
                    <div class="d-flex flex-column gap-5 align-items-center justify-content-center h-100 border-reduis">
                        <div class="stagger1 text-center">
                            <h2 class="text-white secrion-3-font" data-aos="fade-up" data-aos-offset="200"
                                data-aos-anchor-placement="top-bottom">co-create </h2>
                            <h2 class="text-white secrion-3-font" data-aos="fade-up" data-aos-offset="200"
                                data-aos-anchor-placement="top-bottom">your green</h2>
                            <h2 class="text-white secrion-3-font" data-aos="fade-up" data-aos-offset="200"
                                data-aos-anchor-placement="top-bottom">spaces with us</h2>
                        </div>
                        <div>
                            <a class="button-77 poppins-regular" role="button" href="/services">Design Your Space</a>
                        </div>
                    </div>
                </div>

                <!-- Points Section -->
              <section class="why-section">
 
  <div class="why-bg-text" aria-hidden="true">Yuccabe</div>
 
  <div class="why-header">
    <h2 class="why-title">Why<br>Yuccabe?</h2>
    <p class="why-desc">
      From timeless design to thoughtful craftsmanship, discover why architects,
      designers, and home creators choose Yuccabe for meaningful green transformations.
    </p>
  </div>
 
  <div class="why-grid">
 
    <div class="why-card">
      <img src="./img/Home-Silder/1.png" alt="Handcrafted planter detail" />
      <p>Each planter is handcrafted with care, detail, and refined technique.</p>
    </div>
 
    <div class="why-card">
      <img src="./img/Home-Silder/2.png" alt="Custom planters for interior space" />
      <p>Tailored planter solutions perfectly aligned to your space and vision.</p>
    </div>
 
    <div class="why-card">
      <img src="./img/Home-Silder/3.png" alt="Planters used in premium commercial design" />
      <p>Preferred by top design professionals across luxury and commercial spaces.</p>
    </div>
 
    <div class="why-card">
      <img src="./img/Home-Silder/4.png" alt="Balanced planter design composition" />
      <p>Designs that blend beauty, balance, and everyday practicality with ease.</p>
    </div>
 
    <div class="why-card">
      <img src="./img/Home-Silder/5.png" alt="Durable indoor and outdoor planter" />
      <p>Durable and elegant—perfect for both indoor and outdoor use.</p>
    </div>
 
    <div class="why-card">
      <img src="./img/Home-Silder/6.png" alt="Large scale planter installation project" />
      <p>Successfully styled spaces across India in varied scale and settings.</p>
    </div>
 
  </div>
 
</section>

                <!-- Clients Zoom Image -->
                <!-- <div class="sdf overflow-hidden pt-5">
                    <div
                        class="d-flex flex-column align-items-center justify-content-center h-100vh w-100 position-relative">
                        <img src="./img/1.jpg" alt="" style="width: 40%; border-radius: 20px; transform: scale(2.5);"
                            class="sdf-img" />
                    </div>

                </div> -->

                <!-- Contact Form Section -->
                <div class="bg-color contact-us" id="contact-form-section">
                    <div class="cu-wrap">
                        <div class="cu-left">
                            <span class="cu-eyebrow"><?= $tblHomeExtra['connect_mini_heading']; ?></span>
                            <h2 class="cu-title"><?= $tblHomeExtra['connect_heading']; ?></h2>
                            <p class="cu-desc">Have a specific design in mind or need expert advice for your project?
                                Drop us a line and let’s shape your green space together.</p>
                            <div class="cu-taglines">
                                <p>✓ Tailored for Architects & Designers</p>
                                <p>✓ Custom Colours & Finishes</p>
                                <p>✓ Pan-India Delivery</p>
                            </div>
                            <div class="cu-info-pills">
                                <a href="tel:<?= $contact['con_phone1'] ?>" class="cu-pill">📞 <?= $contact['con_phone1'] ?></a>
                                <a href="mailto:<?= $contact['con_email1'] ?>" class="cu-pill">✉️
                                    <?= $contact['con_email1'] ?></a>
                            </div>
                        </div>
                        <div class="cu-right">
                            <form method="POST" action="<?= SITE_URL ?>mail/mail" class="cu-form" >
                                <div class="cu-field-row">
                                    <div class="cu-field">
                                        <label class="cu-label">Name *</label>
                                        <input type="text" name="name" class="cu-input"
                                            placeholder="e.g. Aman Gupta" required>
                                    </div>
                                    <div class="cu-field">
                                        <label class="cu-label">Email *</label>
                                        <input type="email" name="email" class="cu-input"
                                            placeholder="you@company.com" required>
                                    </div>
                                </div>
                                <div class="cu-field-row">
                                    <div class="cu-field">
                                        <label class="cu-label">Phone *</label>
                                        <input type="tel" name="phone" class="cu-input"
                                            placeholder="10-digit number" required>
                                    </div>
   
                                    <div class="cu-field">
                                        <label for="cu-spaceType" class="hb-label">Space / Project Type</label>
                                        <select id="cu-spaceType"  name="project" class="hb-input hb-select">
                                            <option value="">Select your space type</option>
                                            <option value="Residential">Residential / Home</option>
                                            <option value="Commercial">Commercial Office</option>
                                            <option value="Hospitality">Hotel / Resort / Restaurant</option>
                                            <option value="Landscape">Landscape / Garden</option>
                                            <option value="Retail">Retail / Mall</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>                                    
                                    
                                </div>
                                <div class="cu-field">
                                    <label class="cu-label">Message *</label>
                                    <textarea name="message" class="cu-input cu-textarea"
                                        placeholder="Tell us about your project requirements..." required></textarea>
                                </div>
                                <div id="cu-form-alert" class="alert d-none"
                                    style="font-size:13px; padding:10px; border-radius:8px;"></div>
                                <div class="cu-field mt-2">
                                    <div class="g-recaptcha" data-sitekey="6LcKuZAsAAAAACJIjQSSjX-gOScY16uJPnkgUY_z"
                                        data-theme="dark"></div>
                                </div>
                                <button type="submit" class="cu-submit">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <?php
include 'inc/footer.php';
        ?>

    </div>

<?php
include 'inc/footer-data.php';
?>

<script>
(function () {
 
  function init() {
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;
 
    gsap.registerPlugin(ScrollTrigger);
 
    var cards = document.querySelectorAll('.why-card');
 
    cards.forEach(function (card, i) {
      gsap.to(card, {
        opacity: 1,
        y: 0,
        duration: 0.6,
        ease: 'power2.out',
        scrollTrigger: {
          trigger: card,
          start: 'top 85%',
          toggleActions: 'play none none none',
        },
        delay: (i % 3) * 0.1   /* slight stagger per column on desktop */
      });
    });
  }
 
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
 
})();
</script>
</body>

</html>