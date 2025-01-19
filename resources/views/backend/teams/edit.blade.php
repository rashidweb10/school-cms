<form id="edit" action="{{ route('teams.update', $pageData->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <!-- Name -->
        <div class="col-sm-6">
            <div class="form-group mb-2">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                <input value="{{ $pageData->name }}" name="name" type="text" class="form-control" minlength="3" maxlength="200" required>
            </div>
        </div>

        <!-- Image -->
        <div class="col-sm-6">
            <div class="form-group mb-2">
                <label for="image" class="form-label">Profile Picture <span class="text-danger">*</span></label>
                <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                    </div>
                    <div class="form-control file-amount">{{ __('Choose File') }}</div>
                    <input type="hidden" name="image" class="selected-files" value="{{ $pageData->image }}" required>
                </div>
                <div class="file-preview box sm"></div>
            </div>
        </div>        

        <!-- Slug -->
        <div class="col-sm-6 d-none">
            <div class="form-group mb-2">
                <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                <input name="slug" type="text" value="{{ $pageData->slug }}" class="form-control" minlength="3" maxlength="200" required>
            </div>
        </div>

        <!-- Designation -->
        <div class="col-sm-6">
            <div class="form-group mb-2">
                <label for="designation" class="form-label">Designation <span class="text-danger">*</span></label>
                <input value="{{ $pageData->designation }}" name="designation" type="text" class="form-control" maxlength="200" required>
            </div>
        </div>

        <!-- Categories -->
        <div class="col-sm-6">
            <div class="form-group mb-2">
                <label for="categories" class="form-label">Categories <span class="text-danger">*</span></label>
                <select name="categories[]" class="form-select select2" multiple required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ in_array($category->id, $pageData->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Description -->
        <div class="col-sm-12">
            <div class="form-group mb-2">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control text-editor" rows="4">{{ $pageData->description }}</textarea>
            </div>
        </div>

        <!-- Company -->
        <div class="col-sm-6">
            <div class="form-group mb-2">
                <label for="company_id" class="form-label">Company <span class="text-danger">*</span></label>
                <select name="company_id" class="form-select" required>
                    <option value="" selected>--Select--</option>
                    @foreach (getCompanyList() as $index => $row)
                        <option value="{{ $row->id }}" 
                            {{ $pageData->company_id == $row->id ? 'selected' : '' }}>
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
                    <option value="1" {{ $pageData->is_active == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $pageData->is_active == 0 ? 'selected' : '' }}>Inactive</option>
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
    // Initialize validation, text editor, and select2
    initValidate('#edit'); 
    initSelect2('.select2');
    initTextEditor();

    // Handle form submission
    $("#edit").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, callbackTeam);
    });

    // Callback after form submission
    const callbackTeam = function(response) {
        setTimeout(function() {
            location.reload(); // Reload the page after a successful form submission
        }, 1500);
    }

    // AIZ.uploader.initForInput();
    // AIZ.uploader.removeAttachment();
    AIZ.uploader.previewGenerate();
});

</script>

<script>
    // initialization of aiz uploader

</script>