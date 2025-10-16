<form id="updatePasswordForm" action="{{ route('profile.updatePassword') }}" method="POST">
    @csrf
    
    @method('PUT')
    <div class="row">
        <!-- Password -->
        <div class="col-sm-6">
            <div class="form-group mb-2">
                <input type="hidden" name="user_id" value="{{$id}}">
                <label for="password" class="form-label">New Password <span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control" minlength="6" maxlength="100" required>
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="col-sm-6">
            <div class="form-group mb-2">
                <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                <input type="password" name="password_confirmation" class="form-control" minlength="6" maxlength="100" required>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="col-sm-12 text-center mt-2">
            <button type="submit" class="btn btn-primary">Update Password</button>
        </div>
    </div>
</form>

<script>
$(document).ready(function () {
    // Initialize validation
    initValidate('#updatePasswordForm');

    // Handle AJAX submit
    $("#updatePasswordForm").submit(function (e) {
        var form = $(this);
        ajaxSubmit(e, form, callbackUpdatePassword);
    });

    const callbackUpdatePassword = function (response) {
        setTimeout(function() {
            location.reload(); // Reload the page after a successful form submission
        }, 1500);
    };
});
</script>
