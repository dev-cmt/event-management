<x-frontend-layout title="Catering Menus">
    <style>
        .menu-section .nav-link{
            color: var(--primary-color) !important;
        }
        .menu-section .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            background-color: var(--primary-color) !important;
            color: #fff !important;
        }
    </style>
    {{-- =========================================================
        PAGE HERO BANNER
    ========================================================= --}}
    <section class="detail-page-hero" style="background-image: url('{{ asset('frontend/images/bg-title.jpg') }}');">
        <div class="detail-page-hero-overlay"></div>
        <div class="container position-relative z-2">
            <div class="row align-items-center" style="min-height:260px;">
                <div class="col-12 text-center text-white">
                    <span class="badge bg-white bg-opacity-20 text-dark fw-semibold mb-3 px-3 py-2 text-uppercase"
                        style="letter-spacing:2px; font-size:.78rem;">
                        Our Special Packages
                    </span>
                    <h1 class="display-5 fw-bold mb-3" style="text-shadow:0 4px 20px rgba(0,0,0,.5);">Catering Menus</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}" class="text-white opacity-75 text-decoration-none">Home</a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Catering Menus</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================
        MENU TABS SECTION
    ========================================================= --}}
    <section class="menu-section py-5">
        <div class="container">

            {{-- Category Tab Navigation Buttons --}}
            <ul class="nav nav-pills justify-content-center mb-5 gap-2" id="menuTabs" role="tablist">
                {{-- "All" Tab Button --}}
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $selectedCategorySlug === 'all' ? 'active' : '' }} fw-semibold px-4 py-2"
                            id="tab-all"
                            data-bs-toggle="tab"
                            data-bs-target="#cat-all"
                            type="button"
                            role="tab"
                            aria-controls="cat-all"
                            aria-selected="{{ $selectedCategorySlug === 'all' ? 'true' : 'false' }}">
                        All Menus
                    </button>
                </li>

                {{-- Dynamic Category Tabs --}}
                @foreach($categories as $category)
                    @php $isCatActive = ($selectedCategorySlug === $category->slug); @endphp
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $isCatActive ? 'active' : '' }} fw-semibold px-4 py-2"
                                id="tab-{{ $category->slug }}"
                                data-bs-toggle="tab"
                                data-bs-target="#cat-{{ $category->slug }}"
                                type="button"
                                role="tab"
                                aria-controls="cat-{{ $category->slug }}"
                                aria-selected="{{ $isCatActive ? 'true' : 'false' }}">
                            {{ $category->name }}
                        </button>
                    </li>
                @endforeach
            </ul>

            {{-- Tab Contents Container --}}
            <div class="tab-content" id="menuTabsContent">

                {{-- ----------------------------------------------------
                    1. "ALL MENUS" TAB CONTENT
                ---------------------------------------------------- --}}
                <div class="tab-pane fade {{ $selectedCategorySlug === 'all' ? 'show active' : '' }}"
                     id="cat-all"
                     role="tabpanel"
                     aria-labelledby="tab-all">

                    @foreach($categories as $category)
                        @if($category->activePackages->isNotEmpty())
                            <h2 class="text-center mb-4 mt-4" style="font-family: 'Montserrat', sans-serif; font-weight: 700; letter-spacing: 1px;">
                                {{ $category->name }}
                            </h2>

                            <div class="menu-container mb-5">
                                @foreach ($category->activePackages as $package)
                                    <div class="menu-card" style="background-image: url('{{ asset('frontend/images/bg-menu.jpg') }}')">
                                        <div class="menu-header">
                                            <div class="banner">
                                                <span class="banner-text">MENU {{ $loop->iteration }}</span>
                                            </div>
                                        </div>

                                        <ol class="menu-list">
                                            @foreach ($package->items as $item)
                                                <li>
                                                    @if (!empty($item->highlight))
                                                        <span class="highlight">{{ $item->highlight }}</span>
                                                    @endif
                                                    {{ $item->name }}
                                                </li>
                                            @endforeach
                                        </ol>

                                        <div class="food-image">
                                            <img src="{{ asset($package->image) }}" alt="{{ $package->title ?? $package->name }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>

                {{-- ----------------------------------------------------
                    2. INDIVIDUAL CATEGORY TABS CONTENT
                ---------------------------------------------------- --}}
                @foreach($categories as $category)
                    @php $isCatActive = ($selectedCategorySlug === $category->slug); @endphp
                    <div class="tab-pane fade {{ $isCatActive ? 'show active' : '' }}"
                         id="cat-{{ $category->slug }}"
                         role="tabpanel"
                         aria-labelledby="tab-{{ $category->slug }}">

                        <h2 class="text-center mb-4" style="font-family: 'Montserrat', sans-serif; font-weight: 700; letter-spacing: 1px;">
                            {{ $category->name }}
                        </h2>

                        @if($category->activePackages->isNotEmpty())
                            <div class="menu-container mb-5">
                                @foreach ($category->activePackages as $package)
                                    <div class="menu-card" style="background-image: url('{{ asset('frontend/images/bg-menu.jpg') }}')">
                                        <div class="menu-header">
                                            <div class="banner">
                                                <span class="banner-text">MENU {{ $loop->iteration }}</span>
                                            </div>
                                        </div>

                                        <ol class="menu-list">
                                            @foreach ($package->items as $item)
                                                <li>
                                                    @if (!empty($item->highlight))
                                                        <span class="highlight">{{ $item->highlight }}</span>
                                                    @endif
                                                    {{ $item->name }}
                                                </li>
                                            @endforeach
                                        </ol>

                                        <div class="food-image">
                                            <img src="{{ asset($package->image) }}" alt="{{ $package->title ?? $package->name }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-center text-muted py-4">No menu packages available in this category.</p>
                        @endif
                    </div>
                @endforeach

            </div>

        </div>
    </section>
</x-frontend-layout>
