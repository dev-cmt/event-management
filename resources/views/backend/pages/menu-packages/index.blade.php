<x-backend-layout title="Menu Packages">
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Menu List / Packages</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Menu Packages</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Menu Packages List
                    </div>
                    <a href="{{ route('menu-packages.create') }}" class="btn btn-primary btn-sm">
                        <i class="ri-add-line me-1 fw-semibold align-middle"></i>Add New Menu Package
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
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
                                    <th>Category</th>
                                    <th>Items Count</th>
                                    <th>Order</th>
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
                                            <img src="{{ asset($package->image) }}" class="avatar avatar-md rounded" alt="Dish">
                                        @else
                                            <span class="avatar avatar-md rounded bg-light text-muted"><i class="ri-restaurant-line"></i></span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="fw-semibold">{{ $package->name }}</div>
                                        @if($package->subtitle)
                                            <small class="text-muted">{{ $package->subtitle }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-primary-transparent">
                                            {{ $package->category?->name ?? 'Standalone / None' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary-transparent">{{ $package->items->count() }} items</span>
                                    </td>
                                    <td>{{ $package->order }}</td>
                                    <td>
                                        <span class="badge bg-{{ $package->status ? 'success' : 'danger' }}-transparent">
                                            {{ $package->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-list">
                                            <a href="{{ route('menu-packages.edit', $package->id) }}" class="btn btn-sm btn-warning-light btn-icon">
                                                <i class="ri-pencil-line"></i>
                                            </a>
                                            <form action="{{ route('menu-packages.destroy', $package->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger-light btn-icon" onclick="return confirm('Are you sure you want to delete this menu package?')">
                                                    <i class="ri-delete-bin-line align-middle"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">No menu packages found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-backend-layout>
