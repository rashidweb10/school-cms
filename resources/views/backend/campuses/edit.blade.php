<form id="edit" action="{{ route($routeName . '.update', $pageData->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <!-- Name -->
        <div class="col-sm-12">
            <div class="form-group mb-2">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                <input value="{{ old('name', $pageData->name) }}" name="name" type="text" class="form-control" minlength="3" maxlength="200" required>
            </div>
        </div>

        <!-- Description -->
        <div class="col-sm-12">
            <div class="form-group mb-2">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control text-editor" rows="4">{{ old('description', $pageData->description) }}</textarea>
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
                    <input type="hidden" name="gallery" class="selected-files" value="{{ old('gallery', $pageData->gallery) }}" required>
                </div>
                <div class="file-preview box sm"></div>
            </div>
        </div>

        <!-- series -->
        <div class="col-sm-12">
            <div class="form-group mb-2">
                <label for="series" class="form-label">Series <span class="text-danger">*</span></label>
                <input value="{{ old('series', $pageData->series) }}" name="series" type="text" class="form-control" required>
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
                            @if($pageData->company_id == $row->id) selected @endif>
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
                    <option value="1" @if($pageData->is_active == 1) selected @endif>Active</option>
                    <option value="0" @if($pageData->is_active == 0) selected @endif>Inactive</option>
                </select>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="col-sm-12">
            <div class="text-center mt-1">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    // Initialize validation and text editor
    initValidate('#edit'); 
    initSelect2('.select2')
    initTextEditor();
    AIZ.uploader.previewGenerate();

    // Handle form submission
    $("#edit").submit(function(e) {
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