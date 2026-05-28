<?php
if (!isset($meta_robots)) {
    $meta_robots = 'index, follow';
}

if (!isset($canonical_url)) {
    $requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $normalizedPath = preg_replace('/\.php$/', '', $requestPath);

    if ($normalizedPath === '' || $normalizedPath === false) {
        $normalizedPath = '/';
    }

    $canonical_url = rtrim(SITE_URL, '/') . ($normalizedPath === '/' ? '/' : $normalizedPath);
}
?>
    <link rel="canonical" href="<?= htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="robots" content="<?= htmlspecialchars($meta_robots, ENT_QUOTES, 'UTF-8') ?>">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Global CSS -->
    <link rel="shortcut icon" href="<?= SITE_URL ?>uploads/<?= $profile['pro_favicon']; ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= SITE_URL ?>css/global-bundle.css" />