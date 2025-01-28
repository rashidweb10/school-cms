
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
$video = $pageData->meta->where('meta_key', 'video')->first()->meta_value ?? '';
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
     <!--for milestones-->      
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












<hr>
<!--Banner Title --done
Banner Images - multiple

About title
About Description
Schools - will directly come from companies

About Image 2
About title 2
About Description 2

vision mission values -- (with text & description) add more-->

Milestones with text & text - 1

video url (youtube)

updates
title, image, short description, url -- add more

Quck links 
title, image, url -- add more