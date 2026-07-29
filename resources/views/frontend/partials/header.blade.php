@php
    $services = \App\Models\Service::where('is_menu', true)->get();
    $enlistments = \App\Models\Enlistment::where('status', true)->get();
    $menuCategories = \App\Models\MenuCategory::with(['activePackages'])->where('status', true)->orderBy('order', 'asc')->get();
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
        <div class="d-flex w-100 align-items-center justify-content-between">
            <!-- Toggler - left on mobile -->
            <div class="navbar-toggler-wrapper">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileNavbar" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Logo - centered on mobile, left on desktop -->
            <div class="navbar-brand-wrapper">
                <a class="navbar-brand me-0 me-lg-4" href="{{ url('/') }}">
                    <img src="{{ asset($settings?->logo ?? 'catering_logo.png') }}" height="60" alt="">
                </a>
            </div>

            <!-- Desktop Menu - centered -->
            <div class="collapse navbar-collapse" id="desktopNavbar">
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
                        <a class="nav-link" href="{{ route('page.menus') }}" id="menusDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menus <i class="fa-solid fa-caret-down fs-7 ms-1 opacity-75"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="menusDropdown">
                            @foreach ($menuCategories as $cat)
                                <li class="dropend">
                                    <a class="dropdown-item" href="{{ route('page.menus', ['category' => $cat->slug]) }}">
                                        <span>{{ $cat->name }}</span>
                                    </a>
                                </li>
                            @endforeach
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

            <!-- CTA / Book Now button - right on mobile & desktop -->
            <div class="header-btn-wrapper">
                <a href="{{ url('/#quoteSection') }}" class="btn btn-theme-accent header-btn-book">Book Now</a>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Drawer Offcanvas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileNavbar">
    <div class="offcanvas-header border-bottom py-3">
        <div class="d-flex align-items-center gap-2">
            <img src="{{ asset($settings?->logo ?? 'catering_logo.png') }}" height="40" alt="Logo">
            <span class="fw-bold fs-5 text-theme-primary">{{ $settings?->site_name ?? 'Catering Service' }}</span>
        </div>
        <button type="button" class="btn-close text-reset" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body d-flex flex-column justify-content-between p-0">
        <div class="accordion accordion-flush mobile-drawer-menu" id="mobileMenuAccordion">
            <!-- 1. Home -->
            <a href="{{ url('/') }}" class="mobile-nav-link text-theme-primary fw-semibold">
                Home
            </a>

            <!-- 2. About Us -->
            <a href="{{ url('/about-us') }}" class="mobile-nav-link">
                About Us
            </a>

            <!-- 3. Services Dropdown -->
            <div class="accordion-item border-bottom">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMobileServices">
                        Services
                    </button>
                </h2>
                <div id="collapseMobileServices" class="accordion-collapse collapse" data-bs-parent="#mobileMenuAccordion">
                    <div class="accordion-body">
                        @foreach ($services as $service)
                            <a href="{{ route('page.services-details', $service->slug) }}" class="sub-item">
                                {{ $service->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- 4. Menus Dropdown -->
            <div class="accordion-item border-bottom">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMobileMenus">
                        Menus
                    </button>
                </h2>
                <div id="collapseMobileMenus" class="accordion-collapse collapse" data-bs-parent="#mobileMenuAccordion">
                    <div class="accordion-body">
                        @foreach ($menuCategories as $cat)
                            <a href="{{ route('page.menus', ['category' => $cat->slug]) }}" class="sub-item">
                                {{ $cat->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- 5. Enlistments Dropdown -->
            <div class="accordion-item border-bottom">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMobileEnlistments">
                        Enlistments
                    </button>
                </h2>
                <div id="collapseMobileEnlistments" class="accordion-collapse collapse" data-bs-parent="#mobileMenuAccordion">
                    <div class="accordion-body">
                        @foreach ($enlistments as $enlistment)
                            <a href="{{ route('page.enlistments-details', $enlistment->slug) }}" class="sub-item">
                                {{ $enlistment->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- 6. Gallery -->
            <a href="{{ route('page.gallery') }}" class="mobile-nav-link">
                Gallery
            </a>
        </div>

        <!-- Premium Mobile Drawer Footer CTA -->
        <div class="offcanvas-footer p-3 border-top mt-auto">
            <a href="{{ url('/#quoteSection') }}" class="btn btn-theme-accent w-100 py-2.5 rounded-3 fw-bold text-uppercase shadow-sm d-flex align-items-center justify-content-center gap-2 mobile-drawer-btn">
                <i class="fas fa-calendar-check fs-6"></i>
                <span>Book Now</span>
            </a>
            @if(!empty($settings?->phone))
                <div class="text-center mt-2">
                    <a href="tel:{{ $settings->phone }}" class="small text-muted text-decoration-none">
                        <i class="fas fa-phone-alt me-1 text-theme-primary"></i> Call: {{ $settings->phone }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
