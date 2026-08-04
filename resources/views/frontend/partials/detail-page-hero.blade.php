@php
    $heroBadge = $heroBadge ?? null;
    $heroTitle = $heroTitle ?? '';
    $heroSubtitle = $heroSubtitle ?? null;
    $heroBackgroundImage = $heroBackgroundImage ?? asset('frontend/images/bg-title.jpg');
    $heroBreadcrumbs = $heroBreadcrumbs ?? [];
    $heroAlign = $heroAlign ?? 'center';
    $heroMinHeight = $heroMinHeight ?? '260px';
    $heroAction = $heroAction ?? null;
@endphp

<section class="detail-page-hero" style="background-image: linear-gradient(rgba(8,14,28,.68), rgba(8,14,28,.58)), url('{{ $heroBackgroundImage }}');">
    <div class="detail-page-hero-overlay"></div>
    <div class="container position-relative z-2">
        <div class="detail-page-hero-inner" style="min-height: {{ $heroMinHeight }};">
            <div class="detail-page-hero-content {{ $heroAlign === 'left' ? 'is-left' : 'is-centered' }}">
                @if($heroBadge)
                    <span class="detail-page-hero-badge">{{ $heroBadge }}</span>
                @endif

                <h1 class="detail-page-hero-title">{{ $heroTitle }}</h1>

                @if($heroSubtitle)
                    <p class="detail-page-hero-subtitle">{{ $heroSubtitle }}</p>
                @endif

                @if(!empty($heroAction['label']) && !empty($heroAction['url']))
                    <div class="detail-page-hero-actions">
                        <a href="{{ $heroAction['url'] }}" class="{{ $heroAction['class'] ?? 'btn btn-light' }} rounded-pill px-4">
                            @if(!empty($heroAction['icon']))
                                <i class="{{ $heroAction['icon'] }} me-2"></i>
                            @endif
                            {{ $heroAction['label'] }}
                        </a>
                    </div>
                @endif

                @if(!empty($heroBreadcrumbs))
                    <nav aria-label="breadcrumb" class="mt-4">
                        <ol class="breadcrumb {{ $heroAlign === 'left' ? 'justify-content-start' : 'justify-content-center' }} mb-0">
                            @foreach($heroBreadcrumbs as $breadcrumb)
                                @php
                                    $breadcrumbLabel = $breadcrumb['label'] ?? '';
                                    $breadcrumbUrl = $breadcrumb['url'] ?? null;
                                    $isCurrent = $breadcrumb['active'] ?? false;
                                @endphp
                                <li class="breadcrumb-item {{ $isCurrent ? 'active text-white' : '' }}" @if($isCurrent) aria-current="page" @endif>
                                    @if(!$isCurrent && $breadcrumbUrl)
                                        <a href="{{ $breadcrumbUrl }}" class="text-white opacity-75 text-decoration-none">{{ $breadcrumbLabel }}</a>
                                    @else
                                        <span class="text-white">{{ $breadcrumbLabel }}</span>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    </nav>
                @endif
            </div>
        </div>
    </div>
</section>
