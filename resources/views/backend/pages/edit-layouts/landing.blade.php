
@php
$banner_title = $pageData->meta->where('meta_key', 'banner_title')->first()->meta_value ?? '';
$banner_images = $pageData->meta->where('meta_key', 'banner_images')->first()->meta_value ?? '';
$about_title = $pageData->meta->where('meta_key', 'about_title')->first()->meta_value ?? '';
$about_description = $pageData->meta->where('meta_key', 'about_description')->first()->meta_value ?? '';
$about_title2 = $pageData->meta->where('meta_key', 'about_title2')->first()->meta_value ?? '';
$about_description2 = $pageData->meta->where('meta_key', 'about_description2')->first()->meta_value ?? '';
$about_image = $pageData->meta->where('meta_key', 'about_image')->first()->meta_value ?? '';
$mission_title = $pageData->meta->where('meta_key', 'mission_title')->first()->meta_value ?? '';
$mission_description = $pageData->meta->where('meta_key', 'mission_description')->first()->meta_value ?? '';
$vision_title = $pageData->meta->where('meta_key', 'vision_title')->first()->meta_value ?? '';
$vision_description = $pageData->meta->where('meta_key', 'vision_description')->first()->meta_value ?? '';
$value_title = $pageData->meta->where('meta_key', 'value_title')->first()->meta_value ?? '';
$value_description = $pageData->meta->where('meta_key', 'value_description')->first()->meta_value ?? '';
$landing_milestones = json_decode($pageData->meta->where('meta_key', 'landing_milestones')->first()->meta_value ?? '[]', true);
$video = $pageData->meta->where('meta_key', 'video')->first()->meta_value ?? '';
$landing_quicklinks = json_decode($pageData->meta->where('meta_key', 'landing_quicklinks')->first()->meta_value ?? '[]', true);
$landing_updates = json_decode($pageData->meta->where('meta_key', 'landing_updates')->first()->meta_value ?? '[]', true);
@endphp

<div class="row">
    <div class="col-md-12">
        <hr>
        <h4 class="text-primary">Banner Section</h4>
    </div>     
    <div class="col-md-6 form-group">
        <label for="name" class="form-label">Title <span class="text-danger">*</span></label>
        <input class="form-control" value="{{$banner_title}}" name="meta[banner_title]" type="text" required>
    </div> 
    <div class="col-md-6">
        <label for="name" class="form-label">Banners <span class="text-danger">*</span></label>
        <div class="form-group mb-2">
            <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                </div>
                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                <input value="{{$banner_images}}" type="hidden" name="meta[banner_images]" class="selected-files" required>
            </div>
            <div class="file-preview box sm"></div>
        </div>
    </div>    
</div> 

<div class="row">
    <div class="col-md-12">
        <hr>
        <h4 class="text-primary">About Section</h4>
    </div>     
    <div class="col-md-12 form-group mb-2">
        <label for="name" class="form-label">Title 1 <span class="text-danger">*</span></label>
        <input class="form-control" value="{{$about_title}}" name="meta[about_title]" type="text" required>
    </div>   
    <div class="col-md-12 form-group mb-2">
        <label for="content" class="form-label">Description 1 <span class="text-danger">*</span></label>
        <textarea name="meta[about_description]" class="form-control text-editor" rows="4" required>{{$about_description}}</textarea>
    </div>   
    <div class="col-md-6 form-group mb-2">
        <label for="name" class="form-label">Title 2<span class="text-danger">*</span></label>
        <input class="form-control" value="{{$about_title2}}" name="meta[about_title2]" type="text" required>
    </div>   
    <div class="col-md-6">
        <label for="name" class="form-label">Image <span class="text-danger">*</span></label>
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
        <label for="content" class="form-label">Description 2 <span class="text-danger">*</span></label>
        <textarea name="meta[about_description2]" class="form-control text-editor" rows="4" required>{{$about_description2}}</textarea>
    </div>     
</div> 

<div class="row">
    <div class="col-md-12">
        <hr>
        <h4 class="text-primary">Mission, Vision & values Section</h4>
    </div>     
    <div class="col-md-6 form-group mb-2">
        <label for="name" class="form-label">Mission Title<span class="text-danger">*</span></label>
        <input class="form-control" value="{{$mission_title}}" name="meta[mission_title]" type="text" required>
    </div>   
    <div class="col-md-6 form-group mb-2">
        <label for="content" class="form-label">Mission Description<span class="text-danger">*</span></label>
        <textarea name="meta[mission_description]" class="form-control" rows="2" required>{{$mission_description}}</textarea>
    </div> 
    <div class="col-md-6 form-group mb-2">
        <label for="name" class="form-label">Vision Title<span class="text-danger">*</span></label>
        <input class="form-control" value="{{$vision_title}}" name="meta[vision_title]" type="text" required>
    </div>   
    <div class="col-md-6 form-group mb-2">
        <label for="content" class="form-label">Vision Description<span class="text-danger">*</span></label>
        <textarea name="meta[vision_description]" class="form-control" rows="2" required>{{$vision_description}}</textarea>
    </div>  
    <div class="col-md-6 form-group mb-2">
        <label for="name" class="form-label">Value Title<span class="text-danger">*</span></label>
        <input class="form-control" value="{{$value_title}}" name="meta[value_title]" type="text" required>
    </div>   
    <div class="col-md-6 form-group mb-2">
        <label for="content" class="form-label">Value Description<span class="text-danger">*</span></label>
        <textarea name="meta[value_description]" class="form-control" rows="2" required>{{$value_description}}</textarea>
    </div>             
</div> 

<div class="row">
    <div class="col-md-12">
        <hr>
        <h4 class="text-primary">Milestones</h4>
    </div>    
    <div class="{{$pageData->layout}}-target">
        @if(isset($landing_milestones['itration']) && is_array($landing_milestones['itration']))
            @foreach($landing_milestones['itration'] as $index => $itration)
                <div class="row remove-parent">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Milestones <span class="text-danger">*</span></label>
                        <input value="{{ $index }}" name="meta[landing_milestones][itration][]" type="hidden" required>
                    </div> 
                    <div class="col-md">
                        <div class="form-group mb-2">
                            <input value="{{ $landing_milestones['title'][$index] ?? '' }}" 
                                name="meta[landing_milestones][title][]" 
                                type="text" 
                                class="form-control" 
                                minlength="3" 
                                maxlength="200" 
                                placeholder="E.g +1000" 
                                required>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group mb-2">
                            <input value="{{ $landing_milestones['description'][$index] ?? '' }}" 
                                name="meta[landing_milestones][description][]" 
                                type="text" 
                                class="form-control" 
                                minlength="3" 
                                maxlength="200" 
                                placeholder="E.g Years in Education" 
                                required>
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
                    <label for="name" class="form-label">Milestones <span class="text-danger">*</span></label>
                    <input value="data" name="meta[landing_milestones][itration][]" type="hidden" required>
                </div> 
                <div class="col-md">
                    <div class="form-group mb-2">
                        <input value="" name="meta[landing_milestones][title][]" type="text" class="form-control" minlength="3" maxlength="200" placeholder="E.g +1000" required>
                    </div>
                </div> 
                <div class="col-md">
                    <div class="form-group mb-2">
                        <input value="" name="meta[landing_milestones][description][]" type="text" class="form-control" minlength="3" maxlength="200" placeholder="E.g Years in Education" required>
                    </div>
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
</div> 

<div class="row">
    <div class="col-md-12">
        <hr>
        <h4 class="text-primary">Video Section</h4>
    </div>     
    <div class="col-md-12 form-group mb-2">
        <label for="name" class="form-label">Video<span class="text-danger">*</span></label>
        <input class="form-control" value="{{$video}}" name="meta[video]" type="text" required>
    </div>                
</div> 



<div class="row">
    <div class="col-md-12">
        <hr>
        <h4 class="text-primary">Updates</h4>
    </div>    
    <div class="updates-target">
        @if(isset($landing_updates['itration']) && is_array($landing_updates['itration']))
            @foreach($landing_updates['itration'] as $index => $itration)
                <div class="row remove-parent">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Updates <span class="text-danger">*</span></label>
                        <input value="{{ $index }}" name="meta[landing_updates][itration][]" type="hidden" required>
                    </div> 
                    <div class="col-md">
                        <div class="form-group mb-2">
                            <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input type="hidden" 
                                    name="meta[landing_updates][image][]" 
                                    class="selected-files" 
                                    value="{{ $landing_updates['image'][$index] ?? '' }}" 
                                    required>
                            </div>
                            <div class="file-preview box sm"></div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group mb-2">
                            <input value="{{ $landing_updates['title'][$index] ?? '' }}" 
                                name="meta[landing_updates][title][]" 
                                type="text" 
                                class="form-control" 
                                minlength="3" 
                                maxlength="200" 
                                placeholder="Enter Title" 
                                required>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group mb-2">
                            <input value="{{ $landing_updates['url'][$index] ?? '' }}" 
                                name="meta[landing_updates][url][]" 
                                type="text" 
                                class="form-control" 
                                minlength="3" 
                                maxlength="200" 
                                placeholder="Enter URL" 
                                required>
                        </div>
                    </div>                                       
                    <div class="col-md-auto">
                        <button type="button" class="btn btn-icon btn-circle btn-soft-danger" data-toggle="remove-parent" data-parent=".remove-parent">
                            <i class="ti ti-x"></i>
                        </button>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <textarea name="meta[landing_updates][description][]" class="form-control" rows="2" required>{{ $landing_updates['description'][$index] ?? '' }}</textarea>
                        </div>                
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
                    <label for="name" class="form-label">Updates <span class="text-danger">*</span></label>
                    <input value="data" name="meta[landing_updates][itration][]" type="hidden" required>
                </div> 
                <div class="col-md">
                    <div class="form-group mb-2">
                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                            </div>
                            <div class="form-control file-amount">{{ __('Choose File') }}</div>
                            <input type="hidden" name="meta[landing_updates][image][]" class="selected-files" required>
                        </div>
                        <div class="file-preview box sm"></div>
                    </div>
                </div> 
                <div class="col-md">
                    <div class="form-group mb-2">
                        <input value="" name="meta[landing_updates][title][]" type="text" class="form-control" minlength="3" maxlength="200" placeholder="Enter Title" required>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group mb-2">
                        <input value="" name="meta[landing_updates][url][]" type="text" class="form-control" minlength="3" maxlength="200" placeholder="Enter URL" required>
                    </div>
                </div>                              
                <div class="col-md-auto">
                    <button type="button" class="btn btn-icon btn-circle btn-soft-danger" data-toggle="remove-parent" data-parent=".remove-parent">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-2">
                        <textarea name="meta[landing_updates][description][]" class="form-control" rows="2" required></textarea>
                    </div>                
                </div>                
            </div>   
        '
        data-target=".updates-target">
        <i class="ti ti-plus"></i>
        <span class="ml-2">Add More</span>
    </button>     
</div>  


<div class="row">
    <div class="col-md-12">
        <hr>
        <h4 class="text-primary">Quick links</h4>
    </div>    
    <div class="quicklinks-target">
        @if(isset($landing_quicklinks['itration']) && is_array($landing_quicklinks['itration']))
            @foreach($landing_quicklinks['itration'] as $index => $itration)
                <div class="row remove-parent">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Quick links <span class="text-danger">*</span></label>
                        <input value="{{ $index }}" name="meta[landing_quicklinks][itration][]" type="hidden" required>
                    </div> 
                    <div class="col-md">
                        <div class="form-group mb-2">
                            <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input type="hidden" 
                                    name="meta[landing_quicklinks][icon][]" 
                                    class="selected-files" 
                                    value="{{ $landing_quicklinks['icon'][$index] ?? '' }}" 
                                    required>
                            </div>
                            <div class="file-preview box sm"></div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group mb-2">
                            <input value="{{ $landing_quicklinks['title'][$index] ?? '' }}" 
                                name="meta[landing_quicklinks][title][]" 
                                type="text" 
                                class="form-control" 
                                minlength="3" 
                                maxlength="200" 
                                placeholder="Enter Title" 
                                required>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group mb-2">
                            <input value="{{ $landing_quicklinks['url'][$index] ?? '' }}" 
                                name="meta[landing_quicklinks][url][]" 
                                type="text" 
                                class="form-control" 
                                minlength="3" 
                                maxlength="200" 
                                placeholder="Enter URL" 
                                required>
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
                    <label for="name" class="form-label">Quick links <span class="text-danger">*</span></label>
                    <input value="data" name="meta[landing_quicklinks][itration][]" type="hidden" required>
                </div> 
                <div class="col-md">
                    <div class="form-group mb-2">
                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                            </div>
                            <div class="form-control file-amount">{{ __('Choose File') }}</div>
                            <input type="hidden" name="meta[landing_quicklinks][icon][]" class="selected-files" required>
                        </div>
                        <div class="file-preview box sm"></div>
                    </div>
                </div> 
                <div class="col-md">
                    <div class="form-group mb-2">
                        <input value="" name="meta[landing_quicklinks][title][]" type="text" class="form-control" minlength="3" maxlength="200" placeholder="Enter Title" required>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group mb-2">
                        <input value="" name="meta[landing_quicklinks][url][]" type="text" class="form-control" minlength="3" maxlength="200" placeholder="Enter URL" required>
                    </div>
                </div>                              
                <div class="col-md-auto">
                    <button type="button" class="btn btn-icon btn-circle btn-soft-danger" data-toggle="remove-parent" data-parent=".remove-parent">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
            </div>   
        '
        data-target=".quicklinks-target">
        <i class="ti ti-plus"></i>
        <span class="ml-2">Add More</span>
    </button>     
</div>  