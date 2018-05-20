var AppRegistration = function() {

    var submitForm = function() {
        var name = $('#name').val();
        var gender = $("#gender").val();
        var email = $("#email").val();
        var password = ($("#password").val()) ? $("#password").val() : "123456";
        var role = $("#role").val();
        var telephone = $("#telephone").val();

        if (name.length < 1) {
            toastr.error("Full Name field is required");
        } else if (email.length < 1) {
            toastr.error("Email address field is required");
        } else if (password.length < 1) {
            toastr.error("Password field is required");
        } else if (telephone.length < 1) {
            toastr.error("Telephone field is required");
        } else {

            $("#add-user").attr("disabled", true);
            $("#add-user").html("<i class='fa fa-spinner fa-spin'></i> Processing...");

            $.ajax({
                url: REGISTER_URL,
                method: "POST",
                data: {
                    '_token': TOKEN,
                    'name': name,
                    'email': email,
                    'gender': gender,
                    'password': password,
                    'roles': role,
                    'telephone': telephone,
                    'req': 'register_new_user'
                },
                success: function(rst) {
                    if (rst.type == "true") {
                        $("#add-user").attr("disabled", false);
                        $("#add-user").html("Submit");
                        toastr.success(rst.msg);
                        window.setTimeout(function() {
                            location.reload();
                        }, 5000);
                    } else if (rst.type == "false") {
                        $("#add-user").attr("disabled", false);
                        $("#add-user").html("Submit");
                        toastr.error(rst.msg);
                    }
                },
                error: function(rst, trowHTTP, error) {
                    $("#add-user").attr("disabled", false);
                    $("#add-user").html("Submit");
                    toastr.error(error);
                }
            });
        }
    }

    var showPassword = function() {
        $("#password").attr('type', 'text');
    }

    var lockPassword = function() {
        $("#password").attr('type', 'password');
    }

    var Activate = function(index){
        $("#serverErrors").html("");
        $("#activate" + index).attr("disabled", true);
        $("#activate" + index).html("<i class='fa fa-refresh fa-spin'></i> Activating this User...");

        //Activate User
        $.ajax({
            url: $("#activate" + index).data("href"),
            method: "GET",
            data: {},
            success: function(rst) {
                if (rst.type == "true") {
                    $("#activate" + index).attr("disabled", false);
                    $("#activate" + index).html("<i class='fa fa-check'></i> Not Active.");
                    toastr.success(rst.msg);
                    window.setTimeout(function() {
                        location.reload();
                    }, 5000);
                } else if (rst.type == "false") {
                    $("#activate" + index).attr("disabled", false);
                    $("#activate" + index).html("<i class='fa fa-warning'></i> Failed! Try Again.");
                    toastr.warning(rst.msg);
                    window.setTimeout(function() {
                        location.reload();
                    }, 5000);
                }
            },
            error: function(rst, trowHTTP, error) {
                $("#activate" + index).attr("disabled", false);
                $("#activate" + index).html("<i class='fa fa-warning fa-spin'></i> Failed. Try Again!");
                toastr.error(error);
            }
        });
    }

    var DeActivate = function(index){
        $("#serverErrors").html("");
        $("#deactivate" + index).attr("disabled", true);
        $("#deactivate" + index).html("<i class='fa fa-refresh fa-spin'></i> De-activating this User...");

        //De-activating User
        $.ajax({
            url: $("#deactivate" + index).data("href"),
            method: "GET",
            data: {},
            success: function(rst) {
                if (rst.type == "true") {
                    $("#deactivate" + index).attr("disabled", false);
                    $("#deactivate" + index).html("<i class='fa fa-check'></i> Active.");
                    toastr.success(rst.msg);
                    window.setTimeout(function() {
                        location.reload();
                    }, 5000);
                } else if (rst.type == "false") {
                    $("#deactivate" + index).attr("disabled", false);
                    $("#deactivate" + index).html("<i class='fa fa-warning'></i> Failed! Try Again.");
                    toastr.warning(rst.msg);
                    window.setTimeout(function() {
                        location.reload();
                    }, 5000);
                }
            },
            error: function(rst, trowHTTP, error) {
                $("#deactivate" + index).attr("disabled", false);
                $("#deactivate" + index).html("<i class='fa fa-warning fa-spin'></i> Failed. Try Again!");
                toastr.error(error);
            }
        });
    }

    return {
        init: function() {

            $("#add-user").on("click", function() {
                submitForm();
            });

            $("#show_password").on("mousedown", function() {
                showPassword();
                toastr.warning("Tips! Don't expose your password to anyone else.");
            });

            $("#show_password").on("mouseup", function() {
                lockPassword();
            });

            $('body').find("table.display.nowrap.table.table-hover.table-striped.table-bordered.users tbody tr").each(function(index) {
                $("#activate" + index).on("click", function() {
                    Activate(index);
                });
            });

            $('body').find("table.display.nowrap.table.table-hover.table-striped.table-bordered.users tbody tr").each(function(index) {
                $("#deactivate" + index).on("click", function() {
                    DeActivate(index);
                });
            });
        }
    }
}();

jQuery(document).ready(function() {
    AppRegistration.init();
});