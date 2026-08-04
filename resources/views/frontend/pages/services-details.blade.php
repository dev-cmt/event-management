<x-frontend-layout title="{{ $service->seo->title ?? $service->title }}" :breadcrumbs="$breadcrumbs" :seotags="$seotags">
    @include('frontend.partials.detail-page-hero', [
        'heroBadge' => 'Our Services',
        'heroTitle' => $service->title,
        'heroBreadcrumbs' => [
            ['label' => 'Home', 'url' => url('/')],
            ['label' => 'Services', 'url' => route('page.services')],
            ['label' => $service->title, 'active' => true],
        ],
    ])

    {{-- =========================================================
        MAIN CONTENT AREA
    ========================================================= --}}
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="row g-5">

                {{-- ── SIDEBAR ────────────────────────────────────── --}}
                <div class="col-lg-4 order-lg-2" data-aos="fade-left">

                    {{-- All Services List --}}
                    <div class="detail-sidebar-card mb-4">
                        <div class="detail-sidebar-card-header">
                            <i class="fas fa-concierge-bell me-2"></i> All Services
                        </div>
                        <ul class="services-list-sidebar">
                            @foreach($allServices as $s)
                                <li class="{{ $s->slug === $service->slug ? 'active' : '' }}">
                                    <a href="{{ route('page.services-details', $s->slug) }}">
                                        <i class="fas fa-chevron-right me-2 fs-7"></i>
                                        {{ $s->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Quick Contact CTA --}}
                    <div class="detail-cta-card mb-4">
                        <div class="detail-cta-quote-mark">"</div>
                        <div class="position-relative z-2 text-center">
                            <i class="fas fa-headset fs-1 mb-3 opacity-75"></i>
                            <h4 class="fw-bold mb-2">Need Quick Help?</h4>
                            <p class="opacity-85 mb-4 fs-7">Contact our team for a prompt catering quotation tailored to your event.</p>
                            <a href="{{ route('page.contact-us') }}" class="btn btn-light fw-bold w-100 mb-2"
                               style="color: var(--primary-color);">
                                <i class="fas fa-envelope me-2"></i>Contact Us
                            </a>
                            <a href="tel:01711306501" class="btn btn-outline-light fw-bold w-100">
                                <i class="fas fa-phone-alt me-2"></i>01711-306501
                            </a>
                        </div>
                    </div>

                    {{-- Brochure Downloads (if any) --}}
                    @if($service->media->where('type', 'document')->count())
                        <div class="detail-sidebar-card mb-4">
                            <div class="detail-sidebar-card-header">
                                <i class="fas fa-file-download me-2"></i> Download Brochures
                            </div>
                            <div class="p-3">
                                @foreach($service->media->where('type', 'document') as $file)
                                    @php $ext = pathinfo($file->path, PATHINFO_EXTENSION); @endphp
                                    <a href="{{ asset($file->path) }}"
                                       target="_blank"
                                       class="d-flex align-items-center gap-3 p-3 mb-2 rounded border bg-white text-decoration-none text-dark"
                                       style="transition: all .25s;">
                                        <div class="stat-icon-wrapper flex-shrink-0"
                                             style="width:44px;height:44px;font-size:1.2rem;">
                                            <i class="fas fa-file-{{ $ext === 'pdf' ? 'pdf' : 'alt' }}"></i>
                                        </div>
                                        <div>
                                            <div class="fw-semibold font-rajdhani fs-6">{{ $file->name }}</div>
                                            <small class="text-muted text-uppercase">{{ strtoupper($ext) }} file</small>
                                        </div>
                                        <i class="fas fa-download ms-auto text-muted"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>{{-- /sidebar --}}

                {{-- ── MAIN CONTENT ─────────────────────────────── --}}
                <div class="col-lg-8 order-lg-1" data-aos="fade-right">

                    {{-- Image Swiper Carousel --}}
                    @if($service->media->where('type','image')->count())
                        <div class="service-detail-gallery mb-4">
                            <div class="swiper swiper-service-detail">
                                <div class="swiper-wrapper">
                                    @foreach($service->media->where('type','image') as $img)
                                        <div class="swiper-slide">
                                            <a href="{{ asset($img->path) }}"
                                               class="glightbox"
                                               data-gallery="service-detail-gallery"
                                               data-title="{{ $img->alt_text ?? $service->title }}">
                                                <img src="{{ asset($img->path) }}"
                                                     alt="{{ $img->alt_text ?? $service->title }}"
                                                     loading="lazy"
                                                     class="service-detail-img">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination service-detail-pagination"></div>
                                <div class="swiper-button-prev service-detail-prev"></div>
                                <div class="swiper-button-next service-detail-next"></div>
                            </div>
                        </div>
                    @endif

                    {{-- Title & Description --}}
                    <div class="mb-4">
                        <span class="badge-theme mb-2">Service Detail</span>
                        <h2 class="fw-bold mb-3 font-rajdhani" style="font-size:2rem;">{{ $service->title }}</h2>
                        <div class="service-detail-content text-muted" style="line-height:1.9; font-size:1rem;">
                            {!! $service->description !!}
                        </div>
                    </div>

                    {{-- CEO Blockquote --}}
                    @if($settings->description ?? false)
                        <div class="service-blockquote mb-4">
                            <div class="service-blockquote-icon"><i class="fas fa-quote-left"></i></div>
                            <p class="mb-2">{{ $settings->description }}</p>
                            <cite class="fw-bold text-theme-primary">— {{ $settings->company_name ?? 'Management' }}</cite>
                        </div>
                    @endif

                    {{-- Info Tabs --}}
                    {{-- <div class="mt-4">
                        <ul class="nav service-detail-tabs mb-0" id="serviceDetailTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="service-tab-btn active" data-bs-toggle="tab"
                                        data-bs-target="#sdTab1" type="button" role="tab">
                                    <i class="fas fa-shield-alt me-2"></i>Precautions
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="service-tab-btn" data-bs-toggle="tab"
                                        data-bs-target="#sdTab2" type="button" role="tab">
                                    <i class="fas fa-lightbulb me-2"></i>Intelligence
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="service-tab-btn" data-bs-toggle="tab"
                                        data-bs-target="#sdTab3" type="button" role="tab">
                                    <i class="fas fa-star me-2"></i>Specializations
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content service-tab-content">
                            <div class="tab-pane fade show active" id="sdTab1" role="tabpanel">
                                <div class="text-muted" style="line-height:1.85;">
                                    {!! $service->seo?->meta_keywords ?? '<p>Information about precautions for this service will appear here.</p>' !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sdTab2" role="tabpanel">
                                <p class="text-muted" style="line-height:1.85;">Intelligence and performance insights for this service will appear here.</p>
                            </div>
                            <div class="tab-pane fade" id="sdTab3" role="tabpanel">
                                <p class="text-muted" style="line-height:1.85;">Our specializations and unique offerings for this service will appear here.</p>
                            </div>
                        </div>
                    </div> --}}

                </div>{{-- /main content --}}

            </div>{{-- /row --}}
        </div>
    </section>

    @push('js')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        if (document.querySelector('.swiper-service-detail')) {
            new Swiper('.swiper-service-detail', {
                loop: true,
                autoplay: { delay: 4500, disableOnInteraction: false, pauseOnMouseEnter: true },
                pagination: { el: '.service-detail-pagination', clickable: true },
                navigation: { nextEl: '.service-detail-next', prevEl: '.service-detail-prev' },
            });
        }
    });
    </script>
    @endpush

</x-frontend-layout>
