<x-frontend-layout title="Packages" :breadcrumbs="$breadcrumbs" :seotags="$seotags">
    @push('css')
    <style>
        .package-item-card {
            display: block;
            border-radius: 22px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
            border: 1px solid rgba(15, 23, 42, 0.06);
            transition: transform .25s ease, box-shadow .25s ease;
            text-decoration: none;
        }
        .package-item-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 55px rgba(15, 23, 42, 0.14);
        }
        .package-item-card-media {
            position: relative;
            aspect-ratio: 4 / 3;
            overflow: hidden;
        }
        .package-item-card-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .package-item-card-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 22px;
            background: linear-gradient(180deg, rgba(2, 6, 23, 0.08) 10%, rgba(2, 6, 23, 0.72) 100%);
            color: #fff;
        }
        .package-item-card-overlay h3 {
            font-size: 1.25rem;
            font-weight: 800;
            margin-bottom: 8px;
        }
        .package-item-card-overlay p {
            margin: 0;
            color: rgba(255,255,255,.9);
        }
        .package-item-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 18px;
            background: var(--primary-color);
            color: #fff;
            font-weight: 700;
        }
        .package-item-card-badge {
            display: inline-flex;
            align-self: flex-start;
            background: rgba(255,255,255,.18);
            border: 1px solid rgba(255,255,255,.28);
            border-radius: 999px;
            padding: 6px 12px;
            margin-bottom: 12px;
            font-size: .78rem;
            letter-spacing: .08em;
            text-transform: uppercase;
        }
    </style>
    @endpush

    @include('frontend.partials.detail-page-hero', [
        'heroBadge' => data_get($page->content, 'packages.badge_text', 'Package Gallery'),
        'heroTitle' => data_get($page->content, 'packages.title', 'Packages With Image-First Appeal'),
        'heroBreadcrumbs' => [
            ['label' => 'Home', 'url' => url('/')],
            ['label' => 'Packages', 'url' => route('page.packages')],
            ['label' => 'Package Item', 'active' => true],
        ],
    ])

    <section class="py-5">
        <div class="container py-2">
            @if($packages->isNotEmpty())
                <div class="row g-4">
                    @foreach($packages as $package)
                    @php
                        $packageImage = $package->image ? asset($package->image) : asset('frontend/images/bg-title.jpg');
                    @endphp
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                        <a href="{{ route('page.packages-details', $package->slug) }}" class="text-decoration-none">
                            <article class="package-showcase-card h-100">
                                <div class="package-showcase-media">
                                    <img src="{{ $packageImage }}" alt="{{ $package->name }}">
                                    <div class="package-showcase-overlay">
                                        <span class="package-badge">{{ $package->name }}</span>
                                        {{-- <h3>Package {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</h3> --}}
                                    </div>
                                </div>
                                <div class="package-showcase-footer">
                                    <span><i class="fas fa-images me-2"></i>View Details</span>
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </article>
                        </a>
                    </div>
                @endforeach
                </div>
            @else
                <div class="text-center py-5 bg-white rounded-4 shadow-sm border">
                    <h4 class="fw-bold mb-2">No package items found.</h4>
                    <p class="text-muted mb-0">Add items to this package from the admin panel to enable the gallery flow.</p>
                </div>
            @endif
        </div>
    </section>
</x-frontend-layout>
