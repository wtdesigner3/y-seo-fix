        <header id="site-header">
            <div id="form-alert" class="alert d-none" role="alert"
                style="position:fixed;top:10vh;color:#000;left:50%;transform:translateX(-50%);font-size:13px;z-index:99999;min-width:300px;text-align:center;border-radius:8px;">
            </div>

            <div id="header" class="align-items-center bg-light shadow navbar-container w-100 fixed-header-bar">
                <nav class="navbar" data-bs-theme="light">
                    <div class="container-fluid navbar-container-padding">
                        <a class="navbar-brand menu-logos" href="<?= SITE_URL ?>">
                            <img src="<?= SITE_URL ?>img/YP-Logo-black-.png" alt="Yuccabe Planters Logo" width="100%">
                        </a>
                        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#mobileMenuOffcanvas" aria-controls="mobileMenuOffcanvas"
                            aria-label="Open menu">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="d-none justify-content-end d-lg-flex align-items-center" style="gap:20px">
                            <a class="nav-link" href="<?= SITE_URL ?>">Home</a>
                            <a class="nav-link" href="<?= SITE_URL ?>explore">Explore</a>
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="menu-title">Our Products</span>
                                </a>
                                <ul class="dropdown-menu" id="desktop-products-menu">
<?php
$categories = mysqli_query($conn, "SELECT name,slug FROM categories WHERE status = 1 ORDER BY `sort`");
if (mysqli_num_rows($categories) > 0) {
    while ($category = mysqli_fetch_assoc($categories)) {
?>
                                    <li><a class="dropdown-item" href="<?= SITE_URL ?>category/<?= $category['slug'] ?>"><?= $category['name'] ?></a>
                                    </li>
<?php
    }
} 
?>
                                </ul>
                            </div>
                            <a class="nav-link" href="<?= SITE_URL ?>services">Services</a>
                            <a class="nav-link" href="<?= SITE_URL ?>projects">Projects</a>
                            <a class="nav-link" href="<?= SITE_URL ?>about-us">About</a>
                            <a class="nav-link" href="<?= SITE_URL ?>blogs">Blogs</a>
                            <a class="nav-link" href="<?= SITE_URL ?>contact">Contact</a>
                            <a class="nav-link" href="https://yuccabeitalia.com/collections/yuccabe-italia"
                                target="_blank" rel="noopener">Shop Now</a>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Mobile Offcanvas -->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenuOffcanvas"
                aria-labelledby="mobileMenuLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="mobileMenuLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <nav class="mobile-navbar d-flex flex-column">
                        <a class="nav-link" href="<?= SITE_URL ?>">Home</a>
                        <a class="nav-link" href="<?= SITE_URL ?>explore">Explore</a>
                        <div class="submenu-wrapper">
                            <div class="nav-link d-flex justify-content-between align-items-center"
                                id="mobile-products-toggle" style="cursor:pointer;">
                                <span class="menu-title">Our Products</span>
                                <span id="mobile-submenu-icon">+</span>
                            </div>
                            <div class="submenu-items ps-4 d-none" id="mobile-products-submenu">
                    <?php
                    $categories = mysqli_query($conn, "SELECT name,slug FROM categories WHERE status = 1 ORDER BY `sort`");
                    if (mysqli_num_rows($categories) > 0) {
                        while ($category = mysqli_fetch_assoc($categories)) {
                    ?>                                
                                <a class="nav-link" href="<?= SITE_URL ?>category/<?= $category['slug'] ?>"><?= $category['name'] ?></a>
                    <?php
                        }
                    }
                    ?>
                            </div>
                        </div>
                        <a class="nav-link" href="<?= SITE_URL ?>services">Services</a>
                        <a class="nav-link" href="<?= SITE_URL ?>projects">Projects</a>
                        <a class="nav-link" href="<?= SITE_URL ?>about-us">About</a>
                        <a class="nav-link" href="<?= SITE_URL ?>blogs">Blogs</a>
                        <a class="nav-link" href="<?= SITE_URL ?>contact">Contact</a>
                        <a class="nav-link" href="https://yuccabeitalia.com/collections/yuccabe-italia" target="_blank"
                            rel="noopener">Shop Now</a>
                    </nav>
                </div>
            </div>
        </header>