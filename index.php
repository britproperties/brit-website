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

    <div class="intro-video bg-section dark-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-md-9">
                    <!-- Intro Video Content Start -->
                    <div class="intro-video-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <span class="section-sub-title wow fadeInUp">Watch Video</span>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Watch how we build <span>modern quality living spaces</span></h2>
                        </div>
                        <!-- Section Title End -->
                    </div>
                    <!-- Intro Video Content End -->
                </div>

                <div class="col-xl-5 col-md-3">
                    <!-- Watch Video Circle Start -->
                    <div class="watch-video-circle">
                        <a href="https://www.youtube.com/watch?v=Y-x0efG1seA" class="popup-video" data-cursor-text="Play">
                            <img src="./assets/images/watch-video-circle.png" alt="">
                        </a> 
                    </div>     
                    <!-- Watch Video Circle End -->
                </div>
            </div>
        </div>
    </div>



    <!-- Who We Are Section Start -->
    <div class="who-we-are">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">Who We Are</span>
                        <h2 class="wow fadeInUp" data-wow-delay="0.2s">Shaping residential and commercial <span>spaces with expertise</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-xl-6">
                    <!-- Who We Content Start -->
                    <div class="who-we-content wow fadeInUp">
                        <!-- Our Who We Box Start -->
                        <div class="who-we-box tab-content" id="mvTabContent">
                            <!-- Sidebar Our Who We Nav start -->
                            <div class="who-we-nav">
                                <ul class="nav nav-tabs" id="mvTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="first-tab" data-bs-toggle="tab" data-bs-target="#first" type="button" role="tab" aria-controls="first" aria-selected="true"><img src="./assets/images/icon-who-we-tab-1.svg" alt=""> Industry Experts</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="second-tab" data-bs-toggle="tab" data-bs-target="#second" type="button" role="tab" aria-selected="false"><img src="./assets/images/icon-who-we-tab-2.svg" alt=""> Trusted Builders</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="third-tab" data-bs-toggle="tab" data-bs-target="#third" type="button" role="tab" aria-selected="false"> <img src="./assets/images/icon-who-we-tab-3.svg" alt="">Modern Designers</button>
                                    </li>
                                </ul>
                            </div>
                            <!-- Sidebar Our Mission Vision Nav End -->

                            <!-- Our who-we Tab Item Start -->
                            <div class="who-we-tab-item tab-pane fade show active" id="first" role="tabpanel">
                                <div class="who-we-tab-content">
                                    <div class="who-we-tab-header-content">
                                        <h3> Industry Experts:</h3>
                                        <p>We are Industry Experts known for delivering high-quality construction with honesty, precision, and reliability. Every project is handled with strong craftsmanship, transparent processes, and a commitment to meeting timelines, ensuring spaces that are built to last and earn lasting trust.</p>
                                    </div>

                                    <!-- Who We Item List Start -->
                                    <div class="who-we-item-list">
                                        <!-- Who We Item Start -->
                                        <div class="who-we-item">
                                            <div class="icon-box">
                                                <img src="./assets/images/icon-who-we-item-1.svg" alt="">
                                            </div>
                                            <div class="who-we-item-content">
                                                <h3>Experience Professional</h3>
                                            </div>
                                        </div>
                                        <!-- Who We Item End -->

                                        <!-- Who We Item Start -->
                                        <div class="who-we-item">
                                            <div class="icon-box">
                                                <img src="./assets/images/icon-who-we-item-2.svg" alt="">
                                            </div>
                                            <div class="who-we-item-content">
                                                <h3>Strong Safety Standards</h3>
                                            </div>
                                        </div>
                                        <!-- Who We Item End -->

                                        <!-- Who We Item Start -->
                                        <div class="who-we-item">
                                            <div class="icon-box">
                                                <img src="./assets/images/icon-who-we-item-3.svg" alt="">
                                            </div>
                                            <div class="who-we-item-content">
                                                <h3>Client-Focused Approach</h3>
                                            </div>
                                        </div>
                                        <!-- Who We Item End -->

                                        <!-- Who We Item Start -->
                                        <div class="who-we-item">
                                            <div class="icon-box">
                                                <img src="./assets/images/icon-who-we-item-4.svg" alt="">
                                            </div>
                                            <div class="who-we-item-content">
                                                <h3>Quality Craftsmanship</h3>
                                            </div>
                                        </div>
                                        <!-- Who We Item End -->
                                    </div>
                                    <!-- Who We Item List End -->
                                </div>
                            </div>
                            <!-- Our who-we Tab Item End -->

                            <!-- Our who-we Tab Item Start -->
                            <div class="who-we-tab-item tab-pane fade" id="second" role="tabpanel">
                                <div class="who-we-tab-content">
                                    <div class="who-we-tab-header-content">
                                        <h3>Trusted builders:</h3>
                                        <p>We are trusted builders known for delivering high-quality construction with honesty, precision, and reliability. Every project is handled with strong craftsmanship, transparent processes, and a commitment to meeting timelines, ensuring spaces that are built to last and earn lasting trust.</p>
                                    </div>

                                    <!-- Who We Item List Start -->
                                    <div class="who-we-item-list">
                                        <!-- Who We Item Start -->
                                        <div class="who-we-item">
                                            <div class="icon-box">
                                                <img src="./assets/images/icon-who-we-item-1.svg" alt="">
                                            </div>
                                            <div class="who-we-item-content">
                                                <h3>Experience Professional</h3>
                                            </div>
                                        </div>
                                        <!-- Who We Item End -->

                                        <!-- Who We Item Start -->
                                        <div class="who-we-item">
                                            <div class="icon-box">
                                                <img src="./assets/images/icon-who-we-item-2.svg" alt="">
                                            </div>
                                            <div class="who-we-item-content">
                                                <h3>Strong Safety Standards</h3>
                                            </div>
                                        </div>
                                        <!-- Who We Item End -->

                                        <!-- Who We Item Start -->
                                        <div class="who-we-item">
                                            <div class="icon-box">
                                                <img src="./assets/images/icon-who-we-item-3.svg" alt="">
                                            </div>
                                            <div class="who-we-item-content">
                                                <h3>Client-Focused Approach</h3>
                                            </div>
                                        </div>
                                        <!-- Who We Item End -->

                                        <!-- Who We Item Start -->
                                        <div class="who-we-item">
                                            <div class="icon-box">
                                                <img src="./assets/images/icon-who-we-item-4.svg" alt="">
                                            </div>
                                            <div class="who-we-item-content">
                                                <h3>Quality Craftsmanship</h3>
                                            </div>
                                        </div>
                                        <!-- Who We Item End -->
                                    </div>
                                    <!-- Who We Item List End -->
                                </div>
                            </div>
                            <!-- Our who-we Tab Item End -->

                            <!-- Our who-we Tab Item Start -->
                            <div class="who-we-tab-item tab-pane fade" id="third" role="tabpanel">
                                <div class="who-we-tab-content">
                                    <div class="who-we-tab-header-content">
                                        <h3>Modern Designers:</h3>
                                        <p>We are Modern Designers known for delivering high-quality construction with honesty, precision, and reliability. Every project is handled with strong craftsmanship, transparent processes, and a commitment to meeting timelines, ensuring spaces that are built to last and earn lasting trust.</p>
                                    </div>

                                    <!-- Who We Item List Start -->
                                    <div class="who-we-item-list">
                                        <!-- Who We Item Start -->
                                        <div class="who-we-item">
                                            <div class="icon-box">
                                                <img src="./assets/images/icon-who-we-item-1.svg" alt="">
                                            </div>
                                            <div class="who-we-item-content">
                                                <h3>Experience Professional</h3>
                                            </div>
                                        </div>
                                        <!-- Who We Item End -->

                                        <!-- Who We Item Start -->
                                        <div class="who-we-item">
                                            <div class="icon-box">
                                                <img src="./assets/images/icon-who-we-item-2.svg" alt="">
                                            </div>
                                            <div class="who-we-item-content">
                                                <h3>Strong Safety Standards</h3>
                                            </div>
                                        </div>
                                        <!-- Who We Item End -->

                                        <!-- Who We Item Start -->
                                        <div class="who-we-item">
                                            <div class="icon-box">
                                                <img src="./assets/images/icon-who-we-item-3.svg" alt="">
                                            </div>
                                            <div class="who-we-item-content">
                                                <h3>Client-Focused Approach</h3>
                                            </div>
                                        </div>
                                        <!-- Who We Item End -->

                                        <!-- Who We Item Start -->
                                        <div class="who-we-item">
                                            <div class="icon-box">
                                                <img src="./assets/images/icon-who-we-item-4.svg" alt="">
                                            </div>
                                            <div class="who-we-item-content">
                                                <h3>Quality Craftsmanship</h3>
                                            </div>
                                        </div>
                                        <!-- Who We Item End -->
                                    </div>
                                    <!-- Who We Item List End -->
                                </div>
                            </div>
                            <!-- Our who-we Tab Item End -->
                        </div>
                        <!-- Our Who We Box End -->

                        <!-- Who We Footer Start -->
                        <div class="who-we-footer">
                            <div class="who-we-btn">
                                <a href="contact.html" class="btn-default">contact us</a>
                            </div>

                            <!-- About Us Contact Box Start  -->
                            <div class="about-us-contact-box">
                                <div class="icon-box">
                                    <img src="./assets/images/icon-headphone-white.svg" alt="">
                                </div>
                                <div class="about-us-conatct-content">
                                    <p>Call Us Now!</p>
                                    <h3><a href="tel:123456789">+91 (123) 456-789</a></h3>
                                </div>
                            </div>
                            <!-- About Us Contact Box End  -->
                        </div>
                        <!-- Who We Footer End -->

                    </div>
                    <!-- Who We Content End -->
                </div>

                <div class="col-xl-6">
                    <!-- Who We Image Box Start -->
                    <div class="who-we-image-box">
                        <!-- Who We Are Image Box 1 Start -->
                        <div class="who-we-image-box-1">
                            <!-- Who We Image Start -->
                            <div class="who-we-image">
                                <figure class="image-anime reveal">
                                    <img src="./assets/images/who-we-are-image-1.jpg" alt="">
                                </figure>
                            </div>
                            <!-- Who We Image End -->
                        </div>
                        <!-- Who We Image Box 1 End -->

                        <!-- Who We Are Image Box 2 Start -->
                        <div class="who-we-image-box-2">
                            <!-- Who We Cta Box Start-->
                            <div class="who-we-cta-box wow fadeInUp" data-wow-delay="0.2s">
                                <!-- Satisfy Client Images Start -->
                                <div class="satisfy-client-images">
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="./assets/images/author-1.jpg" alt="">
                                        </figure>
                                    </div>
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="./assets/images/author-2.jpg" alt="">
                                        </figure>
                                    </div>
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="./assets/images/author-3.jpg" alt="">
                                        </figure>
                                    </div>
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="./assets/images/author-4.jpg" alt="">
                                        </figure>
                                    </div>
                                    <div class="satisfy-client-image add-more">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                                <!-- Satisfy Client Images End -->

                                <!-- Who We Cta Rating Start -->
                                <div class="who-we-cta-rating">
                                    <span>
                                        <i class="fa fa-solid fa-star"></i>
                                        <i class="fa fa-solid fa-star"></i>
                                        <i class="fa fa-solid fa-star"></i>
                                        <i class="fa fa-solid fa-star"></i>
                                        <i class="fa fa-solid fa-star"></i>
                                    </span>
                                </div>
                                <!-- Who We Cta Rating End -->

                                <!-- Who We Cta Content Start -->
                                <div class="who-we-cta-content">
                                    <p>Our 5k+ Satisfice Client</p>
                                </div>
                                <!-- Who We Cta Content End -->
                            </div>
                            <!-- Who We Cta Box End-->

                            <!-- Who We Image Start -->
                            <div class="who-we-image">
                                <figure class="image-anime reveal">
                                    <img src="./assets/images/who-we-are-image-2.jpg" alt="">
                                </figure>
                            </div>
                            <!-- Who We Image End -->
                        </div>
                        <!-- Who We Image Box 2 End -->
                    </div>
                    <!-- Who We Are Image Box End -->
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

    <!-- Our Fact Section Start -->
    <div class="our-fact">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">Our Fact</span>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Facts that showcase experience <span>quality and reliability</span></h2>
                    </div>
                    <!-- Section Title End -->
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
                            <!-- Our Fact Image End -->

                            <!-- Our Fact Image Content Start -->
                            <div class="our-fact-image-content">
                                <p>“We are extremely satisfi with quality of construction and attention to detail.”</p>
                            </div>
                            <!-- Our Fact Image Content End -->
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

    
<?php include "./components/footer.php"; ?>