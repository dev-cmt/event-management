<x-backend-layout title="Create Package Item">
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Create Package Item</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('package-items.index') }}">Package Items</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Item</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">Item Information</div>
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

                    <form action="{{ route('package-items.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="package_id" class="form-label">Select Package <span class="text-danger">*</span></label>
                                <select name="package_id" id="package_id" class="form-select" required>
                                    <option value="">-- Choose Package --</option>
                                    @foreach($packages as $package)
                                        <option value="{{ $package->id }}" {{ old('package_id') == $package->id ? 'selected' : '' }}>
                                            {{ $package->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="name" class="form-label">Item Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Item Name" required>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="image" class="form-label">Main Image</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="sort_order" class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                            </div>

                            <div class="col-12">
                                <hr class="my-3">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="fw-semibold mb-0">Package Item Gallery Photos</h6>
                                    <button type="button" class="btn btn-sm btn-outline-primary" id="addGalleryRowBtn">
                                        <i class="ri-add-line me-1"></i>Add Gallery Photo
                                    </button>
                                </div>

                                <div id="galleryContainer">
                                    <div class="row align-items-center mb-3 gallery-row">
                                        <div class="col-md-5">
                                            <label class="form-label">Gallery Image</label>
                                            <input type="file" name="gallery_images[]" class="form-control" accept="image/*">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Caption (Optional)</label>
                                            <input type="text" name="gallery_captions[]" class="form-control" placeholder="Enter photo caption">
                                        </div>
                                        <div class="col-md-1 d-flex align-items-end mt-4">
                                            <button type="button" class="btn btn-sm btn-danger-light remove-gallery-row" disabled>
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 text-end">
                                <a href="{{ route('package-items.index') }}" class="btn btn-light me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save Package Item</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('galleryContainer');
            const addBtn = document.getElementById('addGalleryRowBtn');

            addBtn.addEventListener('click', function() {
                const row = document.createElement('div');
                row.className = 'row align-items-center mb-3 gallery-row';
                row.innerHTML = `
                    <div class="col-md-5">
                        <label class="form-label">Gallery Image</label>
                        <input type="file" name="gallery_images[]" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Caption (Optional)</label>
                        <input type="text" name="gallery_captions[]" class="form-control" placeholder="Enter photo caption">
                    </div>
                    <div class="col-md-1 d-flex align-items-end mt-4">
                        <button type="button" class="btn btn-sm btn-danger-light remove-gallery-row">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    </div>
                `;
                container.appendChild(row);
                updateRemoveButtons();
            });

            container.addEventListener('click', function(e) {
                if (e.target.closest('.remove-gallery-row')) {
                    const row = e.target.closest('.gallery-row');
                    if (container.querySelectorAll('.gallery-row').length > 1) {
                        row.remove();
                        updateRemoveButtons();
                    }
                }
            });

            function updateRemoveButtons() {
                const rows = container.querySelectorAll('.gallery-row');
                rows.forEach(row => {
                    const btn = row.querySelector('.remove-gallery-row');
                    if (rows.length === 1) {
                        btn.setAttribute('disabled', 'disabled');
                    } else {
                        btn.removeAttribute('disabled');
                    }
                });
            }
        });
    </script>
    @endpush
</x-backend-layout>
