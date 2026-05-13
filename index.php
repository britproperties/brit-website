<?php
include "./components/head.php";
include "./components/navbar.php";

$stmt = $pdo->prepare("
    SELECT * 
    FROM properties 
    WHERE status = 'Available'
    ORDER BY created_at DESC
    LIMIT 4
");

$stmt->execute();

$properties = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

    <div class="hero hero-video bg-section dark-section">
        <div class="hero-bg-video">
            <video autoplay muted loop id="myvideo"><source src="https://res.cloudinary.com/dhowyyjht/video/upload/v1777699801/efTBaVeGNs9VxuZfNOIc3toHXSg_v5lrum.mp4" type="video/mp4"></video>
        </div>

        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-6">
                    <div class="hero-content-box">
                        <div class="section-title">
                            <h1 class="text-anime-style-2" data-cursor="-opaque">Move Beyond Renting. <span>Become a Landowner in Nigeria.</span></h1>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="hero-counter-box">
                        <div class="hero-counter-list wow fadeInUp">
                            <div class="hero-counter-item">
                                <h2><span class="counter">16</span>+</h2>
                                <p>Years of Experience</p>
                            </div>
                            
                            <div class="hero-counter-item">
                                <h2><span class="counter">100</span>+</h2>
                                <p>Hectares of Land Sold</p>
                            </div>
                            
                            <div class="hero-counter-item">
                                <h2><span class="counter">10</span>+</h2>
                                <p>Locations Nationwide</p>
                            </div>
                        </div>
                        
                        <div class="hero-counter-footer wow fadeInUp" data-wow-delay="0.2s">
                            <div class="hero-btn">
                                <a href="consultation" class="btn-default btn-highlighted">Book Free Consultation</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include "./components/partners.php"; ?>

    
    <div class="about-us">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-xl-7">
                    <div class="section-title">
                        <span class="section-sub-title wow fadeInUp">Why Brit Properties Exists</span>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Buying Land in Nigeria Comes With Risk. <span>If You Don’t Buy Right.</span></h2>
                    </div>
                </div>

                <div class="col-xl-5">
                    <div class="section-content-btn">
                        <div class="section-title-content wow fadeInUp" data-wow-delay="0.2s">
                            <p>Brit Properties was built to simplify land ownership in Nigeria by making it structured, transparent, and accessible.</p>
                        </div>
    
                        <div class="section-btn wow fadeInUp" data-wow-delay="0.4s">
                            <a href="about" class="btn-default">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="about-us-image-box wow fadeInUp">
                        <div class="about-us-image">
                            <figure class="image-anime">
                                <img src="./assets/images/hme_abt.jpg" alt="" style="width:100%; height:100%; object-fit:cover; object-position:top;">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="about-us-content-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="who-we-tab-item tab-pane fade show active" id="first" role="tabpanel">
                            <div class="who-we-tab-content">
                                <div class="who-we-tab-header-content">
                                    <h3 class="text-anime-style-2">Secure Land. Verified Process. No Guesswork.</h3>
                                    <p>Real estate in Nigeria continues to appreciate due to population growth, urban expansion, and infrastructure development.</p>
                                    <p>At BRIT Properties, we believe real estate is more than land. It is security, it is growth, and it is one of the most reliable ways to build lasting wealth.</p>
                                    <p>In a market where uncertainty often surrounds property ownership, our focus is simple. We make land acquisition structured, transparent, and accessible for every client.</p>
                                    <p>Our expertise spans land acquisition, infrastructure development, property marketing, and surveying. This allows us to support you at every stage, from your first enquiry to final allocation and ownership. You are not just buying land. You are entering a process designed to protect your investment and position you for long-term value.</p>
                                </div>
                                <div class="who-we-btn mt-3">
                                    <a href="about" class="btn-default">About us</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="our-project bg-section dark-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">Available Verified Properties</span>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Invest in high-growth lands with flexible payments.</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">

                <?php foreach ($properties as $property): ?>
                <div class="col-xl-3 col-md-6">
                    <div class="project-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="project-item-image">
                            <a href="property-details?id=<?php echo $property['property_id']; ?>" data-cursor-text="View">
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
                                <li><a href="property-details?id=<?php echo $property['property_id']; ?>"><?php echo htmlspecialchars($property['city']); ?>, <?php echo htmlspecialchars($property['location']); ?></a></li>
                            </ul>
                            <h2><a href="property-details?id=<?php echo $property['property_id']; ?>"><?php echo htmlspecialchars($property['title']); ?></a></h2>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <div class="col-lg-12">
                    <div class="section-footer-text section-satisfy-img wow fadeInUp" data-wow-delay="0.4s">  
                        <p><a href="properties"> View all properties</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="our-fact">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Trusted by Smart Property Buyers Across Nigeria</h2>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-xl-6">
                    <!-- Our Fact Image Box Start -->
                    <div class="our-fact-image-box">
                        <!-- Our Fact Image Box 1 Start -->
                        <div class="our-fact-image-box-1 wow fadeInUp">
                            <!-- Our Fact Image start -->
                            <div class="our-fact-image">
                                <figure class="image-anime">
                                    <img src="./assets/images/our-fact-image-1.jpg" alt="">
                                </figure>
                            </div>
                        </div>
                        <!-- Our Fact Image Box 1 End -->

                        <!-- Our Fact Image Box 2 Start -->
                        <div class="our-fact-image-box-2">
                            <!-- Our Fact Image Start -->
                            <div class="our-fact-image">
                                <figure class="image-anime reveal">
                                    <img src="./assets/images/our-fact-image-2.jpg" alt="">
                                </figure>
                            </div>
                            <!-- Our Fact Image End -->
                        </div>
                        <!-- Our Fact Image Box 2 End -->
                    </div>
                    <!-- Our Fact Image Box End -->
                </div>

                <div class="col-xl-6">
                    <!-- Fact Item List Start -->
                    <div class="fact-item-list wow fadeInUp" data-wow-delay="0.2s">
                        <!-- Fact Item Start -->
                        <div class="fact-item">
                            <!-- Fact Item Title Start -->
                            <div class="fact-item-title">
                                <ul>
                                    <li>Residential</li>
                                </ul>
                            </div>
                            <!-- Fact Item Title End -->

                            <!-- Fact Item Counter Start -->
                            <div class="fact-item-counter-content">
                                <h2><span class="counter">25</span>+</h2>
                                <p>Year Experience Real Estate</p>
                            </div>
                            <!-- Fact Item Counter End -->
                        </div>
                        <!-- Fact Item End -->

                        <!-- Fact Item Start -->
                        <div class="fact-item">
                            <!-- Fact Item Title Start -->
                            <div class="fact-item-title">
                                <ul>
                                    <li>Residential</li>
                                </ul>
                            </div>
                            <!-- Fact Item Title End -->

                            <!-- Fact Item Counter Start -->
                            <div class="fact-item-counter-content">
                                <h2><span class="counter">50</span>+</h2>
                                <p>Our Expert Team Members</p>
                            </div>
                            <!-- Fact Item Counter End -->
                        </div>
                        <!-- Fact Item End -->

                        <!-- Fact Item Start -->
                        <div class="fact-item">
                            <!-- Fact Item Title Start -->
                            <div class="fact-item-title">
                                <ul>
                                    <li>Residential</li>
                                </ul>
                            </div>
                            <!-- Fact Item Title End -->

                            <!-- Fact Item Counter Start -->
                            <div class="fact-item-counter-content">
                                <h2><span class="counter">500</span>+</h2>
                                <p>Project Completed Real Estate</p>
                            </div>
                            <!-- Fact Item Counter End -->
                        </div>
                        <!-- Fact Item End -->

                        <!-- Fact Item Start -->
                        <div class="fact-item">
                            <!-- Fact Item Title Start -->
                            <div class="fact-item-title">
                                <ul>
                                    <li>Residential</li>
                                </ul>
                            </div>
                            <!-- Fact Item Title End -->

                            <!-- Fact Item Counter Start -->
                            <div class="fact-item-counter-content">
                                <h2><span class="counter">300</span>+</h2>
                                <p>Out Truste Happy homeowner</p>
                            </div>
                            <!-- Fact Item Counter End -->
                        </div>
                        <!-- Fact Item End -->
                    </div>
                    <!-- Fact Item List End -->
                </div>
            </div>
        </div>
    </div>


    <div class="intro-video bg-section dark-section parallaxie" style="margin-bottom: 100px !important;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-md-9">
                    <div class="intro-video-content">
                        <div class="section-title">
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Benin City, the wait is over. Brit Properties is here.</h2>
                        </div>
                    </div>
                </div>

                <div class="col-xl-5 col-md-3">
                    <div class="watch-video-circle">
                        <a href="https://www.youtube.com/watch?v=ZY1Y2m1h8u8" class="popup-video" data-cursor-text="Play">
                            <img src="./assets/images/watch-video-circle-new.png" alt="">
                        </a> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    
<?php include "./components/footer.php"; ?>