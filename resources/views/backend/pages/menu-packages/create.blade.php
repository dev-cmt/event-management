<x-backend-layout title="Create Menu Package">
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Create Menu Package</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('menu-packages.index') }}">Menu Packages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Add New Menu Package</div>
                    <a href="{{ route('menu-packages.index') }}" class="btn btn-secondary btn-sm"><i class="ri-arrow-left-line me-1"></i>Back</a>
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

                    <form action="{{ route('menu-packages.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Menu Category</label>
                                <select name="menu_category_id" class="form-select">
                                    <option value="">-- None / Standalone --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Package Name (e.g. MENU-1, Gold Kacchi Feast) <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="e.g. MENU-1" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Subtitle / Tagline</label>
                                <input type="text" name="subtitle" class="form-control" placeholder="e.g. Gold Kacchi Feast">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Price (Optional)</label>
                                <input type="number" step="0.01" name="price" class="form-control" placeholder="e.g. 850.00">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Display Order</label>
                                <input type="number" name="order" class="form-control" value="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Dish Image (Bottom Right Photo)</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <hr class="my-4">

                        <h5 class="fw-semibold mb-3">Menu Items List</h5>
                        <p class="text-muted fs-13">Enter items line by line. They will be displayed numbered (01, 02, 03...) on the frontend menu card.</p>

                        <div id="items-container">
                            <div class="row align-items-center mb-2 item-row">
                                <div class="col-md-10">
                                    <div class="input-group">
                                        <span class="input-group-text item-number">01.</span>
                                        <input type="text" name="items[]" class="form-control" placeholder="e.g. Royal Mutton Kacchi Biryani (Chinigura/Basmati)">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger-light remove-item-btn"><i class="ri-delete-bin-line"></i> Remove</button>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-outline-primary btn-sm my-3" id="add-item-btn">
                            <i class="ri-add-line me-1"></i> Add Another Item
                        </button>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">Save Menu Package</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const itemsContainer = document.getElementById('items-container');
            const addItemBtn = document.getElementById('add-item-btn');

            function updateItemNumbers() {
                const rows = itemsContainer.querySelectorAll('.item-row');
                rows.forEach((row, idx) => {
                    const numSpan = row.querySelector('.item-number');
                    numSpan.textContent = String(idx + 1).padStart(2, '0') + '.';
                });
            }

            addItemBtn.addEventListener('click', function() {
                const rowCount = itemsContainer.querySelectorAll('.item-row').length + 1;
                const newRow = document.createElement('div');
                newRow.className = 'row align-items-center mb-2 item-row';
                newRow.innerHTML = `
                    <div class="col-md-10">
                        <div class="input-group">
                            <span class="input-group-text item-number">${String(rowCount).padStart(2, '0')}.</span>
                            <input type="text" name="items[]" class="form-control" placeholder="Enter menu item...">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger-light remove-item-btn"><i class="ri-delete-bin-line"></i> Remove</button>
                    </div>
                `;
                itemsContainer.appendChild(newRow);
                updateItemNumbers();
            });

            itemsContainer.addEventListener('click', function(e) {
                if (e.target.closest('.remove-item-btn')) {
                    const rows = itemsContainer.querySelectorAll('.item-row');
                    if (rows.length > 1) {
                        e.target.closest('.item-row').remove();
                        updateItemNumbers();
                    } else {
                        alert('At least one item line is required.');
                    }
                }
            });
        });
    </script>
    @endpush
</x-backend-layout>
