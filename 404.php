
 <?php
        include 'inc/function.php';
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Page Not Found | Yuccabe Planters</title>
    
   <?php
        include 'inc/head.php';
        ?>
</head>
<body>
    <!-- Preloader Overlay -->
   

    <div id="" >
        <!-- Header Injected via JS -->
        <?php
        include 'inc/header.php';
        ?>

        <!-- Main Content -->
        <main>
            <section class="error-section">
                <div class="container">
                    <h1 class="error-code">404</h1>
                    <h2 class="error-title">Page Not Found</h2>
                    <p class="error-desc">Oops! The page you are looking for doesn't exist or has been moved.</p>
                    <a href="./index.php" class="btn-back">Back to Home</a>
                </div>
            </section>
        </main>

        <!-- Footer Injected via JS -->
      <?php
        include 'inc/footer.php';
        ?>
    </div>

   <?php
        include 'inc/footer-data.php';
        ?>
</body>
</html>
