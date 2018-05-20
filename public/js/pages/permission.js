//adding new store
$("#add-permission").on("click", function() {
    var name = $("#name").val();
    if (name.length < 1) {
        $("#serverError").html("<div class='alert-danger'>Please enter a value for permission name</div><br/>");
    } else {
        $("#serverError").html("");
        $(this).attr("disabled", true);
        $(this).html("<i class='fa fa-refresh fa-spin'></i> Adding Permission...");

        //processing the new expense
        $.ajax({
            url: ADD_PERMISSION,
            method: "POST",
            data: {
                '_token': TOKEN,
                'name': name,
            },
            success: function(rst) {
                if (rst.type == "true") {
                    $("#add-permission").attr("disabled", false);
                    $("#add-permission").html("<i class='fa fa-check'></i> Add Permission");
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
                    $("#add-permission").attr("disabled", false);
                    $("#add-permission").html(
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
                $("#add-permission").attr("disabled", false);
                $("#add-permission").html(
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
});

//$("#modal .modal").each(function(index) {
$('body').find("#permission_details").on("click ", "#edit-permission", function() {
    var name = $("#name1").val();
    var slug = $("#slug").val();
    if (name.length < 1) {
        $("#serverErrors1").html("<div class='danger-alert'>Please enter a value for name</div><br/>");
    } else {
        $("#serverErrors1").html("");
        $(this).attr('disabled', true);
        $(this).html("<i class='fa fa-spinner fa-spin'></i> Editing permission... please wait.");

        $.ajax({
            url: UPDATE_URL,
            method: "POST",
            data: {
                '_token': TOKEN,
                'name': name,
                'permission_id': slug,
            },
            success: function(rst) {
                if (rst.type == "true") {
                    $("#edit-permission").attr("disabled", false);
                    $("#edit-permission").html("<i class='fa fa-check'></i> Edit Store");
                    toastr.success(rst.msg);
                    $("#serverError1").html("<div class='success-alert'>" + rst.msg + "</div><br/>");
                    window.setTimeout(function() {
                        location.reload();
                    }, 5000);
                } else if (rst.type == "false") {
                    $("#edit-permission").attr('disabled', false);
                    $("#edit-permission").html("<i class='fa fa-warning'></i> Failed! Try Again.");
                    $("#serverErrors1").html("<div class='danger-alert'>" + rst.msg + "</div><br/>");
                }
            },
            error: function(rst) {
                $("#edit-permission").attr('disabled', false);
                $("#edit-permission").html("<i class='fa fa-warning fa-spin'></i> Failed. Try Again!");
                $("#serverErrors1").html("<div class='danger-alert'>" + rst.msg + "</div><br/>");
            }
        });
    }
});
//});

$('body').find("table.display.nowrap.table.table-hover.table-striped.table-bordered.permissions tbody tr").each(function(index) {
    $("#edit" + index).on("click", function() {
        $("#edit_permission").modal();
        $("#loading").show();
        $("#permission_details").hide();
        var permission_id = $("#permission_id" + index).val();

        $.ajax({
            url: GET_EDIT_INFO,
            method: "GET",
            data: {
                '_token': TOKEN,
                'permission_id': permission_id,
            },
            success: function(rst) {
                $("#loading").hide();
                $("#permission_details").fadeIn();
                $("#permission_details").html(rst);
            },
            error: function(jqXHR, textStatus, errorMessage) {
                $("#loading").hide();
                $("#permission_details").hide();
                $("#serverErrors1").show();
                $("#serverErrors1").html("<div class='danger-alert'>" + errorMessage + "</div>");
            }
        });
    });
});

$('body').find("table.display.nowrap.table.table-hover.table-striped.table-bordered.permissions tbody tr").each(function(index) {
    $("#btn_permission_delete" + index).on("click", function() {
        $("#serverErrors").html("");
        $(this).attr("disabled", true);
        $(this).html("<i class='fa fa-refresh fa-spin'></i> Deleting this permission...");

        //deleting permission
        $.ajax({
            url: $(this).data("href"),
            method: "GET",
            data: {
                _token: TOKEN,
                'req': "permission_delete"
            },
            success: function(rst) {
                if (rst.type == "true") {
                    $("#btn_permission_delete").attr("disabled", false);
                    $("#btn_permission_delete").html("<i class='fa fa-check'></i> deleted.");
                    $("#serverErrors").html(
                        "<div class='success-alert'>" + rst.msg + "</div><br/>"
                    );
                    location.reload();
                } else if (rst.type == "false") {
                    $("#btn_permission_delete").attr("disabled", false);
                    $("#btn_permission_delete").html("<i class='fa fa-warning'></i> Failed! Try Again.");
                    $("#serverErrors").html(
                        "<div class='danger-alert'>" + rst.msg + "</div><br/>"
                    );
                }
            },
            error: function(rst) {
                $("#btn_permission_delete").attr("disabled", false);
                $("#btn_permission_delete").html("<i class='fa fa-warning fa-spin'></i> Failed. Try Again!");
                $("#serverErrors").html(
                    "<div class='danger-alert'>" + rst.msg + "</div><br/>"
                );
            }
        });
    });
});

$('body').find("table.table-striped.table-hover.permissions tbody tr").each(function(index) {
    $("#activate" + index).on("click", function() {
        $("#serverErrors").html("");
        $(this).attr("disabled", true);
        $(this).html("<i class='fa fa-refresh fa-spin'></i> Activating this permission...");

        //deleting permission
        $.ajax({
            url: $(this).data("href"),
            method: "GET",
            data: {
                _token: TOKEN,
            },
            success: function(rst) {
                if (rst.type == "true") {
                    $("#activate").attr("disabled", false);
                    $("#activate").html("<i class='fa fa-check'></i> Not Active.");
                    toastr.success(rst.msg);
                    $("#serverErrors").html("<div class='success-alert'>" + rst.msg + "</div><br/>");
                    window.setTimeout(function() {
                        location.reload();
                    }, 5000);
                } else if (rst.type == "false") {
                    $("#activate").attr("disabled", false);
                    $("#activate").html("<i class='fa fa-warning'></i> Failed! Try Again.");
                    toastr.success(rst.msg);
                    $("#serverError1").html("<div class='success-alert'>" + rst.msg + "</div><br/>");
                }
            },
            error: function(rst) {
                $("#activate").attr("disabled", false);
                $("#activate").html("<i class='fa fa-warning fa-spin'></i> Failed. Try Again!");
                $("#serverErrors").html(
                    "<div class='danger-alert'>" + rst.msg + "</div><br/>"
                );
            }
        });
    });
});

$('body').find("table.table-striped.table-hover.permissions tbody tr").each(function(index) {
    $("#deactivate" + index).on("click", function() {
        $("#serverErrors").html("");
        $(this).attr("disabled", true);
        $(this).html("<i class='fa fa-refresh fa-spin'></i> De-activating this permission...");

        //deleting permission
        $.ajax({
            url: $(this).data("href"),
            method: "GET",
            data: {},
            success: function(rst) {
                if (rst.type == "true") {
                    $("#deactivate").attr("disabled", false);
                    $("#deactivate").html("<i class='fa fa-check'></i> Active.");
                    $("#serverErrors").html(
                        "<div class='success-alert'>" + rst.msg + "</div><br/>"
                    );
                    location.reload();
                } else if (rst.type == "false") {
                    $("#deactivate").attr("disabled", false);
                    $("#deactivate").html("<i class='fa fa-warning'></i> Failed! Try Again.");
                    $("#serverErrors").html(
                        "<div class='danger-alert'>" + rst.msg + "</div><br/>"
                    );
                }
            },
            error: function(rst) {
                $("#deactivate").attr("disabled", false);
                $("#deactivate").html("<i class='fa fa-warning fa-spin'></i> Failed. Try Again!");
                $("#serverErrors").html(
                    "<div class='danger-alert'>" + rst.msg + "</div><br/>"
                );
            }
        });
    });
});