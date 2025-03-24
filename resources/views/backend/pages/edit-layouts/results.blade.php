@php
    $results = json_decode($pageData->meta->where('meta_key', 'results')->first()->meta_value ?? '[]', true);
@endphp


<div class="row">
    <div class="col-md-12">
        <hr>
        <h4 class="text-primary">Results Section</h4>
    </div>    
    <div class="results-target">
        @if(isset($results['itration']) && is_array($results['itration']))
            @foreach($results['itration'] as $index => $itration)
                <div class="row remove-parent">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Results Section <span class="text-danger">*</span></label>
                        <input value="{{ $index }}" name="meta[results][itration][]" type="hidden" required>
                    </div> 
                    <div class="col-md">
                        <div class="form-group mb-2">
                            <div class="input-group" data-toggle="aizuploader" data-type="document" data-multiple="false">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input type="hidden" 
                                    name="meta[results][image][]" 
                                    class="selected-files" 
                                    value="{{ $results['image'][$index] ?? '' }}" 
                                    required>
                            </div>
                            <div class="file-preview box sm"></div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group mb-2">
                            <input value="{{ $results['title'][$index] ?? '' }}" 
                                name="meta[results][title][]" 
                                type="text" 
                                class="form-control" 
                                minlength="3" 
                                maxlength="200" 
                                placeholder="Enter Title" 
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
                    <label for="name" class="form-label">Results Section <span class="text-danger">*</span></label>
                    <input value="data" name="meta[results][itration][]" type="hidden" required>
                </div> 
                <div class="col-md">
                    <div class="form-group mb-2">
                        <div class="input-group" data-toggle="aizuploader" data-type="document" data-multiple="false">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                            </div>
                            <div class="form-control file-amount">{{ __('Choose File') }}</div>
                            <input type="hidden" name="meta[results][image][]" class="selected-files" required>
                        </div>
                        <div class="file-preview box sm"></div>
                    </div>
                </div> 
                <div class="col-md">
                    <div class="form-group mb-2">
                        <input value="" name="meta[results][title][]" type="text" class="form-control" minlength="3" maxlength="200" placeholder="Enter Title" required>
                    </div>
                </div>                              
                <div class="col-md-auto">
                    <button type="button" class="btn btn-icon btn-circle btn-soft-danger" data-toggle="remove-parent" data-parent=".remove-parent">
                        <i class="ti ti-x"></i>
                    </button>
                </div>               
            </div>   
        '
        data-target=".results-target">
        <i class="ti ti-plus"></i>
        <span class="ml-2">Add More</span>
    </button>     
</div>