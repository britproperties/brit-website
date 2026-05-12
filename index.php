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
                            <a href="about" class="btn-default">Learn More About</a>
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
                    <!-- About Us Content Box Start -->
                    <div class="about-us-content-box wow fadeInUp" data-wow-delay="0.2s">
                        <!-- About Us Item List Start -->
                        <div class="about-us-item-list">
                            <!-- About Us Item Start -->
                            <div class="about-us-item box-1">
                                <!-- About Us Item Content Start -->
                                <div class="about-us-item-content">
                                    <h3>Your Trusted Partners</h3>
                                    <p>We stand by you at every stage of the construction journey</p>
                                </div>
                                <!-- About Us Item Content End -->

                                <!-- About Us Item Image Start -->
                                <div class="about-us-item-image">
                                    <figure>
                                        <img src="./assets/images/about-us-item-image-1.png" alt="">
                                    </figure>
                                </div>
                                <!-- About Us Item Image End -->
                            </div>
                            <!-- About Us Item End -->

                            <!-- About Us Item Start -->
                            <div class="about-us-item box-2">
                                <!-- About Us Item Content Start -->
                                <div class="about-us-item-content">
                                    <h3>Modern Design Solution</h3>
                                    <p>We stand by you at every stage of the construction journey</p>
                                </div>
                                <!-- About Us Item Content End -->

                                <!-- About Us Item Image Start -->
                                <div class="about-us-item-image">
                                    <figure class="image-anime">
                                        <img src="./assets/images/about-us-item-image-2.jpg" alt="">
                                    </figure>
                                </div>
                                <!-- About Us Item Image End -->
                            </div>
                            <!-- About Us Item End -->
                        </div>
                        <!-- About Us Item List End -->

                        <!-- About Counter List Start -->
                        <div class="about-counter-item-list">
                            <!-- About Counter Item Start -->
                            <div class="about-counter-item">
                                <h2><span class="counter">25</span>+</h2>
                                <p>Real Estate Expertise</p>
                            </div>
                            <!-- About Counter Item End -->

                            <!-- About Counter Item Start -->
                            <div class="about-counter-item">
                                <h2><span class="counter">50</span>+</h2>
                                <p>Expert Team Members</p>
                            </div>
                            <!-- About Counter Item End -->

                            <!-- About Counter Item Start -->
                            <div class="about-counter-item">
                                <h2><span class="counter">500</span>+</h2>
                                <p>Handed-Over Project</p>
                            </div>
                            <!-- About Counter Item End -->
                        </div>
                        <!-- About Counter List End -->
                    </div>
                    <!-- About Us Content Box End -->
                </div>
            </div>
        </div>
    </div>

    
<?php include "./components/footer.php"; ?>