@php
    $career_meta = $pageData->meta->where('meta_key', 'career')->first();
    $career = $career_meta ? json_decode($career_meta->meta_value, true) : null;
@endphp

<div class="{{ $pageData->layout }}-target mt-3">
    @if(isset($career['itration']) && is_array($career['itration']))
        @foreach($career['itration'] as $index => $itration)
            <div class="row remove-parent">
                <div class="col-md-12">
                    <label for="name" class="form-label">Career Information <span class="text-danger">*</span></label>
                    <input value="{{ $index }}" name="meta[career][itration][]" type="hidden" required>
                </div> 
                <div class="col-md">
                    <div class="form-group mb-2">
                        <input value="{{ $career['job_code'][$index] ?? '' }}" name="meta[career][job_code][]" type="text" class="form-control" placeholder="Job Code" required>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group mb-2">
                        <input value="{{ $career['contact_number'][$index] ?? '' }}" name="meta[career][contact_number][]" type="number" class="form-control" placeholder="Contact Number" required>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group mb-2">
                        <input value="{{ $career['email_id'][$index] ?? '' }}" name="meta[career][email_id][]" type="email" class="form-control" placeholder="Email ID" required>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group mb-2">
                        <input value="{{ $career['admission_counselor'][$index] ?? '' }}" name="meta[career][admission_counselor][]" type="text" class="form-control" placeholder="Admission Counselor" required>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group mb-2">
                        <input value="{{ $career['job_type'][$index] ?? '' }}" name="meta[career][job_type][]" type="text" class="form-control" placeholder="Job Type" required>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group mb-2">
                        <input value="{{ $career['industry'][$index] ?? '' }}" name="meta[career][industry][]" type="text" class="form-control" placeholder="Industry" required>
                    </div>
                </div>
                <div class="col-md-12 mb-2">
                    <textarea name="meta[career][eligibility][]" class="form-control text-editor" rows="2" placeholder="Eligibility" required>{{ $career['eligibility'][$index] ?? '' }}</textarea>
                </div>
                <div class="col-md-auto text-end mb-2">
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
                <label for="name" class="form-label">Career Information <span class="text-danger">*</span></label>
                <input value="data" name="meta[career][itration][]" type="hidden" required>
            </div> 
            <div class="col-md">
                <div class="form-group mb-2">
                    <input value="" name="meta[career][job_code][]" type="text" class="form-control" placeholder="Job Code" required>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group mb-2">
                    <input value="" name="meta[career][contact_number][]" type="number" class="form-control" placeholder="Contact Number" required>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group mb-2">
                    <input value="" name="meta[career][email_id][]" type="email" class="form-control" placeholder="Email ID" required>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group mb-2">
                    <input value="" name="meta[career][admission_counselor][]" type="text" class="form-control" placeholder="Admission Counselor" required>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group mb-2">
                    <input value="" name="meta[career][job_type][]" type="text" class="form-control" placeholder="Job Type" required>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group mb-2">
                    <input value="" name="meta[career][industry][]" type="text" class="form-control" placeholder="Industry" required>
                </div>
            </div>
            <div class="col-md-12 mb-2">
                <textarea name="meta[career][eligibility][]" class="form-control text-editor" rows="2" placeholder="Eligibility" required></textarea>
            </div>
            <div class="col-md-auto text-end mb-2">
                <button type="button" class="btn btn-icon btn-circle btn-soft-danger" data-toggle="remove-parent" data-parent=".remove-parent">
                    <i class="ti ti-x"></i>
                </button>
            </div>
        </div>
    '
    data-target=".{{ $pageData->layout }}-target">
    <i class="ti ti-plus"></i>
    <span class="ml-2">Add More</span>
</button>

<script>
    $(document).ready(function() {
        // Automatically add one row if empty
        @if(empty($career))
            $('[data-toggle="add-more"]').click();
        @endif

        // Listen for new rows and initialize TinyMCE text editor
        $(document).on('click', '[data-toggle="add-more"]', function() {
            setTimeout(function() {
                $('.text-editor').each(function() {
                    // Generate unique ID for each un-IDed text editor
                    if (!$(this).attr('id')) {
                        var uniqueId = 'editor-' + Math.random().toString(36).substr(2, 9);
                        $(this).attr('id', uniqueId);
                    }
                    var id = $(this).attr('id');
                    
                    // Initialize TinyMCE if not already initialized
                    if (typeof tinymce !== "undefined" && !tinymce.get(id)) {
                        tinymce.init({
                            license_key: "gpl",
                            selector: '#' + id,
                            relative_urls: false,
                            remove_script_host: false,
                            convert_urls: true,
                            document_base_url: $('meta[name="front-file-base-url"]').attr('content'),        
                            statusbar: false,
                            height: 300,
                            plugins: 'anchor advlist autolink lists link image charmap preview hr pagebreak ' +
                                    'searchreplace wordcount visualblocks code fullscreen insertdatetime media nonbreaking ' +
                                    'save table directionality emoticons template paste help',
                            setup: function(editor) {
                                editor.on('change keyup', function() {
                                    editor.save(); // Sync content back to textarea
                                    $(editor.getElement()).valid(); // Trigger validation
                                });
                            }
                        });
                    }
                });
            }, 100);
        });
    });
</script>
