<x-backend-layout title="SEO Setting">
    @push('css')
        <link rel="stylesheet" href="{{asset('backend/libs/summernote/summernote-lite.min.css')}}" />
        <style>
            .nav-tabs .nav-link {
                border-radius: 8px 8px 0 0;
                padding: 12px 20px;
                font-weight: 500;
                color: #555;
            }

            .nav-tabs .nav-link.active {
                background: #fdfdfd;
                border-bottom: 2px solid var(--primary-color, #5e72e4);
                color: var(--primary-color, #5e72e4);
            }

            .nav-tabs .nav-link i {
                margin-right: 8px;
            }

            label {
                font-weight: 500;
                color: #4a5568;
                margin-bottom: 0.5rem;
            }

            .page-section-header {
                padding-bottom: 1rem;
                border-bottom: 2px solid #f1f5f9;
                display: flex;
                align-items: center;
            }

            .page-section-header h4 {
                margin-bottom: 0;
                font-weight: 700;
                color: #2d3748;
            }

            .section-icon {
                width: 40px;
                height: 40px;
                background: rgba(94, 114, 228, 0.1);
                color: #5e72e4;
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-right: 12px;
            }
        </style>
    @endpush

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Page Content Management</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Settings</li>
                </ol>
            </nav>
        </div>
    </div>


    <ul class="nav nav-tabs mb-4" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" data-bs-toggle="tab" role="tab" href="#home-tab">
                <i class="ri-home-4-line"></i> Home Page
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" role="tab" href="#about-tab">
                <i class="ri-information-line"></i> About Page
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" role="tab" href="#service-tab">
                <i class="ri-settings-5-line"></i> Services Page
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" role="tab" href="#enlistment-tab">
                <i class="ri-article-line"></i> Enlistments Page
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" role="tab" href="#contact-tab">
                <i class="ri-contacts-book-line"></i> Contact Page
            </a>
        </li>
    </ul>
    <div class="tab-content border-0 p-0 shadow-none">

        <!--Home Page-->
        <div class="tab-pane active show" id="home-tab" role="tabpanel">
            <form action="{{ route('settings.pages-content.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="slug" value="home">
                <div class="row">
                    <div class="col-xl-6 mb-3">
                        <div class="card custom-card mb-0">
                            <div class="card-header justify-content-between align-items-center">
                                <div class="card-title">Our Story</div>
                                @can('view story')
                                    <a href="{{ route('story.index') }}" class="btn btn-sm btn-outline-primary py-0">
                                        <i class="ri-edit-2-line">Content Edit</i>
                                    </a>
                                @endcan
                            </div>
                            <div class="card-body row">
                                <div class="col-md-4 mb-3">
                                    <label>Badge Text</label>
                                    <input type="text" name="content[our_story][badge_text]" class="form-control" placeholder="Our Story"
                                        value="{{ data_get($pages['home']->content, 'our_story.badge_text') }}">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label>Title</label>
                                    <input type="text" name="content[our_story][title]" class="form-control"
                                        placeholder="Our Story"
                                        value="{{ data_get($pages['home']->content, 'our_story.title') }}">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Sub Title</label>
                                    <textarea name="content[our_story][sub_title]"
                                        class="form-control">{{ data_get($pages['home']->content, 'our_story.sub_title') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 mb-3">
                        <div class="card custom-card mb-0">
                            <div class="card-header justify-content-between align-items-center">
                                <div class="card-title">Services</div>
                                @can('view services')
                                    <a href="{{ route('services.index') }}" class="btn btn-sm btn-outline-primary py-0">
                                        <i class="ri-edit-2-line">Content Edit</i>
                                    </a>
                                @endcan
                            </div>
                            <div class="card-body row">
                                <div class="col-md-4 mb-3">
                                    <label>Badge Text</label>
                                    <input type="text" name="content[services][badge_text]" class="form-control"
                                        placeholder="Our Services"
                                        value="{{ data_get($pages['home']->content, 'services.badge_text') }}">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label>Title</label>
                                    <input type="text" name="content[services][title]" class="form-control"
                                        placeholder="Our Services"
                                        value="{{ data_get($pages['home']->content, 'services.title') }}">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Sub Title</label>
                                    <textarea name="content[services][sub_title]"
                                        class="form-control">{{ data_get($pages['home']->content, 'services.sub_title') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Why Choose Us Section -->
                    <div class="col-xl-6 mb-3">
                        <div class="card custom-card mb-0">
                            <div class="card-header">
                                <div class="card-title">Why Choose Us (Trusted Choice)</div>
                            </div>
                            <div class="card-body row">
                                <div class="col-md-4 mb-3">
                                    <label>Badge Text</label>
                                    <input type="text" name="content[why_us][badge_text]" class="form-control"
                                        placeholder="Trusted Choice"
                                        value="{{ data_get($pages['home']->content, 'why_us.badge_text', 'Trusted Choice') }}">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label>Title</label>
                                    <input type="text" name="content[why_us][title]" class="form-control"
                                        placeholder="Why Choose Catering Service"
                                        value="{{ data_get($pages['home']->content, 'why_us.title', 'Why Choose Catering Service') }}">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Sub Title</label>
                                    <textarea name="content[why_us][sub_title]"
                                        class="form-control" rows="2">{{ data_get($pages['home']->content, 'why_us.sub_title') }}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Right Column Description</label>
                                    <textarea name="content[why_us][description]"
                                        class="form-control summernote" rows="4">{{ data_get($pages['home']->content, 'why_us.description') }}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Center Image (Chef / Rotating Image)</label>
                                    <input type="file" name="why_us_image" class="form-control">
                                    @if(data_get($pages['home']->content, 'why_us.image'))
                                        <div class="mt-2 p-2 border rounded bg-light d-inline-block">
                                            <img src="{{ asset(data_get($pages['home']->content, 'why_us.image')) }}" width="120" class="img-thumbnail rounded mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remove_why_us_image" id="remove_why_us_img" value="1">
                                                <label class="form-check-label text-danger fs-12" for="remove_why_us_img">Remove image</label>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CEO Message Section -->
                    <div class="col-xl-6 mb-3">
                        <div class="card custom-card mb-0">
                            <div class="card-header">
                                <div class="card-title">CEO / Leadership Message Section</div>
                            </div>
                            <div class="card-body row">
                                <div class="col-md-4 mb-3">
                                    <label>Badge Text</label>
                                    <input type="text" name="content[ceo][badge_text]" class="form-control"
                                        placeholder="Leadership Message"
                                        value="{{ data_get($pages['home']->content, 'ceo.badge_text', 'Leadership Message') }}">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label>Title</label>
                                    <input type="text" name="content[ceo][title]" class="form-control"
                                        placeholder="Message From The Chairman & CEO"
                                        value="{{ data_get($pages['home']->content, 'ceo.title', 'Message From The Chairman & CEO') }}">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Quote / Subheading</label>
                                    <input type="text" name="content[ceo][quote]" class="form-control"
                                        placeholder="সংগ্রাম থেকেই স্বপ্নের শুরু। বিশ্বাস থেকেই প্রতিষ্ঠার গল্প।"
                                        value="{{ data_get($pages['home']->content, 'ceo.quote') }}">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Full Message Body</label>
                                    <textarea name="content[ceo][description]"
                                        class="form-control summernote" rows="4">{{ data_get($pages['home']->content, 'ceo.description') }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>CEO / Leader Name</label>
                                    <input type="text" name="content[ceo][name]" class="form-control"
                                        placeholder="— ক্যাটরিন"
                                        value="{{ data_get($pages['home']->content, 'ceo.name') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Designation</label>
                                    <input type="text" name="content[ceo][designation]" class="form-control"
                                        placeholder="চেয়ারম্যান ও ব্যবস্থাপনা পরিচালক, Catering Service"
                                        value="{{ data_get($pages['home']->content, 'ceo.designation') }}">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>CEO Profile Image</label>
                                    <input type="file" name="ceo_image" class="form-control">
                                    @if(data_get($pages['home']->content, 'ceo.image'))
                                        <div class="mt-2 p-2 border rounded bg-light d-inline-block">
                                            <img src="{{ asset(data_get($pages['home']->content, 'ceo.image')) }}" width="120" class="img-thumbnail rounded mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remove_ceo_image" id="remove_ceo_img" value="1">
                                                <label class="form-check-label text-danger fs-12" for="remove_ceo_img">Remove CEO image</label>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 mb-3">
                        <div class="card custom-card mb-0">
                            <div class="card-header justify-content-between align-items-center">
                                <div class="card-title">Enlistments</div>
                                @can('view enlistments')
                                    <a href="{{ route('enlistments.index') }}" class="btn btn-sm btn-outline-primary py-0">
                                        <i class="ri-edit-2-line">Content Edit</i>
                                    </a>
                                @endcan
                            </div>
                            <div class="card-body row">
                                <div class="col-md-4 mb-3">
                                    <label>Badge Text</label>
                                    <input type="text" name="content[enlisted][badge_text]" class="form-control"
                                        placeholder="Enlisted Badge"
                                        value="{{ data_get($pages['home']->content, 'enlisted.badge_text') }}">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label>Title</label>
                                    <input type="text" name="content[enlisted][title]" class="form-control"
                                        placeholder="Enlisted Title"
                                        value="{{ data_get($pages['home']->content, 'enlisted.title') }}">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Sub Title</label>
                                    <textarea name="content[enlisted][sub_title]"
                                        class="form-control">{{ data_get($pages['home']->content, 'enlisted.sub_title') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 mb-3">
                        <div class="card custom-card mb-0">
                            <div class="card-header justify-content-between align-items-center">
                                <div class="card-title">Gallery</div>
                                @can('view galleries')
                                    <a href="{{ route('galleries.index') }}" class="btn btn-sm btn-outline-primary py-0">
                                        <i class="ri-edit-2-line">Content Edit</i>
                                    </a>
                                @endcan
                            </div>
                            <div class="card-body row">
                                <div class="col-md-4 mb-3">
                                    <label>Badge Text</label>
                                    <input type="text" name="content[gallery][badge_text]" class="form-control"
                                        placeholder="Gallery Badge"
                                        value="{{ data_get($pages['home']->content, 'gallery.badge_text') }}">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label>Title</label>
                                    <input type="text" name="content[gallery][title]" class="form-control"
                                        placeholder="Gallery Title"
                                        value="{{ data_get($pages['home']->content, 'gallery.title') }}">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Sub Title</label>
                                    <textarea name="content[gallery][sub_title]"
                                        class="form-control">{{ data_get($pages['home']->content, 'gallery.sub_title') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 mb-3">
                        <div class="card custom-card mb-0">
                            <div class="card-header justify-content-between align-items-center">
                                <div class="card-title">Testimonial</div>
                                @can('view testimonials')
                                    <a href="{{ route('testimonials.index') }}" class="btn btn-sm btn-outline-primary py-0">
                                        <i class="ri-edit-2-line">Content Edit</i>
                                    </a>
                                @endcan
                            </div>
                            <div class="card-body row">
                                <div class="col-md-4 mb-3">
                                    <label>Badge Text</label>
                                    <input type="text" name="content[testimonial][badge_text]" class="form-control"
                                        placeholder="Testimonial Badge"
                                        value="{{ data_get($pages['home']->content, 'testimonial.badge_text') }}">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label>Title</label>
                                    <input type="text" name="content[testimonial][title]" class="form-control"
                                        placeholder="Testimonial Title"
                                        value="{{ data_get($pages['home']->content, 'testimonial.title') }}">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Sub Title</label>
                                    <textarea name="content[testimonial][sub_title]"
                                        class="form-control">{{ data_get($pages['home']->content, 'testimonial.sub_title') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 mb-3">
                        <div class="card custom-card mb-0">
                            <div class="card-header justify-content-between align-items-center">
                                <div class="card-title">Reserve Event</div>
                            </div>
                            <div class="card-body row">
                                <div class="col-md-4 mb-3">
                                    <label>Badge Text</label>
                                    <input type="text" name="content[reserve][badge_text]" class="form-control"
                                        placeholder="Reserve Event Badge"
                                        value="{{ data_get($pages['home']->content, 'reserve.badge_text') }}">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label>Title</label>
                                    <input type="text" name="content[reserve][title]" class="form-control"
                                        placeholder="Reserve Event Title"
                                        value="{{ data_get($pages['home']->content, 'reserve.title') }}">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Sub Title</label>
                                    <textarea name="content[reserve][sub_title]"
                                        class="form-control">{{ data_get($pages['home']->content, 'reserve.sub_title') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="text-end">
                    <button class="btn btn-primary px-5 py-2 fw-bold shadow-sm">
                        <i class="ri-save-line me-1"></i> Update Home Content
                    </button>
                </div>
            </form>
        </div>

        <!--About Us Page-->
        <div class="tab-pane" id="about-tab" role="tabpanel">
            <form action="{{ route('settings.pages-content.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="slug" value="about">

                <!-- General Section -->
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Header & About Description</div>
                    </div>
                    <div class="card-body row">
                        <div class="row">
                            <div class="col-xl-6">
                                <label>Page Title</label>
                                <input type="text" name="content[header][title]" class="form-control"
                                    placeholder="About Us"
                                    value="{{ data_get($pages['about']->content, 'header.title') }}">
                            </div>
                            <div class="col-xl-6">
                                <label>Header Subtitle</label>
                                <input type="text" name="content[header][subtitle]" class="form-control"
                                    placeholder="The Interior speak for themselves"
                                    value="{{ data_get($pages['about']->content, 'header.subtitle') }}">
                            </div>
                            <div class="col-xl-12">
                                <label>About Description</label>
                                <textarea name="content[about][description]" class="form-control summernote"
                                    rows="4">{{ data_get($pages['about']->content, 'about.description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2 text-end">
                    <button class="btn btn-primary px-5 py-2 fw-bold shadow-sm">
                        <i class="ri-save-line me-1"></i> Update About Content
                    </button>
                </div>
            </form>
        </div>

        <!--Services Page-->
        <div class="tab-pane" id="service-tab" role="tabpanel">
            <form action="{{ route('settings.pages-content.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="slug" value="services">

                <div class="page-section-header">
                    <div class="section-icon"><i class="ri-settings-line fs-20"></i></div>
                    <h4>Services Header & Features</h4>
                </div>

                <div class="card custom-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <label>Header Title</label>
                                <input type="text" name="content[header][title]" class="form-control"
                                    placeholder="Services"
                                    value="{{ data_get($pages['services']->content, 'header.title') }}">
                            </div>
                            <div class="col-xl-6">
                                <label>Header Subtitle</label>
                                <input type="text" name="content[header][subtitle]" class="form-control"
                                    placeholder="The Interior speak for themselves"
                                    value="{{ data_get($pages['services']->content, 'header.subtitle') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-2 text-end">
                    <button class="btn btn-primary px-5 py-2 fw-bold shadow-sm">
                        <i class="ri-save-line me-1"></i> Update Services Content
                    </button>
                </div>
            </form>
        </div>

        <!--Enlistments Page-->
        <div class="tab-pane" id="enlistment-tab" role="tabpanel">
            <form action="{{ route('settings.pages-content.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="slug" value="enlistments">
                <div class="page-section-header">
                    <div class="section-icon"><i class="ri-article-line fs-20"></i></div>
                    <h4>Enlistments Header Settings</h4>
                </div>
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <label>Header Title</label>
                                <input type="text" name="content[header][title]" class="form-control"
                                    placeholder="Our Enlistments"
                                    value="{{ data_get($pages['enlistments']->content, 'header.title') }}">
                            </div>
                            <div class="col-xl-6">
                                <label>Header Subtitle</label>
                                <input type="text" name="content[header][subtitle]" class="form-control"
                                    placeholder="Discover our latest work"
                                    value="{{ data_get($pages['enlistments']->content, 'header.subtitle') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2 text-end">
                    <button class="btn btn-primary px-5 py-2 fw-bold shadow-sm">
                        <i class="ri-save-line me-1"></i> Update Enlistments Content
                    </button>
                </div>
            </form>
        </div>

        <!--Contact Page-->
        <div class="tab-pane" id="contact-tab" role="tabpanel">
            <form action="{{ route('settings.pages-content.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="slug" value="contact">
                <div class="page-section-header">
                    <div class="section-icon"><i class="ri-contacts-book-line fs-20"></i></div>
                    <h4>Contact Header Settings</h4>
                </div>
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <label>Header Title</label>
                                <input type="text" name="content[header][title]" class="form-control"
                                    placeholder="Contact Us"
                                    value="{{ data_get($pages['contact']->content, 'header.title') }}">
                            </div>
                            <div class="col-xl-6">
                                <label>Header Subtitle</label>
                                <input type="text" name="content[header][subtitle]" class="form-control"
                                    placeholder="Get in touch with us"
                                    value="{{ data_get($pages['contact']->content, 'header.subtitle') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2 text-end">
                    <button class="btn btn-primary px-5 py-2 fw-bold shadow-sm">
                        <i class="ri-save-line me-1"></i> Update Contact Content
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('js')
        <script src="{{asset('backend/libs/summernote/summernote-lite.min.js')}}"></script>

        <script>
            $('.summernote').summernote({
                height: 150,
            });
        </script>
    @endpush
</x-backend-layout>
