<x-frontend-layout title="About Us" :breadcrumbs="$breadcrumbs" :seotags="$seotags">
    @include('frontend.partials.detail-page-hero', [
        'heroBadge' => data_get($page->content, 'header.subtitle', 'About Us'),
        'heroTitle' => data_get($page->content, 'header.title', 'About Us'),
        'heroBreadcrumbs' => [
            ['label' => 'Home', 'url' => url('/')],
            ['label' => 'About Us', 'active' => true],
        ],
    ])

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
