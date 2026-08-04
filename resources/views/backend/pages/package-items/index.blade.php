<x-backend-layout title="Package Items">
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Package Items</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('packages.index') }}">Packages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Package Items</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Package Items List
                    </div>
                    <a href="{{ route('package-items.create') }}" class="btn btn-primary btn-sm">
                        <i class="ri-add-line me-1 fw-semibold align-middle"></i>Add New Item
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
                                    <th>Item Name</th>
                                    <th>Package</th>
                                    <th>Gallery Images</th>
                                    <th>Sort Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        @if($item->image)
                                            <img src="{{ asset($item->image) }}" class="avatar avatar-md rounded" alt="{{ $item->name }}">
                                        @else
                                            <span class="avatar avatar-md rounded bg-light text-muted"><i class="ri-image-line"></i></span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="fw-semibold">{{ $item->name }}</div>
                                        <small class="text-muted"><code>{{ $item->slug }}</code></small>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary-transparent">
                                            {{ $item->package?->name ?? 'Unassigned' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary-transparent">
                                            <i class="ri-gallery-line me-1"></i>{{ $item->galleries->count() }} Photos
                                        </span>
                                    </td>
                                    <td>{{ $item->sort_order }}</td>
                                    <td>
                                        <div class="btn-list">
                                            <a href="{{ route('package-items.edit', $item->id) }}" class="btn btn-sm btn-warning-light btn-icon">
                                                <i class="ri-pencil-line"></i>
                                            </a>
                                            <form action="{{ route('package-items.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger-light btn-icon" onclick="return confirm('Are you sure you want to delete this package item and its galleries?')">
                                                    <i class="ri-delete-bin-line align-middle"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No package items found.</td>
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
