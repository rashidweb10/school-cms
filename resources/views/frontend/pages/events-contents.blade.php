
@if($pageData->isNotEmpty())
    <div class="gallery row g-4">
        @foreach($pageData as $index => $data)
            @php
                $gallery_images = array_filter(explode(',', $data->gallery ?? ''));
            @endphp        
            <div class="event_box col-md-4">

                {{-- Thumbnail --}}
                <a 
                    href="{{ central_asset(uploaded_asset($data->thumbnail)) }}" 
                    class="bounce" 
                    data-fancybox="gallery_{{ $index }}"
                    data-caption="{{ uploaded_asset_name($data->thumbnail) ?? '' }}."
                >
                    <img 
                        src="{{ central_asset(uploaded_asset($data->thumbnail)) }}" 
                        alt="{{ uploaded_asset_name($data->thumbnail) }}">
                </a>

                <div class="event_name">
                    <p>{{ $data->name }}</p>
                </div>

                {{-- Other Gallery Images (excluding thumbnail) --}}
                @foreach($gallery_images as $image)
                    @if($image != $data->thumbnail)
                        <a 
                            href="{{ central_asset(uploaded_asset($image)) }}"
                            data-fancybox="gallery_{{ $index }}"
                            data-caption="{{ uploaded_asset_name($image) ?? '' }}."
                            class="d-none">
                            <img src="{{ central_asset(uploaded_asset($image)) }}" alt="{ uploaded_asset_name($image) ?? '' }}">
                        </a>
                    @endif
                @endforeach

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
