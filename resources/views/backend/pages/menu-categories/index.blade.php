<x-backend-layout title="Menu Categories">
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Menu Categories</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Menu Categories</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Menu Categories List
                    </div>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                        <i class="ri-add-line me-1 fw-semibold align-middle"></i>Add New Category
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
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Total Packages</th>
                                    <th>Order</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $key => $category)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td class="fw-semibold">{{ $category->name }}</td>
                                    <td><code>{{ $category->slug }}</code></td>
                                    <td><span class="badge bg-info-transparent fs-12">{{ $category->packages_count }} Packages</span></td>
                                    <td>{{ $category->order }}</td>
                                    <td>
                                        <span class="badge bg-{{ $category->status ? 'success' : 'danger' }}-transparent">
                                            {{ $category->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-list">
                                            <button type="button" class="btn btn-sm btn-warning-light btn-icon edit-category-btn"
                                                data-id="{{ $category->id }}"
                                                data-name="{{ $category->name }}"
                                                data-description="{{ $category->description }}"
                                                data-order="{{ $category->order }}"
                                                data-status="{{ $category->status ? '1' : '0' }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editCategoryModal">
                                                <i class="ri-pencil-line"></i>
                                            </button>
                                            <form action="{{ route('menu-categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger-light btn-icon" onclick="return confirm('Are you sure you want to delete this category?')">
                                                    <i class="ri-delete-bin-line align-middle"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No menu categories found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Category Modal -->
    <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('menu-categories.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Menu Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Category Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. Royal Kacchi Packages" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Brief details..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Display Order</label>
                            <input type="number" name="order" class="form-control" value="0">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('menu-categories.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="edit_category_id">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Menu Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Category Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="edit_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="edit_description" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Display Order</label>
                            <input type="number" name="order" id="edit_order" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" id="edit_status" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Populate Edit Modal on open using Bootstrap event for reliability
        const editCategoryModal = document.getElementById('editCategoryModal');

        editCategoryModal.addEventListener('show.bs.modal', function (event) {
            const btn = event.relatedTarget; // The button that triggered the modal

            if (!btn || !btn.classList.contains('edit-category-btn')) return;

            // Populate text fields
            document.getElementById('edit_category_id').value  = btn.dataset.id          || '';
            document.getElementById('edit_name').value         = btn.dataset.name         || '';
            document.getElementById('edit_description').value  = btn.dataset.description  || '';
            document.getElementById('edit_order').value        = btn.dataset.order        || 0;

            // Properly set status select — compare as string to be safe
            const statusSelect = document.getElementById('edit_status');
            const statusValue  = String(btn.dataset.status);   // "0" or "1"
            for (let opt of statusSelect.options) {
                opt.selected = (opt.value === statusValue);
            }
        });
    </script>
    @endpush
</x-backend-layout>
