<x-frontend-layout title="{{ $selectedItem->name }} Gallery" :breadcrumbs="$breadcrumbs" :seotags="$seotags">
    @push('css')
    <style>
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.25rem;
        }
        .gallery-item {
            display: block;
            position: relative;
            height: 220px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.25s ease;
        }
        .gallery-item:hover {
            transform: translateY(-4px);
        }
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
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

    <section class="py-5 bg-light">
        <div class="container py-2">
            @if($galleries->isNotEmpty())
                <div class="gallery-grid">
                    @foreach($galleries as $gallery)
                        <a href="{{ asset($gallery->image) }}"
                           class="gallery-item glightbox"
                           data-gallery="item-gallery"
                           data-title="{{ $gallery->caption ?? $selectedItem->name }}">
                            <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->caption ?? 'Gallery Image' }}">
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5 bg-white rounded-4 shadow-sm border">
                    <p class="text-muted mb-0">No gallery images found for this item.</p>
                </div>
            @endif
        </div>
    </section>

    @push('js')
    <script>
        $(function () {
            if (typeof GLightbox !== 'undefined') {
                GLightbox({ selector: '.glightbox' });
            }
        });
    </script>
    @endpush
</x-frontend-layout>
