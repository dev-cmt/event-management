<x-frontend-layout title="About Us" :breadcrumbs="$breadcrumbs" :seotags="$seotags">
    {{-- PAGE HERO BANNER --}}
    <section class="detail-page-hero" style="background-image: url('{{ asset('frontend/images/pages/bg-title.jpg') }}');">
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

    {{-- PAGE CONTENT --}}
    <section class="py-5 overflow-hidden">
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="content-wrapper dynamic-content p-3 p-md-4 bg-white rounded shadow-sm">
                        {!! data_get($page->content, 'about.description', '') !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* 1. Reset dynamic content wrapper */
        .dynamic-content {
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box !important;
            overflow-x: hidden; /* Prevents whole-page horizontal scroll */
            word-wrap: break-word !important;
            overflow-wrap: anywhere !important;
        }

        /* 2. Override Summernote inline widths, floats, and rigid white-spaces */
        .dynamic-content * {
            max-width: 100% !important;
            box-sizing: border-box !important;
            white-space: normal !important; /* Kills Summernote's inline white-space: nowrap */
        }

        /* 3. Fix Summernote Images */
        .dynamic-content img {
            max-width: 100% !important;
            height: auto !important;
            float: none !important; /* Removes inline float: left / float: right from Summernote */
            display: block !important;
            margin: 1rem auto !important; /* Centers images on mobile */
            border-radius: 6px;
        }

        /* 4. Fix Summernote Spans, Paragraphs, and Headings */
        .dynamic-content p,
        .dynamic-content span,
        .dynamic-content div,
        .dynamic-content h1,
        .dynamic-content h2,
        .dynamic-content h3,
        .dynamic-content h4,
        .dynamic-content h5,
        .dynamic-content h6 {
            width: auto !important; /* Overrides pixel widths added by Summernote */
            max-width: 100% !important;
        }

        /* 5. Fix Summernote Tables & Make them scrollable */
        .dynamic-content table {
            display: block !important;
            width: 100% !important;
            max-width: 100% !important;
            overflow-x: auto !important;
            -webkit-overflow-scrolling: touch;
            border-collapse: collapse !important;
            margin-bottom: 1rem !important;
        }

        .dynamic-content tbody,
        .dynamic-content tr {
            display: table !important;
            width: 100% !important;
            table-layout: fixed; /* Prevents wide text from stretching table past container */
        }

        .dynamic-content td,
        .dynamic-content th {
            width: auto !important; /* Strips Summernote inline cell widths */
            padding: 0.75rem !important;
            border: 1px solid #dee2e6 !important;
            word-break: break-word !important;
        }

        /* 6. Fix iFrames and Videos */
        .dynamic-content iframe,
        .dynamic-content video {
            max-width: 100% !important;
            height: auto !important;
        }
    </style>
</x-frontend-layout>
