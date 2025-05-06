
@if($pageData->isNotEmpty())
    <div class="gallery row g-4">
        @foreach($pageData as $index => $data)
            @php
                $gallery_images = array_filter(explode(',', $data->gallery ?? ''));
                //$image_thumb_name = uploaded_asset_name($data->thumbnail) ?? '';
                $image_thumb_name = "Image ".$index;
            @endphp        
            <div class="event_box col-md-3 col-6 event_main_box">

                {{-- Thumbnail --}}
                <a 
                    href="{{ central_asset(uploaded_asset($data->thumbnail)) }}" 
                    class="bounce" 
                    data-fancybox="gallery_{{ $index }}"
                    data-caption="{{ $image_thumb_name }}"
                >
                    <img 
                        src="{{ central_asset(uploaded_asset($data->thumbnail)) }}" 
                        alt="{{ $image_thumb_name }}">
                </a>

                <div class="event_name">
                    <p>{{ $data->name }}</p>
                </div>

                {{-- Other Gallery Images (excluding thumbnail) --}}
                @foreach($gallery_images as $image)
                    @if($image != $data->thumbnail)
                        @php
                            //$image_gallery_name = uploaded_asset_name($image) ?? '';
                            $image_gallery_name = "Image";
                        @endphp                     
                        <a 
                            href="{{ central_asset(uploaded_asset($image)) }}"
                            data-fancybox="gallery_{{ $index }}"
                            data-caption="{{ $image_gallery_name }}"
                            class="d-none">
                            <img class="lazy-load" data-src="{{ central_asset(uploaded_asset($image)) }}" alt="{{ $image_gallery_name }}">
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

<script>
    // window.addEventListener('DOMContentLoaded', () => {
    //     document.querySelectorAll('img.lazy-load').forEach(img => {
    //         img.setAttribute('src', img.getAttribute('data-src'));
    //         img.removeAttribute('data-src');
    //     });
    // });
</script>
