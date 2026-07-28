<x-frontend-layout title="Home Page" :breadcrumbs="$breadcrumbs" :seotags="$seotags">

    @if($settings->is_slider)
        <!-- Banner Section -->
        @include('frontend.partials.slider')
        <!-- End Banner Section -->
    @else
        <!-- Hero Section -->
        @include('frontend.partials.hero')
        <!-- End Hero Section -->
    @endif


    <!-- =========================================================
      1. STATS COUNTER CARDS
    ========================================================= -->
    @if ($achievements->isNotEmpty())
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                @foreach($achievements as $index => $achievement)
                    <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                        <div class="stat-card">
                            <div class="stat-icon-wrapper"><i class="{{ $achievement->icon ?? 'fas fa-utensils' }}"></i></div>
                            <div>
                                <h3>{{ $achievement->count ?? 0 }}{{ $achievement->suffix ?? '' }}</h3>
                                <p>{!! nl2br($achievement->title) !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- =========================================================
       2. ABOUT SECTION WITH SWIPER IMAGE SLIDER
    ========================================================= -->
    <section class="py-5" id="aboutSection">
        <div class="container py-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="about-img-box">
                        <img src="{{ asset($story->image ?? 'frontend/images/about-us.jpg') }}" alt="Catering Excellence">
                        <div class="about-experience-badge">
                            <h2>30+</h2>
                            <span>Years Heritage</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <span class="badge-theme mb-2">{{ $story->title ?? 'About Our Story' }}</span>
                    <h2 class="display-6 fw-bold mb-3">Catering<span class="text-theme-accent"> Service</span></h2>
                    <p class="text-muted mb-4">
                        {!! $story->content !!}
                    </p>

                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 border bg-card">
                                <i class="fas fa-check-circle fs-3 text-theme-primary"></i>
                                <div>
                                    <h6 class="mb-0 font-rajdhani fw-bold">Large-Scale Capacity</h6>
                                    <small class="text-muted">Up to 30K guests at single event</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 border bg-card">
                                <i class="fas fa-bolt fs-3 text-theme-accent"></i>
                                <div>
                                    <h6 class="mb-0 font-rajdhani fw-bold">12-Hour Urgent Prep</h6>
                                    <small class="text-muted">Emergency catering execution</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- About Gallery Swiper Slider -->
                    <div class="about-gallery-swiper" data-aos="fade-up" data-aos-delay="200">
                        <div class="swiper swiper-about-gallery">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?q=80&w=2070&auto=format&fit=crop" class="glightbox" data-gallery="about-gallery" data-title="Grand Banquet Setup">
                                        <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?q=80&w=600&auto=format&fit=crop" alt="Grand Banquet">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=2070&auto=format&fit=crop" class="glightbox" data-gallery="about-gallery" data-title="Event Catering Service">
                                        <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=600&auto=format&fit=crop" alt="Event Catering">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://images.unsplash.com/photo-1519671482749-fd09be7ccebf?q=80&w=2070&auto=format&fit=crop" class="glightbox" data-gallery="about-gallery" data-title="Banquet Hall Service">
                                        <img src="https://images.unsplash.com/photo-1519671482749-fd09be7ccebf?q=80&w=600&auto=format&fit=crop" alt="Banquet Hall">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://images.unsplash.com/photo-1478147427282-58a87a120781?q=80&w=2070&auto=format&fit=crop" class="glightbox" data-gallery="about-gallery" data-title="Wedding Feast Setup">
                                        <img src="https://images.unsplash.com/photo-1478147427282-58a87a120781?q=80&w=600&auto=format&fit=crop" alt="Wedding Feast">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=2069&auto=format&fit=crop" class="glightbox" data-gallery="about-gallery" data-title="Corporate Event Setup">
                                        <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=600&auto=format&fit=crop" alt="Corporate Setup">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-pagination about-gallery-pagination"></div>
                        </div>
                    </div>

                    <a href="#quoteSection" class="btn btn-theme-primary rounded-pill px-4 mt-4">Contact Our Team <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================
       3. OUR SERVICES SHOWCASE (INTERACTIVE SLIDER FORMAT)
    ========================================================= -->
    @if ($services->isNotEmpty())
    <section class="py-5 bg-light" id="servicesSection">
        <div class="container py-4">
            <div class="d-flex flex-wrap justify-content-between align-items-end mb-4" data-aos="fade-up">
                <div>
                    <span class="badge-theme mb-2">{{ data_get($page->content, 'services.badge_text', 'Our Culinary Services') }}</span>
                    <h2 class="display-5 fw-bold mb-0">
                        @include('frontend.partials.accent-title', [
                            'title' => data_get($page->content, 'services.title', 'Tailored Catering Solutions')
                        ])
                    </h2>
                    <p class="text-muted">{{ data_get($page->content, 'services.sub_title', '') }}</p>
                </div>
                <!-- Slider Nav Controls -->
                <div class="d-flex gap-2 mt-3 mt-md-0">
                    <div class="slider-control-btn services-prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="slider-control-btn services-next"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>

            <!-- Swiper Container for Services -->
            <div class="swiper swiper-services" data-aos="fade-up" data-aos-delay="150">
                <div class="swiper-wrapper">
                    @foreach($services as $service)
                        <div class="swiper-slide">
                            <div class="service-card">
                                <a href="{{ route('page.services-details', $service->slug) }}" class="stretched-link"></a>

                                    <div class="service-img-wrapper">
                                        <img src="{{ asset($service->media->where('is_main', 1)->first()?->path) }}" alt="Wedding">
                                    </div>
                                <div class="card-body">
                                    <h4 class="fw-bold font-rajdhani text-theme-primary mb-2">{{ $service->title }}</h4>
                                    <p class="text-muted flex-grow-1 fs-7">
                                        {{ Str::limit($service->description, 100) }}
                                    </p>
                                    <a href="{{ route('page.services-details', $service->slug) }}" class="btn btn-outline-theme rounded-pill mt-3 w-100">Explore Menu <i class="fas fa-chevron-right ms-1 fs-7"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination Bullets -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    @endif
    <!-- =========================================================
       4. TRUSTED CHOICE (WHY CHOOSE US) - CENTERED ROTATING ANIMATED IMAGE
    ========================================================= -->
    <section class="py-5" id="whyUsSection">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5" data-aos="fade-up">
                <span class="badge-theme mb-2">{{ data_get($page->content, 'why_us.badge_text', 'Trusted Choice') }}</span>
                <h2 class="display-5 fw-bold mb-3">
                    @include('frontend.partials.accent-title', [
                        'title' => data_get($page->content, 'why_us.title', 'Why Choose Catering Service')
                    ])
                </h2>
                <p class="text-muted">
                    {{ data_get($page->content, 'why_us.sub_title', '') }}
                </p>
            </div>

            <div class="row align-items-center g-4">
                <!-- Left Column -->
                <!-- <div class="col-lg-4" data-aos="fade-right">
                    <div class="why-item-box">
                        <div class="why-icon"><i class="fas fa-concierge-bell"></i></div>
                        <div>
                            <h5 class="fw-bold font-rajdhani text-theme-primary mb-1">Complete Solutions</h5>
                            <p class="text-muted fs-7 mb-0">From menu consultation to final guest presentation, we manage every detail.</p>
                        </div>
                    </div>
                    <div class="why-item-box">
                        <div class="why-icon"><i class="fas fa-bolt"></i></div>
                        <div>
                            <h5 class="fw-bold font-rajdhani text-theme-primary mb-1">12-Hour Urgent Prep</h5>
                            <p class="text-muted fs-7 mb-0">Capable of preparing and delivering fresh food within just 12 hours for urgent events.</p>
                        </div>
                    </div>
                    <div class="why-item-box mb-0">
                        <div class="why-icon"><i class="fas fa-user-shield"></i></div>
                        <div>
                            <h5 class="fw-bold font-rajdhani text-theme-primary mb-1">Experienced Chefs</h5>
                            <p class="text-muted fs-7 mb-0">Our master chefs bring 30+ years of heritage and traditional culinary expertise.</p>
                        </div>
                    </div>
                </div> -->

                <!-- Centered Rotating Image -->
                <div class="col-lg-6 text-center my-4 my-lg-0" data-aos="zoom-in">
                    <div class="why-center-wrapper">
                        <div class="why-rotate-ring-inner"></div>
                        <div class="why-rotate-ring"></div>
                        <img src="https://images.unsplash.com/photo-1544148103-0773bf10d330?q=80&w=2070&auto=format&fit=crop" alt="Master Chef" class="why-center-img">
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="why-item-box">
                        <div>
                            <h5 class="fw-bold font-rajdhani text-theme-primary mb-1">Strict Hygiene Standard</h5>
                            <p class="text-muted fs-7 mb-3">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset's Body Type sheets. It has survived not only many decades, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised thanks to these sheets and more recently with desktop publishing software like Aldus PageMaker and Microsoft Word including versions of Lorem Ipsum.
                            </p>
                            <p class="text-muted fs-7 mb-0">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset's Body Type sheets. It has survived not only many decades, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised thanks to these sheets and more recently with desktop publishing software like Aldus PageMaker and Microsoft Word including versions of Lorem Ipsum.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================
       5. OUR PRESENCE — 3D FLIP CARD SWIPER (Y-AXIS FLIP ON HOVER)
    ========================================================= -->
    @if ($enlistments->isNotEmpty())
    <section class="py-5 bg-light" id="venuesSection">
        <div class="container py-4">
            <div class="d-flex flex-wrap justify-content-between align-items-end mb-4" data-aos="fade-up">
                <div>
                    <span class="badge-theme mb-2">{{ data_get($page->content, 'enlisted.badge_text', 'Our Presence') }}</span>
                    <h2 class="display-5 fw-bold mb-0">
                        @include('frontend.partials.accent-title', [
                            'title' => data_get($page->content, 'enlisted.title', 'Our Venue Showcase')
                        ])
                    </h2>
                    <p class="text-muted">{{ data_get($page->content, 'enlisted.sub_title', '') }}</p>
                </div>
                <div class="d-flex gap-2 mt-3 mt-md-0">
                    <div class="slider-control-btn venues-prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="slider-control-btn venues-next"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>

            <div class="swiper swiper-venues" data-aos="fade-up" data-aos-delay="150">
                <div class="swiper-wrapper">
                    @foreach($enlistments as $enlistment)
                        @php
                            // Fetch dynamic main image or fallback to default
                            $defaultImage = $enlistment->media->where('is_main', true)->first();
                            $imagePath = $defaultImage ? asset($defaultImage->path) : asset('images/placeholder.jpg');
                        @endphp

                        <div class="swiper-slide">
                            <div class="venue-flip-card">
                                <div class="venue-flip-inner">
                                    <!-- Front Side -->
                                    <div class="venue-flip-front">
                                        <img src="{{ $imagePath }}" alt="{{ $enlistment->title }}">
                                        <div class="venue-flip-front-overlay">
                                            @if(!empty($enlistment->category))
                                                <span class="badge bg-danger rounded-pill mb-1 px-3">
                                                    {{ $enlistment->category->category_name }}
                                                </span>
                                            @endif
                                            <h5 class="fw-bold font-rajdhani text-white mb-0">{{ $enlistment->title }}</h5>

                                            @if(!empty($enlistment->location))
                                                <small>
                                                    <i class="fas fa-map-marker-alt text-warning me-1"></i>
                                                    {{ $enlistment->location }}
                                                </small>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Back Side -->
                                    <div class="venue-flip-back">
                                        <div class="venue-flip-back-icon">
                                            <i class="fas fa-archway"></i>
                                        </div>
                                        <h4>{{ $enlistment->title }}</h4>

                                        <p>
                                            {{ Str::limit(strip_tags($enlistment->description ?? $enlistment->short_description ?? 'No description available for this venue.'), 120) }}
                                        </p>

                                        <a href="{{ route('page.enlistments-details', $enlistment->slug) }}" class="venue-book-btn">
                                            Book This Venue <i class="fas fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <!-- Pagination Dots -->
                <div class="swiper-pagination venues-pagination"></div>
            </div>
        </div>
    </section>
    @endif

    <!-- =========================================================
       6. CEO MESSAGE SECTION
    ========================================================= -->
    <section class="py-5" id="ceoSection">
        <div class="container">
            <div class="ceo-section-wrapper" data-aos="fade-up">
                <div class="ceo-quote-mark">“</div>
                <div class="row align-items-center g-4 position-relative z-2">
                    <div class="col-lg-8">
                        <span class="badge bg-white text-theme-primary fw-bold mb-3 uppercase px-3 py-1">Leadership Message</span>
                        <h2 class="display-6 fw-bold mb-3">Message From <span class="text-warning">The Chairman & CEO</span></h2>
                        <p class="fs-5 fw-semibold text-light mb-3">"সংগ্রাম থেকেই স্বপ্নের শুরু। বিশ্বাস থেকেই প্রতিষ্ঠার গল্প।"</p>
                        <p class="opacity-90 leading-relaxed mb-3">আমি <strong>ক্যাটরিন</strong>, প্রতিষ্ঠাতা ও চেয়ারম্যান, Catering Service। আজ থেকে প্রায় ৩৪ বছর আগে ঠাকুরগাঁও জেলা থেকে উচ্চশিক্ষার উদ্দেশ্যে ঢাকায় এসেছিলাম। আল্লাহ তালার অশেষ রহমত, গ্রাহকদের ভালোবাসা ও টিমের কঠোর পরিশ্রমে আমরা আজকের এই অবস্থানের পৌঁছেছি।</p>
                        <div class="mt-4 pt-2 border-top border-light border-opacity-25">
                            <h5 class="fw-bold mb-0 text-warning font-phudu">— ক্যাটরিন</h5>
                            <small class="opacity-75">চেয়ারম্যান ও ব্যবস্থাপনা পরিচালক, Catering Service</small>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                        <div class="ceo-img-container d-inline-block">
                            <img src="https://www.shego.in/wp-content/uploads/2025/04/Picsart_24-11-03_12-41-54-427.jpeg" alt="" class="img-fluid" style="max-height: 380px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================
       7. FILTERABLE PHOTO GALLERY (GLIGHTBOX PLUGIN)
    ========================================================= -->
    @php
        $galleryCategories = isset($galleries) && $galleries->count() ? $galleries->pluck('category')->unique()->values() : collect(['weddings', 'dishes', 'venues']);
    @endphp
    <section class="py-5 bg-light" id="gallerySection">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-4" data-aos="fade-up">
                <span class="badge-theme mb-2">{{ data_get($page->content, 'gallery.badge_text', 'Gallery') }}</span>
                <h2 class="display-5 fw-bold mb-3">
                    @include('frontend.partials.accent-title', [
                        'title' => data_get($page->content, 'gallery.title', 'Event Gallery')
                    ])
                </h2>
                <p class="text-muted">
                    {{ data_get($page->content, 'gallery.sub_title', '') }}
                </p>
            </div>

            <!-- Filter Buttons -->
            <div class="text-center mb-4" data-aos="fade-up">
                <button class="gallery-filter-btn active" data-filter="all">All Photos</button>
                @foreach($galleryCategories as $cat)
                    <button class="gallery-filter-btn text-capitalize" data-filter="{{ Str::slug($cat) }}">{{ $cat }}</button>
                @endforeach
            </div>

            <!-- Gallery Grid -->
            <div class="row g-4" id="galleryGrid">
                @if(isset($galleries) && $galleries->isNotEmpty())
                    @foreach($galleries as $item)
                        <div class="col-md-6 col-lg-4 gallery-item" data-category="{{ Str::slug($item->category) }}" data-aos="zoom-in">
                            <div class="gallery-item-box">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title ?: 'Event Gallery Photo' }}">
                                <a href="{{ asset($item->image) }}" class="glightbox gallery-item-overlay text-decoration-none" data-gallery="event-gallery" data-title="{{ $item->title ?: ucfirst($item->category) }}">
                                    <div class="gallery-zoom-icon"><i class="fas fa-search-plus"></i></div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-6 col-lg-4 gallery-item" data-category="weddings" data-aos="zoom-in">
                        <div class="gallery-item-box">
                            <img src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=800&auto=format&fit=crop" alt="Royal Wedding Setup">
                            <a href="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=2070&auto=format&fit=crop" class="glightbox gallery-item-overlay text-decoration-none" data-gallery="event-gallery" data-title="Royal Wedding Banquet Setup">
                                <div class="gallery-zoom-icon"><i class="fas fa-search-plus"></i></div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 gallery-item" data-category="dishes" data-aos="zoom-in">
                        <div class="gallery-item-box">
                            <img src="https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=800&auto=format&fit=crop" alt="Shahi Biryani Feast">
                            <a href="https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=2070&auto=format&fit=crop" class="glightbox gallery-item-overlay text-decoration-none" data-gallery="event-gallery" data-title="Authentic Shahi Kacchi Feast">
                                <div class="gallery-zoom-icon"><i class="fas fa-search-plus"></i></div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 gallery-item" data-category="venues" data-aos="zoom-in">
                        <div class="gallery-item-box">
                            <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=800&auto=format&fit=crop" alt="Raowa Convention Banquet">
                            <a href="https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=2069&auto=format&fit=crop" class="glightbox gallery-item-overlay text-decoration-none" data-gallery="event-gallery" data-title="Raowa Convention Hall Catering">
                                <div class="gallery-zoom-icon"><i class="fas fa-search-plus"></i></div>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- =========================================================
       8. TESTIMONIALS SECTION
    ========================================================= -->
    @if ($testimonials->isNotEmpty())
    <section class="py-5" id="testimonialsSection">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5" data-aos="fade-up">
                <span class="badge-theme mb-2">Client Reviews</span>
                <h2 class="display-5 fw-bold mb-3">
                    @include('frontend.partials.accent-title', [
                        'title' => data_get($page->content, 'testimonial.title', 'What Client Says')
                    ])
                </h2>
                <p class="text-muted">{{ data_get($page->content, 'testimonial.sub_title', 'Real experiences shared by clients who trusted us with their most cherished events.') }}</p>
            </div>

            <div class="row g-4">
                @foreach($testimonials as $testimonial)
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="p-4 rounded-4 border bg-card h-100 shadow-sm">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <img src="{{ asset($testimonial->image ?? 'images/profile.jpg') }}" class="rounded-circle" width="50" height="50" alt="Client">
                                <div>
                                    <h6 class="fw-bold mb-0">{{ $testimonial->client_name }}</h6>
                                    <div class="text-warning fs-7"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                    <small class="text-muted">{{ $testimonial->position }}{{ $testimonial->position && $testimonial->company ? ', ' : '' }}{{ $testimonial->company }}</small>
                                </div>
                            </div>
                            <p class="text-muted fs-7 mb-0">
                                "{{ $testimonial->content }}"
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- =========================================================
       9. RESERVATION & QUOTE FORM
    ========================================================= -->
    <section class="py-5" id="quoteSection">
        <div class="container py-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-5" data-aos="fade-right">
                    <span class="badge-theme mb-2">{{ data_get($page->content, 'reserve.badge_text', 'Reserve Your Event') }}</span>
                    <h2 class="display-6 fw-bold mb-3">
                        @include('frontend.partials.accent-title', [
                            'title' => data_get($page->content, 'reserve.title', 'Request a Quote')
                        ])
                    </h2>
                    <p class="text-muted mb-4">{{ data_get($page->content, 'reserve.sub_title', '') }}</p>

                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="stat-icon-wrapper" style="width: 48px; height: 48px; font-size: 1.2rem;">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">Direct Hotline</h6>
                                <small class="text-muted">{{ $settings->phone }} {{ $settings->phone2 ? ' / ' . $settings->phone2 : '' }}</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="stat-icon-wrapper" style="width: 48px; height: 48px; font-size: 1.2rem;">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">12-Hour Urgent Service</h6>
                                <small class="text-muted">Emergency bookings catered instantly</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-left">
                    <div class="quote-form-card">
                        <!-- Alert Message Container -->
                        <div id="alert-message"></div>

                        <h4 class="fw-bold font-rajdhani text-theme-primary mb-4">Request Event Quotation</h4>

                        <form id="reservationForm">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label font-rajdhani fw-semibold fs-7 mb-1">Full Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-rajdhani fw-semibold fs-7 mb-1">Phone Number</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="017XX-XXXXXX" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-rajdhani fw-semibold fs-7 mb-1">Event Type</label>
                                    <select name="event_type" class="form-select" required>
                                        <option value="">Select Event Type</option>
                                        <option value="Wedding Reception">Wedding Reception</option>
                                        <option value="Holud Ceremony">Holud Ceremony</option>
                                        <option value="Corporate Feast">Corporate Event</option>
                                        <option value="Birthday Party">Birthday Party</option>
                                        <option value="Ramadan Iftar">Ramadan Iftar Party</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-rajdhani fw-semibold fs-7 mb-1">Event Date</label>
                                    <input type="date" name="event_date" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-rajdhani fw-semibold fs-7 mb-1">Estimated Guests</label>
                                    <input type="number" name="guests" class="form-control" placeholder="e.g. 500" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-rajdhani fw-semibold fs-7 mb-1">Venue / Location</label>
                                    <input type="text" name="location" class="form-control" placeholder="Convention Hall Name / Area">
                                </div>
                                <div class="col-12">
                                    <label class="form-label font-rajdhani fw-semibold fs-7 mb-1">Special Requirements / Menu Choices</label>
                                    <textarea name="notes" class="form-control" rows="3" placeholder="Specify menu preferences, Kacchi type, dessert choices..."></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" id="submitBtn" class="btn btn-theme-accent btn-lg w-100 rounded-pill text-white fw-bold">
                                        <span class="btn-text">Submit Booking Request <i class="fas fa-paper-plane ms-2"></i></span>
                                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('js')
    <script>
        $(document).ready(function () {
            $('#reservationForm').on('submit', function (e) {
                e.preventDefault();

                let form = $(this);
                let submitBtn = $('#submitBtn');
                let alertBox = $('#alert-message');

                // Disable button & show spinner
                submitBtn.prop('disabled', true);
                submitBtn.find('.btn-text').text('Submitting...');
                submitBtn.find('.spinner-border').removeClass('d-none');
                alertBox.empty();

                $.ajax({
                    url: "{{ route('booking.store') }}",
                    type: "POST",
                    data: form.serialize(),
                    dataType: "json",
                    success: function (response) {
                        if (response.status === 'success') {
                            alertBox.html(`
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle me-2"></i> ${response.message}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            `);
                            form[0].reset();
                        }
                    },
                    error: function (xhr) {
                        let errorHtml = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><ul class="mb-0 ps-3">';

                        if (xhr.status === 422 && xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function (key, error) {
                                errorHtml += `<li>${error}</li>`;
                            });
                        } else {
                            errorHtml += '<li>Something went wrong. Please try again later.</li>';
                        }

                        errorHtml += '</ul><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        alertBox.html(errorHtml);
                    },
                    complete: function () {
                        // Re-enable button
                        submitBtn.prop('disabled', false);
                        submitBtn.find('.btn-text').html('Submit Booking Request <i class="fas fa-paper-plane ms-2"></i>');
                        submitBtn.find('.spinner-border').addClass('d-none');
                    }
                });
            });
        });
    </script>
    @endpush

    <!-- Dynamic Theme Customizer Panel -->
    <!-- <div class="theme-customizer-widget">
        <div class="color-palette-panel" id="colorPalettePanel">
            <h6 class="fw-bold font-rajdhani text-theme-primary mb-1 fs-7 uppercase"><i class="fas fa-palette me-1"></i> Accent Theme Color</h6>
            <small class="text-muted d-block mb-2 fs-8">Pick dynamic UI accent color:</small>
            <div class="color-swatch-grid">
                <div class="color-swatch" style="background-color: #0d4d2e;" data-primary="#0d4d2e" data-rgb="13, 77, 46" data-accent="#ae2d1b" title="Emerald Green"></div>
                <div class="color-swatch" style="background-color: #ae2d1b;" data-primary="#ae2d1b" data-rgb="174, 45, 27" data-accent="#0d4d2e" title="Crimson Red"></div>
                <div class="color-swatch" style="background-color: #d4af37;" data-primary="#d4af37" data-rgb="212, 175, 55" data-accent="#8b0000" title="Royal Gold"></div>
                <div class="color-swatch" style="background-color: #1e3799;" data-primary="#1e3799" data-rgb="30, 55, 153" data-accent="#e84118" title="Sapphire Blue"></div>
                <div class="color-swatch" style="background-color: #6c5ce7;" data-primary="#6c5ce7" data-rgb="108, 92, 231" data-accent="#ff7675" title="Deep Violet"></div>
            </div>
        </div>

        <button class="customizer-toggle-btn" id="paletteToggleBtn" title="Customize Theme Color">
            <i class="fas fa-paint-brush"></i>
        </button>
    </div> -->
</x-frontend-layout>
