<style>
    @media (max-width: 991px) {
    .navbar .container {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .header-btn-mobile {
        margin-left: auto;
        margin-right: 12px;
    }
}

.header-btn-mobile .btn-default::before,
.header-btn-mobile .btn-default::after {
    background: none !important;
    background-image: none !important;
    content: none !important;
}
</style>
<header class="main-header">
    <div class="header-sticky bg-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="./">
                    <img src="./assets/images/brit-logo.svg" width="100" alt="Logo">
                </a>

                <!-- Main Menu Start -->
                <div class="collapse navbar-collapse main-menu">
                    <div class="nav-menu-wrapper">
                        <ul class="navbar-nav mr-auto" id="menu">
                            <li class="nav-item"><a class="nav-link" href="./">Home</a></li>
                            <li class="nav-item submenu"><a class="nav-link" href="#">Company</a>
                                <ul>
                                    <li class="nav-item"><a class="nav-link" href="about">About us</a></li>
                                    <li class="nav-item"><a class="nav-link" href="ceo">CEO's Desk</a></li>
                                    <li class="nav-item"><a class="nav-link" href="team">Our Team</a></li>
                                    <li class="nav-item"><a class="nav-link" href="careers">Careers</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="properties">Properties</a></li>
                            <li class="nav-item"><a class="nav-link" href="gallery">Gallery</a></li>
                            <li class="nav-item"><a class="nav-link" href="spelling-bee">Spelling Bee</a></li>
                            <li class="nav-item"><a class="nav-link" href="faqs">FAQs</a></li>
                            <li class="nav-item"><a class="nav-link" href="blog">Blog</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact">Contact us</a></li>
                        </ul>
                    </div>

                    <div class="header-btn d-flex align-items-center justify-content-center gap-3">
                        <a href="https://app.britproperties.ng" target="_blank"
                        style="font-size: 18px; font-weight: 500; line-height: 1.2em; color: #ed1c24; text-transform: capitalize; background: transparent; padding: 12px 1px;">
                            Login
                        </a>

                        <a href="https://app.britproperties.ng/sign-up" target="_blank" class="btn-default">
                            Get Started
                        </a>
                    </div>
                </div>

                <!-- Mobile-only buttons (shown beside the toggle below lg) -->
                <div class="header-btn-mobile d-flex d-lg-none align-items-center gap-2">
                    <a href="https://app.britproperties.ng" target="_blank" style="font-size: 16px; font-weight: 500; line-height: 1.2em; color: #ed1c24; text-transform: capitalize; background: transparent; padding: 8px 4px; white-space: nowrap;">
                        Login
                    </a>

                    <a href="https://app.britproperties.ng/sign-up" target="_blank" class="btn-default" style="font-size: 14px; padding: 11px 14px; white-space: nowrap; background-image: none !important;">
                        Get Started
                    </a>
                </div>

                <div class="navbar-toggle"></div>
            </div>
        </nav>
        <div class="responsive-menu"></div>
    </div>
</header>