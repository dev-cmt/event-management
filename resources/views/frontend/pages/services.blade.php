<x-frontend-layout title="Service" :breadcrumbs="$breadcrumbs" :seotags="$seotags">
    {{-- =========================================================
        PAGE HERO BANNER
    ========================================================= --}}
    <section class="detail-page-hero" style="background-image: url('{{ asset('frontend/images/bg-title.jpg') }}');">
        <div class="detail-page-hero-overlay"></div>
        <div class="container position-relative z-2">
            <div class="row align-items-center" style="min-height:260px;">
                <div class="col-12 text-center text-white">
                    <span class="badge bg-white bg-opacity-20 text-dark fw-semibold mb-3 px-3 py-2 text-uppercase"
                          style="letter-spacing:2px; font-size:.78rem;">{{ data_get($page->content, 'header.subtitle', 'The Interior speak for themselves') }}</span>
                    <h1 class="display-5 fw-bold mb-3"
                        style="text-shadow:0 4px 20px rgba(0,0,0,.5);">{{ data_get($page->content, 'header.title', 'Services') }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}" class="text-white opacity-75 text-decoration-none">Home</a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">{{ data_get($page->content, 'header.title', 'Services') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="badge-theme mb-2">{{ data_get($page->content, 'services.badge_text', 'Our Services') }}</span>
                <h2 class="display-5 fw-bold mb-3">
                    @include('frontend.partials.accent-title', [
                        'title' => data_get($page->content, 'services.title', 'Tailored Hospitality Solutions')
                    ])
                </h2>
                @if(data_get($page->content, 'services.sub_title'))
                    <p class="text-muted mb-0">{{ data_get($page->content, 'services.sub_title') }}</p>
                @endif
            </div>

            @if (!empty($services) && $services->isNotEmpty())
                <div class="row g-4">
                    @foreach($services as $service)
                        <div class="col-12 col-sm-6 col-lg-4" data-aos="fade-up">
                            <div class="service-card h-100 position-relative overflow-hidden">
                                <a href="{{ route('page.services-details', $service->slug) }}" class="stretched-link"></a>
                                <div class="service-img-wrapper">
                                    <img loading="lazy"
                                         src="{{ asset($service->media->where('is_main', 1)->first()?->path) }}"
                                         alt="{{ $service->title }}">
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h4 class="fw-bold font-rajdhani text-theme-primary mb-2">{{ $service->title }}</h4>
                                    <p class="text-muted flex-grow-1 fs-7 mb-3">
                                        {!! Str::limit(strip_tags($service->description ?? ''), 150) !!}
                                    </p>
                                    <span class="btn btn-outline-theme rounded-pill w-100">
                                        Explore Service <i class="fas fa-chevron-right ms-1 fs-7"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <div class="p-5 rounded-4 bg-white shadow-sm border mx-auto" style="max-width: 520px;">
                        <h4 class="fw-bold mb-2">No services found</h4>
                        <p class="text-muted mb-0">Services will appear here once they are added and marked for display.</p>
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-frontend-layout>
