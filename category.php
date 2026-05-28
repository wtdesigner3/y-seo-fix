<?php
require('inc/function.php');
$url = $_GET['url'];
$category = mysqli_query($conn,"SELECT * FROM `categories` WHERE `slug` = '$url' AND `status` = '1'");
if(mysqli_num_rows($category) == 0){
    header('Location: '.SITE_URL.'404');
    exit();
}

$category_data = mysqli_fetch_assoc($category);

$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$canonical_url = rtrim(SITE_URL, '/') . '/category/' . $category_data['slug'];
$meta_robots = 'index, follow';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $category_data['metatag']; ?></title>
    <meta name="description" content="<?= $category_data['metadescription']; ?>" />
    <meta name="keywords" content="<?= $category_data['metakeywords']; ?>" />
    <meta charset="utf-8">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= $category_data['name']; ?> | Yuccabe Plantersti">
    <meta property="og:description" content="<?= $category_data['metadescription']; ?>">    
    <meta property="og:url" content="<?=$actual_link?>">
    <meta property="og:site_name" content="Yuccabe Planters">
    <meta property="og:image" content="<?= SITE_URL ?>uploads/<?= $category_data['image'] ?>">
    <meta property="og:image:secure_url" content="<?= SITE_URL ?>uploads/<?= $category_data['image'] ?>">
    <meta property="og:image:width" content="1600">
    <meta property="og:image:height" content="587">
    <link property="image_src" href="<?= SITE_URL ?>uploads/<?= $category_data['image'] ?>">
    <meta name="msapplication-TileColor" content="#2196f3">
    <meta name="msapplication-TileImage" content="<?= SITE_URL ?>uploads/<?= $category_data['image'] ?>">
    <meta name="pinterest-logo" content="<?= SITE_URL ?>uploads/<?= $category_data['image'] ?>">
    <meta name="theme-color" content="#ffffff">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="Yuccabe Planters">
    <meta name="twitter:creator" content="Yuccabe Planters">
    <meta name="twitter:title" content="<?= $category_data['name']; ?> | Yuccabe Planters">
    <meta property="twitter:description" content="<?= $category_data['metadescription']; ?>">
    <meta property="twitter:image" content="<?= SITE_URL ?>uploads/<?= $category_data['image'] ?>">
    <meta name="DESIGNER" content="Web Tycoons Designer and Promoter"/>
    <meta name="DEVELOPER" content="Web Tycoons Designer and Promoter"/>
    
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
            <!-- Category Banner -->
            <div class="page-banner position-relative overflow-hidden d-flex align-items-center justify-content-center"
                style="height: 55vh; background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url('<?= SITE_URL ?>uploads/<?= $category_data['breadimage'] ?>') center/cover no-repeat;">
                <div class="text-center text-white p-3" data-aos="fade-down">
                    <h1 class="display-3 fw-bold mb-3" style="text-shadow: 2px 2px 10px rgba(0,0,0,0.6);"><?= $category_data['bread_heading']; ?></h1>
                    <p class="fs-5 text-uppercase tracking-wide opacity-90"
                        style="letter-spacing: 2px; font-weight: 500;"><?= $category_data['desc_heading']; ?></p>
                </div>
            </div>

            <!-- Two-Column Description & Feature Section -->
            <div class="container my-5 py-4">
                <div class="row g-0 g-md-5">
                    <div class="col-lg-5" data-aos="fade-right">
                        <div class="premium-image-card shadow-lg rounded-4 overflow-hidden position-relative">
                            <img src="<?= SITE_URL ?>uploads/<?= $category_data['image'] ?>" alt="Premium FRP Planters"
                                class="img-fluid w-100" style="max-height: 500px; object-fit: cover;">
                            <div class="image-overlay-accent"></div>
                        </div>
                    </div>
                    <div class="col-lg-7 mt-5 mt-md-0" data-aos="fade-left">
                        <h2 class="fw-bold mb-4 text-dark" style="font-size: 2.2rem; line-height: 1.3;"><?= $category_data['content_heading']; ?></h2>
                        <?= $category_data['description']; ?>
                    </div>
                </div>
                <?php
            if(!empty($category_data['long_desc'])){    
                ?>
                <hr>
                <div class="col-12">
                    <?= $category_data['long_desc']; ?>
                </div>
                <?php } ?>
            </div>
            
            <!-- "Our Categories" Section (Matching First Image!) -->
            <div class="footer-bg-color py-5" style="background-color: #f7f6f3;">
                <div class="container py-4">
                    <div class="text-center mb-5" data-aos="fade-up">
                        <h2 class="fw-bold text-dark display-5" style="letter-spacing: -0.5px;">Our Categories</h2>
                        <p class="text-muted">Choose a category to browse specific styles, shapes, and options.</p>
                    </div>

                    <div class="row g-4 justify-content-center">
                       <?php
                $subcategories = mysqli_query($conn,"SELECT * FROM `sub_categories` WHERE category_id = '{$category_data['id']}' AND `status` = '1' ORDER BY `sort`");
                if(mysqli_num_rows($subcategories) > 0) {
                    while($subcategory = mysqli_fetch_assoc($subcategories)) {
                       ?>
                        <!-- Card 1: Cubes and Cuboid -->
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <a href="<?= SITE_URL ?>subcategory/<?= $subcategory['slug']; ?>" class="text-decoration-none">
                                <div
                                    class="category-tile-premium p-4 rounded-4 shadow-sm text-center bg-white h-100 d-flex flex-column justify-content-between">
                                    <div class="category-tile-image-wrap p-3">
                                        <img src="<?= SITE_URL ?>uploads/<?= $subcategory['image']; ?>" alt="<?= $subcategory['name']; ?>" class="img-fluid c-img"
                                           >
                                    </div>
                                    <div class="mt-3">
                                        <h3 class="fw-bold fs-5 text-dark mb-2"><?= $subcategory['name']; ?></h3>
                                        <p class="text-muted small mb-0">Clean modern geometric squares and cubes built
                                            for architectural balance.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
<?php } } ?>
                    </div>
                </div>
            </div>            

            <?php
            $why_choose_query = mysqli_query($conn, "SELECT * FROM why_choose WHERE `category_id` = '{$category_data['id']}'");
            if(mysqli_num_rows($why_choose_query) > 0){
                $why_choose_data = mysqli_fetch_assoc($why_choose_query);
            ?>
            <!-- "Why Choose..." Section -->
            <div class="bg-light py-5">
                <div class="container py-4">
                    <div class="text-center mb-5" data-aos="fade-up">
                        <h2 class="fw-bold text-dark display-6"><?= $why_choose_data['heading']; ?></h2>
                        <div class="accent-line mx-auto"></div>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="feature-card-clean p-4 rounded-4 shadow-sm bg-white h-100 border-0">
                                <h4 class="fw-bold mb-3 text-dark fs-5"><?= $why_choose_data['card_heading1']; ?></h4>
                                <p class="text-muted mb-0"><?= strip_tags($why_choose_data['card_content1']); ?></p>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="feature-card-clean p-4 rounded-4 shadow-sm bg-white h-100 border-0">
                                <h4 class="fw-bold mb-3 text-dark fs-5"><?= $why_choose_data['card_heading2']; ?></h4>
                                <p class="text-muted mb-0"><?= strip_tags($why_choose_data['card_content2']); ?></p>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="feature-card-clean p-4 rounded-4 shadow-sm bg-white h-100 border-0">
                                <h4 class="fw-bold mb-3 text-dark fs-5"><?= $why_choose_data['card_heading3']; ?></h4>
                                <p class="text-muted mb-0"><?= strip_tags($why_choose_data['card_content3']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <?php } ?>

                <?php
                $faq_query = mysqli_query($conn, "SELECT * FROM faq_table WHERE status = 1 AND `category_id` = '{$category_data['id']}'");
                if(mysqli_num_rows($faq_query) > 0){
                    
                ?>
            <!-- FAQ Section -->
            <div class="container my-5 py-5">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="fw-bold text-dark display-6">Frequently Asked Questions</h2>
                    <div class="accent-line mx-auto"></div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                        <div class="accordion accordion-flush" id="faqAccordion">
                            <?php
                            while($faq_row = mysqli_fetch_assoc($faq_query)) {
                            ?>
                            <div class="accordion-item border-bottom py-3">
                                <h2 class="accordion-header" id="heading<?= $faq_row['id']; ?>">
                                    <button
                                        class="accordion-button collapsed fw-bold text-dark fs-5 bg-transparent shadow-none"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $faq_row['id']; ?>"
                                        aria-expanded="false" aria-controls="collapse<?= $faq_row['id']; ?>">
                                        <?php echo $faq_row['faq_question']; ?>
                                    </button>
                                </h2>
                                <div id="collapse<?= $faq_row['id']; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $faq_row['id']; ?>"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body text-muted">
                                        <?php echo $faq_row['faq_answer']; ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

                <?php } ?>

        </main>

        <!-- Contact Form Section -->
        <div class="bg-color contact-us" id="contact-form-section">
            <div class="cu-wrap">
                <div class="cu-left">
                    <span class="cu-eyebrow">Connect with Yuccabe</span>
                    <h2 class="cu-title">Start Your<br /><em>Transformation</em></h2>
                    <p class="cu-desc">Have a specific design in mind or need expert advice for your project? Drop us a
                        line and let’s shape your green space together.</p>
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
                    <form id="cu-contact-form" class="cu-form" novalidate>
                        <div class="cu-field-row">
                            <div class="cu-field">
                                <label class="cu-label">Name *</label>
                                <input type="text" name="your-name" class="cu-input" placeholder="e.g. Aman Gupta"
                                    required>
                            </div>
                            <div class="cu-field">
                                <label class="cu-label">Email *</label>
                                <input type="email" name="email-address" class="cu-input" placeholder="you@company.com"
                                    required>
                            </div>
                        </div>
                        <div class="cu-field-row">
                            <div class="cu-field">
                                <label class="cu-label">Phone *</label>
                                <input type="tel" name="contact-number" class="cu-input" placeholder="10-digit number"
                                    required>
                            </div>
                            <div class="cu-field">
                                <label class="cu-label">Company / Firm *</label>
                                <input type="text" name="company" class="cu-input" placeholder="e.g. Design Studio"
                                    required>
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

        <!-- Footer Injected via JS -->
        <?php
            include('inc/footer.php');
        ?>


    </div>

    <!-- Scripts -->
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