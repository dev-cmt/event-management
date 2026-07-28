<!-- =========================================================
    HERO SLIDER SECTION (DYNAMIC SLIDER WITH KEN BURNS IMAGE ZOOM)
    ========================================================= -->
<section class="hero-section">
    <div id="mainHeroCarousel" class="carousel slide carousel-fade hero-carousel" data-bs-ride="carousel" data-bs-interval="6500">

        {{-- Carousel Indicators --}}
        @if(count($sliders) > 0)
            <div class="carousel-indicators">
                @foreach($sliders as $key => $slider)
                    <button type="button"
                        data-bs-target="#mainHeroCarousel"
                        data-bs-slide-to="{{ $key }}"
                        class="{{ $loop->first ? 'active' : '' }}"
                        aria-current="{{ $loop->first ? 'true' : 'false' }}">
                    </button>
                @endforeach
            </div>
        @endif

        {{-- Carousel Items --}}
        <div class="carousel-inner">
            @forelse($sliders as $key => $slider)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="hero-slide-bg" style="background-image: url('{{ asset($slider->image) }}');"></div>
                    <div class="container text-center">
                        <div class="carousel-caption">

                            {{-- Optional Badge --}}
                            @if(!empty($slider->subtitle))
                                <span class="badge badge-theme bg-white text-theme-primary mb-3 animate__animated animate__fadeInDown">
                                    <i class="fas fa-star text-warning me-1"></i>
                                    {{ $slider->subtitle }}
                                </span>
                            @endif

                            {{-- Title --}}
                            @php
                                $words = explode(' ', $slider->title);
                                $middle = ceil(count($words) / 2);

                                $line1 = implode(' ', array_slice($words, 0, $middle));
                                $line2 = implode(' ', array_slice($words, $middle));
                            @endphp

                            <h1 class="animate__animated animate__fadeInUp">
                                {{ $line1 }}
                                @if(!empty($line2))
                                    <br><span class="text-theme-accent">{{ $line2 }}</span>
                                @endif
                            </h1>

                            {{-- Subtitle / Description --}}
                            @if(!empty($slider->description))
                                <p class="fs-5 text-light opacity-90 max-w-700 mx-auto mb-4 animate__animated animate__fadeInUp animate__delay-1s">
                                    {{ $slider->description }}
                                </p>
                            @endif

                            {{-- Call-to-Action Buttons --}}
                            <div class="d-flex justify-content-center gap-3 animate__animated animate__zoomIn animate__delay-1s">
                                @if(!empty($slider->link_text) && !empty($slider->link_url))
                                    <a href="{{ $slider->link_url }}" class="btn btn-theme-accent btn-lg text-white">
                                        {{ $slider->link_text ?? 'Learn More' }}
                                    </a>
                                @endif

                                @if(!empty($slider->btn_2_text) && !empty($slider->btn_2_url))
                                    <a href="#" class="btn btn-outline-light btn-lg">
                                        Services
                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                {{-- Fallback Slide if Database is Empty --}}
                <div class="carousel-item active">
                    <div class="hero-slide-bg" style="background-image: url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=2070&auto=format&fit=crop');"></div>
                    <div class="container text-center">
                        <div class="carousel-caption">
                            <span class="badge badge-theme bg-white text-theme-primary mb-3 animate__animated animate__fadeInDown">
                                <i class="fas fa-star text-warning me-1"></i> Professional Catering Experts
                            </span>
                            <h1 class="animate__animated animate__fadeInUp">
                                Exceptional Catering For <br><span class="text-theme-accent">Every Grand Occasion</span>
                            </h1>
                            <p class="fs-5 text-light opacity-90 max-w-700 mx-auto mb-4 animate__animated animate__fadeInUp animate__delay-1s">
                                Complete culinary & banquet management for weddings, holud ceremonies, corporate galas, and grand receptions with uncompromised quality.
                            </p>
                            <div class="d-flex justify-content-center gap-3 animate__animated animate__zoomIn animate__delay-1s">
                                <a href="#quoteSection" class="btn btn-theme-accent btn-lg text-white">Book Your Event</a>
                                <a href="#servicesSection" class="btn btn-outline-light btn-lg">Explore Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Controls --}}
        @if(count($sliders) > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#mainHeroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainHeroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        @endif

    </div>
</section>
