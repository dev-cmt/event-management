<!-- =========================================================
       13. FOOTER SECTION
    ========================================================= -->
<footer>
    <div class="container">
        <div class="row g-4 pb-5 border-bottom border-secondary border-opacity-25">

            <!-- Company Info & Social Links -->
            <div class="col-lg-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset($settings?->logo ?? 'catering_logo.png') }}" height="50" alt="{{ $settings?->site_name ?? 'Logo' }}">
                    </a>
                </div>
                <p class="text-white fs-7 mb-0">
                    {{ $settings?->about_text ?? 'Delivering culinary excellence and unforgettable event experiences across Dhaka for over 34 years.' }}
                </p>
                <div class="d-flex gap-3 fs-5 mt-3">
                    @if(!empty($settings?->facebook))
                        <a href="{{ $settings->facebook }}" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if(!empty($settings?->youtube))
                        <a href="{{ $settings->youtube }}" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    @endif
                    @if(!empty($settings?->linkedin))
                        <a href="{{ $settings->linkedin }}" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    @endif
                    @if(!empty($settings?->instagram))
                        <a href="{{ $settings->instagram }}" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    @endif
                </div>
            </div>

            <!-- Dynamic Office Locations -->
            @forelse($offices ?? [] as $office)
                <div class="col-md-4 {{ $loop->first ? 'col-lg-3' : ($loop->last ? 'col-lg-3' : 'col-lg-2') }}">
                    <h5>{{ $office->name }}</h5>
                    <ul class="list-unstyled">
                        @if($office->address)
                            <li class="mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i> {{ $office->address }}
                            </li>
                        @endif
                        @if($office->phone)
                            <li>
                                <i class="fas fa-phone-alt me-2"></i>
                                @if(is_array($office->phone))
                                    {{ implode(', ', $office->phone) }}
                                @else
                                    <a href="tel:{{ $office->phone }}" class="text-decoration-none text-reset">{{ $office->phone }}</a>
                                @endif
                            </li>
                        @endif
                    </ul>
                </div>
            @empty
                <!-- Fallback Static / Hardcoded Offices if database model isn't passed -->
                <div class="col-md-4 col-lg-3">
                    <h5>Mohammadpur Office</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> 88/A, Sher-Shah-Suri Road, Baitul Falah Masjid Market, 2nd Floor, Mohammadpur, Dhaka-1207</li>
                        <li><i class="fas fa-phone-alt me-2"></i> <a href="tel:01711306501" class="text-reset text-decoration-none">01711-306501</a>, <a href="tel:01746710102" class="text-reset text-decoration-none">01746-710102</a></li>
                    </ul>
                </div>

                <div class="col-md-4 col-lg-2">
                    <h5>Adabor Office</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> 4/1, Main Road, Block-A, Noboday Housing Society, Adabor, Dhaka-1207</li>
                        <li><i class="fas fa-phone-alt me-2"></i> <a href="tel:01711306501" class="text-reset text-decoration-none">01711-306501</a></li>
                    </ul>
                </div>

                <div class="col-md-4 col-lg-3">
                    <h5>Uttara Office</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> Plot #20, Road #13D, Sector #6, Uttara, Dhaka-1230</li>
                        <li><i class="fas fa-phone-alt me-2"></i> <a href="tel:01761339553" class="text-reset text-decoration-none">01761-339553</a>, <a href="tel:01773872670" class="text-reset text-decoration-none">01773-872670</a></li>
                    </ul>
                </div>
            @endforelse

        </div>

        <!-- Copyright Text -->
        <div class="text-center pt-4 fs-7 text-muted">
            {!! $settings?->copyright_text ?? '&copy; ' . date('Y') . ' CATERING SERVICE. All Rights Reserved. Crafted with Modern UI standards.' !!}
        </div>
    </div>
</footer>
