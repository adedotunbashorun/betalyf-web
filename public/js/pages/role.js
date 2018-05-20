var AppRole = (function() {
    var submitForm = function() {
        var name = $("#name").val();
        var permission = $("#permission").val();


        if (name.length < 1) {
            toastr.error("Name field is required");
        } else if (permission.length < 1) {
            toastr.error("Permission field is required");
        } else {
            $("#add-role").attr("disabled", true);
            $("#add-role").html("<i class='fa fa-spinner fa-spin'></i> Processing...");
            $.ajax({
                url: ADD_ROLE,
                method: "POST",
                data: {
                    '_token': TOKEN,
                    'name': name,
                    'permission': permission
                },
                success: function(rst) {
                    if (rst.type == "true") {
                        $("#add-role").attr("disabled", false);
                        $("#add-role").html("<i class='fa fa-check'></i> Add Role");
                        toastr.success(rst.msg);
                        $("#serverError").html(
                            "<div class='success-alert'>" +
                            rst.msg +
                            "</div><br/>"
                        );
                        setTimeout(function() {
                            location.reload();
                        }, 5000);
                    } else if (rst.type == "false") {
                        $("#add-role").attr("disabled", false);
                        $("#add-role").html(
                            "<i class='fa fa-warning'></i> Failed! Try Again."
                        );
                        $("#serverError").html(
                            "<div class='danger-alert'>" +
                            rst.msg +
                            "</div><br/>"
                        );
                    }
                },
                error: function(rst) {
                    $("#add-role").attr("disabled", false);
                    $("#add-role").html(
                        "<i class='fa fa-warning fa-spin'></i> Failed. Try Again!"
                    );
                    $("#serverError").html(
                        "<div class='danger-alert'>" +
                        rst.msg +
                        "</div><br/>"
                    );
                }
            });
        }
    };

    var GetDetails = function(index) {
        $("#edit_role").modal();
        $("#loading").show();
        $("#role_details").hide();
        var role_id = $("#role_id" + index).val();

        $.ajax({
            url: GET_EDIT_INFO,
            method: "GET",
            data: {
                '_token': TOKEN,
                'role_id': role_id
            },
            success: function(rst) {
                $("#loading").hide();
                $("#role_details").fadeIn();
                $("#role_details").html(rst);
            },
            error: function(jqXHR, textStatus, errorMessage) {
                $("#loading").hide();
                $("#role_details").hide();
                $("#serverErrors1").show();
                $("#serverErrors1").html(
                    "<div class='danger-alert'>" + errorMessage + "</div>"
                );
            }
        });
    }
    var UpdateRole = function() {
        var name = $("#name1").val();
        var permission = $("#permission1").val();
        var slug = $("#slug").val();
        if (name.length < 1) {
            $("#serverErrors1").html("<div class='danger-alert'>Please enter a value for name</div><br/>");
        } else {
            $("#serverErrors1").html("");
            $('#edit-role').attr("disabled", true);
            $("#edit-role").html("<i class='fa fa-spinner fa-spin'></i> Editing permission... please wait.");

            $.ajax({
                url: UPDATE_URL,
                method: "POST",
                data: {
                    '_token': TOKEN,
                    'name': name,
                    'permission': permission,
                    'role_id': slug
                },
                success: function(rst) {
                    if (rst.type == "true") {
                        $("#edit-role").attr("disabled", false);
                        $("#edit-role").html(
                            "<i class='fa fa-check'></i> Edit Store"
                        );
                        toastr.success(rst.msg);
                        $("#serverError1").html(
                            "<div class='success-alert'>" +
                            rst.msg +
                            "</div><br/>"
                        );
                        window.setTimeout(function() {
                            location.reload();
                        }, 5000);
                    } else if (rst.type == "false") {
                        $("#edit-role").attr("disabled", false);
                        $("#edit-role").html(
                            "<i class='fa fa-warning'></i> Failed! Try Again."
                        );
                        $("#serverErrors1").html(
                            "<div class='danger-alert'>" + rst.msg + "</div><br/>"
                        );
                    }
                },
                error: function(rst) {
                    $("#edit-role").attr("disabled", false);
                    $("#edit-role").html(
                        "<i class='fa fa-warning fa-spin'></i> Failed. Try Again!"
                    );
                    $("#serverErrors1").html(
                        "<div class='danger-alert'>" + rst.msg + "</div><br/>"
                    );
                }
            });
        }
    }

    DeleteRole = function(index) {
        $("#serverErrors").html("");
        $("#btn_role_delete").attr("disabled", true);
        $("#btn_role_delete").html("<i class='fa fa-refresh fa-spin'></i> Deleting this role...");

        //deleting role
        $.ajax({
            url: $('#btn_role_delete' + index).data("href"),
            method: "GET",
            data: {
                '_token': TOKEN,
                'req': "role_delete"
            },
            success: function(rst) {
                if (rst.type == "true") {
                    $("#btn_role_delete").attr("disabled", false);
                    $("#btn_role_delete").html(
                        "<i class='fa fa-check'></i> deleted."
                    );
                    toastr.success(rst.msg);
                    $("#serverError1").html("<div class='success-alert'>" + rst.msg + "</div><br/>");
                    window.setTimeout(function() {
                        location.reload();
                    }, 5000);
                } else if (rst.type == "false") {
                    $("#btn_role_delete").attr("disabled", false);
                    $("#btn_role_delete").html(
                        "<i class='fa fa-warning'></i> Failed! Try Again."
                    );
                    $("#serverErrors").html(
                        "<div class='danger-alert'>" + rst.msg + "</div><br/>"
                    );
                }
            },
            error: function(rst) {
                $("#btn_role_delete").attr("disabled", false);
                $("#btn_role_delete").html(
                    "<i class='fa fa-warning fa-spin'></i> Failed. Try Again!"
                );
                $("#serverErrors").html(
                    "<div class='danger-alert'>" + rst.msg + "</div><br/>"
                );
            }
        });
    };
    return {
        init: function() {
            $("#add-role").on("click", function() {
                submitForm();
            });

            $("body").find("table.display.nowrap.table.table-hover.table-striped.table-bordered.roles tbody tr")
                .each(function(index) {
                    $("#edit" + index).on("click", function() {
                        GetDetails(index);
                    });
                });

            $('body').find("#role_details").on("click ", "#edit-role", function() {
                UpdateRole();
            });

            $('body').find("table.display.nowrap.table.table-hover.table-striped.table-bordered.roles tbody tr").each(function(index) {
                $("#btn_role_delete" + index).on("click", function() {
                    DeleteRole(index);
                });
            });
        }
    };
})();

jQuery(document).ready(function() {
    AppRole.init();
});