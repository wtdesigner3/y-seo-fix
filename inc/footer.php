        <!-- Footer Injected via JS -->
        <footer id="site-footer">
            <div class="container justify-content-start footer-bg-color"
                style="background-color:#fff;border-radius:30px;">
                <div class="row p-4 w-100 m-0">
                    <div
                        class="col-lg-4 col-md-6 col-sm-12 d-flex content-center flex-column align-items-center mb-4 mb-lg-0">
                        <img src="<?= SITE_URL ?>uploads/<?= $profile['pro_logo']; ?>" alt="Yuccabe Planters Logo" class="footer-logo"
                            style="width:185px;height:50px;position:relative;top:-5px;">
                        <img src="<?= SITE_URL ?>img/Make-in-India-logo.png" alt="Make in India" class="footer-logo"
                            style="width:185px;height:90px;position:relative;top:-5px;">
                    </div>
                    <div
                        class="col-lg-8 col-md-12 col-sm-12 d-flex flex-column flex-md-row flex-wrap footer_menu gap-4 gap-md-0">
                        <div class="col-12 col-md-4 col-lg-3">
                            <div class="d-grid justify-content-center justify-content-md-start">
                                <div class="text-center text-md-start">
                                    <h2 style="font-size:25px;">Explore</h2>
                                </div>
                                <div class="d-flex flex-column align-items-center align-items-md-start gap-1">
                                    <a class="Link_default__VBYZf" href="<?= SITE_URL ?>services">Services</a>
                                    <a class="Link_default__VBYZf" href="<?= SITE_URL ?>explore">Collections</a>
                                    <a class="Link_default__VBYZf" href="<?= SITE_URL ?>blogs">Blogs</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3">
                            <div class="d-grid justify-content-center justify-content-md-start">
                                <div class="text-center text-md-start">
                                    <h2 style="font-size:25px;">Company</h2>
                                </div>
                                <div class="d-flex flex-column align-items-center align-items-md-start gap-1">
                                    <a class="Link_default__VBYZf" href="<?= SITE_URL ?>about-us">About Us</a>
                                    <a class="Link_default__VBYZf" href="<?= SITE_URL ?>explore">Explore</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3">
                            <div class="d-grid justify-content-center justify-content-md-start">
                                <div class="text-center text-md-start">
                                    <h2 style="font-size:25px;">Support</h2>
                                </div>
                                <div class="d-flex flex-column align-items-center align-items-md-start gap-1">
                                    <a class="Link_default__VBYZf" href="<?= SITE_URL ?>contact">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gap-1 copyright-socialmedia">
                        <div class="col-lg-6 col-md-6 d-flex copyright-div">
                            <p class="my-2 px-3" style="font-size:13px;">© <?= date('Y') ?> <a class="Link_default__VBYZf" href="#"
                                    rel="noopener"> Yuccabe.</a></p>
                        </div>
                        <div class="SiteFooter_socials__TI9kV col-lg-6 col-md-6 d-flex my-2">
<?php
if($contact['con_instagram'] != ''){
?>
                            <a href="<?= $contact['con_instagram'] ?>" aria-label="Instagram">
                                <svg viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.65119 0H12.8893C15.8308 0 18.224 2.39317 18.224 5.33478V12.5729C18.224 15.5145 15.8309 17.9076 12.8893 17.9076H5.65119C2.70958 17.9076 0.316406 15.5145 0.316406 12.5729V5.33478C0.316406 2.39317 2.70958 0 5.65119 0ZM12.8878 16.1058C14.8391 16.1058 16.421 14.5239 16.421 12.5725V5.33444C16.421 3.38306 14.8391 1.80117 12.8878 1.80117H5.64968C3.69832 1.80117 2.11641 3.38306 2.11641 5.33444V12.5725C2.11641 14.5239 3.69832 16.1058 5.64968 16.1058H12.8878Z"
                                        fill="#000" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.6416 8.95403C4.6416 6.40022 6.71931 4.32251 9.27315 4.32251C11.827 4.32251 13.9047 6.40019 13.9047 8.95403C13.9047 11.5079 11.827 13.5856 9.27315 13.5856C6.71931 13.5856 4.6416 11.5078 4.6416 8.95403ZM6.4416 8.95368C6.4416 10.5167 7.70864 11.7837 9.27165 11.7837C10.8346 11.7837 12.1017 10.5166 12.1017 8.95368C12.1017 7.39067 10.8346 6.12363 9.27165 6.12363C7.70868 6.12363 6.4416 7.39067 6.4416 8.95368Z"
                                        fill="#000" />
                                    <path
                                        d="M13.9125 5.46658C14.5255 5.46658 15.0224 4.9697 15.0224 4.35676C15.0224 3.74383 14.5255 3.24695 13.9125 3.24695C13.2996 3.24695 12.8027 3.74383 12.8027 4.35676C12.8027 4.9697 13.2996 5.46658 13.9125 5.46658Z"
                                        fill="#000" />
                                </svg>
                            </a>
                            <?php } ?>

                            <?php
if($contact['con_facebook'] != ''){
                            ?>
                            <a href="<?= $contact['con_facebook'] ?>" aria-label="Facebook">
                                <svg viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.3754 0.0037452L7.97684 0C5.28215 0 3.54073 1.73871 3.54073 4.42982V6.47227H1.1291C0.920708 6.47227 0.751953 6.63668 0.751953 6.83949V9.79876C0.751953 10.0016 0.9209 10.1658 1.1291 10.1658H3.54073V17.633C3.54073 17.8358 3.70949 18 3.91788 18H7.06437C7.27276 18 7.44152 17.8356 7.44152 17.633V10.1658H10.2613C10.4697 10.1658 10.6384 10.0016 10.6384 9.79876L10.6396 6.83949C10.6396 6.74211 10.5997 6.64886 10.5291 6.57994C10.4585 6.51103 10.3623 6.47227 10.2622 6.47227H7.44152V4.74086C7.44152 3.90868 7.64529 3.48622 8.75923 3.48622L10.375 3.48566C10.5832 3.48566 10.752 3.32124 10.752 3.11863V0.370775C10.752 0.168347 10.5834 0.00411972 10.3754 0.0037452Z"
                                        fill="#000" />
                                </svg>
                            </a>
                            <?php } ?>

                            <?php
if($contact['con_linkedin'] != ''){
                            ?>
                            <a href="<?= $contact['con_linkedin'] ?>" aria-label="LinkedIn">
                               <svg viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" clip-rule="evenodd"
    d="M5.65119 0H12.8893C15.8308 0 18.224 2.39317 18.224 5.33478V12.5729C18.224 15.5145 15.8309 17.9076 12.8893 17.9076H5.65119C2.70958 17.9076 0.316406 15.5145 0.316406 12.5729V5.33478C0.316406 2.39317 2.70958 0 5.65119 0ZM12.8878 16.1058C14.8391 16.1058 16.421 14.5239 16.421 12.5725V5.33444C16.421 3.38306 14.8391 1.80117 12.8878 1.80117H5.64968C3.69832 1.80117 2.11641 3.38306 2.11641 5.33444V12.5725C2.11641 14.5239 3.69832 16.1058 5.64968 16.1058H12.8878Z"
    fill="#000"/>
    
  <path
    d="M6.1 7.2H8V13H6.1V7.2ZM7.05 4.7C7.66 4.7 8.15 5.19 8.15 5.8C8.15 6.41 7.66 6.9 7.05 6.9C6.44 6.9 5.95 6.41 5.95 5.8C5.95 5.19 6.44 4.7 7.05 4.7Z"
    fill="#000"/>
    
  <path
    d="M9.2 7.2H11V7.99H11.03C11.28 7.52 11.89 7.02 12.8 7.02C14.7 7.02 15.05 8.27 15.05 9.9V13H13.15V10.25C13.15 9.59 13.14 8.73 12.23 8.73C11.3 8.73 11.15 9.45 11.15 10.2V13H9.2V7.2Z"
    fill="#000"/>
</svg>
                            </a>
                            <?php } ?>

                            <?php
if($contact['con_youtube'] != ''){
                            ?>
                            <a href="<?= $contact['con_youtube'] ?>" aria-label="YouTube">
                               <svg viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" clip-rule="evenodd"
    d="M5.65119 0H12.8893C15.8308 0 18.224 2.39317 18.224 5.33478V12.5729C18.224 15.5145 15.8309 17.9076 12.8893 17.9076H5.65119C2.70958 17.9076 0.316406 15.5145 0.316406 12.5729V5.33478C0.316406 2.39317 2.70958 0 5.65119 0ZM12.8878 16.1058C14.8391 16.1058 16.421 14.5239 16.421 12.5725V5.33444C16.421 3.38306 14.8391 1.80117 12.8878 1.80117H5.64968C3.69832 1.80117 2.11641 3.38306 2.11641 5.33444V12.5725C2.11641 14.5239 3.69832 16.1058 5.64968 16.1058H12.8878Z"
    fill="#000"/>

  <path
    d="M13.5 6.8C13.38 6.35 13.03 6 12.58 5.88C11.76 5.66 9.27 5.66 9.27 5.66C9.27 5.66 6.78 5.66 5.96 5.88C5.51 6 5.16 6.35 5.04 6.8C4.82 7.62 4.82 9 4.82 9C4.82 9 4.82 10.38 5.04 11.2C5.16 11.65 5.51 12 5.96 12.12C6.78 12.34 9.27 12.34 9.27 12.34C9.27 12.34 11.76 12.34 12.58 12.12C13.03 12 13.38 11.65 13.5 11.2C13.72 10.38 13.72 9 13.72 9C13.72 9 13.72 7.62 13.5 6.8Z"
    fill="#000"/>

  <path
    d="M8.3 10.7V7.3L11.1 9L8.3 10.7Z"
    fill="white"/>
</svg>
                            </a>
                            <?php } ?>

                            <?php
if($contact['con_whatsaap'] != ''){
                            ?>
                            <a href="https://wa.me/<?= $contact['con_whatsaap'] ?>" aria-label="WhatsApp">
                               <svg viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" clip-rule="evenodd"
    d="M5.65119 0H12.8893C15.8308 0 18.224 2.39317 18.224 5.33478V12.5729C18.224 15.5145 15.8309 17.9076 12.8893 17.9076H5.65119C2.70958 17.9076 0.316406 15.5145 0.316406 12.5729V5.33478C0.316406 2.39317 2.70958 0 5.65119 0ZM12.8878 16.1058C14.8391 16.1058 16.421 14.5239 16.421 12.5725V5.33444C16.421 3.38306 14.8391 1.80117 12.8878 1.80117H5.64968C3.69832 1.80117 2.11641 3.38306 2.11641 5.33444V12.5725C2.11641 14.5239 3.69832 16.1058 5.64968 16.1058H12.8878Z"
    fill="#000"/>

  <path
    d="M9.29 4.6C6.94 4.6 5.03 6.49 5.03 8.84C5.03 9.59 5.23 10.31 5.6 10.95L5.05 13L7.16 12.46C7.77 12.79 8.46 12.97 9.19 12.97H9.29C11.64 12.97 13.55 11.08 13.55 8.73C13.55 6.49 11.64 4.6 9.29 4.6Z"
    fill="#000"/>

  <path
    d="M11.7 10.2C11.59 10.5 11.06 10.77 10.77 10.81C10.5 10.85 10.16 10.87 8.66 10.22C7.29 9.63 6.41 8.17 6.34 8.08C6.27 7.98 5.78 7.34 5.78 6.68C5.78 6.02 6.13 5.69 6.25 5.55C6.38 5.42 6.53 5.39 6.62 5.39C6.71 5.39 6.8 5.39 6.88 5.39C6.95 5.39 7.06 5.36 7.16 5.61C7.27 5.87 7.53 6.53 7.57 6.61C7.61 6.69 7.64 6.78 7.58 6.88C7.53 6.98 7.5 7.03 7.42 7.12C7.34 7.2 7.25 7.31 7.18 7.38C7.1 7.46 7.02 7.55 7.12 7.72C7.22 7.88 7.57 8.45 8.09 8.91C8.77 9.52 9.34 9.71 9.52 9.79C9.69 9.87 9.8 9.86 9.9 9.75C10 9.64 10.34 9.24 10.45 9.08C10.56 8.92 10.67 8.95 10.82 9.01C10.97 9.06 11.77 9.45 11.93 9.53C12.08 9.61 12.18 9.65 12.22 9.72C12.26 9.8 12.26 10.12 11.7 10.2Z"
    fill="white"/>
</svg>
                            </a>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
            <a href="tel:+919971614977" class="fixed-call-btn" aria-label="Call Us">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                </svg>
            </a>
           <a href="https://wa.me/919971614977" class="fixed-call-btn wassp-btn" aria-label="WhatsApp Us" target="_blank">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
        xmlns="http://www.w3.org/2000/svg">
        <path
            d="M20.52 3.48A11.79 11.79 0 0 0 12.04 0C5.5 0 .17 5.33.17 11.87c0 2.09.55 4.13 1.6 5.93L0 24l6.38-1.67a11.8 11.8 0 0 0 5.66 1.44h.01c6.54 0 11.87-5.33 11.87-11.87 0-3.17-1.23-6.15-3.4-8.42ZM12.05 21.7h-.01a9.8 9.8 0 0 1-4.99-1.37l-.36-.21-3.79.99 1.01-3.69-.24-.38a9.77 9.77 0 0 1-1.5-5.18c0-5.42 4.41-9.83 9.84-9.83 2.63 0 5.1 1.02 6.96 2.88a9.78 9.78 0 0 1 2.87 6.96c0 5.42-4.41 9.83-9.83 9.83Zm5.39-7.35c-.29-.15-1.72-.85-1.99-.95-.27-.1-.46-.15-.66.15-.19.29-.76.95-.93 1.14-.17.2-.34.22-.63.07-.29-.15-1.22-.45-2.33-1.43-.86-.77-1.45-1.72-1.62-2.01-.17-.29-.02-.45.13-.6.13-.13.29-.34.44-.51.15-.17.19-.29.29-.49.1-.2.05-.37-.02-.51-.07-.15-.66-1.59-.9-2.18-.24-.57-.49-.49-.66-.5h-.56c-.2 0-.51.07-.78.37-.27.29-1.02 1-.96 2.44.07 1.44 1.03 2.83 1.18 3.03.15.2 2.03 3.1 5.02 4.22.71.31 1.27.49 1.7.63.71.22 1.36.19 1.87.12.57-.09 1.72-.7 1.96-1.37.24-.66.24-1.22.17-1.34-.07-.12-.27-.2-.56-.34Z" />
    </svg>
</a>
        </footer>