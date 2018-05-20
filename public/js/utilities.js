var AppUtilities = function() {

    var loadComponent = function() {
        $("#header_notification_bar").hide();
    }

    toastr.options = {
        timeOut: 5000,
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false
    }

    var displayNotifications = function() {
        $.ajax({
            url: NOTIFY,
            success: function(data) {
                if (NOTIFY_COUNT >= 1) {
                    $('#notifyAudio')[0].play();
                }
                $('#header_notification_bar').show();
                $('#header_notification_bar').html(data);
            },
            error: function(alaxB, HTTerror, errorMsg) {
                console.log(errorMsg);
            }
        });
    }

    var pushNotification = function() {
        if (NOTIFY_COUNT >= 1) {
            toastr.info("You have unread notifications");
        }
    }

    var markNotificationAsRead = function() {
        $.get('/markAsRead');
        location.reload();
    }

    setInterval(() => {
        displayNotifications();
    }, 10000)

    setInterval(() => {
        pushNotification();
    }, 30000);


    return {
        init: function() {
            loadComponent();
            displayNotifications();
            pushNotification();
        }
    }
}();

jQuery(document).ready(function() {
    AppUtilities.init();
});