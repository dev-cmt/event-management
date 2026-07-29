<x-frontend-layout title="Photo Gallery" :breadcrumbs="$breadcrumbs" :seotags="$seotags">

    {{-- ========================================================= --}}
    {{--  GALLERY PAGE HERO BANNER                                  --}}
    {{-- ========================================================= --}}
    <section class="detail-page-hero" style="background-image: url('{{ asset('frontend/images/bg-title.jpg') }}');">
        <div class="detail-page-hero-overlay"></div>
        <div class="container position-relative z-2">
            <div class="row align-items-center" style="min-height:260px;">
                <div class="col-12 text-center text-white">
                    <span class="badge bg-white bg-opacity-20 text-dark fw-semibold mb-3 px-3 py-2 text-uppercase ls-1" style="letter-spacing:2px; font-size:.78rem;">Visual Experience</span>
                    <h1 class="display-4 fw-bold mb-3" style="text-shadow:0 4px 20px rgba(0,0,0,.5);">
                        Our Event <span style="color: var(--accent-color);">Photo Gallery</span>
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white opacity-75 text-decoration-none">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Gallery</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    {{-- ========================================================= --}}
    {{--  FILTERABLE GALLERY GRID                                   --}}
    {{-- ========================================================= --}}
    <section class="py-5 bg-light" id="galleryPageSection">
        <div class="container py-4">

            {{-- Filter Buttons --}}
            <div class="text-center mb-5" data-aos="fade-up">
                <button class="gallery-filter-btn active" data-filter="all">All Photos</button>
                @foreach($galleryCategories as $cat)
                    <button class="gallery-filter-btn text-capitalize" data-filter="{{ Str::slug($cat) }}">{{ $cat }}</button>
                @endforeach
            </div>

            {{-- Gallery Grid --}}
            <div class="row g-4" id="galleryGrid">

                @if($galleries->isNotEmpty())
                    @foreach($galleries as $item)
                        <div class="col-md-6 col-lg-4 gallery-item" data-category="{{ Str::slug($item->category) }}" data-aos="zoom-in">
                            <div class="gallery-item-box">
                                <img src="{{ asset($item->image) }}"
                                     alt="{{ $item->title ?: 'Event Gallery Photo' }}"
                                     loading="lazy">
                                <a href="{{ asset($item->image) }}"
                                   class="glightbox gallery-item-overlay text-decoration-none"
                                   data-gallery="gallery-page"
                                   data-title="{{ $item->title ?: ucfirst($item->category) }}"
                                   data-description="{{ $item->description ?? '' }}">
                                    <div class="gallery-zoom-icon"><i class="fas fa-search-plus"></i></div>
                                </a>
                                {{-- Caption strip --}}
                                @if($item->title)
                                    <div class="gallery-item-caption">
                                        <span class="gallery-caption-cat">{{ ucfirst($item->category) }}</span>
                                        <h6 class="gallery-caption-title">{{ $item->title }}</h6>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    {{-- Fallback placeholder items --}}
                    @php
                        $placeholders = [
                            ['src'=>'https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=800','cat'=>'weddings','title'=>'Royal Wedding Banquet'],
                            ['src'=>'https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=800','cat'=>'dishes','title'=>'Shahi Kacchi Feast'],
                            ['src'=>'https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=800','cat'=>'venues','title'=>'Raowa Convention Hall'],
                            ['src'=>'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?q=80&w=800','cat'=>'dishes','title'=>'Grand Banquet Setup'],
                            ['src'=>'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=800','cat'=>'venues','title'=>'Event Catering Service'],
                            ['src'=>'https://images.unsplash.com/photo-1519671482749-fd09be7ccebf?q=80&w=800','cat'=>'weddings','title'=>'Banquet Hall Service'],
                        ];
                    @endphp
                    @foreach($placeholders as $p)
                        <div class="col-md-6 col-lg-4 gallery-item" data-category="{{ $p['cat'] }}" data-aos="zoom-in">
                            <div class="gallery-item-box">
                                <img src="{{ $p['src'] }}" alt="{{ $p['title'] }}" loading="lazy">
                                <a href="{{ $p['src'] }}" class="glightbox gallery-item-overlay text-decoration-none" data-gallery="gallery-page" data-title="{{ $p['title'] }}">
                                    <div class="gallery-zoom-icon"><i class="fas fa-search-plus"></i></div>
                                </a>
                                <div class="gallery-item-caption">
                                    <span class="gallery-caption-cat">{{ ucfirst($p['cat']) }}</span>
                                    <h6 class="gallery-caption-title">{{ $p['title'] }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>{{-- end #galleryGrid --}}

            {{-- Empty state message --}}
            <div id="galleryEmptyMsg" class="text-center py-5 d-none">
                <i class="fas fa-images fs-1 text-muted mb-3"></i>
                <p class="text-muted">No photos found in this category.</p>
            </div>

        </div>
    </section>

    {{-- ========================================================= --}}
    {{--  CTA STRIP                                                 --}}
    {{-- ========================================================= --}}
    <section class="py-5" style="background: linear-gradient(135deg, var(--primary-color), #062b19);">
        <div class="container text-center text-white py-2" data-aos="fade-up">
            <h2 class="display-6 fw-bold mb-3">Planning Your Next Big Event?</h2>
            <p class="fs-5 opacity-90 mb-4">Let us bring the culinary magic to your celebration.</p>
            <a href="{{ url('/#quoteSection') }}" class="btn btn-light fw-bold px-5 py-3 me-2" style="color: var(--primary-color);">
                <i class="fas fa-calendar-check me-2"></i>Book Your Event
            </a>
            <a href="{{ route('page.contact-us') }}" class="btn btn-outline-light fw-bold px-5 py-3">
                <i class="fas fa-phone-alt me-2"></i>Contact Us
            </a>
        </div>
    </section>

    @push('js')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterBtns = document.querySelectorAll('.gallery-filter-btn');
        const galleryItems = document.querySelectorAll('#galleryPageSection .gallery-item');
        const emptyMsg = document.getElementById('galleryEmptyMsg');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const filter = btn.getAttribute('data-filter');
                let visibleCount = 0;

                galleryItems.forEach(item => {
                    const match = filter === 'all' || item.getAttribute('data-category') === filter;
                    item.style.display = match ? 'block' : 'none';
                    if (match) {
                        visibleCount++;
                        item.classList.remove('animate__animated', 'animate__fadeIn');
                        void item.offsetWidth;
                        item.classList.add('animate__animated', 'animate__fadeIn');
                    }
                });

                emptyMsg && emptyMsg.classList.toggle('d-none', visibleCount > 0);
            });
        });
    });
    </script>
    @endpush

</x-frontend-layout>
