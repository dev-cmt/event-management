<x-frontend-layout title="Enlistments" :breadcrumbs="$breadcrumbs" :seotags="$seotags">
    @include('frontend.partials.detail-page-hero', [
        'heroBadge' => data_get($page->content, 'header.subtitle', 'The Interior speak for themselves'),
        'heroTitle' => data_get($page->content, 'header.title', 'Enlistments'),
        'heroBreadcrumbs' => [
            ['label' => 'Home', 'url' => url('/')],
            ['label' => data_get($page->content, 'header.title', 'Enlistments'), 'active' => true],
        ],
    ])

    <section class="py-5 bg-light" id="venuesSection">
        <div class="container py-4">
            <div class="d-flex flex-wrap justify-content-center align-items-end mb-4" data-aos="fade-up">
                <div class="text-center max-w-700 mx-auto mb-0">
                    <span class="badge-theme mb-2">{{ data_get($page->content, 'enlisted.badge_text', 'Our Presence') }}</span>
                    <h2 class="display-5 fw-bold mb-0">
                        @include('frontend.partials.accent-title', [
                            'title' => data_get($page->content, 'enlisted.title', 'Our Venue Showcase')
                        ])
                    </h2>
                    @if(data_get($page->content, 'enlisted.sub_title'))
                        <p class="text-muted mb-0 mt-2">{{ data_get($page->content, 'enlisted.sub_title') }}</p>
                    @endif
                </div>
            </div>

            @if (!empty($enlistments) && $enlistments->count() > 0)
                <div class="row g-4">
                    @foreach($enlistments as $enlistment)
                        @php
                            $defaultMedia = $enlistment->media->where('is_main', true)->first();
                            $imagePath = $defaultMedia ? asset($defaultMedia->path) : asset('images/placeholder.jpg');
                            $categoryName = $enlistment->category->category_name ?? 'Uncategorized';
                        @endphp
                        <div class="col-12 col-sm-6 col-lg-4" data-aos="fade-up">
                            <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                                <div class="position-relative">
                                    <img loading="lazy" src="{{ $imagePath }}" class="card-img-top object-fit-cover" style="height: 220px;" alt="{{ $enlistment->title }}">
                                    <span class="badge bg-danger rounded-pill position-absolute top-0 start-0 m-3 px-3 py-2">
                                        {{ $categoryName }}
                                    </span>
                                </div>

                                <div class="card-body d-flex flex-column p-4">
                                    <h5 class="fw-bold font-rajdhani mb-2">{{ $enlistment->title }}</h5>

                                    @if(!empty($enlistment->location))
                                        <small class="text-muted mb-3 d-block">
                                            <i class="fas fa-map-marker-alt text-warning me-1"></i>
                                            {{ $enlistment->location }}
                                        </small>
                                    @endif

                                    <p class="card-text text-muted small mb-4 flex-grow-1">
                                        {{ Str::limit(strip_tags($enlistment->description ?? $enlistment->short_description ?? 'No description available for this venue.'), 120) }}
                                    </p>

                                    <a href="{{ route('page.enlistments-details', $enlistment->slug) }}" class="btn btn-primary w-100 mt-auto">
                                        Book This Venue <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if(method_exists($enlistments, 'links'))
                    <div class="styled-pagination mt-5">
                        {{ $enlistments->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            @else
                <div class="row g-4">
                    <div class="col-12">
                        <div class="text-center py-5">
                            <div class="p-5 rounded-4 bg-white shadow-sm border mx-auto" style="max-width: 520px;">
                                <h4 class="fw-bold mb-2">No enlistments found</h4>
                                <p class="text-muted mb-0">Once venue entries are published, they will show up here as clean cards.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-frontend-layout>
