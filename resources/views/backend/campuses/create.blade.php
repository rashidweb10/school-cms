<form id="create" action="{{ route($routeName . '.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <!-- Name -->
        <div class="col-sm-12">
            <div class="form-group mb-2">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                <input value="" name="name" type="text" class="form-control" minlength="3" maxlength="200" required>
            </div>
        </div>

        <!-- Description -->
        <div class="col-sm-12">
            <div class="form-group mb-2">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control text-editor" rows="4">{{ old('description') }}</textarea>
            </div>
        </div>

        <!-- Image -->
        <div class="col-sm-12">
            <div class="form-group mb-2">
                <label for="name" class="form-label">Gallery Images <span class="text-danger">*</span></label>
                <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                    </div>
                    <div class="form-control file-amount">{{ __('Choose File') }}</div>
                    <input type="hidden" name="gallery" class="selected-files" required>
                </div>
                <div class="file-preview box sm"></div>
            </div>
        </div>                

        <!-- Company (dropdown) -->
        <div class="col-sm-6">
            <div class="form-group mb-2">
                <label for="company_id" class="form-label">Company <span class="text-danger">*</span></label>
                <select name="company_id" class="form-select" required>
                    <option value="" selected>--Select--</option>
                    @foreach (getCompanyList() as $index => $row)
                        <option value="{{ $row->id }}" 
                            @if(auth()->user()->company_id == $row->id) selected @endif>
                            {{ $row->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Status -->
        <div class="col-sm-6">
            <div class="form-group mb-2">
                <label for="is_active" class="form-label">Status <span class="text-danger">*</span></label>
                <select name="is_active" class="form-select select2" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="col-sm-12">
            <div class="text-center mt-1">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    // Initialize validation and text editor
    initValidate('#create'); 
    initSelect2('.select2')
    initTextEditor();
    AIZ.uploader.previewGenerate();

    // Handle form submission
    $("#create").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, callbackCampus);
    });

    // Callback after form submission
    const callbackCampus = function(response) {
        setTimeout(function() {
            location.reload(); // Reload the page after a successful form submission
        }, 1500);
    }
});
</script>