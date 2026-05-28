<?php
require('inc/function.php');
$url = $_GET['url'];
if($url == '') {
    header('Location: '.SITE_URL.'404');
    exit();
}

$blogdetail = mysqli_query($conn,"SELECT * FROM posts WHERE `slug` = '$url'");
if(mysqli_num_rows($blogdetail) == 0) {
    header('Location: '.SITE_URL.'404');
    exit();
}

$blogdetail = mysqli_fetch_assoc($blogdetail);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title><?= $blogdetail['title'] ?> – Yuccabe Planters</title>
    <meta name="description" content="<?= $blogdetail['metadescription'] ?>" />
    <meta name="keywords" content="<?= $blogdetail['metakeywords'] ?>" id="meta-keywords" />
    <?= $blogdetail['head_tags'] ?>

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
        <!-- Header -->
                <?php
                    include 'inc/header.php'; 
                ?>

        <!-- Main Content -->
        <main>
            <div id="blog-detail-content" class="yb-detail-page">
                <div class="container">
                    <!-- Breadcrumb -->
                    <div class="yb-detail-breadcrumb">
                        <a href="<?= SITE_URL ?>">Home</a>
                        <span class="yb-detail-breadcrumb-sep">›</span>
                        <a href="<?= SITE_URL ?>blogs">Blog</a>
                        <span class="yb-detail-breadcrumb-sep">›</span>
                        <span class="yb-detail-breadcrumb-current"><?= $blogdetail['title'] ?></span>
                    </div>

                    <!-- Two-column layout: Content + Sidebar -->
                    <div class="yb-detail-layout">
                        <!-- LEFT: Blog Content -->
                        <div class="yb-detail-main">
                            <!-- Article Header -->
                            <div class="yb-detail-header">
                                <!-- <span class="yb-detail-category">Design Tips</span> -->
                                <h1 class="yb-detail-title"><?= $blogdetail['title'] ?></h1>
                                <div class="yb-detail-meta-bar">
                                    <span class="yb-detail-meta-item">
                                        <span class="yb-detail-meta-icon">📅</span>
                                        <span><?= date('F j, Y', strtotime($blogdetail['created_at'])) ?></span>
                                    </span>
                                </div>
                            </div>

                            <!-- Hero Image -->
                            <div class="yb-detail-hero">
                                <img src="<?= SITE_URL ?>uploads/<?= $blogdetail['image']; ?>" alt="<?= $blogdetail['alt']; ?>" />
                            </div>

                            <!-- Article Content -->
                            <div class="yb-detail-content">
                                <?= $blogdetail['content']; ?>
                            </div>
                        </div>

                        <!-- RIGHT: Sidebar with Related Blogs -->
                        <aside class="yb-detail-sidebar">
                            <div class="yb-detail-sidebar-sticky">
                                <h4 class="yb-sidebar-heading">Related Articles</h4>
                                <div class="yb-sidebar-heading-line"></div>
                                <div id="related-blogs-container">
                            <?php
                        $relatedBlogs = mysqli_query($conn,"SELECT * FROM `posts` WHERE id != ".$blogdetail['id']." AND `status` = '1'");
                        while($relatedBlog = mysqli_fetch_assoc($relatedBlogs)) {
                            ?>
                                    <a href="<?= SITE_URL ?>blog/<?= $relatedBlog['slug'] ?>" class="yb-sidebar-card">
                                        <div class="yb-sidebar-thumb">
                                            <img src="<?= SITE_URL ?>uploads/<?= $relatedBlog['image'] ?>" alt="<?= $relatedBlog['alt'] ?>" />
                                        </div>
                                        <div class="yb-sidebar-info">
                                            <div class="yb-sidebar-date"><?= date('F j, Y', strtotime($relatedBlog['created_at'])) ?></div>
                                            <p class="yb-sidebar-title"><?= $relatedBlog['title'] ?></p>
                                        </div>
                                    </a>
                        <?php
                        }
                            ?>  
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <div class="contact-us" id="contact-form-section">
                    <div class="cu-wrap">
                      <!-- Left — copy -->
                      <div class="cu-left">
                        <span class="cu-eyebrow">Let's Connect</span>
                        <h2 class="cu-title">
                          Have a vision<br />
                          <em>for your space?</em>
                        </h2>
                        <p class="cu-desc">
                          We collaborate with architects, designers, and hospitality brands to
                          create planters that truly transform spaces.
                        </p>
                        <div class="cu-taglines">
                          <p>We collaborate with ambitious companies and aesthetes.</p>
                          <p class="cu-cta-line">
                            Making a change starts with one conversation.{" "}
                            <strong>Let's talk!</strong>
                          </p>
                        </div>
                        <div class="cu-info-pills">
                          <a href="tel:+919971614977" class="cu-pill">📞 +91 99716 14977</a>
                          <a href="mailto:yuccabeplanters@gmail.com" class="cu-pill">✉️ yuccabeplanters@gmail.com</a>
                          <a href="./services.php" class="cu-pill">🏛️ View Services</a>
                        </div>
                      </div>
              
                      <!-- Right — form -->
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
            </div>
        </main>
        
        <!-- Footer -->
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

            // Contact Form Logic
            const contactForm = document.getElementById('contact-form');
            if(contactForm) {
                contactForm.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    
                    const alertBox = document.getElementById("contact-form-alert");
                    const showAlert = (message, type = 'danger') => {
                        alertBox.innerText = message;
                        alertBox.className = `alert alert-${type}`;
                        alertBox.classList.remove('d-none');
                        setTimeout(() => alertBox.classList.add('d-none'), 5000);
                    };

                    const formData = new FormData(contactForm);
                    const formPayload = Object.fromEntries(formData.entries());

                    const token = typeof grecaptcha !== 'undefined' ? grecaptcha.getResponse() : null;
                    if (!token) {
                        showAlert("Please complete the reCAPTCHA verification.");
                        return;
                    }
                    grecaptcha.reset();

                    formPayload.recaptcha = token;

                    try {
                        const response = await fetch('<?= SITE_URL ?>cms_forY/api/contact', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                            body: JSON.stringify(formPayload)
                        });

                        const result = await response.json();

                        if (result.status === 'success') {
                            showAlert(result.message || 'Message sent successfully!', 'success');
                            contactForm.reset();
                        } else {
                            showAlert(result.message || 'Submission failed.', 'danger');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        showAlert('There was an error submitting the form.', 'danger');
                    }
                });
            }
        });
    </script>
    



    
</body>
</html>
