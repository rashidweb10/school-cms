@php
    $gallery_images = array_filter(explode(',', $pageData->gallery ?? ''));
@endphp

@if(!empty($pageData->name))
    <h1>Campus : {{ $pageData->name }}</h1>
@endif

@if(!empty($pageData->description))
    <p>{!! $pageData->description !!}</p>
@endif

@if(!empty($gallery_images))
    <div class="gallery row g-4">
        @foreach($gallery_images as $index => $id)
            <div class="event_box col-md-3">
                <a href="{{ central_asset(uploaded_asset($id)) }}" class="bounce" data-fancybox="gallery" data-caption="{{ uploaded_asset_name($id) }}">
                    <img src="{{ central_asset(uploaded_asset($id, 1)) }}" alt="{{ uploaded_asset_name($id) }}">
                </a>
            </div>
        @endforeach
    </div>
@else
<div class="gallery row g-4 mt-3">
        <div class="event_box col-md-12">
            <h3>No Data Found</h3>
        </div>
</div>
@endif
