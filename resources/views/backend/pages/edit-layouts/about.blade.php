@php

    $about_description = $pageData->meta->where('meta_key', 'about_description')->first()->meta_value ?? '';
    $about_image = $pageData->meta->where('meta_key', 'about_image')->first()->meta_value ?? '';

    $about_school_description = $pageData->meta->where('meta_key', 'about_school_description')->first()->meta_value ?? '';

    $mission_title = $pageData->meta->where('meta_key', 'mission_title')->first()->meta_value ?? '';
    $mission_description = $pageData->meta->where('meta_key', 'mission_description')->first()->meta_value ?? '';
    $vision_title = $pageData->meta->where('meta_key', 'vision_title')->first()->meta_value ?? '';
    $vision_description = $pageData->meta->where('meta_key', 'vision_description')->first()->meta_value ?? '';
    $value_title = $pageData->meta->where('meta_key', 'value_title')->first()->meta_value ?? '';
    $value_description = $pageData->meta->where('meta_key', 'value_description')->first()->meta_value ?? '';

    $awards = json_decode($pageData->meta->where('meta_key', 'awards')->first()->meta_value ?? '[]', true);

@endphp

<div class="row">
    <div class="col-md-12">
        <hr>
        <h4 class="text-primary">About Section</h4>
    </div> 
    <div class="col-md-12">
        <label for="name" class="form-label">Image<span class="text-danger">*</span></label>
        <div class="form-group mb-2">
            <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                </div>
                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                <input value="{{$about_image}}" type="hidden" name="meta[about_image]" class="selected-files" required>
            </div>
            <div class="file-preview box sm"></div>
        </div>
    </div>               
    <div class="col-md-12 form-group mb-2">
        <label for="content" class="form-label">Description <span class="text-danger">*</span></label>
        <textarea name="meta[about_description]" class="form-control text-editor" rows="4" required>{{$about_description}}</textarea>
    </div>     
</div>

<div class="row">
    <div class="col-md-12">
        <hr>
        <h4 class="text-primary">School Information Section</h4>
    </div>               
    <div class="col-md-12 form-group mb-2">
        <label for="content" class="form-label">Description <span class="text-danger">*</span></label>
        <textarea name="meta[about_school_description]" class="form-control text-editor" rows="4" required>{{$about_school_description}}</textarea>
    </div>     
</div>

<div class="row">
    <div class="col-md-12">
        <hr>
        <h4 class="text-primary">Mission & Vision Section</h4>
    </div>     
    <div class="col-md-6 form-group mb-2">
        <label for="name" class="form-label">Title<span class="text-danger">*</span></label>
        <input class="form-control" value="{{$mission_title}}" name="meta[mission_title]" type="text" required>
    </div>   
    <div class="col-md-6 form-group mb-2">
        <label for="content" class="form-label">Description<span class="text-danger">*</span></label>
        <textarea name="meta[mission_description]" class="form-control" rows="2" required>{{$mission_description}}</textarea>
    </div> 
    <div class="col-md-6 form-group mb-2">
        <label for="name" class="form-label">Title<span class="text-danger">*</span></label>
        <input class="form-control" value="{{$vision_title}}" name="meta[vision_title]" type="text" required>
    </div>   
    <div class="col-md-6 form-group mb-2">
        <label for="content" class="form-label">Description<span class="text-danger">*</span></label>
        <textarea name="meta[vision_description]" class="form-control" rows="2" required>{{$vision_description}}</textarea>
    </div>  
    <!-- <div class="col-md-6 form-group mb-2">
        <label for="name" class="form-label">Title<span class="text-danger">*</span></label>
        <input class="form-control" value="{{$value_title}}" name="meta[value_title]" type="text" required>
    </div>   
    <div class="col-md-6 form-group mb-2">
        <label for="content" class="form-label">Description<span class="text-danger">*</span></label>
        <textarea name="meta[value_description]" class="form-control" rows="2" required>{{$value_description}}</textarea>
    </div>              -->
</div> 

<div class="row">
    <div class="col-md-12">
        <hr>
        <h4 class="text-primary">Awards & Achievements Section</h4>
    </div>    
    <div class="awards-target">
        @if(isset($awards['itration']) && is_array($awards['itration']))
            @foreach($awards['itration'] as $index => $itration)
                <div class="row remove-parent">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Awards & Achievements</label>
                        <input value="{{ $index }}" name="meta[awards][itration][]" type="hidden">
                    </div> 
                    <div class="col-md">
                        <div class="form-group mb-2">
                            <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input type="hidden" 
                                    name="meta[awards][image][]" 
                                    class="selected-files" 
                                    value="{{ $awards['image'][$index] ?? '' }}" 
                                    required>
                            </div>
                            <div class="file-preview box sm"></div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group mb-2">
                            <input value="{{ $awards['title'][$index] ?? '' }}" 
                                name="meta[awards][title][]" 
                                type="text" 
                                class="form-control" 
                                minlength="3" 
                                maxlength="200" 
                                placeholder="Enter Title" 
                                >
                        </div>
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
                    <label for="name" class="form-label">Awards & Achievements <span class="text-danger">*</span></label>
                    <input value="data" name="meta[awards][itration][]" type="hidden" required>
                </div> 
                <div class="col-md">
                    <div class="form-group mb-2">
                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                            </div>
                            <div class="form-control file-amount">{{ __('Choose File') }}</div>
                            <input type="hidden" name="meta[awards][image][]" class="selected-files" required>
                        </div>
                        <div class="file-preview box sm"></div>
                    </div>
                </div> 
                <div class="col-md">
                    <div class="form-group mb-2">
                        <input value="" name="meta[awards][title][]" type="text" class="form-control" minlength="3" maxlength="200" placeholder="Enter Title" required>
                    </div>
                </div>                              
                <div class="col-md-auto">
                    <button type="button" class="btn btn-icon btn-circle btn-soft-danger" data-toggle="remove-parent" data-parent=".remove-parent">
                        <i class="ti ti-x"></i>
                    </button>
                </div>               
            </div>   
        '
        data-target=".awards-target">
        <i class="ti ti-plus"></i>
        <span class="ml-2">Add More</span>
    </button>     
</div> 