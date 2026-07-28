<x-backend-layout title="Hero Sliders Management">
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Hero Sliders Management</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hero Sliders</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Hero Sliders List
                    </div>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createSliderModal">
                        <i class="ri-add-line me-1 fw-semibold align-middle"></i>Add New Slider
                    </button>
                </div>
                <div class="card-body">
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

                    <div class="table-responsive">
                        <table class="table text-nowrap table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Order</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Subtitle</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->order }}</td>
                                    <td>
                                        @if($slider->image)
                                            <img src="{{ asset($slider->image) }}" alt="Slider Image" class="img-thumbnail" width="100">
                                        @else
                                            <span class="badge bg-secondary">No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ $slider->title ?? '-' }}</td>
                                    <td>{{ $slider->subtitle ?? '-' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $slider->status == 1 ? 'success' : 'danger' }}-transparent">
                                            {{ $slider->status == 1 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-list">
                                            <button type="button" class="btn btn-sm btn-warning-light btn-icon edit-slider"
                                                data-id="{{ $slider->id }}"
                                                data-title="{{ $slider->title }}"
                                                data-subtitle="{{ $slider->subtitle }}"
                                                data-description="{{ $slider->description }}"
                                                data-link_text="{{ $slider->link_text }}"
                                                data-link_url="{{ $slider->link_url }}"
                                                data-status="{{ $slider->status }}"
                                                data-order="{{ $slider->order }}"
                                                data-image="{{ $slider->image }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editSliderModal">
                                                <i class="ri-pencil-line"></i>
                                            </button>
                                            <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger-light btn-icon" onclick="return confirm('Are you sure you want to delete this slider?')">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No sliders found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Slider Modal -->
    <div class="modal fade" id="createSliderModal" tabindex="-1" aria-labelledby="createSliderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="createSliderModalLabel">Create New Slider</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!-- Image Upload & Live Preview -->
                        <div class="mb-3">
                            <label for="create_image" class="form-label">Slider Image <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="create_image" name="image" accept="image/*" required>
                            <small class="text-muted d-block mt-1">Recommended Size: 1920x800px</small>

                            <!-- Live Preview Box -->
                            <div id="create_image_preview_box" class="mt-2 d-none">
                                <div class="border rounded p-2 text-center bg-light position-relative">
                                    <small class="badge bg-success position-absolute top-0 start-0 m-2">Preview</small>
                                    <img id="create_image_preview" src="" class="img-fluid rounded" style="max-height: 140px; object-fit: cover;">
                                    <div class="mt-1">
                                        <button type="button" class="btn btn-sm btn-outline-danger py-0 px-2 mt-1" id="remove_create_image">
                                            <i class="ri-close-circle-line me-1"></i>Remove Image
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Main Heading">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="subtitle" class="form-label">Subtitle</label>
                                <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Sub Heading">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter slider description..."></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="link_text" class="form-label">Button Text</label>
                                <input type="text" class="form-control" id="link_text" name="link_text" placeholder="e.g. Shop Now">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="link_url" class="form-label">Button URL</label>
                                <input type="text" class="form-control" id="link_url" name="link_url" placeholder="e.g. /shop">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control" id="order" name="order" value="0">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Slider Modal -->
    <div class="modal fade" id="editSliderModal" tabindex="-1" aria-labelledby="editSliderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="editSliderModalLabel">Edit Slider</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('sliders.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="edit_id" name="id">

                        <!-- Image Section -->
                        <div class="mb-3">
                            <label class="form-label d-block fw-semibold">Slider Image</label>
                            <div class="row align-items-center">
                                <!-- Current Image Card -->
                                <div class="col-md-5 mb-2 mb-md-0">
                                    <div class="card border mb-0">
                                        <div class="card-header bg-light py-2">
                                            <small class="fw-semibold text-muted">Current Image</small>
                                        </div>
                                        <div class="card-body text-center p-2" id="current_image_container">
                                            <!-- Dynamically populated via jQuery -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Upload New Image Input & Preview -->
                                <div class="col-md-7">
                                    <label for="edit_image" class="form-label">Upload New Image (Optional)</label>
                                    <input type="file" class="form-control" id="edit_image" name="image" accept="image/*">
                                    <small class="text-muted d-block mt-1">Recommended Size: 1920x800px</small>

                                    <!-- Live New Image Preview Box -->
                                    <div id="new_image_preview_box" class="mt-2 d-none">
                                        <div class="border rounded p-2 text-center bg-light position-relative">
                                            <small class="badge bg-primary position-absolute top-0 start-0 m-2">New Preview</small>
                                            <img id="new_image_preview" src="" class="img-fluid rounded" style="max-height: 120px; object-fit: cover;">
                                            <div class="mt-1">
                                                <button type="button" class="btn btn-sm btn-outline-danger py-0 px-2 mt-1" id="remove_new_image">
                                                    <i class="ri-close-circle-line me-1"></i>Remove Selected
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="edit_title" name="title">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_subtitle" class="form-label">Subtitle</label>
                                <input type="text" class="form-control" id="edit_subtitle" name="subtitle">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="edit_description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit_description" name="description" rows="3"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_link_text" class="form-label">Button Text</label>
                                <input type="text" class="form-control" id="edit_link_text" name="link_text">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_link_url" class="form-label">Button URL</label>
                                <input type="text" class="form-control" id="edit_link_url" name="link_url">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control" id="edit_order" name="order">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_status" class="form-label">Status</label>
                                <select class="form-select" id="edit_status" name="status" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('js')
    <script>
        $(document).ready(function() {
            // -----------------------------------------------------
            // CREATE MODAL - Live Image Preview Logic
            // -----------------------------------------------------
            $('#create_image').on('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#create_image_preview').attr('src', e.target.result);
                        $('#create_image_preview_box').removeClass('d-none');
                    };
                    reader.readAsDataURL(file);
                }
            });

            $('#remove_create_image').on('click', function() {
                $('#create_image').val('');
                $('#create_image_preview_box').addClass('d-none');
                $('#create_image_preview').attr('src', '');
            });

            // -----------------------------------------------------
            // EDIT MODAL - Data Population Logic
            // -----------------------------------------------------
            $(document).on('click', '.edit-slider', function() {
                const id = $(this).data('id');
                const title = $(this).data('title');
                const subtitle = $(this).data('subtitle');
                const description = $(this).data('description');
                const link_text = $(this).data('link_text');
                const link_url = $(this).data('link_url');
                const order = $(this).data('order');
                const status = $(this).data('status');
                const image = $(this).data('image');

                $('#edit_id').val(id);
                $('#edit_title').val(title);
                $('#edit_subtitle').val(subtitle);
                $('#edit_description').val(description);
                $('#edit_link_text').val(link_text);
                $('#edit_link_url').val(link_url);
                $('#edit_order').val(order);
                $('#edit_status').val(status);

                // Reset file input and preview container
                $('#edit_image').val('');
                $('#new_image_preview_box').addClass('d-none');
                $('#new_image_preview').attr('src', '');

                // Populate current image container
                if (image) {
                    $('#current_image_container').html(
                        `<img src="{{ asset('') }}${image}" class="img-fluid rounded" style="max-height: 120px; object-fit: cover;">`
                    );
                } else {
                    $('#current_image_container').html('<span class="badge bg-secondary py-2 px-3">No Image Set</span>');
                }
            });

            // -----------------------------------------------------
            // EDIT MODAL - Live Image Preview Logic
            // -----------------------------------------------------
            $('#edit_image').on('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#new_image_preview').attr('src', e.target.result);
                        $('#new_image_preview_box').removeClass('d-none');
                    };
                    reader.readAsDataURL(file);
                }
            });

            $('#remove_new_image').on('click', function() {
                $('#edit_image').val('');
                $('#new_image_preview_box').addClass('d-none');
                $('#new_image_preview').attr('src', '');
            });
        });
    </script>
    @endpush

</x-backend-layout>
