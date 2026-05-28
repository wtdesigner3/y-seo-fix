<?php
require('inc/function.php');

$url = $_GET['url'];
if($url == ''){
    header('Location: '.SITE_URL.'404');
    exit();
}

$productURl = mysqli_query($conn,"SELECT * FROM `sub_sub_categories` WHERE `status` = '1' AND `slug` = '$url'");
if(mysqli_num_rows($productURl) > 0){
    $product = mysqli_fetch_assoc($productURl);
}else{
    header('Location: '.SITE_URL.'404');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $product['name']; ?> | Yuccabe Planters</title>
    <meta name="description" content="<?= $product['metadescription']; ?>" />
    <meta name="keywords" content="<?= $product['metakeywords']; ?>" />
    <?= $product['metatags']; ?>
    
    
   <?php
        include 'inc/head.php';
        ?>
</head>
<body>
    <!-- Preloader Overlay -->
    <div id="overlay">
        <div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div>
        <div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div>
    </div>

    <div id="content" style="opacity: 0;">
        <!-- Header Injected via JS -->
        <?php
        include 'inc/header.php';
        ?>

        <!-- Main Content -->
        <main>
            <!-- Product Hero Banner (Matching Fourth Image) -->
            <div class="page-banner position-relative overflow-hidden d-flex align-items-center justify-content-center" style="height: 40vh; background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.4)), url('<?= SITE_URL ?>uploads/<?= $product['breadimage'] ?>') center/cover no-repeat;">
                <div class="text-center text-white" data-aos="fade-down">
                    <h1 class="display-3 fw-bold mb-1"><?= $product['name'] ?></h1>
                    <!-- <p class="fs-5 tracking-wide opacity-90"><?= $product['name'] ?> / <?= $product['name'] ?></p> -->
                </div>
            </div>

            <!-- Main Product Two-Column Description -->
            <div class="container py-5 my-3">
                <div class="row g-0 g-md-5 align-items-start">
                    
                    <!-- Left: Large High-Resolution Product Image -->
                    <div class="col-lg-6" data-aos="fade-right">
                        <div class="premium-image-card shadow rounded-5 overflow-hidden bg-white p-4 text-center cursor-zoom-in" onclick="openLightbox('<?= SITE_URL ?>uploads/<?= $product['image'] ?>')">
                            <img src="<?= SITE_URL ?>uploads/<?= $product['image'] ?>" alt="<?= $product['alt'] ?>" class="img-fluid" style="max-height: 480px; object-fit: contain;">
                        </div>
                    </div>

                    <!-- Right: Product Customization Specifications -->
                    <div class="col-lg-6 mt-5 mt-md-0" data-aos="fade-left">
                        <!-- <span class="text-uppercase tracking-wider text-muted small fw-bold"><?= $product['name'] ?></span> -->
                        <!-- <h2 class="fw-bold mt-2 mb-4 text-dark" style="font-size: 2.1rem; line-height: 1.3;">Bar Planters – Modern Rectangular Planters for Stylish Indoor & Outdoor Spaces</h2> -->
                        
                        <?= $product['description'] ?>

                    </div>
                </div>
                
                <?php
                if(!empty($product['long_desc'])){    
                ?>
                <hr>
                <div class="col-12">
                    <?= $product['long_desc']; ?>
                </div>
                <?php } ?>    
            </div>

            <!-- "More Images" Color Gallery Section (Matching Fourth Image) -->
            <div class="bg-light py-5">
                <div class="container py-4">
                    <div class="text-center mb-5" data-aos="fade-up">
                        <h2 class="fw-bold text-dark display-6">More Images</h2>
                        <div class="accent-line mx-auto"></div>
                    </div>

                    <div class="row g-4 justify-content-center">
                    <?php
                        $images = json_decode($product['multi_images']);
                        foreach($images as $img){
                    ?>
                        <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="gallery-premium-card shadow-sm rounded-4 overflow-hidden bg-white p-3 cursor-zoom-in" onclick="openLightbox('<?= SITE_URL ?>uploads/<?= $img ?>')">
                                <img src="<?= SITE_URL ?>uploads/<?= $img ?>" alt="Bar Planter variation 1" class="img-fluid w-100 rounded-3" style="height: 250px; object-fit: cover;width:100%;object-position:center'">
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>

            <!-- Contact Form Section -->
            <div class="bg-color contact-us " id="contact-form-section">
                <div class="cu-wrap">
                    <div class="cu-left">
                        <span class="cu-eyebrow">Connect with Yuccabe</span>
                        <h2 class="cu-title">Start Your<br/><em>Transformation</em></h2>
                        <p class="cu-desc">Have a specific design in mind or need expert advice for your project? Drop us a line and let’s shape your green space together.</p>
                        <div class="cu-taglines">
                            <p>✓ Tailored for Architects & Designers</p>
                            <p>✓ Custom Colours & Finishes</p>
                            <p>✓ Pan-India Delivery</p>
                        </div>
                        <div class="cu-info-pills">
                            <a href="tel:+919971614977" class="cu-pill">📞 +91 99716 14977</a>
                            <a href="mailto:info@yuccabeplanters.com" class="cu-pill">✉️ info@yuccabeplanters.com</a>
                        </div>
                    </div>
                    <div class="cu-right">
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
        </main>

        <!-- Footer Injected via JS -->
         <?php
        include 'inc/footer.php';
        ?>
    </div>

    <!-- Lightbox -->
    <div id="lightbox">
        <span class="lightbox-close">&times;</span>
        <button class="lightbox-prev" aria-label="Previous Image">&#10094;</button>
        <img id="lightbox-img" src="" alt="Zoomed Product Image" />
        <button class="lightbox-next" aria-label="Next Image">&#10095;</button>
    </div>

    <!-- Scripts -->
     <?php
        include 'inc/footer-data.php';
        ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof AOS !== 'undefined') AOS.init();

            // Lightbox logic
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightbox-img');
            const closeBtn = document.querySelector('.lightbox-close');
            const prevBtn = document.querySelector('.lightbox-prev');
            const nextBtn = document.querySelector('.lightbox-next');

            // Collect all unique gallery image URLs in order of appearance
            let galleryImages = [];
            let currentImgIndex = 0;

            function updateGalleryImages() {
                galleryImages = [];
                // Find all elements that trigger openLightbox
                const zoomElements = document.querySelectorAll('[onclick*="openLightbox"]');
                zoomElements.forEach(el => {
                    const onclickStr = el.getAttribute('onclick');
                    const match = onclickStr.match(/openLightbox\(['"](.*?)['"]\)/);
                    if (match && match[1]) {
                        const url = match[1];
                        if (!galleryImages.includes(url)) {
                            galleryImages.push(url);
                        }
                    }
                });
            }

            // Initialize image collection
            updateGalleryImages();

            window.openLightbox = function(src) {
                // Keep image list updated in case content loads dynamically
                updateGalleryImages();
                
                currentImgIndex = galleryImages.indexOf(src);
                if (currentImgIndex === -1) {
                    galleryImages.push(src);
                    currentImgIndex = galleryImages.length - 1;
                }
                
                lightboxImg.src = src;
                lightbox.classList.add('active');
                
                // Toggle navigation buttons based on gallery size
                if (galleryImages.length > 1) {
                    prevBtn.style.display = 'flex';
                    nextBtn.style.display = 'flex';
                } else {
                    prevBtn.style.display = 'none';
                    nextBtn.style.display = 'none';
                }
            };

            function showImage(index) {
                if (galleryImages.length === 0) return;
                currentImgIndex = (index + galleryImages.length) % galleryImages.length;
                lightboxImg.src = galleryImages[currentImgIndex];
            }

            closeBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                lightbox.classList.remove('active');
            });

            if (prevBtn) {
                prevBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    showImage(currentImgIndex - 1);
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    showImage(currentImgIndex + 1);
                });
            }

            // Keyboard navigation (Escape, Left Arrow, Right Arrow)
            document.addEventListener('keydown', (e) => {
                if (!lightbox.classList.contains('active')) return;
                if (e.key === 'Escape') {
                    lightbox.classList.remove('active');
                } else if (e.key === 'ArrowLeft' && galleryImages.length > 1) {
                    showImage(currentImgIndex - 1);
                } else if (e.key === 'ArrowRight' && galleryImages.length > 1) {
                    showImage(currentImgIndex + 1);
                }
            });

            lightbox.addEventListener('click', (e) => {
                if (e.target === lightbox || e.target === lightboxImg) {
                    // Clicking outside the image or on the image background closes the lightbox
                    lightbox.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>
