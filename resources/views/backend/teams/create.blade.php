<form id="create" action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <!-- Name -->
        <div class="col-sm-6">
            <div class="form-group mb-2">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                <input value="" name="name" type="text" class="form-control" minlength="3" maxlength="200" required>
            </div>
        </div>

        <!-- Image -->
        <div class="col-sm-6">
            <div class="form-group mb-2">
                <label for="name" class="form-label">Profile Picture <span class="text-danger">*</span></label>
                <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                    </div>
                    <div class="form-control file-amount">{{ __('Choose File') }}</div>
                    <input type="hidden" name="image" class="selected-files" required>
                </div>
                <div class="file-preview box sm"></div>
            </div>
        </div>        

        <!-- Slug -->
        <div class="col-sm-6 d-none">
            <div class="form-group mb-2">
                <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                <input name="slug" type="text" value="{{time()}}" class="form-control" minlength="3" maxlength="200" required>
            </div>
        </div>

        <!-- Designation -->
        <div class="col-sm-6">
            <div class="form-group mb-2">
                <label for="designation" class="form-label">Designation <span class="text-danger">*</span></label>
                <input value="" name="designation" type="text" class="form-control" maxlength="200" required>
            </div>
        </div>
 
        <!-- Categories (multi-select dropdown) -->
        <div class="col-sm-6">
            <div class="form-group mb-2">
                <label for="categories" class="form-label">Categories <span class="text-danger">*</span></label>
                <select name="categories[]" id="categories" class="form-select select2" multiple required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Description -->
        <div class="col-sm-12">
            <div class="form-group mb-2">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control text-editor" rows="4">{{ old('description') }}</textarea>
            </div>
        </div>

        <!-- Company (dropdown) -->
        <div class="col-sm-6">
            <div class="form-group mb-2">
                <label for="company_id" class="form-label">Company <span class="text-danger">*</span></label>
                <select name="company_id" id="company_id" class="form-select" required>
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

    const $companySelect = $('#company_id');
    const $categoriesSelect = $('#categories');

    function loadCategoriesByCompany(companyId) {
        $categoriesSelect.html('');

        if (!companyId) {
            $categoriesSelect.trigger('change');
            return;
        }

        $.ajax({
            url: "{{ route('teams.categories.byCompany') }}",
            method: 'GET',
            data: { company_id: companyId },
            success: function(response) {
                if (!response || !response.status) {
                    $categoriesSelect.trigger('change');
                    return;
                }

                const options = response.data.map(function(category) {
                    return '<option value="' + category.id + '">' + category.name + '</option>';
                });

                $categoriesSelect.html(options.join(''));
                $categoriesSelect.trigger('change');
            },
            error: function() {
                $categoriesSelect.html('');
                $categoriesSelect.trigger('change');
            }
        });
    }

    $companySelect.on('change', function() {
        loadCategoriesByCompany($(this).val());
    });

    loadCategoriesByCompany($companySelect.val());

    // Handle form submission
    $("#create").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, callbackTeam);
    });

    // Callback after form submission
    const callbackTeam = function(response) {
        setTimeout(function() {
            location.reload(); // Reload the page after a successful form submission
        }, 1500);
    }
});
</script>
