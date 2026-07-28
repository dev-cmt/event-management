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
       STATS COUNTER CARDS
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
       ABOUT SECTION WITH SWIPER IMAGE SLIDER
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
       6. OUR SERVICES SHOWCASE (INTERACTIVE SLIDER FORMAT)
    ========================================================= -->
    @if ($services->isNotEmpty())
    <section class="py-5 bg-light" id="servicesSection">
        <div class="container py-4">
            <div class="d-flex flex-wrap justify-content-between align-items-end mb-4" data-aos="fade-up">
                <div>
                    <span class="badge-theme mb-2">Our Culinary Services</span>
                    <h2 class="display-5 fw-bold mb-0">Tailored <span class="text-theme-accent">Catering Solutions</span></h2>
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
       7. TRUSTED CHOICE (WHY CHOOSE US) - CENTERED ROTATING ANIMATED IMAGE
    ========================================================= -->
    <section class="py-5" id="whyUsSection">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5" data-aos="fade-up">
                <span class="badge-theme mb-2">Trusted Choice</span>
                <h2 class="display-5 fw-bold mb-3">Why <span class="text-theme-accent">Choose Us?</span></h2>
                <p class="text-muted">At Catering Service, we go beyond serving food — we deliver excellence, reliability, and unforgettable experiences.</p>
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
       8. OUR PRESENCE — 3D FLIP CARD SWIPER (Y-AXIS FLIP ON HOVER)
    ========================================================= -->
    <section class="py-5 bg-light" id="venuesSection">
        <div class="container py-4">
            <div class="d-flex flex-wrap justify-content-between align-items-end mb-4" data-aos="fade-up">
                <div>
                    <span class="badge-theme mb-2">Our Presence</span>
                    <h2 class="display-5 fw-bold mb-0">Enlisted <span class="text-theme-accent">Convention Venues</span></h2>
                    <p class="text-muted mt-2 mb-0">Hover over each card to discover more about our enlisted venues.</p>
                </div>
                <div class="d-flex gap-2 mt-3 mt-md-0">
                    <div class="slider-control-btn venues-prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="slider-control-btn venues-next"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>

            <div class="swiper swiper-venues" data-aos="fade-up" data-aos-delay="150">
                <div class="swiper-wrapper">

                    <!-- Venue 1: Raowa Club -->
                    <div class="swiper-slide">
                        <div class="venue-flip-card">
                            <div class="venue-flip-inner">
                                <!-- Front -->
                                <div class="venue-flip-front">
                                    <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?q=80&w=2069&auto=format&fit=crop" alt="Raowa Club">
                                    <div class="venue-flip-front-overlay">
                                        <span class="badge bg-danger rounded-pill mb-1 px-3">Military Enlisted</span>
                                        <h5 class="fw-bold font-rajdhani text-white mb-0">Raowa Convention Hall</h5>
                                        <small><i class="fas fa-map-marker-alt text-warning me-1"></i> Mohakhali, Dhaka</small>
                                    </div>
                                </div>
                                <!-- Back -->
                                <div class="venue-flip-back">
                                    <div class="venue-flip-back-icon">
                                        <i class="fas fa-archway"></i>
                                    </div>
                                    <h4>Raowa Convention Hall</h4>
                                    <p>A prestigious military-enlisted banquet hall in Mohakhali, trusted for grand weddings and diplomatic receptions for 1000+ guests.</p>
                                    <a href="#quoteSection" class="venue-book-btn">Book This Venue <i class="fas fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Venue 2: Blue Sky -->
                    <div class="swiper-slide">
                        <div class="venue-flip-card">
                            <div class="venue-flip-inner">
                                <div class="venue-flip-front">
                                    <img src="https://images.unsplash.com/photo-1478147427282-58a87a120781?q=80&w=2070&auto=format&fit=crop" alt="Blue Sky">
                                    <div class="venue-flip-front-overlay">
                                        <span class="badge bg-primary rounded-pill mb-1 px-3">Convention Center</span>
                                        <h5 class="fw-bold font-rajdhani text-white mb-0">Blue Sky Convention</h5>
                                        <small><i class="fas fa-map-marker-alt text-warning me-1"></i> Mirpur, Dhaka</small>
                                    </div>
                                </div>
                                <div class="venue-flip-back">
                                    <div class="venue-flip-back-icon">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <h4>Blue Sky Convention</h4>
                                    <p>A spacious and fully air-conditioned convention center in Mirpur, ideal for large wedding receptions and corporate gala dinners.</p>
                                    <a href="#quoteSection" class="venue-book-btn">Book This Venue <i class="fas fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Venue 3: Sena Prangon -->
                    <div class="swiper-slide">
                        <div class="venue-flip-card">
                            <div class="venue-flip-inner">
                                <div class="venue-flip-front">
                                    <img src="https://images.unsplash.com/photo-1515169067868-5387ec183754?q=80&w=2070&auto=format&fit=crop" alt="Sena Prangon">
                                    <div class="venue-flip-front-overlay">
                                        <span class="badge bg-danger rounded-pill mb-1 px-3">Defense Venue</span>
                                        <h5 class="fw-bold font-rajdhani text-white mb-0">Sena Prangon</h5>
                                        <small><i class="fas fa-map-marker-alt text-warning me-1"></i> Mohakhali, Dhaka</small>
                                    </div>
                                </div>
                                <div class="venue-flip-back">
                                    <div class="venue-flip-back-icon">
                                        <i class="fas fa-monument"></i>
                                    </div>
                                    <h4>Sena Prangon</h4>
                                    <p>A premier defense-enlisted banquet venue in Mohakhali, favored for high-profile military receptions and corporate seminars.</p>
                                    <a href="#quoteSection" class="venue-book-btn">Book This Venue <i class="fas fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Venue 4: Senakunja -->
                    <div class="swiper-slide">
                        <div class="venue-flip-card">
                            <div class="venue-flip-inner">
                                <div class="venue-flip-front">
                                    <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=2070&auto=format&fit=crop" alt="Senakunja">
                                    <div class="venue-flip-front-overlay">
                                        <span class="badge bg-warning text-dark rounded-pill mb-1 px-3">Royal Cantonment</span>
                                        <h5 class="fw-bold font-rajdhani text-white mb-0">Senakunja Hall</h5>
                                        <small><i class="fas fa-map-marker-alt text-warning me-1"></i> Dhaka Cantonment</small>
                                    </div>
                                </div>
                                <div class="venue-flip-back">
                                    <div class="venue-flip-back-icon">
                                        <i class="fas fa-hotel"></i>
                                    </div>
                                    <h4>Senakunja Hall</h4>
                                    <p>Dhaka's most exclusive cantonment banquet venue, known for hosting grand wedding celebrations and elite social gatherings.</p>
                                    <a href="#quoteSection" class="venue-book-btn">Book This Venue <i class="fas fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Pagination Dots -->
                <div class="swiper-pagination venues-pagination"></div>
            </div>
        </div>
    </section>

    <!-- =========================================================
       9. CEO MESSAGE SECTION
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
       10. FILTERABLE PHOTO GALLERY (GLIGHTBOX PLUGIN)
    ========================================================= -->
    <section class="py-5 bg-light" id="gallerySection">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-4" data-aos="fade-up">
                <span class="badge-theme mb-2">Visual Experience</span>
                <h2 class="display-5 fw-bold mb-3">Our Event <span class="text-theme-accent">Photo Showcase</span></h2>
                <p class="text-muted">Explore authentic high-resolution glimpses of our catering setups, grand presentation, and dishes.</p>
            </div>

            <!-- Filter Buttons -->
            <div class="text-center mb-4" data-aos="fade-up">
                <button class="gallery-filter-btn active" data-filter="all">All Photos</button>
                <button class="gallery-filter-btn" data-filter="weddings">Weddings</button>
                <button class="gallery-filter-btn" data-filter="dishes">Signature Dishes</button>
                <button class="gallery-filter-btn" data-filter="venues">Venues</button>
            </div>

            <!-- Gallery Grid -->
            <div class="row g-4" id="galleryGrid">
                <div class="col-md-6 col-lg-4 gallery-item" data-category="weddings" data-aos="zoom-in">
                    <div class="gallery-item-box">
                        <img src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=800&auto=format&fit=crop" alt="Royal Wedding Setup">
                        <a href="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=2070&auto=format&fit=crop" class="glightbox gallery-item-overlay" data-gallery="event-gallery" data-title="Royal Wedding Banquet Setup">
                            <div class="gallery-zoom-icon"><i class="fas fa-search-plus"></i></div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 gallery-item" data-category="dishes" data-aos="zoom-in">
                    <div class="gallery-item-box">
                        <img src="https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=800&auto=format&fit=crop" alt="Shahi Biryani Feast">
                        <a href="https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=2070&auto=format&fit=crop" class="glightbox gallery-item-overlay" data-gallery="event-gallery" data-title="Authentic Shahi Kacchi Feast">
                            <div class="gallery-zoom-icon"><i class="fas fa-search-plus"></i></div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 gallery-item" data-category="venues" data-aos="zoom-in">
                    <div class="gallery-item-box">
                        <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=800&auto=format&fit=crop" alt="Raowa Convention Banquet">
                        <a href="https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=2069&auto=format&fit=crop" class="glightbox gallery-item-overlay" data-gallery="event-gallery" data-title="Raowa Convention Hall Catering">
                            <div class="gallery-zoom-icon"><i class="fas fa-search-plus"></i></div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 gallery-item" data-category="weddings" data-aos="zoom-in">
                    <div class="gallery-item-box">
                        <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?q=80&w=800&auto=format&fit=crop" alt="Holud Stage Service">
                        <a href="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?q=80&w=2069&auto=format&fit=crop" class="glightbox gallery-item-overlay" data-gallery="event-gallery" data-title="Traditional Holud Ceremony Setup">
                            <div class="gallery-zoom-icon"><i class="fas fa-search-plus"></i></div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 gallery-item" data-category="dishes" data-aos="zoom-in">
                    <div class="gallery-item-box">
                        <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?q=80&w=800&auto=format&fit=crop" alt="Gourmet Desserts">
                        <a href="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?q=80&w=2070&auto=format&fit=crop" class="glightbox gallery-item-overlay" data-gallery="event-gallery" data-title="Traditional Desserts & Drinks">
                            <div class="gallery-zoom-icon"><i class="fas fa-search-plus"></i></div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 gallery-item" data-category="venues" data-aos="zoom-in">
                    <div class="gallery-item-box">
                        <img src="https://images.unsplash.com/photo-1478147427282-58a87a120781?q=80&w=800&auto=format&fit=crop" alt="Senakunja Hall Setup">
                        <a href="https://images.unsplash.com/photo-1478147427282-58a87a120781?q=80&w=2070&auto=format&fit=crop" class="glightbox gallery-item-overlay" data-gallery="event-gallery" data-title="Senakunja Grand Dining Hall">
                            <div class="gallery-zoom-icon"><i class="fas fa-search-plus"></i></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================
       11. TESTIMONIALS SECTION
    ========================================================= -->
    <section class="py-5" id="testimonialsSection">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5" data-aos="fade-up">
                <span class="badge-theme mb-2">Client Reviews</span>
                <h2 class="display-5 fw-bold mb-3">What Our <span class="text-theme-accent">Clients Say</span></h2>
                <p class="text-muted">Real experiences shared by clients who trusted us with their most cherished events.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-4 rounded-4 border bg-card h-100 shadow-sm">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <img src="https://ui-avatars.com/api/?name=Mamun+Chowdhury&background=0d4d2e&color=fff" class="rounded-circle" width="50" height="50" alt="Client">
                            <div>
                                <h6 class="fw-bold mb-0">Mamun Chowdhury</h6>
                                <div class="text-warning fs-7"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                <small class="text-muted">Wedding Ceremony | 1200 Guests</small>
                            </div>
                        </div>
                        <p class="text-muted fs-7 mb-0">"The Kacchi Biryani was exceptional and hot! Serving staff managed 1200+ guests effortlessly at Raowa Club. Highly recommended!"</p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-4 rounded-4 border bg-card h-100 shadow-sm">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <img src="https://ui-avatars.com/api/?name=Fahad+Aslam&background=ae2d1b&color=fff" class="rounded-circle" width="50" height="50" alt="Client">
                            <div>
                                <h6 class="fw-bold mb-0">Fahad Bin Aslam</h6>
                                <div class="text-warning fs-7"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                <small class="text-muted">Corporate Gala Dinner</small>
                            </div>
                        </div>
                        <p class="text-muted fs-7 mb-0">"NCS handled our annual corporate event with extreme professionalism. Hygiene, prompt timing, and taste were top notch."</p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="p-4 rounded-4 border bg-card h-100 shadow-sm">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <img src="https://ui-avatars.com/api/?name=Salim+Reja&background=1e3799&color=fff" class="rounded-circle" width="50" height="50" alt="Client">
                            <div>
                                <h6 class="fw-bold mb-0">Salim Reja</h6>
                                <div class="text-warning fs-7"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                <small class="text-muted">Holud & Reception</small>
                            </div>
                        </div>
                        <p class="text-muted fs-7 mb-0">"Everything was seamless. Guests praised the Borhani, Firni, and Roast. Chairman Catering Service himself ensured top quality."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================
       12. RESERVATION & QUOTE FORM
    ========================================================= -->
    <section class="py-5" id="quoteSection">
        <div class="container py-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-5" data-aos="fade-right">
                    <span class="badge-theme mb-2">Book Your Event</span>
                    <h2 class="display-6 fw-bold mb-3">Reserve Your <span class="text-theme-accent">Catering Service</span></h2>
                    <p class="text-muted mb-4">Plan your menu with our event consultants today. Fill in your requirements for a prompt quotation.</p>

                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="stat-icon-wrapper" style="width: 48px; height: 48px; font-size: 1.2rem;">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">Direct Hotline</h6>
                                <small class="text-muted">01711-306501 / 01746-710102</small>
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
                        <h4 class="fw-bold font-rajdhani text-theme-primary mb-4">Request Event Quotation</h4>
                        <form id="reservationForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label font-rajdhani fw-semibold fs-7 mb-1">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-rajdhani fw-semibold fs-7 mb-1">Phone Number</label>
                                    <input type="tel" class="form-control" placeholder="017XX-XXXXXX" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-rajdhani fw-semibold fs-7 mb-1">Event Type</label>
                                    <select class="form-select" required>
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
                                    <input type="date" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-rajdhani fw-semibold fs-7 mb-1">Estimated Guests</label>
                                    <input type="number" class="form-control" placeholder="e.g. 500" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-rajdhani fw-semibold fs-7 mb-1">Venue / Location</label>
                                    <input type="text" class="form-control" placeholder="Convention Hall Name / Area">
                                </div>
                                <div class="col-12">
                                    <label class="form-label font-rajdhani fw-semibold fs-7 mb-1">Special Requirements / Menu Choices</label>
                                    <textarea class="form-control" rows="3" placeholder="Specify menu preferences, Kacchi type, dessert choices..."></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-theme-accent btn-lg w-100 rounded-pill text-white fw-bold">Submit Booking Request <i class="fas fa-paper-plane ms-2"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

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












    <!-- About Section -->
    <section class="about-section" style="background-image: url({{asset('frontend/images/pages/bg-about-us.jpg') }});">
        <div class="auto-container">
            <div class="row no-gutters">
                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="title-box wow fadeInLeft" data-wow-delay='1200ms'>
                            <h2>ABOUT <br> US</h2>
                        </div>
                        <div class="image-box">
                            <figure class="alphabet-img wow fadeInRight">
                                <img loading="lazy" src="{{asset('frontend')}}/images/pages/about-us-1.png" alt="">
                            </figure>
                            <figure class="image wow fadeInRight" data-wow-delay='600ms'>
                                <img loading="lazy" src="{{asset('frontend')}}/images/pages/about-us-2.jpg" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInLeft">
                        <div class="content-box">
                            <div class="title">
                                <h2>{{ $story->title ?? 'Our Company' }}</h2>
                            </div>
                            <div class="text">{!! $story->content !!}</div>
                            <div class="link-box">
                                <a href="{{ route('page.about-us') }}" class="theme-btn btn-style-one">About Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End About Section -->

    <!-- Services Section -->
    @if ($services->isNotEmpty())
        <section class="services-section">
            <div class="upper-box" style="background-image: url({{asset('frontend')}}/images/pages/bg-service.jpg);">
                <div class="auto-container">
                    <div class="sec-title text-center light">
                        <span class="float-text">Service</span>
                        <h2>Our Service</h2>
                    </div>
                </div>
            </div>

            <div class="services-box">
                <div class="auto-container">
                    <div class="services-carousel owl-carousel owl-theme">
                        @foreach($services as $service)
                            <!-- Service Block -->
                            <div class="service-block">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image">
                                            <a href="{{ route('page.services-details', $service->slug) }}">
                                                <img loading="lazy"
                                                    src="{{ asset($service->media->where('is_main', 1)->first()?->path) }}"
                                                    alt="{{ $service->title }}">
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="lower-content">
                                        <h3>
                                            <a href="{{ route('page.services-details', $service->slug) }}">
                                                {{ $service->title }}
                                            </a>
                                        </h3>
                                        <div class="text">{{ Str::limit($service->description, 100) }}</div>
                                        <div class="link-box">
                                            <a href="{{ route('page.services-details', $service->slug) }}">
                                                Learn More <i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--End Services Section -->

    <!-- Achievement Section -->
    @if ($achievements->isNotEmpty())
        <section class="fun-fact-section">
            <div class="outer-box"
                style="background: linear-gradient(rgb(0 0 0 / 80%), rgb(0 0 0 / 80%)), url({{ asset('frontend/images/pages/bg-achievement.jpg') }}); background-size: cover; background-position: center;">
                <div class="auto-container">
                    <div class="fact-counter">
                        <div class="row">
                            @foreach($achievements as $index => $achievement)
                                <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp"
                                    data-wow-delay="{{ $index * 400 }}ms">
                                    <div class="count-box">
                                        <div class="count">
                                            <span class="count-text" data-speed="5000"
                                                data-stop="{{ $achievement->count ?? 0 }}">0</span>
                                            {{ $achievement->suffix ?? '' }}
                                        </div>
                                        <h4 class="counter-title">{!! nl2br($achievement->title) !!}</h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- End Achievement Section -->

    <!-- Project Section -->
    @if ($projects->isNotEmpty())
        <section class="projects-section">
            <div class="auto-container">
                <div class="sec-title text-right">
                    <span class="float-text">Project</span>
                    <h2>Our Project</h2>
                </div>
            </div>

            <div class="inner-container">
                <div class="projects-carousel owl-carousel owl-theme">
                    @foreach($projects as $project)
                        <div class="project-block">
                            <div class="image-box">
                                @php
                                    $defaultImage = $project->media->where('is_main', true)->first();
                                    $imagePath = $defaultImage ? asset($defaultImage->path) : asset('images/placeholder.jpg');
                                @endphp
                                <figure class="image">
                                    <img loading="lazy" src="{{ $imagePath }}" alt="{{ $project->title }}"
                                        style="aspect-ratio:1/1">
                                </figure>
                                <div class="overlay-box">
                                    <h4>
                                        <a href="{{ route('page.projects-details', $project->slug) }}">
                                            {{ $project->title }}
                                        </a>
                                    </h4>
                                    <div class="btn-box">
                                        <a href="{{ $imagePath }}" class="lightbox-image" data-fancybox="gallery">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <a href="{{ route('page.projects-details', $project->slug) }}">
                                            <i class="fa fa-external-link"></i>
                                        </a>
                                    </div>
                                    <span class="tag">{{ $project->category->category_name ?? 'Uncategorized' }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--End Project Section -->


    <!-- Team Section -->
    @if ($teams->isNotEmpty())
        <section class="team-section">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <span class="title">Our Team</span>
                    <h2>Perfect Expert</h2>
                </div>

                <div class="row clearfix">
                    @foreach($teams as $team)
                        <!-- Team Block -->
                        <div class="team-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image-box">
                                    <div class="image">
                                        <a href="#">
                                            <img loading="lazy" src="{{ asset($team->image) }}" alt="{{ $team->name }}">
                                        </a>
                                    </div>
                                    <ul class="social-links">
                                        @if($team->facebook)
                                            <li><a href="{{ $team->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                        @endif
                                        @if($team->twitter)
                                            <li><a href="{{ $team->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                        @endif
                                        @if($team->instagram)
                                            <li><a href="{{ $team->instagram }}"><i class="fa fa-instagram"></i></a></li>
                                        @endif
                                        @if($team->linkedin)
                                            <li><a href="{{ $team->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                                        @endif
                                    </ul>
                                    <h3 class="name">
                                        <a href="#">{{ $team->name }}</a>
                                    </h3>
                                </div>
                                <span class="designation">{{ $team->designation ?? 'Team Member' }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--End Team Section-->


    <!-- Testimonial Section -->
    @if ($testimonials->isNotEmpty())
        <section class="testimonial-section">
            <div class="outer-container clearfix">
                <!-- Title Column -->
                <div class="title-column clearfix">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="float-text">Testimonial</span>
                            <h2>{{ data_get($page->content, 'testimonial.title', 'What Client Says') }}</h2>
                        </div>
                        <div class="text">
                            {{ data_get($page->content, 'testimonial.sub_title', 'Our clients trust us for our expertise and honesty. We deliver smart software solutions that help businesses grow, with a focus on quality, transparency, and long-term success.') }}
                        </div>
                    </div>
                </div>

                <!-- Testimonial Column -->
                <div class="testimonial-column clearfix"
                    style="background-image: url({{ asset('frontend/images/pages/bg-testimonial.jpg') }});">
                    <div class="inner-column">
                        <div class="testimonial-carousel owl-carousel owl-theme">
                            @foreach($testimonials as $testimonial)
                                <div class="testimonial-block">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <img loading="lazy" src="{{ asset($testimonial->image ?? 'images/profile.jpg') }}"
                                                alt="{{ $testimonial->client_name }}">
                                        </div>
                                        <div class="text">{{ $testimonial->content }}</div>
                                        <div class="info-box">
                                            <h4 class="name">{{ $testimonial->client_name }}</h4>
                                            @if($testimonial->position || $testimonial->company)
                                                <span class="designation">
                                                    {{ $testimonial->position }}{{ $testimonial->position && $testimonial->company ? ', ' : '' }}{{ $testimonial->company }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- End Testimonial Section -->


    <!-- News Section -->
    @if ($blogPosts->isNotEmpty())
        <section class="news-section">
            <div class="auto-container">
                <div class="sec-title">
                    <span class="float-text">Blogs</span>
                    <h2>News & Articles</h2>
                </div>
                <div class="row">
                    @forelse($blogPosts as $post)
                        <!-- News Block -->
                        <div class="news-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image-box">
                                    @if($post->main_image)
                                        <figure class="image">
                                            <img loading="lazy" src="{{ asset($post->main_image->path) }}" alt="{{ $post->title }}">
                                        </figure>
                                    @else
                                        <figure class="image">
                                            <img loading="lazy" src="{{ asset('images/placeholder/blog-placeholder.jpg') }}"
                                                alt="{{ $post->title }}">
                                        </figure>
                                    @endif
                                    <div class="overlay-box">
                                        <a href="{{ route('page.blogs-details', $post->slug) }}">
                                            <i class="fa fa-link"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="caption-box">
                                    <h3>
                                        <a href="{{ route('page.blogs-details', $post->slug) }}" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;" title="{{ $post->title }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                    <ul class="info">
                                        <li>{{ $post->published_date ? $post->published_date->format('d M Y') : 'Not published' }},
                                        </li>
                                        <li>{{ $post->author->name }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- No Posts Message -->
                        <div class="col-12">
                            <div class="alert alert-info text-center">
                                <p>No blog posts available yet. Check back soon!</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    @endif
    <!--End News Section -->

    <!--Clients Section-->
    @if ($clients->isNotEmpty())
        <section class="clients-section">
            <div class="inner-container">
                <div class="sponsors-outer">
                    <!--Sponsors Carousel-->
                    <ul class="sponsors-carousel owl-carousel owl-theme">
                        @foreach($clients as $client)
                            <li class="slide-item">
                                <figure class="image-box">
                                    <a href="{{ $client->url ?: '#' }}">
                                        <img loading="lazy" src="{{ asset($client->logo) }}" alt="{{ $client->name }}">
                                    </a>
                                </figure>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    @endif
    <!--End Clients Section-->

</x-frontend-layout>
