<!-- Theme Config Js -->
<script src="{{ asset('backend/js/config.js') }}"></script>

<!-- Vendor JS -->
<script src="{{ asset('backend/js/vendor.min.js') }}"></script>

<!-- App JS -->
<script src="{{ asset('backend/js/app.js') }}"></script>

<!-- Additional JS Scripts-->
<script src="{{ asset('backend/js/toastr.min.js') }}"></script>
<script src="{{ asset('backend/js/jquery.validate.min.js') }}"></script>

<!-- Backend JS -->
<script src="{{ asset('backend/js/backend.js') }}"></script>

<!-- Aiz Upload JS -->
<script>
    var AIZ = AIZ || {};
    AIZ.local = {
        nothing_selected: 'Nothing selected',
        nothing_found: 'Nothing found',
        choose_file: 'Choose File',
        file_selected: 'File selected',
        files_selected: 'Files selected',
        add_more_files: 'Add more files',
        adding_more_files: 'Adding more files',
        drop_files_here_paste_or: 'Drop files here, paste or',
        browse: 'Browse',
        upload_complete: 'Upload complete',
        upload_paused: 'Upload paused',
        resume_upload: 'Resume upload',
        pause_upload: 'Pause upload',
        retry_upload: 'Retry upload',
        cancel_upload: 'Cancel upload',
        uploading: 'Uploading',
        processing: 'Processing',
        complete: 'Complete',
        file: 'File',
        files: 'Files',
    }
</script>
<script src="{{ asset('backend/js/aiz-vendors.js') }}"></script>
<script src="{{ asset('backend/js/aiz-core.js') }}"></script>