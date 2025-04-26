@php
    $attachment = $pageData->meta->where('meta_key', 'attachment')->first()->meta_value ?? '';
@endphp
<div class="row">
    <div class="col-md-12">
        <hr>
        <h4 class="text-primary">Attachment Section</h4>
    </div>     
    <div class="col-md-12">
        <label for="name" class="form-label">Attachment <span class="text-danger">*</span></label>
        <div class="form-group mb-2">
            <div class="input-group" data-toggle="aizuploader" data-type="document" data-multiple="false">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                </div>
                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                <input value="{{$attachment}}" type="hidden" name="meta[attachment]" class="selected-files" required>
            </div>
            <div class="file-preview box sm"></div>
        </div>
    </div>    
</div> 