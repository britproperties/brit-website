<?php
require_once "./config/db.php";

// ─── SEO: per-page metadata with sensible site-wide defaults ─────────────────
$site_url = 'https://www.britproperties.ng';

$default_title       = 'Brit Properties&trade; :: Most Affordable Real Estate Company in Nigeria';
$default_description = 'BRIT Properties is a trusted Nigerian real estate firm specializing in land acquisition, property development, surveying, and estate services.';
$default_keywords    = 'BRIT Properties, real estate Nigeria, land acquisition, property development, estate agency, surveying services, property investment, land for sale Nigeria, infrastructure development, wealth creation, property marketing, real estate investment Nigeria, trusted real estate company, real estate services Nigeria, property development Nigeria';
$default_og_image    = 'https://res.cloudinary.com/dhowyyjht/image/upload/v1775808044/brit-logo_wxccdp.png';

$page_title       = $page_title       ?? $default_title;
$page_description  = $page_description ?? $default_description;
$page_keywords    = $page_keywords    ?? $default_keywords;
$og_image         = $og_image         ?? $default_og_image;

// Build a per-page canonical URL from the current path (strips query string and
// the local /brit-website dev sub-folder) so each page self-canonicalises.
$req_path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$req_path = preg_replace('#^/brit-website#', '', $req_path);
$req_path = preg_replace('#\.php$#', '', $req_path);
if ($req_path === '' || $req_path === '/index') { $req_path = '/'; }
$canonical = $canonical ?? rtrim($site_url, '/') . $req_path;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	<meta name="description" content="<?php echo htmlspecialchars(strip_tags($page_description), ENT_QUOTES); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($page_keywords, ENT_QUOTES); ?>">
    <meta name="author" content="Brit Properties">
    <meta name="robots" content="index, follow" />

    <meta property="og:site_name" content="Brit Properties" />
    <meta property="og:title" content="<?php echo $page_title; ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars(strip_tags($page_description), ENT_QUOTES); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical, ENT_QUOTES); ?>" />
    <meta property="og:image" content="<?php echo htmlspecialchars($og_image, ENT_QUOTES); ?>" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $page_title; ?>" />
    <meta name="twitter:description" content="<?php echo htmlspecialchars(strip_tags($page_description), ENT_QUOTES); ?>" />
    <meta name="twitter:image" content="<?php echo htmlspecialchars($og_image, ENT_QUOTES); ?>" />

    <link rel="canonical" href="<?php echo htmlspecialchars($canonical, ENT_QUOTES); ?>" />

    <title><?php echo $page_title; ?></title>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "RealEstateAgent",
      "name": "Brit Properties Nigeria Ltd",
      "url": "https://www.britproperties.ng",
      "logo": "https://res.cloudinary.com/dhowyyjht/image/upload/v1775808044/brit-logo_wxccdp.png",
      "image": "https://res.cloudinary.com/dhowyyjht/image/upload/v1775808044/brit-logo_wxccdp.png",
      "description": "BRIT Properties is a trusted Nigerian real estate firm specializing in land acquisition, property development, surveying, and estate services.",
      "telephone": "+234 916 444 9990",
      "email": "hello@britproperties.ng",
      "areaServed": "NG",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Plot 7b, Budo farm layout, beside AP filling station, Ajiwe, Abraham Adesanya, Ajah",
        "addressLocality": "Lagos",
        "addressRegion": "Lagos",
        "addressCountry": "NG"
      },
      "sameAs": [
        "https://www.instagram.com/britproperties.ng/",
        "https://www.facebook.com/britpropertyng/",
        "https://www.linkedin.com/company/brit-properties-nigeria-ltd/",
        "https://x.com/BritProperties",
        "https://www.youtube.com/@britpropertiesng"
      ]
    }
    </script>

	<link rel="shortcut icon" type="image/x-icon" href="./assets/images/brit-favicon.png">

	<link href="./assets/css/fonts.css" rel="stylesheet" media="screen">
	<link href="./assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="./assets/css/slicknav.min.css" rel="stylesheet">
	<link rel="stylesheet" href="./assets/css/swiper-bundle.min.css">
	<link href="./assets/css/all.min.css" rel="stylesheet" media="screen">
	<link href="./assets/css/animate.css" rel="stylesheet">
	<link rel="stylesheet" href="./assets/css/magnific-popup.css">
	<link rel="stylesheet" href="./assets/css/mousecursor.css">
	<link href="./assets/css/custom.css" rel="stylesheet" media="screen">

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-0EBGE0E9LF"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-0EBGE0E9LF');
	</script>
</head>
<body>

    <!-- Preloader Start -->
	<div class="preloader">
		<div class="loading-container">
			<div class="loading"></div>
			<div id="loading-icon"><img src="./assets/images/loader.svg" alt=""></div>
		</div>
	</div>
	<!-- Preloader End -->