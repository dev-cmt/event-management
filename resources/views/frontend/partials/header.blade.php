@php
    $services = \App\Models\Service::where('is_menu', true)->get();
    $enlistments = \App\Models\Enlistment::where('status', true)->get();
@endphp
<!-- =========================================================
    1. TOP HEADER CONTACT BAR & THEME SWITCHER
========================================================= -->
<header class="top-header">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <div class="top-contacts d-flex flex-wrap gap-3 align-items-center">
                @if (!empty($settings->phone))
                    <span><i class="fas fa-phone-alt me-1"></i> <a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a></span>
                @endif
                @if (!empty($settings->email))
                    <span><i class="fas fa-envelope me-1"></i> <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a></span>
                @endif
                @if (!empty($settings->noties))
                    <span class="badge bg-danger rounded-pill px-2 py-1"><i class="fas fa-bolt me-1"></i> {{ $settings->noties }}</span>
                @endif
            </div>
            <div class="top-socials d-flex align-items-center gap-3 mt-2 mt-md-0">
                <!-- Dark/Light Theme Mode Toggle -->
                <!-- <button class="btn btn-sm btn-outline-light rounded-pill px-3 py-1" id="darkThemeToggle" title="Toggle Dark/Light Mode">
                    <i class="fas fa-moon me-1" id="themeIcon"></i> <span id="themeText">Dark Mode</span>
                </button> -->

                <div class="social-icons d-flex gap-2">
                    @if(!empty($settings?->facebook))
                        <a href="{{ $settings->facebook }}" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if(!empty($settings?->youtube))
                        <a href="{{ $settings->youtube }}" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    @endif
                    @if(!empty($settings?->linkedin))
                        <a href="{{ $settings->linkedin }}" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    @endif
                    @if(!empty($settings?->instagram))
                        <a href="{{ $settings->instagram }}" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>

<!-- =========================================================
    2. FIXED MAIN NAVIGATION WITH ENHANCED SUB MENU ICON DESIGN
========================================================= -->
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="container">
        <div class="d-flex w-100 align-items-center flex-wrap">
            <!-- Logo - centered on mobile, left on desktop -->
            <a class="navbar-brand order-2 order-lg-1" href="{{ url('/') }}">
                <img src="{{ asset($settings?->logo ?? 'catering_logo.png') }}" height="40" alt="">
            </a>

            <!-- Toggler - left on mobile -->
            <button class="navbar-toggler order-1 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileNavbar">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Desktop Menu - centered -->
            <div class="collapse navbar-collapse order-3 order-lg-2" id="desktopNavbar">
                <ul class="navbar-nav mx-auto align-items-lg-center">
                    <!-- nav items -->
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/about-us')}}">About Us</a>
                    </li>

                    <!-- Level 1 Dropdown: Services -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#servicesSection" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services <i class="fa-solid fa-caret-down fs-7 ms-1 opacity-75"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                            <li class="dropend">
                                @foreach ($services as $service)
                                <a class="dropdown-item" href="{{ route('page.services-details', $service->slug) }}">
                                    <span>{{ $service->title }}</span>
                                </a>
                                @endforeach
                            </li>
                        </ul>
                    </li>

                    <!-- Level 1 Dropdown: Menus -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="menusDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menus <i class="fa-solid fa-caret-down fs-7 ms-1 opacity-75"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="menusDropdown">
                            <li class="dropend">
                                <a class="dropdown-item" href="#">
                                    <span>Royal Kacchi Packages</span>
                                    <i class="fas fa-chevron-right fs-7 ms-auto opacity-75"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#quoteSection">Gold Kacchi Feast</a></li>
                                    <li><a class="dropdown-item" href="#quoteSection">Diamond Royal Feast</a></li>
                                    <li><a class="dropdown-item" href="#quoteSection">Platinum Shahi Menu</a></li>
                                </ul>
                            </li>
                            <li class="dropend">
                                <a class="dropdown-item" href="#">
                                    <span>Buffet Packages</span>
                                    <i class="fas fa-chevron-right fs-7 ms-auto opacity-75"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#quoteSection">Standard Buffet</a></li>
                                    <li><a class="dropdown-item" href="#quoteSection">Premium Buffet</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#quoteSection">
                                    <span>Custom Menu Builder</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Level 1 Dropdown: Enlistments -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#venuesSection" id="venuesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Enlistments <i class="fa-solid fa-caret-down fs-7 ms-1 opacity-75"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="venuesDropdown">
                            <li class="dropend">
                                @foreach ($enlistments as $enlistment)
                                <a class="dropdown-item" href="{{ route('page.enlistments-details', $enlistment->slug) }}">
                                    <span>{{ $enlistment->title }}</span>
                                </a>
                                @endforeach
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="{{ route('page.gallery') }}">Gallery</a></li>
                </ul>
            </div>

            <!-- Desktop CTA - right on desktop -->
            <div class="d-none d-lg-flex order-3">
                <a href="#quoteSection" class="btn btn-theme-accent">Book Now</a>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Drawer Offcanvas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileNavbar">
    <div class="offcanvas-header border-bottom">
        <div class="d-flex align-items-center gap-2">
            <img src="catering_logo.png" height="36" alt="">
            <span class="fw-bold fs-5 text-theme-primary">Catering Service</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <div class="accordion accordion-flush" id="mobileMenuAccordion">
            <a href="#" class="mobile-nav-link text-theme-primary" data-bs-dismiss="offcanvas">Home</a>

            <div class="accordion-item border-bottom">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMobileProfile">
                        Profile & About
                    </button>
                </h2>
                <div id="collapseMobileProfile" class="accordion-collapse collapse" data-bs-parent="#mobileMenuAccordion">
                    <div class="accordion-body">
                        <a href="#aboutSection" class="sub-item" data-bs-dismiss="offcanvas"><i class="fas fa-building text-theme-primary"></i> About Our Company</a>
                        <a href="#ceoSection" class="sub-item" data-bs-dismiss="offcanvas"><i class="fas fa-user-tie text-theme-primary"></i> CEO Message</a>
                        <a href="#whyUsSection" class="sub-item" data-bs-dismiss="offcanvas"><i class="fas fa-thumbs-up text-theme-primary"></i> Why Choose Us</a>
                    </div>
                </div>
            </div>

            <div class="accordion-item border-bottom">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMobileServices">
                        Our Services
                    </button>
                </h2>
                <div id="collapseMobileServices" class="accordion-collapse collapse" data-bs-parent="#mobileMenuAccordion">
                    <div class="accordion-body">
                        <a href="#servicesSection" class="sub-item" data-bs-dismiss="offcanvas"><i class="fas fa-ring text-danger"></i> Wedding & Holud Ceremonies</a>
                        <a href="#servicesSection" class="sub-item" data-bs-dismiss="offcanvas"><i class="fas fa-briefcase text-primary"></i> Corporate Lunches & Galas</a>
                        <a href="#servicesSection" class="sub-item" data-bs-dismiss="offcanvas"><i class="fas fa-gift text-warning"></i> Birthday & Social Parties</a>
                    </div>
                </div>
            </div>

            <a href="#venuesSection" class="mobile-nav-link" data-bs-dismiss="offcanvas">Enlisted Venues</a>
            <a href="{{ route('page.gallery') }}" class="mobile-nav-link" data-bs-dismiss="offcanvas">Photo Gallery</a>
            <a href="#quoteSection" class="mobile-nav-link text-theme-accent fw-bold" data-bs-dismiss="offcanvas"><i class="fas fa-calendar-check me-2"></i> Book Reservation</a>
        </div>
    </div>
</div>
