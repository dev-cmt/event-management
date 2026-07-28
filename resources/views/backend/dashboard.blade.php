<x-backend-layout title="Dashboard">
    <!-- Start::page-header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <p class="fw-semibold fs-18 mb-0">Site Analytics Dashboard</p>
            <span class="fs-semibold text-muted">Real-time tracking of visits, enlistments, and site activity.</span>
        </div>
        <div class="btn-list mt-md-0 mt-2">
            <button type="button" class="btn btn-primary btn-wave">
                <i class="ri-filter-3-fill me-2 align-middle d-inline-block"></i>Filters
            </button>
            <button type="button" class="btn btn-outline-secondary btn-wave">
                <i class="ri-upload-cloud-line me-2 align-middle d-inline-block"></i>Export
            </button>
        </div>
    </div>
    <!-- End::page-header -->

    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xxl-9 col-xl-12">
            <div class="row">
                <div class="col-xl-4">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card crm-highlight-card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="fw-semibold fs-18 text-fixed-white mb-2">Welcome, {{ Auth::user()->name }}</div>
                                            <span class="d-block fs-12 text-fixed-white">
                                                <span class="op-7">You have</span>
                                                <span class="fw-semibold text-warning">{{ $data['total_enlistments'] }}
                                                    Enlistments</span>,
                                                <span class="fw-semibold text-warning">{{ $data['total_services'] }}
                                                    Services</span>, and
                                                <span class="fw-semibold text-warning">{{ $data['total_blogs'] }}
                                                    Blogs</span>
                                                <span class="op-7">active on your website</span>.
                                            </span>
                                            <span class="d-block fw-semibold mt-1"><a class="text-fixed-white"
                                                    href="{{ route('settings.pages-content.index') }}"><u>Manage
                                                        Content</u></a></span>
                                        </div>
                                        <div>
                                            <div id="crm-main"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">
                                    Latest Enlistments
                                </div>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-icon btn-sm btn-light" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('enlistments.index') }}">View All</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled crm-top-deals mb-0">
                                    @foreach($data['recent_enlistments'] as $enlistment)
                                        <li>
                                            <div class="d-flex align-items-center flex-nowrap gap-2">
                                                <div class="flex-shrink-0">
                                                    <span
                                                        class="avatar avatar-sm avatar-rounded bg-primary-transparent fw-semibold">
                                                        {{ substr($enlistment->title, 0, 2) }}
                                                    </span>
                                                </div>
                                                <div class="flex-fill" style="min-width: 0;">
                                                    <p class="fw-semibold mb-0 text-truncate d-block fs-14"
                                                        title="{{ $enlistment->title }}">{{ $enlistment->title }}</p>
                                                    <span class="text-muted fs-11">{{ $enlistment->category->category_name ?? 'General' }}</span>
                                                </div>
                                                <div class="fw-semibold fs-15 flex-shrink-0">
                                                    <a href="{{ route('enlistments.edit', $enlistment->id) }}"
                                                        class="btn btn-sm btn-icon btn-light"><i
                                                            class="ri-edit-line"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    @if($data['recent_enlistments']->isEmpty())
                                        <li class="text-center text-muted">No enlistments found.</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-xxl-6 col-lg-6 col-md-6">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded bg-primary">
                                                <i class="ti ti-users fs-16"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                    <p class="text-muted mb-0">Unique Visitors</p>
                                                    <h4 class="fw-semibold mt-1">
                                                        {{ number_format($data['unique_visitors']) }}</h4>
                                                </div>
                                                <div id="crm-total-customers"></div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    <a class="text-primary" href="javascript:void(0);">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                </div>
                                                <div class="text-end">
                                                    <p class="mb-0 text-success fw-semibold">{{ $data['unique_today'] }}
                                                        today</p>
                                                    <span class="text-muted op-7 fs-11">real-time</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-lg-6 col-md-6">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded bg-secondary">
                                                <i class="ti ti-eye fs-16"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                    <p class="text-muted mb-0">Total Page Views</p>
                                                    <h4 class="fw-semibold mt-1">
                                                        {{ number_format($data['total_visits']) }}</h4>
                                                </div>
                                                <div id="crm-total-revenue"></div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    <a class="text-secondary" href="javascript:void(0);">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                </div>
                                                <div class="text-end">
                                                    <p class="mb-0 text-success fw-semibold">
                                                        +{{ $data['visits_today'] }} today</p>
                                                    <span class="text-muted op-7 fs-11">total views</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-lg-6 col-md-6">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded bg-success">
                                                <i class="ti ti-device-laptop fs-16"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                    <p class="text-muted mb-0">Active Sessions</p>
                                                    <h4 class="fw-semibold mt-1">
                                                        {{ number_format($data['visits_today']) }}</h4>
                                                </div>
                                                <div id="crm-conversion-ratio"></div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    <a class="text-success" href="javascript:void(0);">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                </div>
                                                <div class="text-end">
                                                    <p class="mb-0 text-success fw-semibold">Last 24h</p>
                                                    <span class="text-muted op-7 fs-11">activity</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-lg-6 col-md-6">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded bg-warning">
                                                <i class="ti ti-user-check fs-16"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                    <p class="text-muted mb-0">Total Registered</p>
                                                    <h4 class="fw-semibold mt-1">
                                                        {{ number_format($data['total_applications']) }}</h4>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    <a class="text-warning" href="javascript:void(0);">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                </div>
                                                <div class="text-end">
                                                    <p class="mb-0 text-success fw-semibold">Users</p>
                                                    <span class="text-muted op-7 fs-11">database</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">
                                Recent Visitors
                            </div>
                            <div class="d-flex flex-wrap gap-2">
                                <div>
                                    <input class="form-control form-control-sm" type="text"
                                        placeholder="Search Visitors" aria-label=".form-control-sm example">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-nowrap table-hover border table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">IP Address</th>
                                            <th scope="col">Browser / OS</th>
                                            <th scope="col">Page URL</th>
                                            <th scope="col">Location</th>
                                            <th scope="col">Date & Time</th>
                                            <th scope="col">Device</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data['recent_visitors'] as $visitor)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center fw-semibold">
                                                        {{ $visitor->ip_address }}
                                                    </div>
                                                </td>
                                                <td>{{ $visitor->browser }} / {{ $visitor->platform }}</td>
                                                <td title="{{ $visitor->page_url }}">
                                                    <span class="badge bg-light text-dark">
                                                        {{ Str::limit(str_replace(url('/'), '', $visitor->page_url), 30) ?: '/' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info-transparent">{{ $visitor->city }},
                                                        {{ $visitor->country }}</span>
                                                </td>
                                                <td>{{ $visitor->created_at->format('M d, H:i:s') }}</td>
                                                <td>
                                                    @if($visitor->device_type == 'Mobile')
                                                        <i class="ti ti-device-mobile text-primary"></i>
                                                    @elseif($visitor->device_type == 'Tablet')
                                                        <i class="ti ti-device-tablet text-success"></i>
                                                    @else
                                                        <i class="ti ti-device-laptop text-info"></i>
                                                    @endif
                                                    {{ $visitor->device_type }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer border-top-0 pt-0">
                            <div class="d-flex align-items-center">
                                <div>
                                    Showing {{ $data['recent_visitors']->firstItem() }} to {{ $data['recent_visitors']->lastItem() }} of {{ $data['recent_visitors']->total() }} Entries
                                </div>
                                <div class="ms-auto">
                                    <nav aria-label="Page navigation" class="pagination-style-4">
                                        <ul class="pagination mb-0">
                                            <li class="page-item {{ $data['recent_visitors']->onFirstPage() ? 'disabled' : '' }}">
                                                <a class="page-link" href="{{ $data['recent_visitors']->appends(['visitors_page' => $data['recent_visitors']->currentPage()])->previousPageUrl() }}">
                                                    Prev
                                                </a>
                                            </li>
                                            @foreach ($data['recent_visitors']->getUrlRange(max(1, $data['recent_visitors']->currentPage() - 2), min($data['recent_visitors']->lastPage(), $data['recent_visitors']->currentPage() + 2)) as $page => $url)
                                                <li class="page-item {{ $page == $data['recent_visitors']->currentPage() ? 'active' : '' }}">
                                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endforeach
                                            <li class="page-item {{ $data['recent_visitors']->hasMorePages() ? '' : 'disabled' }}">
                                                <a class="page-link text-primary" href="{{ $data['recent_visitors']->appends(['visitors_page' => $data['recent_visitors']->currentPage()])->nextPageUrl() }}">
                                                    next
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-12">
            <div class="row">
                <div class="col-xxl-12 col-xl-12">
                    <div class="row">
                        <div class="col-xl-12 col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Leads By Source
                                    </div>
                                    <div class="dropdown">
                                        <a aria-label="anchor" href="javascript:void(0);"
                                            class="btn btn-icon btn-sm btn-light" data-bs-toggle="dropdown">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:void(0);">Week</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Month</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Year</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body p-0 overflow-hidden">
                                    <div class="leads-source-chart d-flex align-items-center justify-content-center">
                                        <canvas id="leads-source" class="chartjs-chart w-100 p-4"></canvas>
                                        <div class="lead-source-value">
                                            <span class="d-block fs-14">Total</span>
                                            <span
                                                class="d-block fs-25 fw-bold">{{ $data['lead_source_total'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row row-cols-2 row-cols-md-4 g-0 border-top border-block-start-dashed">
                                        @foreach($data['lead_source_breakdown'] as $source)
                                            <div class="col p-0">
                                                <div class="{{ $loop->first ? 'ps-3 ps-md-4' : '' }} py-3 px-2 text-center {{ !$loop->last ? 'border-end border-inline-end-dashed' : '' }}">
                                                    <span class="text-muted fs-11 mb-1 crm-lead-legend {{ $source['color'] }} d-inline-block text-truncate w-100">{{ $source['label'] }}</span>
                                                    <div><span class="fs-15 fw-semibold">{{ $source['count'] }}</span></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-12 col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Device Distribution
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="p-2 fs-12 text-muted"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            View All<i
                                                class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a class="dropdown-item" href="javascript:void(0);">Today</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">This Week</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">This Month</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-center" style="height: 260px;">
                                        <canvas id="device-distribution" class="w-100 h-100"></canvas>
                                    </div>
                                    @php
                                        $deviceBreakdown = [
                                            ['label' => 'Mobile', 'count' => $data['device_stats']['Mobile'] ?? 0, 'color' => 'primary'],
                                            ['label' => 'Desktop', 'count' => $data['device_stats']['Desktop'] ?? 0, 'color' => 'secondary'],
                                            ['label' => 'Tablet', 'count' => $data['device_stats']['Tablet'] ?? 0, 'color' => 'success'],
                                            ['label' => 'Other', 'count' => $data['device_pie_data'][3] ?? 0, 'color' => 'warning'],
                                        ];
                                    @endphp
                                    <div class="row row-cols-2 row-cols-md-4 g-0 border-top border-block-start-dashed">
                                        @foreach($deviceBreakdown as $device)
                                            <div class="col p-0">
                                                <div class="{{ $loop->first ? 'ps-3 ps-md-4' : '' }} py-3 px-2 text-center {{ !$loop->last ? 'border-end border-inline-end-dashed' : '' }}">
                                                    <span class="text-muted fs-11 mb-1 crm-lead-legend text-{{ $device['color'] }} d-inline-block text-truncate w-100">{{ $device['label'] }}</span>
                                                    <div><span class="fs-15 fw-semibold">{{ $device['count'] }}</span></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-12 col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                    Enlistment Categories
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="p-2 fs-12 text-muted"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            View All<i
                                                class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a class="dropdown-item" href="{{ route('categories.index') }}">Manage
                                                    Categories</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <h4 class="fw-bold mb-0">{{ $data['total_enlistments'] }}</h4>
                                        <div class="ms-2">
                                            <span class="badge bg-success-transparent">Total Enlistments</span>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled mb-0 pt-2 crm-deals-status">
                                        @foreach($data['category_distribution'] as $category)
                                            <li
                                                class="{{ ['primary', 'info', 'warning', 'success', 'danger', 'secondary'][$loop->index % 6] }}">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>{{ $category->category_name }}</div>
                                                    <div class="fs-12 text-muted">{{ $category->enlistments_count }} enlistments
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                        @if($data['category_distribution']->isEmpty())
                                            <li class="text-center text-muted">No categorized enlistments.</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-12 col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Recent Site Activity
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="p-2 fs-12 text-muted"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            View All<i
                                                class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a class="dropdown-item" href="{{ route('blogs.index') }}">Blogs</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('enlistments.index') }}">Projects</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <ul class="list-unstyled mb-0 crm-recent-activity">
                                            @foreach($data['recent_activity'] as $activity)
                                                <li class="crm-recent-activity-content">
                                                    <div class="d-flex align-items-top">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar avatar-xs bg-{{ $activity['color'] }}-transparent avatar-rounded">
                                                                <i class="bi {{ $activity['icon'] }} fs-10"></i>
                                                            </span>
                                                        </div>
                                                        <div class="crm-timeline-content">
                                                            <span class="fw-semibold">{{ $activity['title'] }}</span>
                                                            <span class="d-block fs-12 text-muted">{{ $activity['type'] }}
                                                                updated</span>
                                                        </div>
                                                        <div class="flex-fill text-end">
                                                            <span
                                                                class="d-block text-muted fs-11 op-7">{{ $activity['time']->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                            @if($data['recent_activity']->isEmpty())
                                                <li class="text-center text-muted">No recent activity.</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End::row-1 -->
    @push('js')
        <script>
            /* Target Incomplete Chart */
            var options = {
                chart: { height: 127, width: 100, type: "radialBar" },
                series: [{{ round(($data['total_enlistments'] / max(1, $data['total_enlistments'] + 5)) * 100) }}],
                colors: ["rgba(255,255,255,0.9)"],
                plotOptions: {
                    radialBar: {
                        hollow: { margin: 0, size: "55%", background: "#fff" },
                        dataLabels: {
                            name: { offsetY: -10, color: "#4b9bfa", fontSize: ".625rem", show: false },
                            value: { offsetY: 5, color: "#4b9bfa", fontSize: ".875rem", show: true, fontWeight: 600 }
                        }
                    }
                },
                stroke: { lineCap: "round" },
                labels: ["Status"]
            };
            document.querySelector("#crm-main").innerHTML = ""
            var chartMain = new ApexCharts(document.querySelector("#crm-main"), options);
            chartMain.render();

            /* Total Customers chart */
            var crm1 = {
                chart: { type: 'line', height: 40, width: 100, sparkline: { enabled: true } },
                stroke: { show: true, curve: 'smooth', lineCap: 'butt', colors: undefined, width: 1.5, dashArray: 0 },
                fill: { type: 'gradient', gradient: { opacityFrom: 0.9, opacityTo: 0.9, stops: [0, 98] } },
                series: [{ name: 'Value', data: @json($data['sparkline_data']) }],
                yaxis: { min: 0, show: false, axisBorder: { show: false } },
                xaxis: { show: false, axisBorder: { show: false } },
                tooltip: { enabled: false },
                colors: ["rgb(132, 90, 223)"]
            }
            document.getElementById('crm-total-customers').innerHTML = '';
            var chartCrm1 = new ApexCharts(document.querySelector("#crm-total-customers"), crm1);
            chartCrm1.render();
            function crmtotalCustomers() { chartCrm1.updateOptions({ colors: ["rgb(" + myVarVal + ")"] }); }

            /* Total revenue chart */
            var crm2 = {
                chart: { type: 'line', height: 40, width: 100, sparkline: { enabled: true } },
                stroke: { show: true, curve: 'smooth', lineCap: 'butt', colors: undefined, width: 1.5, dashArray: 0 },
                fill: { type: 'gradient', gradient: { opacityFrom: 0.9, opacityTo: 0.9, stops: [0, 98] } },
                series: [{ name: 'Value', data: @json($data['sparkline_data']) }],
                yaxis: { min: 0, show: false, axisBorder: { show: false } },
                xaxis: { show: false, axisBorder: { show: false } },
                tooltip: { enabled: false },
                colors: ["rgb(35, 183, 229)"]
            }
            document.getElementById('crm-total-revenue').innerHTML = '';
            var chartCrm2 = new ApexCharts(document.querySelector("#crm-total-revenue"), crm2);
            chartCrm2.render();

            /* Conversion ratio Chart */
            var crm3 = {
                chart: { type: 'line', height: 40, width: 100, sparkline: { enabled: true } },
                stroke: { show: true, curve: 'smooth', lineCap: 'butt', colors: undefined, width: 1.5, dashArray: 0 },
                fill: { type: 'gradient', gradient: { opacityFrom: 0.9, opacityTo: 0.9, stops: [0, 98] } },
                series: [{ name: 'Value', data: @json($data['sparkline_data']) }],
                yaxis: { min: 0, show: false, axisBorder: { show: false } },
                xaxis: { show: false, axisBorder: { show: false } },
                tooltip: { enabled: false },
                colors: ["rgb(38, 191, 148)"]
            }
            document.getElementById('crm-conversion-ratio').innerHTML = '';
            var chartCrm3 = new ApexCharts(document.querySelector("#crm-conversion-ratio"), crm3);
            chartCrm3.render();

            /* Total Deals Chart */
            var crm4 = {
                chart: { type: 'line', height: 40, width: 100, sparkline: { enabled: true } },
                stroke: { show: true, curve: 'smooth', lineCap: 'butt', colors: undefined, width: 1.5, dashArray: 0 },
                fill: { type: 'gradient', gradient: { opacityFrom: 0.9, opacityTo: 0.9, stops: [0, 98] } },
                series: [{ name: 'Value', data: @json($data['sparkline_data']) }],
                yaxis: { min: 0, show: false, axisBorder: { show: false } },
                xaxis: { show: false, axisBorder: { show: false } },
                tooltip: { enabled: false },
                colors: ["rgb(245, 184, 73)"]
            }
            document.getElementById('crm-total-deals').innerHTML = '';
            var chartCrm4 = new ApexCharts(document.querySelector("#crm-total-deals"), crm4);
            chartCrm4.render();


            /* Leads By Source Chart */
            var chartInstance = new Chart(document.getElementById("leads-source"), {
                type: 'doughnut',
                data: {
                    labels: @json($data['lead_source_labels']),
                    datasets: [{
                        label: 'Lead Sources',
                        data: @json($data['lead_source_data']),
                        backgroundColor: ['rgb(132, 90, 223)', 'rgb(35, 183, 229)', 'rgb(38, 191, 148)', 'rgb(245, 184, 73)'],
                        borderWidth: 0
                    }]
                },
                options: { cutout: '85%' },
                plugins: [{
                    afterUpdate: function (chart) {
                        const arcs = chart.getDatasetMeta(0).data;
                        arcs.forEach(function (arc) {
                            arc.round = {
                                x: (chart.chartArea.left + chart.chartArea.right) / 2,
                                y: (chart.chartArea.top + chart.chartArea.bottom) / 2,
                                radius: (arc.outerRadius + arc.innerRadius) / 2,
                                thickness: (arc.outerRadius - arc.innerRadius) / 2,
                                backgroundColor: arc.options.backgroundColor
                            }
                        });
                    },
                    afterDraw: (chart) => {
                        const { ctx, canvas } = chart;
                        chart.getDatasetMeta(0).data.forEach(arc => {
                            const startAngle = Math.PI / 2 - arc.startAngle;
                            const endAngle = Math.PI / 2 - arc.endAngle;
                            ctx.save();
                            ctx.translate(arc.round.x, arc.round.y);
                            ctx.fillStyle = arc.options.backgroundColor;
                            ctx.beginPath();
                            ctx.arc(arc.round.radius * Math.sin(endAngle), arc.round.radius * Math.cos(endAngle), arc.round.thickness, 0, 2 * Math.PI);
                            ctx.closePath();
                            ctx.fill();
                            ctx.restore();
                        });
                    }
                }]
            });

            function leads(myVarVal) {
                chartInstance.data.datasets[0] = {
                    label: 'Lead Sources',
                    data: @json($data['lead_source_data']),
                    backgroundColor: [`rgb(${myVarVal})`, 'rgb(35, 183, 229)', 'rgb(245, 184, 73)', 'rgb(38, 191, 148)'],
                    borderWidth: 0
                }
                chartInstance.update();
            }

            /* Device Distribution Chart */
            var deviceChart = new Chart(document.getElementById("device-distribution"), {
                type: 'doughnut',
                data: {
                    labels: ['Mobile', 'Desktop', 'Tablet', 'Other'],
                    datasets: [{
                        label: 'Device Distribution',
                        data: @json($data['device_pie_data']),
                        backgroundColor: ['rgb(132, 90, 223)', 'rgb(35, 183, 229)', 'rgb(38, 191, 148)', 'rgb(245, 184, 73)'],
                        borderWidth: 0
                    }]
                },
                options: {
                    cutout: '78%',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } }
                }
            });
        </script>
    @endpush
</x-backend-layout>
