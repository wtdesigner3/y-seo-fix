<?php
require('inc/function.php');
$url = $_GET['url'];
if($url == ''){
    header('Location: ' . SITE_URL.'404');
    exit();
}
$subcategory = mysqli_query($conn,"SELECT * FROM `sub_categories` WHERE `slug` = '$url' AND `status` = '1'");
if(mysqli_num_rows($subcategory) == 0){
    header('Location: ' . SITE_URL.'404');
    exit();
}
$subcategory = mysqli_fetch_assoc($subcategory);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $subcategory['name']; ?> | Yuccabe Planters</title>
    <meta name="description" content="<?php echo $subcategory['metadescription']; ?>" />
    <meta name="keywords" content="<?php echo $subcategory['metakeywords']; ?>" />
<?php
include('inc/head.php');
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
    include('inc/header.php');
    ?>

        <!-- Main Content -->
        <main>
            <!-- Subcategory Banner (Matching Third Image) -->
            <div class="page-banner position-relative overflow-hidden d-flex align-items-center justify-content-center"
                style="height: 50vh; background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.5)), url('<?= SITE_URL ?>uploads/<?= $subcategory['breadimage'] ?>') center/cover no-repeat;">
                <div class="text-center text-white" data-aos="fade-down">
                    <h1 class="display-3 fw-bold mb-2"><?= $subcategory['bread_heading'] ?></h1>
                </div>
            </div>

            <!-- Subcategory Product Grid (21 Cards!) -->
            <div class="container py-5 my-3">
                <div class="row g-4 justify-content-center" id="products-grid">
<?php
$products = mysqli_query($conn,"SELECT * FROM sub_sub_categories WHERE subcategory_id = '{$subcategory['id']}'");
if(mysqli_num_rows($products) > 0){
    while($product = mysqli_fetch_assoc($products)){
?>
                    <!-- Card 1: BAR -->
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="50">
                        <a href="<?= SITE_URL ?>products/<?= $product['slug'] ?>" class="text-decoration-none">
                            <div class="subcategory-grid-card shadow-sm rounded-5 overflow-hidden position-relative"
                                style="background-image: url('<?= SITE_URL ?>uploads/<?= $product['image'] ?>');">
                                <div class="subcategory-grid-overlay d-flex align-items-center justify-content-center">
                                    <h3 class="fw-bold text-white text-center tracking-wider m-0 px-3"
                                        style="font-size: 1.6rem; text-shadow: 1px 1px 4px rgba(0,0,0,0.7);"><?= $product['name'] ?></h3>
                                </div>
                            </div>
                        </a>
                    </div>
<?php
    }
}
?>
                </div>
            </div>

            <!-- Contact Form Section -->
            <div class="bg-color contact-us " id="contact-form-section">
                <div class="cu-wrap">
                    <div class="cu-left">
                        <span class="cu-eyebrow">Connect with Yuccabe</span>
                        <h2 class="cu-title">Start Your<br /><em>Transformation</em></h2>
                        <p class="cu-desc">Have a specific design in mind or need expert advice for your project? Drop
                            us a line and let’s shape your green space together.</p>
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
        include('inc/footer.php');
        ?>
    </div>

<?php
include('inc/footer-data.php');
?>
    <script src="<?= SITE_URL ?>js/components.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof AOS !== 'undefined') AOS.init();
        });
    </script>
</body>

</html>