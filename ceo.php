<?php
include "./components/head.php";
include "./components/navbar.php";
?>
<style>
    .designation{
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 14px;
}

/* Dot */
.designation .dot{
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--accent-secondary-color, #ffb400);
    display: inline-block;
}
</style>

    <div class="page-header bg-section parallaxie" style="background-image: url('./assets/images/team-bg.jpg');background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque">CEO's Desk</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Company</a></li>
                                <li class="breadcrumb-item">CEO's Desk</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-team-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-single-sidebar">
                        <div class="sidebar-cta-box wow fadeInUp" data-wow-delay="0.25s">
                            <div class="sidebar-cta-image">
                                <figure>
                                    <img src="./assets/images/team/CHZ_4386.jpg" alt="">
                                </figure>
                            </div>

                            <div class="project-item-content text-center">
                            <h2>Dr. Bright Chimezie</h2>
                            <p class="designation text-white mb-0">
                                <span class="dot"></span>
                                Group Managing Director, Brit Holdings
                                <span class="dot"></span>
                            </p>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="team-single-content">
                        <div class="team-member-about">
                            <div class="section-title mb-0">
                                <h2 class="text-anime-style-2" data-cursor="-opaque">Dr. Bright  <span>Chimezie</span></h2>
                                <p class="wow fadeInUp">Dr. Bright Chimezie is a visionary entrepreneur, business leader, and the Group Managing Director of Brit Holdings. Renowned for his innovative leadership style and commitment to excellence, he has played a transformative role in reshaping Nigeria’s real estate landscape through strategic investments, sustainable growth initiatives, and customer-focused property solutions.</p>
                                <p class="wow fadeInUp">Under his leadership, Brit Properties Nigeria Limited has grown into one of the country’s trusted real estate brands, known for affordable land ownership opportunities, flexible payment plans, and transparent business practices. His vision has expanded beyond real estate into multiple sectors including transportation, agriculture, education, oil and gas, and security services, positioning Brit Holdings as a diversified and impactful conglomerate.</p>
                            </div>

                            <div class="member-experience-image-content">
                                <div class="member-experience-content">
                                    <div class="member-experience-content-item wow fadeInUp">
                                        <p>Dr. Chimezie began his professional journey at Leadway Assurance, where he developed strong leadership and strategic management skills that later became the foundation of his entrepreneurial success. Through determination, innovation, and a passion for empowering people, he built Brit Properties into a company dedicated to creating wealth, improving communities, and making property ownership accessible to more Nigerians.</p>
                                        <p>Over the years, his contributions to business and society have earned him numerous recognitions and professional honors in business management, corporate leadership, and risk management. Beyond business, he is deeply committed to philanthropy, mentorship, youth empowerment, and community development through the Bright Chimezie Foundation.</p>
                                        <p>At the core of his vision is a desire to create sustainable impact — building not only successful businesses, but also opportunities that improve lives and inspire future generations.</p>
                                    </div>
                                </div>
                                
                                <div class="member-experience-image">
                                    <figure class="image-anime reveal">
                                        <img src="./assets/images/team/CHZ_4376.jpg" alt="">
                                    </figure>
                                </div>
                            </div>
                        </div>
                        
                        <div class="team-member-experience-box">
                            <div class="section-title">
                                <h2 class="text-anime-style-2" data-cursor="-opaque">CEO’s Desk</h2>
                                <p class="wow fadeInUp">Welcome to Brit Properties Nigeria Limited.</p>
                                <p class="wow fadeInUp">At Brit Properties, we believe real estate is more than buying and selling land, it is about creating opportunities, building communities, and securing brighter futures for individuals, families, and investors.</p>
                                <p class="wow fadeInUp" data-wow-delay="0.2s">Since inception, our mission has remained clear: to provide accessible, affordable, and trusted real estate solutions that empower people to achieve property ownership with confidence. Through innovation, integrity, and customer-centric service, we have continued to redefine excellence within Nigeria’s real estate industry.</p>
                            </div>
                            
                            <div class="member-experience-image-content">
                                <div class="member-experience-image">
                                    <figure class="image-anime reveal">
                                        <img src="./assets/images/team/CHZ_4393.jpg" alt="">
                                    </figure>
                                </div>

                                <div class="member-experience-content">
                                    <div class="member-experience-content-item wow fadeInUp">
                                        <p>Our growth over the years has been driven by a strong commitment to transparency, professionalism, and sustainable value creation. We understand the importance of trust in every investment decision, and this is why we consistently strive to deliver projects and services that exceed expectations.</p>
                                        <p>As we continue to expand our footprint, our focus remains on building lasting relationships, creating investment opportunities, and contributing meaningfully to national development through quality real estate solutions.</p>
                                        <p>At Brit Properties, we are not just selling properties, we are helping people build legacies.</p>
                                        <p>Thank you for your trust and continued support as we build a future of possibilities together.</p>
                                        <h3 class="mt-3 mb-0">Dr. Bright Chimezie</h3>
                                        <p class="mt-0 pt-0">Group Managing Director, Brit Holdings</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Team Single End -->

<?php include "./components/footer.php"; ?>