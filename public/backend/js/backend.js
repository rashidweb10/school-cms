toastr.options = {
    closeButton: true,                  // Enables a close button for user control.
    progressBar: true,                  // Displays a progress bar for timing.
    newestOnTop: true,                  // Ensures the newest toast appears on top.
    positionClass: "toast-bottom-left", // Positions the toast on the top-right corner.
    preventDuplicates: false,           // Prevents duplicate toasts from showing.
    onclick: null,                      // No action is triggered by clicking the toast.
    showDuration: "300",                // Toast appears smoothly within 300ms.
    hideDuration: "300",                // Toast hides smoothly within 300ms.
    timeOut: "6000",                    // Auto-hides the toast after 5 seconds.
    extendedTimeOut: "500",             // Waits 1 second before fully disappearing after hover.
    showEasing: "swing",                // Adds a smooth easing effect on showing.
    hideEasing: "swing",                // Adds a smooth easing effect on hiding.
    showMethod: "fadeIn",               // Toast fades in when displayed.
    hideMethod: "fadeOut",              // Toast fades out when dismissed.
};


//bootstarp modals
function largeModal(url, header) {
    $("#largeModal .modal-body").html("Loading...");
    $("#largeModal .modal-title").html("Loading...");

    $("#largeModal").modal("show");
    $.ajax({
        url: url,
        success: function (response) {
            $("#largeModal .modal-body").html(response);
            $("#largeModal .modal-title").html(header);
        },
    });
}

function smallModal(url, header) {
    $("#smallModal .modal-body").html("Loading...");
    $("#smallModal .modal-title").html("Loading...");

    $("#smallModal").modal("show");
    $.ajax({
        url: url,
        success: function (response) {
            $("#smallModal .modal-body").html(response);
            $("#smallModal .modal-title").html(header);
        },
    });
}

function confirmModal(delete_url, param) {
    $("#confirmModal").modal("show");
    callBackFunction = param;
    document.getElementById("delete_form").setAttribute("action", delete_url);
}

$(".ajaxDeleteForm").submit(function (e) {
    var form = $(this);
    ajaxSubmit(e, form, callBackFunction);
});

function closeModel() {}

function closeConfirmModel() {
    $("#confirmModal").modal("hide");
}

//jquery validator
function initValidate(selector)
{
    $(selector).validate({});
}

//select2
function initSelect2(selector) {
    $(selector).select2();
}

//Form Submition
function ajaxSubmit(e, form, callBackFunction) {
    if(form.valid()) {
        e.preventDefault();
        
        var btn = $(form).find('button[type="submit"]');
        var btn_text = $(btn).html();
        $(btn).html('<i class="fa fa-refresh fa-spin" aria-hidden="true"></i>');
        $(btn).css('opacity', '0.7');
        $(btn).css('pointer-events', 'none');

        var action = form.attr('action');
        var form = e.target;
        var data = new FormData(form);
        $.ajax({
            type: "POST",
            url: action,
            processData: false,
            contentType: false,
            dataType: 'json',
            data: data,
            success: function(response)
            {
                $(btn).html(btn_text);
                $(btn).css('opacity', '1');
                $(btn).css('pointer-events', 'inherit');

                if (response.status) {
                    Command: toastr["success"](response.notification, "Success");
                    callBackFunction(response);
                }else{
                    if(typeof response.notification === 'object') {
                        var errors = '';
                        $.each( response.notification, function( key, msg ) {
                            errors += '<div>' + (key + 1) + '. ' + msg + '</div>';
                        });
                        Command: toastr["error"](errors, "Alert");
                    }else {
                        Command: toastr["error"](response.notification, "Alert");
                    }
                }
            }
        });
    }else {
        toastr.error('Please make sure to fill all the necessary fields');
    }
}

$(document).ready(function () {
    //Command: toastr["success"]("Test", "Success");
});