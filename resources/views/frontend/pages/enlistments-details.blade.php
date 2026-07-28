<x-frontend-layout title="{{ $enlistment->title ?? 'Enlistment Detail' }}" :breadcrumbs="$breadcrumbs" :seotags="$seotags">

    {{-- =========================================================
        PAGE HERO BANNER
    ========================================================= --}}
    <section class="detail-page-hero"
             style="background-image: url('{{ asset('frontend/images/pages/bg-title.jpg') }}');">
        <div class="detail-page-hero-overlay"></div>
        <div class="container position-relative z-2">
            <div class="row align-items-center" style="min-height:260px;">
                <div class="col-12 text-center text-white">
                    <span class="badge bg-white bg-opacity-20 text-dark fw-semibold mb-3 px-3 py-2 text-uppercase"
                          style="letter-spacing:2px; font-size:.78rem;">
                        {{ $enlistment->category->category_name ?? 'Enlistment' }}
                    </span>
                    <h1 class="display-5 fw-bold mb-3"
                        style="text-shadow:0 4px 20px rgba(0,0,0,.5);">{{ $enlistment->title ?? 'Enlistment Detail' }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}" class="text-white opacity-75 text-decoration-none">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('page.enlistments') }}" class="text-white opacity-75 text-decoration-none">Enlistments</a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">{{ $enlistment->title ?? 'Detail' }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================
        CUSTOM IMAGE GALLERY STAGE
    ========================================================= --}}
    @if(isset($enlistment->media) && count($enlistment->media) > 0)
    <section class="py-4 bg-light">
        <div class="container">
            <div class="project-gallery-modern" data-aos="fade-up">

                {{-- Hidden links for fancybox/glightbox zoom --}}
                <div style="display:none;">
                    @foreach($enlistment->media as $index => $media)
                        <a href="{{ asset($media->path) }}"
                           class="glightbox hidden-fancybox-link"
                           data-gallery="project-gallery"
                           data-title="{{ $enlistment->title }}"
                           data-index="{{ $index }}"></a>
                    @endforeach
                </div>

                {{-- Main Stage --}}
                <div class="pgm-main-stage mb-3" id="pgmMainStage">
                    <img id="pgmMainImage"
                         src="{{ asset($enlistment->media[0]->path) }}"
                         alt="{{ $enlistment->title }}"
                         class="pgm-main-img">
                    <button class="pgm-zoom-btn" id="pgmZoomBtn" title="View Fullscreen">
                        <i class="fas fa-expand-alt"></i>
                    </button>
                    <button class="pgm-nav-btn pgm-prev" id="pgmPrev">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="pgm-nav-btn pgm-next" id="pgmNext">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    {{-- Image counter --}}
                    <div class="pgm-counter">
                        <span id="pgmCurrentIdx">1</span> / {{ count($enlistment->media) }}
                    </div>
                </div>

                {{-- Thumbnails --}}
                <div class="pgm-thumbs-wrapper">
                    <div class="pgm-thumbs" id="pgmThumbs">
                        @foreach($enlistment->media as $index => $media)
                            <div class="pgm-thumb {{ $index === 0 ? 'active' : '' }}"
                                 data-index="{{ $index }}"
                                 data-src="{{ asset($media->path) }}">
                                <img src="{{ asset($media->path) }}" alt="Thumb {{ $index + 1 }}">
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
    @endif

    {{-- =========================================================
        LOWER CONTENT: DESCRIPTION + INFO SIDEBAR
    ========================================================= --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-5">

                {{-- ── DESCRIPTION ──────────────────────────────── --}}
                <div class="col-lg-8" data-aos="fade-right">
                    <span class="badge-theme mb-3">Enlistment Overview</span>
                    <h2 class="fw-bold font-rajdhani mb-4" style="font-size:1.9rem;">
                        {{ $enlistment->title ?? 'Venue Overview' }}
                    </h2>
                    <div class="text-muted project-detail-body" style="line-height:1.9; font-size:1rem;">
                        {!! $enlistment->description ?? '<p>No description available for this venue.</p>' !!}
                    </div>

                    {{-- Location highlight if available --}}
                    @if($enlistment->location)
                        <div class="d-flex align-items-center gap-3 mt-4 p-4 rounded-3 border"
                             style="background: var(--card-bg);">
                            <div class="stat-icon-wrapper flex-shrink-0"
                                 style="width:52px;height:52px;font-size:1.3rem;">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <div class="fw-bold font-rajdhani fs-5 text-theme-primary">Venue Location</div>
                                <div class="text-muted">{{ $enlistment->location }}</div>
                            </div>
                        </div>
                    @endif

                    {{-- Book This Venue CTA --}}
                    <div class="mt-5 d-flex gap-3 flex-wrap">
                        <a href="{{ url('/#quoteSection') }}"
                           class="btn btn-theme-accent px-4 py-3 fw-bold">
                            <i class="fas fa-calendar-check me-2"></i>Book This Venue
                        </a>
                        <a href="{{ route('page.contact-us') }}"
                           class="btn btn-outline-theme px-4 py-3 fw-bold">
                            <i class="fas fa-phone-alt me-2"></i>Enquire Now
                        </a>
                    </div>
                </div>

                {{-- ── INFO SIDEBAR ──────────────────────────────── --}}
                <div class="col-lg-4" data-aos="fade-left">

                    {{-- Quick Contact CTA --}}
                    <div class="detail-cta-card">
                        <div class="detail-cta-quote-mark">"</div>
                        <div class="position-relative z-2 text-center">
                            <i class="fas fa-archway fs-1 mb-3 opacity-75"></i>
                            <h4 class="fw-bold mb-2">Want to Book?</h4>
                            <p class="opacity-85 mb-4 fs-7">Get in touch and let us manage your next grand event at this venue.</p>
                            <a href="{{ route('page.contact-us') }}" class="btn btn-light fw-bold w-100 mb-2"
                               style="color: var(--primary-color);">
                                <i class="fas fa-envelope me-2"></i>Contact Us
                            </a>
                            <a href="tel:01711306501" class="btn btn-outline-light fw-bold w-100">
                                <i class="fas fa-phone-alt me-2"></i>01711-306501
                            </a>
                        </div>
                    </div>

                </div>{{-- /sidebar --}}
            </div>
        </div>
    </section>

    @push('js')
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const mainImage  = document.getElementById("pgmMainImage");
        const thumbs     = document.querySelectorAll(".pgm-thumb");
        const hiddenLinks= document.querySelectorAll(".hidden-fancybox-link");
        const prevBtn    = document.getElementById("pgmPrev");
        const nextBtn    = document.getElementById("pgmNext");
        const zoomBtn    = document.getElementById("pgmZoomBtn");
        const thumbsContainer = document.getElementById("pgmThumbs");
        const counter    = document.getElementById("pgmCurrentIdx");

        if (!mainImage || thumbs.length === 0) return;

        let currentIndex = 0;
        const total = thumbs.length;

        function updateGallery(index) {
            if (index < 0) index = total - 1;
            if (index >= total) index = 0;
            currentIndex = index;

            mainImage.classList.add("pgm-fade-out");
            setTimeout(() => {
                mainImage.src = thumbs[currentIndex].getAttribute("data-src");
                mainImage.classList.remove("pgm-fade-out");
            }, 200);

            thumbs.forEach(t => t.classList.remove("active"));
            thumbs[currentIndex].classList.add("active");

            if (counter) counter.textContent = currentIndex + 1;

            const active = thumbs[currentIndex];
            const scrollLeft = active.offsetLeft - (thumbsContainer.clientWidth / 2) + (active.clientWidth / 2);
            thumbsContainer.scrollTo({ left: scrollLeft, behavior: 'smooth' });
        }

        thumbs.forEach((thumb, i) => thumb.addEventListener("click", () => updateGallery(i)));
        if (prevBtn) prevBtn.addEventListener("click", () => updateGallery(currentIndex - 1));
        if (nextBtn) nextBtn.addEventListener("click", () => updateGallery(currentIndex + 1));
        if (zoomBtn) zoomBtn.addEventListener("click", () => hiddenLinks[currentIndex]?.click());
        mainImage.addEventListener("click", () => hiddenLinks[currentIndex]?.click());

        // Keyboard navigation
        document.addEventListener("keydown", (e) => {
            if (e.key === "ArrowLeft")  updateGallery(currentIndex - 1);
            if (e.key === "ArrowRight") updateGallery(currentIndex + 1);
        });
    });
    </script>
    @endpush

</x-frontend-layout>
