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

require_once "./components/blog-helpers.php";
$latestPosts = blog_get_posts($pdo, 3, 0);

?>


    <div class="hero hero-video bg-section dark-section">
        <div class="hero-bg-video">
            <video autoplay muted loop id="myvideo"><source src="https://res.cloudinary.com/dhowyyjht/video/upload/v1782229976/Lagos_Island_View_1_i2fxxz.mp4" type="video/mp4"></video>
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
                                <a href="contact" class="btn-default btn-highlighted">Book Free Consultation</a>
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
                                <img loading="lazy" src="./assets/images/hme_abt.jpg" alt="" style="width:100%; height:100%; object-fit:cover; object-position:top;">
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
                    <div class="our-fact-image-box">
                        <div class="our-fact-image-box-1 wow fadeInUp">
                            <div class="our-fact-image">
                                <figure class="image-anime">
                                    <img loading="lazy" src="./assets/images/hme-img2.jpg" alt="">
                                </figure>
                            </div>
                        </div>
                        
                        <div class="our-fact-image-box-2">
                            <div class="our-fact-image">
                                <figure class="image-anime reveal">
                                    <img loading="lazy" src="./assets/images/hme-img1.jpg" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="who-we-are-content-box-metal">
                        <div class="section-title">
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Why Clients Choose <span>Brit Properties</span></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">Our clients are not just buying land. They are building assets, securing futures, and making informed financial decisions.</p>
                        </div>
                        
                        <div class="who-we-are-body-box-metal wow fadeInUp" data-wow-delay="0.4s">
                            <div class="who-we-are-body-item-metal">
                                <div class="icon-box">
                                    <img loading="lazy" src="./assets/images/icon-who-we-are-1-metal.svg" alt="">
                                </div>
                                <div class="who-we-are-body-content-metal">
                                    <h3>Affordable Entry, Long-Term Value</h3>
                                </div>
                            </div>
                            
                            <div class="who-we-are-body-item-metal">
                                <div class="icon-box">
                                    <img loading="lazy" src="./assets/images/icon-who-we-are-2-metal.svg" alt="">
                                </div>
                                <div class="who-we-are-body-content-metal">
                                    <h3>Structured and Reliable Process</h3>
                                </div>
                            </div>
                            
                            <div class="who-we-are-body-item-metal">
                                <div class="icon-box">
                                    <img loading="lazy" src="./assets/images/icon-who-we-are-3-metal.svg" alt="">
                                </div>
                                <div class="who-we-are-body-content-metal">
                                    <h3>Transparent Transactions</h3>
                                </div>
                            </div>
                        </div>
                        
                        <div class="who-we-are-footer-box-metal wow fadeInUp" data-wow-delay="0.6s">
                            <div class="who-we-are-btn-metal">
                                <a href="https://app.britproperties.ng/sign-up" target="_blank" class="btn-default">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="intro-video bg-section dark-section parallaxie" style="margin-bottom: 80px !important;">
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
                            <img loading="lazy" src="./assets/images/watch-video-circle-new.png" alt="">
                        </a> 
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Our Blog Section Start -->
    <?php if (!empty($latestPosts)): ?>
    <div class="our-blog">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">Latest blog</span>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Latest insights on land, <span>property and real estate</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <?php foreach ($latestPosts as $i => $post):
                    $img = !empty($post['featured_image']) ? $post['featured_image'] : './assets/images/blogBG.jpg';
                    $url = blog_url($post['slug']);
                ?>
                <div class="col-xl-4 col-md-6">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp"<?php echo $i ? ' data-wow-delay="' . number_format($i * 0.2, 1) . 's"' : ''; ?>>
                        <!-- Post Featured Image Start-->
                        <div class="post-featured-image">
                            <a href="<?php echo $url; ?>" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img loading="lazy" src="<?php echo htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>">
                                </figure>
                            </a>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- Post Item Body Start -->
                        <div class="post-item-body">
                            <!-- Post Item Content Start -->
                            <div class="post-item-content">
                                <h2><a href="<?php echo $url; ?>"><?php echo htmlspecialchars($post['title']); ?></a></h2>
                            </div>
                            <!-- Post Item Content End -->

                            <!-- Post Item Readmore Button Start-->
                            <div class="post-item-btn">
                                <a href="<?php echo $url; ?>" class="readmore-btn">read more</a>
                            </div>
                            <!-- Post Item Readmore Button End-->
                        </div>
                        <!-- Post Item Body End -->
                    </div>
                    <!-- Post Item End -->
                </div>
                <?php endforeach; ?>

                <div class="col-lg-12">
                    <div class="section-footer-text section-satisfy-img wow fadeInUp" data-wow-delay="0.4s">
                        <p><a href="blog">View all posts</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!-- Our Blog Section End -->

    <!-- Spelling Bee Flyer Modal -->
    <style>
        .sb-modal-overlay{position:fixed;inset:0;background:rgba(0,0,0,.75);z-index:99999;display:none;align-items:center;justify-content:center;padding:20px;}
        .sb-modal-overlay.active{display:flex;}
        .sb-modal-box{position:relative;max-width:440px;width:100%;background:#fff;border-radius:10px;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,.45);animation:sbPop .3s ease;}
        @keyframes sbPop{from{transform:scale(.92);opacity:0}to{transform:scale(1);opacity:1}}
        .sb-modal-box img{display:block;width:100%;height:auto;}
        .sb-modal-close{position:absolute;top:10px;right:12px;width:36px;height:36px;border:none;border-radius:50%;background:rgba(0,0,0,.55);color:#fff;font-size:22px;line-height:1;cursor:pointer;z-index:2;transition:background .2s;}
        .sb-modal-close:hover{background:rgba(0,0,0,.8);}
        .sb-modal-cta{padding:16px;text-align:center;}
        .sb-modal-cta .btn-default{width:100%;display:inline-flex;justify-content:center;}
    </style>

    <div class="sb-modal-overlay" id="spellingBeeModal" role="dialog" aria-modal="true" aria-label="Brit Spelling Bee Competition">
        <div class="sb-modal-box">
            <button type="button" class="sb-modal-close" id="spellingBeeModalClose" aria-label="Close">&times;</button>
            <a href="spelling-bee" aria-label="Register for the Brit Spelling Bee">
                <img loading="lazy" src="./assets/images/spelling-bee-flyer.jpeg" alt="Brit Spelling Bee Competition flyer">
            </a>
            <div class="sb-modal-cta">
                <a href="spelling-bee" class="btn-default">Register Now</a>
            </div>
        </div>
    </div>

    <script>
        (function () {
            var active = false; // Set to true to re-enable the flyer modal
            if (!active) return;

            var modal = document.getElementById('spellingBeeModal');
            if (!modal) return;
            var closeBtn = document.getElementById('spellingBeeModalClose');

            function hide() { modal.classList.remove('active'); }
            function show() { modal.classList.add('active'); }

            // Show once per browsing session.
            try {
                if (!sessionStorage.getItem('sbModalShown')) {
                    show();
                    sessionStorage.setItem('sbModalShown', '1');
                }
            } catch (e) {
                show();
            }

            closeBtn.addEventListener('click', hide);
            modal.addEventListener('click', function (e) { if (e.target === modal) hide(); });
            document.addEventListener('keydown', function (e) { if (e.key === 'Escape') hide(); });
        })();
    </script>

<?php include "./components/footer.php"; ?>