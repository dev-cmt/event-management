@php
    $recentServices = \App\Models\Service::where('status', 1)
        ->latest()
        ->take(2)
        ->get();

    $recentEnlistments = \App\Models\Enlistment::active()
        ->with('media')
        ->latest()
        ->take(6)
        ->get();
@endphp

<!-- Main Footer -->
<footer class="main-footer pt-5 pb-4 text-white position-relative {{ request()->is('/') ? '' : 'alternate' }}"
        style="background-image: url('{{ asset('frontend/images/bg-offer.jpg') }}'); background-size: cover; background-position: center;">

    <div class="container position-relative z-2">
        <div class="row g-4 g-lg-5">

            <!-- Left Big Column -->
            <div class="col-xl-7 col-lg-12">
                <div class="row g-4">

                    <!-- About & Contact Widget -->
                    <div class="col-md-6 col-12">
                        <div class="footer-widget about-widget pe-md-3">
                            <div class="footer-logo text-center mb-4">
                                <a href="{{ url('/') }}" class="d-inline-block">
                                    <img loading="lazy"
                                         src="{{ asset($settings->logo ?? 'images/logo.png') }}"
                                         alt="Logo"
                                         class="footer-logo-img">
                                </a>
                            </div>

                            <div class="footer-contact-info d-flex flex-column gap-3">
                                <!-- Location -->
                                <div class="contact-item d-flex align-items-center">
                                    <div class="icon-box me-3">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="text-box">
                                        <span class="label">Location</span>
                                        <span class="value">{{ $settings->address ?? 'Address' }}</span>
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="contact-item d-flex align-items-center">
                                    <div class="icon-box me-3">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="text-box">
                                        <span class="label">Phone</span>
                                        <a href="tel:{{ $settings->phone }}" class="value link-hover">
                                            {{ $settings->phone ?? 'Phone' }}
                                        </a>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="contact-item d-flex align-items-center">
                                    <div class="icon-box me-3">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="text-box">
                                        <span class="label">Email</span>
                                        <a href="mailto:{{ $settings->email }}" class="value link-hover">
                                            {{ $settings->email ?? 'Email' }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Posts Widget -->
                    <div class="col-md-6 col-12">
                        <div class="footer-widget recent-posts">
                            <h4 class="widget-title">Services</h4>
                            <div class="widget-content d-flex flex-column gap-3">
                                @foreach($recentServices as $service)
                                    <div class="post-item d-flex align-items-center">
                                        <div class="thumb flex-shrink-0 me-3">
                                            <a href="{{ route('page.services-details', $service->slug) }}">
                                                <img loading="lazy"
                                                     src="{{ asset($service->media->where('is_main', 1)->first()?->path) }}"
                                                     alt="{{ $service->title }}"
                                                     class="img-fluid rounded">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <h6>
                                                <a href="{{ route('page.services-details', $service->slug) }}" class="text-white text-decoration-none hover-primary">
                                                    {{ $service->title }}
                                                </a>
                                            </h6>
                                            <ul class="meta-info list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <i class="fa fa-calendar-alt me-1"></i>
                                                    {{ $service->created_at->format('M d, Y') }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Right Big Column -->
            <div class="col-xl-5 col-lg-12">
                <div class="row g-4">

                    <!-- Useful Links Widget -->
                    <div class="col-md-5 col-sm-6 col-12">
                        <div class="footer-widget links-widget">
                            <h4 class="widget-title">Useful Links</h4>
                            <ul class="footer-links list-unstyled mb-0">
                                <li><a href="{{ route('page.about-us') }}">About Us</a></li>
                                <li><a href="{{ route('page.services') }}">Our Services</a></li>
                                <li><a href="{{ route('page.enlistments') }}">Enlistments</a></li>
                                <li><a href="{{ route('page.gallery') }}">Photo Gallery</a></li>
                                <li><a href="{{ route('page.contact-us') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Recent Works / Gallery Widget -->
                    <div class="col-md-7 col-sm-6 col-12">
                        <div class="footer-widget gallery-widget">
                            <h4 class="widget-title">Recent Works</h4>
                            <div class="row row-cols-3 g-2">
                                @foreach($recentEnlistments as $enlistment)
                                    @php
                                        $enlistmentImage = ($enlistment->media->where('is_main', 1)->first()?->path) ?? 'frontend/images/resource/news-1.jpg';
                                    @endphp
                                    <div class="col">
                                        <a href="{{ asset($enlistmentImage) }}" class="gallery-item glightbox" title="{{ $enlistment->title }}">
                                            <img loading="lazy"
                                                 src="{{ asset($enlistmentImage) }}"
                                                 alt="{{ $enlistment->title }}">
                                            <div class="gallery-overlay">
                                                <i class="fa fa-search-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Copyright Bottom Bar -->
        <div class="footer-bottom mt-5 pt-4 border-top border-secondary border-opacity-25 d-flex flex-column flex-md-row justify-content-center align-items-center gap-2">
            <p class="mb-0 text-white-50 small">&copy; {{ date('Y') }} {{ config('app.name', 'Pro Devs') }}. All rights reserved.</p>
        </div>

    </div>
</footer>
