<?php
include "./components/head.php";
include "./components/navbar.php";
?>

    <div class="page-header bg-section parallaxie" style="background-image: url('./assets/images/contact-bg.webp');background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque">Contact us</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">contact Us</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="page-contact-us">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="contact-us-content">
                        <div class="section-title">
                            <span class="section-sub-title wow fadeInUp">Contact Us</span>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Own land. <br><span>Build wealth.</span></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">We make property ownership simple and secure, helping you invest in verified real estate with confidence and peace of mind.</p>
                        </div>
                        
                        <div class="contact-info-list">
                            <div class="contact-info-item wow fadeInUp">
                                <h2><a href="mailto:hello@britproperties.ng">hello@britproperties.ng</a></h2>
                                <h3><a href="tel:+2349164449990">+234 916 444 9990</a></h3>
                                <h3><a href="tel:+2348112427496">+234 811 242 7496</a></h3>
                            </div>

                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.2s">
                                <h4>Address:</h4>
                                <p>Plot 7b, Budo farm layout, beside AP filling station, <br />Ajiwe, Abraham Adesanya, Ajah.</p>
                            </div>

                            <div class="contact-us-social-list wow fadeInUp" data-wow-delay="0.4s">
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
                </div>

                <div class="col-xl-7">
                    <div class="contact-form">
                        <form id="contactForm" action="#" method="POST" data-toggle="validator" class="wow fadeInUp" data-wow-delay="0.4s">
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <label>First Name:</label>
                                    <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter First Name *" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Last Name:</label>
                                    <input type="text" name="lname" class="form-control" id="lname" placeholder="Enter Last Name *" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Email Address:</label>
                                    <input type="email" name ="email" class="form-control" id="email" placeholder="Enter Email Address *" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Phone Number:</label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number *" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-12 mb-5">
                                    <label>Message:</label>
                                    <textarea name="message" class="form-control" id="message" rows="5" placeholder="Any Additional Message..."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn-default">send Message</button>
                                    <div id="msgSubmit" class="h3 hidden"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="google-map">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="google-map-iframe wow fadeInUp" data-wow-delay="0.4s">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d614.633134751999!2d3.582827729773545!3d6.470028923422375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bf5bb3e14e845%3A0xbce6a5c458127f6!2sBrit%20Properties%20Nig%20Ltd!5e0!3m2!1sen!2sng!4v1777758480910!5m2!1sen!2sng" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

<?php include "./components/footer.php"; ?>