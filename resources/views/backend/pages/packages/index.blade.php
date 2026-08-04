<x-backend-layout title="Packages">
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Packages</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Packages</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Packages List
                    </div>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createPackageModal">
                        <i class="ri-add-line me-1 fw-semibold align-middle"></i>Add New Package
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
                        <table class="table text-nowrap align-middle">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Package Name</th>
                                    <th>Slug</th>
                                    <th>Total Items</th>
                                    <th>Sort Order</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($packages as $key => $package)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        @if($package->image)
                                            <img src="{{ asset($package->image) }}" class="avatar avatar-md rounded" alt="{{ $package->name }}">
                                        @else
                                            <span class="avatar avatar-md rounded bg-light text-muted"><i class="ri-package-line"></i></span>
                                        @endif
                                    </td>
                                    <td class="fw-semibold">{{ $package->name }}</td>
                                    <td><code>{{ $package->slug }}</code></td>
                                    <td><span class="badge bg-info-transparent fs-12">{{ $package->items_count }} Items</span></td>
                                    <td>{{ $package->sort_order }}</td>
                                    <td>
                                        <span class="badge bg-{{ $package->status ? 'success' : 'danger' }}">{{ $package->status ? 'Active' : 'Inactive' }}</span>
                                    </td>
                                    <td>
                                        <div class="btn-list">
                                            <button type="button" class="btn btn-sm btn-warning-light btn-icon edit-package-btn"
                                                data-id="{{ $package->id }}"
                                                data-name="{{ e($package->name) }}"
                                                data-sort_order="{{ $package->sort_order }}"
                                                data-status="{{ $package->status }}"
                                                data-image="{{ $package->image ? asset($package->image) : '' }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editPackageModal">
                                                <i class="ri-pencil-line"></i>
                                            </button>
                                            <form action="{{ route('packages.destroy', $package->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger-light btn-icon" onclick="return confirm('Are you sure you want to delete this package?')">
                                                    <i class="ri-delete-bin-line align-middle"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No packages found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Package Modal -->
    <div class="modal fade" id="createPackageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h6 class="modal-title">Add New Package</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Package Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. Wedding Executive Package" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Package Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="0">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Package</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Package Modal -->
    <div class="modal fade" id="editPackageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editPackageForm" action="{{ route('packages.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="edit_package_id">
                    <div class="modal-header">
                        <h6 class="modal-title">Edit Package</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Package Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="edit_package_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Package Image</label>
                            <input type="file" name="image" id="edit_package_file_input" class="form-control" accept="image/*">
                            <div class="mt-2" id="edit_package_image_preview" style="display: none;">
                                <img src="" id="edit_package_img_src" class="avatar avatar-lg rounded" alt="Preview">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" id="edit_package_sort_order" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" id="edit_package_status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Package</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-package-btn');
            const fileInput = document.getElementById('edit_package_file_input');
            const previewDiv = document.getElementById('edit_package_image_preview');
            const previewImg = document.getElementById('edit_package_img_src');

            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');
                    const sortOrder = this.getAttribute('data-sort_order');
                    const status = this.getAttribute('data-status');
                    const image = this.getAttribute('data-image');

                    document.getElementById('edit_package_id').value = id;
                    document.getElementById('edit_package_name').value = name;
                    document.getElementById('edit_package_sort_order').value = sortOrder || 0;
                    document.getElementById('edit_package_status').value = status || 1;
                    if (fileInput) fileInput.value = '';

                    if (image) {
                        previewImg.src = image;
                        previewDiv.style.display = 'block';
                    } else {
                        previewDiv.style.display = 'none';
                    }
                });
            });

            if (fileInput) {
                fileInput.addEventListener('change', function (e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            previewImg.src = e.target.result;
                            previewDiv.style.display = 'block';
                        }
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>
    @endpush
</x-backend-layout>
