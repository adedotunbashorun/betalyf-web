var AppUserProfile = function() {

    var ChangePassword = function(password, new_password) {
        $("#change_password_btn").attr("disabled", true);
        $("#change_password_btn").html("<i class='fa fa-refresh fa-spin'></i> Processing...");
        $.ajax({
            url: RESET,
            method: "POST",
            data: {
                '_token': TOKEN,
                'old_password': password,
                'password': new_password
            },
            success: function(rst) {
                if (rst.type == "true") {
                    $("#change_password_btn").attr("disabled", false);
                    $("#change_password_btn").html(
                        "<i class='fa fa-check'></i> Submit!"
                    );
                    toastr.success(rst.msg);
                    location.reload();
                } else if (rst.type == "false") {
                    $("#change_password_btn").attr("disabled", false);
                    $("#change_password_btn").html(
                        "<i class='fa fa-warning fa-spin'></i> Failed. Try Again!"
                    );
                    toastr.warning(rst.msg);
                }
            },
            error: function(alaxB, HTTerror, errorMsg) {
                toastr.error(errorMsg);
            }
        });
    };

    var UpdateProfile = function() {

    }

    var ChangePicture = function() {

    }

    var UpdateAccountInfo = function() {

    }

    var ActivateAccount = function() {
        $.ajax({
            url: ACTIVATE,
            method: "POST",
            data: {
                'member_id': SLUG,
                '_token': TOKEN
            },
            success: function(rst) {
                swal("Successful!", rst.msg, "success");
                setTimeout(() => {
                    location.reload();
                }, 3000);
            },
            error: function(err, httpErr, ErrMsg) {
                swal("Error", ErrMsg, "error");
            }
        });
    }

    return {
        init: function() {
            $("#update_profile_btn").on("click", function() {
                toastr.error("Sorry cannot perform this task at this time. Thank you!");
            });

            $("#update_account_btn").on("click", function() {
                toastr.error("Sorry cannot perform this task at this time. Thank you!");
            });

            $("#change_picture_btn").on("click", function() {
                toastr.error("Sorry cannot perform this task at this time. Thank you!");
            });

            $("#change_password_btn").on("click", function() {
                //toastr.error("Sorry cannot perform this task at this time. Thank you!");
                var password = $("#password").val();
                var new_password = $("#new_password").val();
                var confirm_new_password = $("#confirm_new_password").val();
                if (password < 1) {
                    $("#errors").html("<div class='alert alert-danger'>Please password can not be empty</div><br/>");
                } else if (new_password < 1) {
                    $("#errors").html("<div class='alert alert-danger'>Please new password can not be empty</div><br/>");
                } else if (new_password != confirm_new_password) {
                    $("#errors").html("<div class='alert alert-danger'>Password and Confirm password do not match</div><br/>");
                } else {
                    ChangePassword(password, new_password);
                }
            });

            $("#activate_account").on("click", function() {
                swal({
                        title: "Are you sure?",
                        text: "You are about to activate a new member account",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, activate!",
                        closeOnConfirm: false
                    },
                    function() {
                        ActivateAccount();
                    });
            });
        }
    }
}();

jQuery(document).ready(function() {
    AppUserProfile.init();
});