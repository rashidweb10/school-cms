@php
    $color = $color ?? '#3b82f6';
    $href = !empty($url) ? $url : 'javascript:void(0)';
@endphp
<div class="col-xl-3 col-md-6">
    <a href="{{ $href }}" class="dashboard-stat-card text-decoration-none d-block">
        <h5 class="dashboard-stat-title" style="color: {{ $color }}">{{ $name }}</h5>
        <div class="dashboard-stat-row">
            <span class="dashboard-stat-icon" style="background-color: {{ $color }}">
                <i class="{{ $icon }}"></i>
            </span>
            <span class="dashboard-stat-count">{{ number_format((int) $count) }}</span>
        </div>
    </a>
</div>
