    <footer class="main-footer bg-section dark-section">
        <div class="container" style="padding-right: 35px; padding-left: 35px;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-header">
                        <div class="section-title">
                            <h2 class="text-anime-style-2" data-cursor="-opaque">No Stories. No Surprises. <br><span>Just Land You Can Trust.</span></h2>
                        </div>
                        
                        <div class="footer-social-links">
                            <h3>Explore Our Social Media</h3>
                            <ul>
                                <li><a href="https://www.instagram.com/britproperties.ng/" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="https://www.facebook.com/britpropertyng/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/brit-properties-nigeria-ltd/" target="_blank"><i class="fa-brands fa-linkedin"></i></a></li>
                                <li><a href="https://x.com/BritProperties" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a href="https://www.youtube.com/@britpropertiesng" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="about-footer">
                        <div class="footer-logo">
                            <img src="./assets/images/brit-logo-white.png" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="footer-links-box">
                        <div class="footer-links">
                            <h3 style="font-weight: 400;">Company</h3>
                            <ul>
                                <li><a href="about">About Us</a></li>
                                <li><a href="ceo">CEO's Desk</a></li>
                                <li><a href="team">Our Team</a></li>
                                <li><a href="careers">Careers</a></li>
                            </ul>
                        </div>
                        
                        <div class="footer-links">
                            <h3 style="font-weight: 400;">Useful Links</h3>
                            <ul>
                                <li><a href="properties">Properties</a></li>
                                <li><a href="faqs">FAQs</a></li>
                                <li><a href="contact">Contact us</a></li>
                                <li><a href="locations">Our Locations</a></li>
                            </ul>
                        </div>
                        
                        <div class="footer-links">
                            <h3 style="font-weight: 400;">Quick Links</h3>
                            <ul>
                                <li><a href="testimonials">Testimonials</a></li>
                                <li><a href="">Affiliates</a></li>
                                <li><a href="terms">Terms of Use</a></li>
                                <li><a href="privacy">Privacy policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copyright-text">
                            <p>© <script>document.write(new Date().getFullYear());</script> Brit Properties. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    
    <script src="./assets/js/jquery-3.7.1.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/validator.min.js"></script>
    <script src="./assets/js/jquery.slicknav.js"></script>
    <script src="./assets/js/swiper-bundle.min.js"></script>
    <script src="./assets/js/jquery.waypoints.min.js"></script>
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/jquery.magnific-popup.min.js"></script>
    <script src="./assets/js/SmoothScroll.js"></script>
    <script src="./assets/js/parallaxie.js"></script>
    <script src="./assets/js/gsap.min.js"></script>
    <script src="./assets/js/magiccursor.js"></script>
    <script src="./assets/js/SplitText.min.js"></script>
    <script src="./assets/js/ScrollTrigger.min.js"></script>
    <script src="./assets/js/jquery.mb.YTPlayer.min.js"></script>
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/function.js?v=<?php echo @filemtime(__DIR__ . '/../assets/js/function.js') ?: time(); ?>"></script>

    <!-- Website traffic tracking — reports each page view to the Brit BackOffice -->
    <script>
        (function () {
            // Only record real visits to the live site; skip local/staging.
            if (!/(^|\.)britproperties\.ng$/i.test(location.hostname)) return;

            var endpoint = 'https://backend.britproperties.ng/track.php';
            var query = location.search ? location.search.substring(1) : ''; // forward utm_* params
            var url = endpoint +
                '?p=' + encodeURIComponent(location.pathname) +
                '&r=' + encodeURIComponent(document.referrer || '') +
                (query ? '&' + query : '');

            try {
                if (navigator.sendBeacon && navigator.sendBeacon(url)) return;
            } catch (e) {}

            // Fallback for browsers without sendBeacon.
            (new Image()).src = url;
        })();
    </script>

    <script>window.$zoho=window.$zoho || {};$zoho.salesiq=$zoho.salesiq||{ready:function(){}}</script><script id="zsiqscript" src="https://salesiq.zohopublic.com/widget?wc=siq89dffa7f0dfb814cc75cfad1a405918db8f199d09268a5745114d67658174b98" defer></script>

</body>
</html>