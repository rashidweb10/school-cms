<form id="edit" action="{{ route('team-categories.update', $pageData->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <!-- Name -->
        <div class="col-sm-12">
            <div class="form-group mb-2">
                <label for="name" class="form-label">Name</label>
                <input value="{{ old('name', $pageData->name) }}" name="name" type="text" class="form-control" minlength="3" maxlength="200" required>
            </div>
        </div>

        <!-- Slug -->
        <div class="col-sm-6 d-none">
            <div class="form-group mb-2">
                <label for="slug" class="form-label">Slug</label>
                <input value="{{ old('slug', $pageData->slug) }}" name="slug" type="text" class="form-control" minlength="3" maxlength="200" required>
            </div>
        </div>

        <!-- Description -->
        <div class="col-sm-12">
            <div class="form-group mb-2">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control text-editor" rows="4">{{ old('description', $pageData->description) }}</textarea>
            </div>
        </div>

        <!-- Meta Title -->
        <div class="col-sm-6">
            <div class="form-group mb-2">
                <label for="meta_title" class="form-label">Meta Title</label>
                <input value="{{ old('meta_title', $pageData->meta_title) }}" name="meta_title" type="text" class="form-control" maxlength="200">
            </div>
        </div>

        <!-- Meta Description -->
        <div class="col-sm-6">
            <div class="form-group mb-2">
                <label for="meta_description" class="form-label">Meta Description</label>
                <input value="{{ old('meta_description', $pageData->meta_description) }}" name="meta_description" type="text" class="form-control" maxlength="200">
            </div>
        </div>

        <!-- Company (dropdown) -->
        <div class="col-sm-6">
            <div class="form-group mb-2">
                <label for="is_active" class="form-label">School</label>
                <select name="company_id" class="form-select" required>
                    <option value="" selected>--Select--</option>
                    @foreach (getCompanyList() as $index => $row)
                        <option value="{{ $row->id }}" 
                            @if(old('company_id', $pageData->company_id) == $row->id) selected @endif>
                            {{ $row->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>        

        <!-- Is Active (dropdown) -->
        <div class="col-sm-6">
            <div class="form-group mb-2">
                <label for="is_active" class="form-label">Status</label>
                <select name="is_active" class="form-select" required>
                    <option value="1" @if(old('is_active', $pageData->is_active) == 1) selected @endif>Active</option>
                    <option value="0" @if(old('is_active', $pageData->is_active) == 0) selected @endif>Inactive</option>
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
    initValidate('#edit'); // Initializes validation for the form
    initTextEditor();

    $("#edit").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, callbackEditForm);
    });

    const callbackEditForm = function(response) {
        setTimeout(function() {
            location.reload(); // Reload the page after a successful form submission
        }, 1500);
    }
});
</script>