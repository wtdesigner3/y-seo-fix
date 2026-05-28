<?php
require('inc/function.php');
$blogs = mysqli_query($conn,"SELECT * FROM `projects` WHERE `status` = '1' ORDER BY `sort` DESC");
$breadcrumb = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_breadcrumb WHERE brd_id = '12'"));
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
            <div class="yb-blog-page">
                <div class="container">
                    <div class="yb-blog-header">
                        <h1>Our Projects</h1>
                        <div class="yb-blog-header-line"></div>
                    </div>
                        <?php
                        if(mysqli_num_rows($blogs) > 0) {
                        ?>
                    <div class="yb-cards-grid">
                <?php
                    while($rowBlogs = mysqli_fetch_assoc($blogs)){
                ?>
                        <a href="<?= SITE_URL ?>project/<?= $rowBlogs['slug'] ?>" class="yb-vcard">
                            <?php
                                $images = explode(",", $rowBlogs['image']);
                                $singleImage = $images[0];
                            ?>
                            <img class="yb-vcard-img" src="<?= SITE_URL ?>uploads/<?= $singleImage ?>" alt="Sample Blog Post" />
                            <div class="yb-vcard-overlay">
                                <h3 class="yb-vcard-title"><?= $rowBlogs['name1'] ?></h3>
                                <p class="yb-vcard-excerpt"><?= $rowBlogs['name2'] ?></p>
                            </div>
                        </a>
                        <?php } ?>
                    </div>
                    <?php } ?>
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
</body>
</html>
