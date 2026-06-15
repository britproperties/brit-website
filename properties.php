<?php
$page_title = 'Verified Properties & Land for Sale in Nigeria | Brit Properties';
$page_description = 'Browse verified, available land and properties across Nigeria with flexible payment plans. Invest in high-growth locations with Brit Properties.';
include "./components/head.php";
include "./components/navbar.php";

$stmt = $pdo->prepare("
    SELECT * 
    FROM properties 
    WHERE status = 'Available'
    ORDER BY created_at DESC
");

$stmt->execute();

$properties = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

    <div class="page-header bg-section parallaxie" style="background-image: url('./assets/images/properties-bg.jpg');background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque">Properties</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">properties</a></li>
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
                <?php foreach ($properties as $property): ?>
                <div class="col-xl-3 col-md-6">
                    <div class="project-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="project-item-image">
                            <a href="property-details?id=<?php echo $property['property_id']; ?>" data-cursor-text="View">
                                <figure>
                                    <img loading="lazy" 
                                        src="<?php echo htmlspecialchars($property['property_image']); ?>" 
                                        alt="<?php echo htmlspecialchars($property['title']); ?>"
                                        class="img-fluid"
                                    >
                                </figure>
                            </a>
                        </div>
                        
                        <div class="project-item-content">
                            <ul>
                                <li><a href="property-details?id=<?php echo $property['property_id']; ?>"><?php echo htmlspecialchars($property['city']); ?>, <?php echo htmlspecialchars($property['location']); ?></a></li>
                            </ul>
                            <h2><a href="property-details?id=<?php echo $property['property_id']; ?>"><?php echo htmlspecialchars($property['title']); ?></a></h2>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    
<?php include "./components/footer.php"; ?>