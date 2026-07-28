<x-backend-layout title="Bookings List">
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Bookings List</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Bookings</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">All Customer Reservations</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Phone</th>
                                    <th>Event Details</th>
                                    <th>Event Date</th>
                                    <th>Guests</th>
                                    <th>Location</th>
                                    <th>Submitted On</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bookings as $booking)
                                <tr>
                                    <td>{{ $loop->iteration + ($bookings->currentPage() - 1) * $bookings->perPage() }}</td>
                                    <td>
                                        <div class="fw-semibold">{{ $booking->name ?? 'N/A' }}</div>
                                        <small class="text-muted">{{ $booking->email ?? 'No Email' }}</small>
                                    </td>
                                    <td>{{ $booking->phone ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge bg-primary-transparent">
                                            {{ $booking->event_type ?? 'General Inquiry' }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($booking->event_date)
                                            {{ \Carbon\Carbon::parse($booking->event_date)->format('M d, Y') }}
                                        @else
                                            <span class="text-muted">TBD</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-info-transparent">
                                            <i class="ri-user-line me-1"></i>{{ $booking->guests ?? 0 }}
                                        </span>
                                    </td>
                                    <td>{{ $booking->location ?? 'N/A' }}</td>
                                    <td>{{ $booking->created_at ? $booking->created_at->format('M d, Y h:i A') : 'N/A' }}</td>
                                    <td class="text-center">
                                        <div class="btn-list">
                                            <!-- View Details Modal Trigger -->
                                            <button type="button"
                                                    class="btn btn-sm btn-icon btn-info-light"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#bookingModal{{ $booking->id }}"
                                                    title="View Details">
                                                <i class="ri-eye-line"></i>
                                            </button>

                                            <!-- Direct Email Reply Button -->
                                            @if($booking->email)
                                                <a href="mailto:{{ $booking->email }}?subject={{ rawurlencode('Quotation Response: ' . ($booking->event_type ?? 'Event Booking')) }}&body={{ rawurlencode("Hello " . ($booking->name ?? 'Customer') . ",\n\nThank you for reaching out regarding your upcoming " . ($booking->event_type ?? 'event') . " on " . ($booking->event_date ?? 'your requested date') . ".\n\n") }}"
                                                   class="btn btn-sm btn-primary-light"
                                                   title="Reply via Email">
                                                    <i class="ri-reply-line me-1"></i> Reply
                                                </a>
                                            @else
                                                <button class="btn btn-sm btn-secondary-light disabled" title="No Email Available">
                                                    <i class="ri-reply-line me-1"></i> Reply
                                                </button>
                                            @endif
                                        </div>

                                        <!-- Details Modal -->
                                        <div class="modal fade text-start" id="bookingModal{{ $booking->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title fw-semibold">Booking Details - #{{ $booking->id }}</h6>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul class="list-group list-group-flush mb-3">
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <span class="fw-semibold">Name:</span>
                                                                <span>{{ $booking->name ?? 'N/A' }}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <span class="fw-semibold">Phone:</span>
                                                                <span>{{ $booking->phone ?? 'N/A' }}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <span class="fw-semibold">Email:</span>
                                                                <span>{{ $booking->email ?? 'N/A' }}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <span class="fw-semibold">Event Type:</span>
                                                                <span>{{ $booking->event_type ?? 'N/A' }}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <span class="fw-semibold">Event Date:</span>
                                                                <span>{{ $booking->event_date ?? 'N/A' }}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <span class="fw-semibold">Guests:</span>
                                                                <span>{{ $booking->guests ?? 'N/A' }}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <span class="fw-semibold">Location:</span>
                                                                <span>{{ $booking->location ?? 'N/A' }}</span>
                                                            </li>
                                                        </ul>
                                                        <div class="p-3 bg-light rounded">
                                                            <label class="fw-semibold mb-1 text-muted">Special Requirements / Notes:</label>
                                                            <p class="mb-0 text-wrap">{{ $booking->notes ?? 'No special instructions provided.' }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        @if($booking->email)
                                                            <a href="mailto:{{ $booking->email }}?subject={{ rawurlencode('Quotation Response: ' . ($booking->event_type ?? 'Event Booking')) }}" class="btn btn-primary">
                                                                <i class="ri-reply-line me-1"></i> Send Email
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center py-4 text-muted">
                                        No bookings found.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($bookings->hasPages())
                        <div class="d-flex justify-content-center mt-3">
                            {{ $bookings->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-backend-layout>
