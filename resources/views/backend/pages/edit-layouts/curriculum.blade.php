
@php
    $meta = $pageData->meta->where('meta_key', 'curriculum')->first();
    $curriculum = $meta ? json_decode($meta->meta_value, true) : null;
@endphp

<div class="{{$pageData->layout}}-target">
    @if(isset($curriculum['itration']) && is_array($curriculum['itration']))
        @foreach($curriculum['itration'] as $index => $itration)
            <div class="row remove-parent">
                <div class="col-md-12">
                    <label for="name" class="form-label">Curriculum Information <span class="text-danger">*</span></label>
                    <input value="{{ $index }}" name="meta[curriculum][itration][]" type="hidden" required>
                </div> 
                <div class="col-md">
                    <div class="form-group mb-2">
                        <input value="{{ $curriculum['title'][$index] ?? '' }}" 
                            name="meta[curriculum][title][]" 
                            type="text" 
                            class="form-control" 
                            minlength="3" 
                            maxlength="200" 
                            placeholder="Title" 
                            required>
                    </div>
                </div>   
                <div class="col-md">
                    <div class="form-group mb-2">
                        <input value="{{ $curriculum['icon'][$index] ?? '' }}" 
                            name="meta[curriculum][icon][]" 
                            type="text" 
                            class="form-control" 
                            minlength="3" 
                            maxlength="200" 
                            placeholder="Icon" 
                            required>
                    </div>
                </div>
                <div class="col-md">
                    <textarea name="meta[curriculum][description][]" class="form-control" rows="2" placeholder="Description" required>{{ $curriculum['description'][$index] ?? '' }}</textarea>
                </div>                
                <div class="col-md-auto">
                    <button type="button" class="btn btn-icon btn-circle btn-soft-danger" data-toggle="remove-parent" data-parent=".remove-parent">
                        <i class="ti ti-x"></i>
                    </button>
                </div>                
            </div>
        @endforeach
    @endif
</div>
<button
    type="button"
    class="mt-1 btn btn-soft-success btn-icon w-100"
    data-toggle="add-more"
    data-content='
        <div class="row remove-parent">
            <div class="col-md-12">
                <label for="name" class="form-label">Curriculum Information <span class="text-danger">*</span></label>
                <input value="data" name="meta[curriculum][itration][]" type="hidden" required>
            </div> 
            <div class="col-md">
                <div class="form-group mb-2">
                    <input value="" name="meta[curriculum][title][]" type="text" class="form-control" minlength="3" maxlength="200" placeholder="Title" required>
                </div>
            </div>   
            <div class="col-md">
                <div class="form-group mb-2">
                    <input value="" 
                        name="meta[curriculum][icon][]" 
                        type="text" 
                        class="form-control" 
                        minlength="3" 
                        maxlength="200" 
                        placeholder="Icon" 
                        required>
                </div>
            </div>            
            <div class="col-md">
                <textarea name="meta[curriculum][description][]" class="form-control" rows="2" placeholder="Description" required></textarea>
            </div>
            <div class="col-md-auto">
                <button type="button" class="btn btn-icon btn-circle btn-soft-danger" data-toggle="remove-parent" data-parent=".remove-parent">
                    <i class="ti ti-x"></i>
                </button>
            </div>             
        </div>   
    '
    data-target=".{{$pageData->layout}}-target">
    <i class="ti ti-plus"></i>
    <span class="ml-2">Add More</span>
</button>