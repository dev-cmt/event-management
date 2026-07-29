<x-backend-layout title="About & Story Management">
    @push('css')
        <link rel="stylesheet" href="{{asset('backend/libs/summernote/summernote-lite.min.css')}}" />
    @endpush

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">About Section & Story Management</h1>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('story.update', $story->id) }}" method="POST" enctype="multipart/form-data"
                        id="storyForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Section Badge & Titles -->
                            {{-- <div class="col-md-6 mb-3">
                                <label for="badge_text" class="form-label">Badge Text</label>
                                <input type="text" class="form-control" id="badge_text" name="badge_text"
                                    value="{{ old('badge_text', $story->badge_text ?? 'About Our Story') }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Section Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ old('title', $story->title) }}" required>
                            </div> --}}

                            <!-- Experience Badge Settings -->
                            <div class="col-md-6 mb-3">
                                <label for="experience_years" class="form-label">Experience Counter (e.g. 30+)</label>
                                <input type="text" class="form-control" id="experience_years" name="experience_years"
                                    value="{{ old('experience_years', $story->experience_years ?? '30+') }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="experience_title" class="form-label">Experience Label (e.g. Years Heritage)</label>
                                <input type="text" class="form-control" id="experience_title" name="experience_title"
                                    value="{{ old('experience_title', $story->experience_title ?? 'Years Heritage') }}">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="content" class="form-label">Content Description</label>
                                <textarea class="form-control summernote" name="content"
                                    rows="8">{!! old('content', $story->content) !!}</textarea>
                            </div>

                            <!-- Features / Highlights -->
                            <div class="col-md-12 mb-4">
                                <div class="card border border-primary border-opacity-25 bg-light">
                                    <div class="card-header bg-transparent border-0">
                                        <h6 class="fw-bold mb-0 text-primary"><i class="fas fa-list-check me-2"></i>Feature Highlights (2 Boxes)</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @php
                                                $features = is_array($story->features) ? $story->features : [
                                                    ['icon' => 'fas fa-check-circle', 'title' => 'Large-Scale Capacity', 'subtitle' => 'Up to 30K guests at single event'],
                                                    ['icon' => 'fas fa-bolt', 'title' => '12-Hour Urgent Prep', 'subtitle' => 'Emergency catering execution']
                                                ];
                                            @endphp
                                            <div class="col-md-6">
                                                <h6 class="fw-semibold text-muted mb-2">Feature Box 1</h6>
                                                <div class="mb-2">
                                                    <label class="form-label fs-12">FontAwesome Icon Class</label>
                                                    <input type="text" name="features[0][icon]" class="form-control form-control-sm"
                                                        value="{{ old('features.0.icon', data_get($features, '0.icon', 'fas fa-check-circle')) }}">
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label fs-12">Title</label>
                                                    <input type="text" name="features[0][title]" class="form-control form-control-sm"
                                                        value="{{ old('features.0.title', data_get($features, '0.title', 'Large-Scale Capacity')) }}">
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label fs-12">Subtitle</label>
                                                    <input type="text" name="features[0][subtitle]" class="form-control form-control-sm"
                                                        value="{{ old('features.0.subtitle', data_get($features, '0.subtitle', 'Up to 30K guests at single event')) }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <h6 class="fw-semibold text-muted mb-2">Feature Box 2</h6>
                                                <div class="mb-2">
                                                    <label class="form-label fs-12">FontAwesome Icon Class</label>
                                                    <input type="text" name="features[1][icon]" class="form-control form-control-sm"
                                                        value="{{ old('features.1.icon', data_get($features, '1.icon', 'fas fa-bolt')) }}">
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label fs-12">Title</label>
                                                    <input type="text" name="features[1][title]" class="form-control form-control-sm"
                                                        value="{{ old('features.1.title', data_get($features, '1.title', '12-Hour Urgent Prep')) }}">
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label fs-12">Subtitle</label>
                                                    <input type="text" name="features[1][subtitle]" class="form-control form-control-sm"
                                                        value="{{ old('features.1.subtitle', data_get($features, '1.subtitle', 'Emergency catering execution')) }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Main Image & Status -->
                            <div class="col-md-6 mb-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label fw-bold">Main Story Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    <small class="text-muted">Recommended Size: 600x700px</small>
                                    @if($story->image)
                                        <div class="mt-2 p-2 border rounded bg-light d-inline-block">
                                            <img src="{{ asset($story->image) }}" alt="Current Story Image"
                                                class="img-thumbnail" width="140">
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" id="remove_image"
                                                    name="remove_image" value="1">
                                                <label class="form-check-label text-danger fs-13 fw-semibold" for="remove_image">
                                                    Remove current main image
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="mb-3">
                                    <label for="status" class="form-label fw-bold">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="1" {{ $story->status == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $story->status == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Swiper Image Slider Gallery -->
                            <div class="col-md-12 mb-4">
                                <div class="card border border-info border-opacity-25 bg-white">
                                    <div class="card-header bg-light">
                                        <h6 class="fw-bold mb-0 text-info"><i class="fas fa-images me-2"></i>About Gallery Swiper Image Slider</h6>
                                        <small class="text-muted">Upload images to display in the About section's Swiper slider.</small>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="gallery_images" class="form-label">Upload New Slider Images (Multiple)</label>
                                            <input type="file" class="form-control" id="gallery_images" name="gallery_images[]" multiple accept="image/*">
                                        </div>

                                        @if(!empty($story->gallery_images) && count($story->gallery_images) > 0)
                                            <h6 class="fw-semibold fs-14 mt-4 mb-3">Current Slider Images:</h6>
                                            <div class="row g-3">
                                                @foreach($story->gallery_images as $index => $imgPath)
                                                    <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                                                        <div class="border rounded p-2 text-center bg-light position-relative">
                                                            <img src="{{ asset($imgPath) }}" alt="Slider Image {{ $index + 1 }}" class="img-fluid rounded mb-2" style="height: 110px; object-fit: cover; width: 100%;">
                                                            <div class="form-check d-flex justify-content-center align-items-center gap-1">
                                                                <input class="form-check-input text-danger" type="checkbox" name="remove_gallery_images[]" value="{{ $imgPath }}" id="rem_gal_{{ $index }}">
                                                                <label class="form-check-label text-danger fs-12 fw-semibold" for="rem_gal_{{ $index }}">
                                                                    Delete
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <p class="text-muted fs-13 mb-0">No slider images uploaded yet. Defaults will be shown until you upload images here.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary px-4 py-2"><i class="fas fa-save me-1"></i> Update About Section</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script src="{{asset('backend/libs/summernote/summernote-lite.min.js')}}"></script>

        <script>
            $('.summernote').summernote({
                height: 250,
            });
        </script>
    @endpush

</x-backend-layout>
