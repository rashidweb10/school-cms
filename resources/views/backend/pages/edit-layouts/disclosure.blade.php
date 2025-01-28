
@php
    $disclosure = json_decode($pageData->meta->where('meta_key', 'disclosure')->first()->meta_value ?? '', true);
@endphp

<div class="{{$pageData->layout}}-target">
    @if(isset($disclosure['itration']) && is_array($disclosure['itration']))
        @foreach($disclosure['itration'] as $index => $itration)
            <div class="row remove-parent">
                <div class="col-md-12">
                    <label for="name" class="form-label">Attachments <span class="text-danger">*</span></label>
                    <input value="{{ $index }}" name="meta[disclosure][itration][]" type="hidden" required>
                </div>    
                <div class="col-md">
                    <div class="form-group mb-2">
                        <div class="input-group" data-toggle="aizuploader" data-type="document" data-multiple="true">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                            </div>
                            <div class="form-control file-amount">{{ __('Choose File') }}</div>
                            <input type="hidden" 
                                name="meta[disclosure][attachments][]" 
                                class="selected-files" 
                                value="{{ $disclosure['attachments'][$index] ?? '' }}" 
                                required>
                        </div>
                        <div class="file-preview box sm"></div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
<button
    type="button"
    class="mt-1 btn btn-soft-success btn-icon w-100 d-none"
    data-toggle="add-more"
    data-content='
        <div class="row remove-parent">
            <div class="col-md-12">
                <label for="name" class="form-label">Attachments <span class="text-danger">*</span></label>
                <input value="data" name="meta[disclosure][itration][]" type="hidden" required>
            </div>   
            <div class="col-md">
                <div class="form-group mb-2">
                    <div class="input-group" data-toggle="aizuploader" data-type="document" data-multiple="false">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                        </div>
                        <div class="form-control file-amount">{{ __('Choose File') }}</div>
                        <input type="hidden" name="meta[disclosure][attachments][]" class="selected-files" required>
                    </div>
                    <div class="file-preview box sm"></div>
                </div>
            </div>
        </div>   
    '
    data-target=".{{$pageData->layout}}-target">
    <i class="ti ti-plus"></i>
    <span class="ml-2">Add More</span>
</button>

@if(empty($disclosure))
    <script defer>
        $(document).ready(function() {
            $('.btn-icon').click();
        });
    </script>
@endif