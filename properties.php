<?php
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

    <div class="page-header bg-section parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque">Our <span>projects</span></h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="about.html">projects</a></li>
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
                    <div class="project-item wow fadeInUp">
                        <div class="project-item-image">
                            <a href="project-single.html" data-cursor-text="View">
                                <figure>
                                    <img src="./assets/images/project-image-1.jpg" alt="">
                                </figure>
                            </a>
                        </div>
                        
                        <div class="project-item-content">
                            <ul>
                                <li><a href="#">Residential</a></li>
                            </ul>
                            <h2><a href="project-single.html">The Vertex Plaza</a></h2>
                        </div>
                    </div>
                </div>
                <?php foreach ($properties as $property): ?>

                <div class="col-xl-3 col-md-6">
                    <!-- Project Item Start -->
                    <div class="project-item wow fadeInUp" data-wow-delay="0.2s">
                        <!-- Project Item Image Start -->
                        <div class="project-item-image">
                            <a href="project-single.html" data-cursor-text="View">
                                <figure>
                                    <img 
                                        src="<?php echo htmlspecialchars($property['property_image']); ?>" 
                                        alt="<?php echo htmlspecialchars($property['title']); ?>"
                                        class="img-fluid"
                                    >
                                </figure>
                            </a>
                        </div>
                        
                        <div class="project-item-content">
                            <ul>
                                <li><a href="#">Commercial</a></li>
                            </ul>
                            <h2><a href="project-single.html">Aurelia Business Park</a></h2>
                        </div>
                        <!-- Project Item Content End -->
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    
<?php include "./components/footer.php"; ?>