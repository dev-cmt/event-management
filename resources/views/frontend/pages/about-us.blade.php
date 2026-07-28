<x-frontend-layout title="About Us" :breadcrumbs="$breadcrumbs" :seotags="$seotags">
    {{-- =========================================================
        PAGE HERO BANNER
    ========================================================= --}}
    <section class="detail-page-hero"
             style="background-image: url('{{ asset('frontend/images/pages/bg-title.jpg') }}');">
        <div class="detail-page-hero-overlay"></div>
        <div class="container position-relative z-2">
            <div class="row align-items-center" style="min-height:260px;">
                <div class="col-12 text-center text-white">
                    <span class="badge bg-white bg-opacity-20 text-dark fw-semibold mb-3 px-3 py-2 text-uppercase" style="letter-spacing:2px; font-size:.78rem;">
                        {{ data_get($page->content, 'header.subtitle', 'About Us') }}
                    </span>
                    <h1 class="display-5 fw-bold mb-3" style="text-shadow:0 4px 20px rgba(0,0,0,.5);">
                        {{ data_get($page->content, 'header.title', 'About Us') }}
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}" class="text-white opacity-75 text-decoration-none">Home</a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    {{-- =========================================================
        PAGE CONTENT
    ========================================================= --}}
    <section class="py-5">
        <div class="container">
            {!! data_get($page->content, 'about.description', '') !!}
        </div>
    </section>
</x-frontend-layout>
