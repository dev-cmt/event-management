<x-backend-layout title="Photo Gallery Management">
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Photo Gallery Management</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Photo Gallery</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Photo Gallery Showcase
                    </div>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createGalleryModal">
                        <i class="ri-add-line me-1 fw-semibold align-middle"></i>Add New Photo
                    </button>
                </div>
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

                    <div class="table-responsive">
                        <table class="table text-nowrap table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Order</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($galleries as $gallery)
                                <tr>
                                    <td>{{ $gallery->sort_order }}</td>
                                    <td>
                                        @if($gallery->image)
                                            <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}" class="img-thumbnail rounded" style="width: 80px; height: 60px; object-fit: cover;">
                                        @else
                                            <span class="badge bg-secondary">No Image</span>
                                        @endif
                                    </td>
                                    <td><strong>{{ $gallery->title ?: 'Untitled Photo' }}</strong></td>
                                    <td>
                                        <span class="badge bg-info-transparent text-uppercase fw-semibold">
                                            {{ $gallery->category }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $gallery->status ? 'success' : 'danger' }}-transparent">
                                            {{ $gallery->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-list">
                                            <button type="button" class="btn btn-sm btn-warning-light btn-icon edit-gallery"
                                                data-id="{{ $gallery->id }}"
                                                data-title="{{ $gallery->title }}"
                                                data-category="{{ $gallery->category }}"
                                                data-status="{{ $gallery->status ? 1 : 0 }}"
                                                data-sort_order="{{ $gallery->sort_order }}"
                                                data-image="{{ $gallery->image }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editGalleryModal">
                                                <i class="ri-pencil-line"></i>
                                            </button>
                                            <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger-light btn-icon" onclick="return confirm('Are you sure you want to delete this photo?')">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">No gallery items found. Click "Add New Photo" to upload.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $galleries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Gallery Modal -->
    <div class="modal fade" id="createGalleryModal" tabindex="-1" aria-labelledby="createGalleryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="createGalleryModalLabel">Add Photo to Gallery</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!-- Image Upload & Preview -->
                        <div class="mb-3">
                            <label for="create_image" class="form-label fw-semibold">Photo File <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="create_image" name="image" accept="image/*" required>
                            <small class="text-muted d-block mt-1">Recommended format: JPG, PNG, WEBP (Max 5MB)</small>

                            <!-- Live Preview Box -->
                            <div id="create_image_preview_box" class="mt-2 d-none">
                                <div class="border rounded p-2 text-center bg-light position-relative">
                                    <small class="badge bg-success position-absolute top-0 start-0 m-2">Preview</small>
                                    <img id="create_image_preview" src="" class="img-fluid rounded" style="max-height: 160px; object-fit: cover;">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Photo Title / Caption</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="e.g. Royal Wedding Reception Setup">
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="category" name="category" placeholder="e.g. weddings, dishes, venues, corporate" list="category_suggestions" required>
                            <datalist id="category_suggestions">
                                <option value="weddings">Weddings</option>
                                <option value="dishes">Signature Dishes</option>
                                <option value="venues">Venues</option>
                                <option value="corporate">Corporate</option>
                            </datalist>
                            <small class="text-muted">Enter a category name or select from options. (e.g. weddings, dishes, venues)</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="sort_order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control" id="sort_order" name="sort_order" value="0">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload Photo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Gallery Modal -->
    <div class="modal fade" id="editGalleryModal" tabindex="-1" aria-labelledby="editGalleryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="editGalleryModalLabel">Edit Photo Details</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('galleries.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="edit_id" name="id">

                        <div class="mb-3">
                            <label class="form-label d-block fw-semibold">Current Photo</label>
                            <div id="current_image_container" class="text-center p-2 border rounded bg-light mb-2"></div>
                            <label for="edit_image" class="form-label fs-7">Change Photo (Optional)</label>
                            <input type="file" class="form-control" id="edit_image" name="image" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="edit_title" class="form-label">Photo Title / Caption</label>
                            <input type="text" class="form-control" id="edit_title" name="title">
                        </div>

                        <div class="mb-3">
                            <label for="edit_category" class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_category" name="category" list="edit_category_suggestions" required>
                            <datalist id="edit_category_suggestions">
                                <option value="weddings">Weddings</option>
                                <option value="dishes">Signature Dishes</option>
                                <option value="venues">Venues</option>
                                <option value="corporate">Corporate</option>
                            </datalist>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_sort_order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control" id="edit_sort_order" name="sort_order">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_status" class="form-label">Status</label>
                                <select class="form-select" id="edit_status" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Details</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('js')
    <script>
        $(document).ready(function() {
            // Live preview for Create Image
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

            // Edit Modal Click Handler
            $(document).on('click', '.edit-gallery', function() {
                const id = $(this).data('id');
                const title = $(this).data('title');
                const category = $(this).data('category');
                const sort_order = $(this).data('sort_order');
                const status = $(this).data('status');
                const image = $(this).data('image');

                $('#edit_id').val(id);
                $('#edit_title').val(title);
                $('#edit_category').val(category);
                $('#edit_sort_order').val(sort_order);
                $('#edit_status').val(status);

                if (image) {
                    $('#current_image_container').html(
                        `<img src="{{ asset('') }}${image}" class="img-fluid rounded" style="max-height: 140px; object-fit: cover;">`
                    );
                } else {
                    $('#current_image_container').html('<span class="badge bg-secondary py-2 px-3">No Photo Set</span>');
                }
            });
        });
    </script>
    @endpush

</x-backend-layout>
