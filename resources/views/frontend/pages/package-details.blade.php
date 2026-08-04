<x-frontend-layout title="{{ $package->name }}" :breadcrumbs="$breadcrumbs" :seotags="$seotags">
    @push('css')
    <style>
        .package-detail-hero {
            position: relative;
            overflow: hidden;
            border-radius: 34px;
            background: linear-gradient(135deg, #0f172a 0%, #1d4ed8 52%, #2563eb 100%);
            color: #fff;
            box-shadow: 0 28px 60px rgba(15, 23, 42, 0.18);
        }
        .package-detail-hero::before,
        .package-detail-hero::after {
            content: '';
            position: absolute;
            border-radius: 999px;
            background: rgba(255,255,255,.12);
            filter: blur(8px);
        }
        .package-detail-hero::before {
            width: 220px;
            height: 220px;
            right: -40px;
            top: -70px;
        }
        .package-detail-hero::after {
            width: 300px;
            height: 300px;
            left: -120px;
            bottom: -120px;
        }
        .package-detail-hero-content {
            position: relative;
            z-index: 2;
        }
        .package-detail-pill {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            border-radius: 999px;
            padding: .55rem 1rem;
            background: rgba(255,255,255,.14);
            border: 1px solid rgba(255,255,255,.24);
            font-size: .78rem;
            letter-spacing: .12em;
            text-transform: uppercase;
            font-weight: 700;
        }
        .package-detail-title {
            font-size: clamp(2.2rem, 4vw, 4.2rem);
            line-height: .98;
            margin: .9rem 0 1rem;
        }
        .package-detail-subtitle {
            color: rgba(255,255,255,.9);
            max-width: 36rem;
            font-size: 1.05rem;
        }
        .package-detail-metrics {
            display: flex;
            flex-wrap: wrap;
            gap: .85rem;
            margin-top: 1.35rem;
        }
        .package-detail-metric {
            padding: .9rem 1rem;
            border-radius: 18px;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.16);
            min-width: 140px;
        }
        .package-detail-metric strong {
            display: block;
            font-size: 1.15rem;
        }
        .package-detail-metric span {
            display: block;
            font-size: .8rem;
            opacity: .85;
        }
        .package-overview-card {
            border-radius: 28px;
            background: #fff;
            box-shadow: 0 18px 50px rgba(15, 23, 42, 0.08);
            border: 1px solid rgba(15, 23, 42, 0.06);
            padding: 1.5rem;
        }
        .package-overview-frame {
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 18px 50px rgba(15, 23, 42, 0.08);
            background: #fff;
            padding: 14px;
        }
        .package-overview-frame img {
            border-radius: 20px;
        }
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
            justify-content: center;
            align-items: center;
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
            /* align-self: flex-start; */
            background: rgba(255,255,255,.18);
            border: 1px solid rgba(255,255,255,.28);
            border-radius: 999px;
            padding: 6px 12px;
            margin-bottom: 12px;
            font-size: .78rem;
            letter-spacing: .08em;
            text-transform: uppercase;
        }
        .package-item-meta {
            border-radius: 18px;
            background: linear-gradient(180deg, rgba(59, 113, 202, 0.06), rgba(255,255,255,.95));
            border: 1px solid rgba(59, 113, 202, 0.12);
            padding: 16px;
        }
        .package-item-meta span {
            display: block;
            font-size: .8rem;
            color: #667085;
            margin-bottom: 6px;
        }
        .package-item-meta strong {
            font-size: 1.05rem;
        }
        .package-info-chip {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            border-radius: 999px;
            padding: .5rem .9rem;
            background: rgba(59, 113, 202, 0.08);
            color: #1d4ed8;
            font-weight: 700;
            margin-bottom: .75rem;
        }
        @media (max-width: 576px) {
            .package-detail-title {
                line-height: 1.08;
            }
        }
    </style>
    @endpush

    @include('frontend.partials.detail-page-hero', [
        'heroBadge' => $selectedItem->name ?? 'Package Gallery',
        'heroTitle' => $selectedItem->name ?? 'Package Detail',
        'heroBreadcrumbs' => [
            ['label' => 'Home', 'url' => url('/')],
            ['label' => 'Packages', 'url' => route('page.packages')],
            ['label' => $selectedItem->name ?? 'Detail', 'active' => true],
        ],
    ])

    <section class="py-5">
        <div class="container py-2">

            @if($package->items->isNotEmpty())
                <div class="row g-4">
                    @foreach($package->items as $item)
                        @php
                            $itemImage = $item->image ? asset($item->image) : asset('frontend/images/bg-title.jpg');
                            $galleryCount = 1 + $item->galleries->count();
                        @endphp
                        <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                            <a href="{{ route('page.package-gallery',  $item->slug) }}" class="package-item-card h-100">
                                <div class="package-item-card-media">
                                    <img src="{{ $itemImage }}" alt="{{ $item->name }}">
                                    <div class="package-item-card-overlay">
                                        <span class="package-item-card-badge">{{ $galleryCount }} photos</span>
                                        {{-- <h3>{{ $item->name }}</h3> --}}
                                    </div>
                                </div>
                                <div class="package-item-card-footer">
                                    <span>{{ $item->name }}</span>
                                    <i class="fas fa-arrow-right"></i>
                                </div>
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
