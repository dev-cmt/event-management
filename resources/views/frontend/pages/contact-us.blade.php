<x-frontend-layout title="Contact Us" :breadcrumbs="$breadcrumbs" :seotags="$seotags">
    @push('styles')
    <style>
        .page-title-banner {
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
        }

        .sec-title-float {
            position: absolute;
            top: -1.25rem;
            left: 0;
            font-size: 3.5rem;
            font-weight: 900;
            color: rgba(0, 0, 0, 0.04);
            text-transform: uppercase;
            letter-spacing: 2px;
            user-select: none;
            pointer-events: none;
            line-height: 1;
        }

        .map-wrapper {
            min-height: 450px;
        }

        .sponsor-logo {
            max-height: 60px;
            width: auto;
            object-fit: contain;
            filter: grayscale(100%);
            opacity: 0.6;
            transition: all 0.3s ease;
        }

        .sponsor-logo:hover {
            filter: grayscale(0%);
            opacity: 1;
        }
    </style>
    @endpush

    <!-- Hero / Page Header Section -->
    <section class="page-title-banner position-relative py-5 text-white" style="background-image: url({{ asset('frontend/images/bg-title.jpg') }});">
        <!-- Dark Overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-75"></div>

        <div class="container position-relative z-1 py-4">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                <div>
                    <h1 class="fw-bold display-6 mb-1 text-white">
                        {{ data_get($page->content, 'header.title', 'Contact Us') }}
                    </h1>
                    <span class="text-light opacity-75 fs-6">
                        {{ data_get($page->content, 'header.subtitle', 'The Interior speak for themselves') }}
                    </span>
                </div>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}" class="text-white text-decoration-none hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-light opacity-75" aria-current="page">
                            Contact Us
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- Main Contact Section -->
    <section class="bg-light py-5">
        <div class="container py-4">
            <div class="row g-4 align-items-stretch">
                <!-- Left: Form & Info Blocks -->
                <div class="col-lg-7">
                    <!-- Section Title -->
                    <div class="position-relative mb-4">
                        <span class="sec-title-float">informaer</span>
                        <h2 class="fw-bold text-dark display-6 position-relative z-1 mb-0">Contact Us</h2>
                    </div>

                    <!-- Contact Form Card -->
                    <div class="card border-0 shadow-sm rounded-3 mb-4">
                        <div class="card-body p-4 p-md-5">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul class="mb-0 ps-3">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('page.contact-us.store') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control form-control-lg fs-6 bg-light" placeholder="Name" value="{{ old('name') }}" required>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" name="phone" class="form-control form-control-lg fs-6 bg-light" placeholder="Phone" required>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" name="subject" class="form-control form-control-lg fs-6 bg-light" placeholder="Subject" value="{{ old('subject') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <input type="email" name="email" class="form-control form-control-lg fs-6 bg-light" placeholder="Email" value="{{ old('email') }}" required>
                                    </div>

                                    <div class="col-12">
                                        <textarea name="message" class="form-control form-control-lg fs-6 bg-light" rows="5" placeholder="Message" required>{{ old('message') }}</textarea>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-dark btn-lg px-4 fs-6 rounded-2 shadow-sm" type="submit" name="submit-form">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Contact Info Cards -->
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm rounded-3 h-100 text-center p-3">
                                <div class="card-body">
                                    <h5 class="fw-semibold text-dark fs-6 mb-2">Location</h5>
                                    <p class="text-muted small mb-0">{{ $settings->address ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm rounded-3 h-100 text-center p-3">
                                <div class="card-body">
                                    <h5 class="fw-semibold text-dark fs-6 mb-2">Call Us</h5>
                                    <p class="text-muted small mb-0">{{ $settings->phone ?? '' }}</p>
                                    @if(!empty($settings->phone2))
                                        <p class="text-muted small mb-0">{{ $settings->phone2 }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm rounded-3 h-100 text-center p-3">
                                <div class="card-body">
                                    <h5 class="fw-semibold text-dark fs-6 mb-2">Email</h5>
                                    @if(!empty($settings->email))
                                        <p class="text-muted small mb-0">
                                            <a href="mailto:{{ $settings->email }}" class="text-muted text-decoration-none">{{ $settings->email }}</a>
                                        </p>
                                    @endif
                                    @if(!empty($settings->email2))
                                        <p class="text-muted small mb-0">
                                            <a href="mailto:{{ $settings->email2 }}" class="text-muted text-decoration-none">{{ $settings->email2 }}</a>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Map Embed Column -->
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden map-wrapper">
                        <iframe
                            src="{{ $settings->map_url ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.1842056400596!2d90.42353849999999!3d23.8120479!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c77c6962ec7d%3A0xc5de7fa8abf44395!2sEcowave%20Consultant%20Studio!5e0!3m2!1sen!2sbd!4v1757069291464!5m2!1sen!2sbd' }}"
                            class="w-100 h-100 border-0"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>
