<?php
// Resolve the property and set the HTTP status BEFORE any output is sent.
require_once "./config/db.php";

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$property = null;
if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM properties WHERE property_id = :id LIMIT 1");
    $stmt->execute([':id' => $id]);
    $property = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (!$property) {
    http_response_code(404);
}

include "./components/head.php";
include "./components/navbar.php";

if (!$property) {
    ?>
    <div class="page-header bg-section parallaxie" style="background-image: url('./assets/images/properties-bg.jpg');background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque">Property not found</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./">Home</a></li>
                                <li class="breadcrumb-item"><a href="properties">Properties</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-projects">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" style="padding: 60px 0;">
                    <p>The property you are looking for is no longer available or does not exist.</p>
                    <a href="properties" class="btn-default">View all properties</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "./components/footer.php";
    exit;
}

// Collect non-empty images into a gallery list
$imageFields = ['property_image', 'property_image_one', 'property_image_two', 'property_image_three', 'property_image_four'];
$images = [];
foreach ($imageFields as $field) {
    if (!empty($property[$field])) {
        $images[] = $property[$field];
    }
}
if (empty($images)) {
    $images[] = './assets/images/properties-bg.jpg';
}

$heroImage = htmlspecialchars($images[0]);
?>

    <div class="page-header bg-section parallaxie" style="background-image: url('<?php echo $heroImage; ?>');background-position: center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque"><?php echo htmlspecialchars($property['title']); ?></h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./">Home</a></li>
                                <li class="breadcrumb-item"><a href="properties">Properties</a></li>
                                <li class="breadcrumb-item"><?php echo htmlspecialchars($property['title']); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-projects">
        <div class="container">
            <div class="row">
                <!-- Image gallery -->
                <div class="col-xl-7">
                    <div class="row gallery-items">
                        <?php foreach ($images as $img): ?>
                        <div class="col-md-6 col-6">
                            <div class="photo-gallery wow fadeInUp">
                                <a href="<?php echo htmlspecialchars($img); ?>" data-cursor-text="View">
                                    <figure class="image-anime">
                                        <img src="<?php echo htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($property['title']); ?>">
                                    </figure>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Details -->
                <div class="col-xl-5">
                    <div class="contact-us-content wow fadeInUp" data-wow-delay="0.2s">
                        <div class="section-title">
                            <span class="section-sub-title"><?php echo htmlspecialchars($property['city']); ?>, <?php echo htmlspecialchars($property['location']); ?></span>
                            <h2 class="text-anime-style-2" data-cursor="-opaque"><?php echo htmlspecialchars($property['title']); ?></h2>
                        </div>

                        <ul class="property-spec-list" style="list-style:none;padding:0;margin:0 0 30px;">
                            <li style="display:flex;justify-content:space-between;padding:12px 0;border-bottom:1px solid rgba(0,0,0,.08);">
                                <span>Price</span>
                                <strong>&#8358;<?php echo number_format((float)$property['amount']); ?></strong>
                            </li>
                            <?php if (!empty($property['size'])): ?>
                            <li style="display:flex;justify-content:space-between;padding:12px 0;border-bottom:1px solid rgba(0,0,0,.08);">
                                <span>Plot Size</span>
                                <strong><?php echo htmlspecialchars($property['size']); ?> sqm</strong>
                            </li>
                            <?php endif; ?>
                            <?php if (!empty($property['document_title'])): ?>
                            <li style="display:flex;justify-content:space-between;padding:12px 0;border-bottom:1px solid rgba(0,0,0,.08);">
                                <span>Title Document</span>
                                <strong><?php echo htmlspecialchars($property['document_title']); ?></strong>
                            </li>
                            <?php endif; ?>
                            <li style="display:flex;justify-content:space-between;padding:12px 0;border-bottom:1px solid rgba(0,0,0,.08);">
                                <span>Availability</span>
                                <strong><?php echo htmlspecialchars($property['status']); ?><?php echo (isset($property['quantity']) && $property['quantity'] !== null) ? ' (' . (int)$property['quantity'] . ' plots)' : ''; ?></strong>
                            </li>
                        </ul>

                        <div class="who-we-are-footer-box-metal">
                            <div class="who-we-are-btn-metal d-flex gap-3 flex-wrap">
                                <a href="https://app.britproperties.ng/sign-up" target="_blank" class="btn-default">Buy / Reserve</a>
                                <a href="contact" class="btn-default btn-highlighted">Enquire</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (!empty($property['property_info'])): ?>
            <div class="row section-row" style="margin-top:50px;">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Property Overview</h2>
                    </div>
                    <div class="property-info wow fadeInUp">
                        <?php echo $property['property_info']; // admin-authored HTML ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if (!empty($property['property_features'])): ?>
            <div class="row section-row" style="margin-top:30px;">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Features</h2>
                    </div>
                    <div class="property-features wow fadeInUp">
                        <?php echo $property['property_features']; // admin-authored HTML ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if (!empty($property['video_link'])): ?>
            <div class="row" style="margin-top:30px;">
                <div class="col-lg-12 text-center">
                    <a href="<?php echo htmlspecialchars($property['video_link']); ?>" class="popup-video btn-default" data-cursor-text="Play">Watch Video</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

<?php include "./components/footer.php"; ?>
