//adding new store
$("#add-category").on("click", function() {
    var name = $("#name").val();
    if (name.length < 1) {
        $("#serverError").html(
            "<div class='alert-danger'>Please enter a value for category name</div><br/>"
        );
    } else {
        $("#serverError").html("");
        $(this).attr("disabled", true);
        $(this).html("<i class='fa fa-refresh fa-spin'></i> Adding category...");

        //processing the new expense
        $.ajax({
            url: ADD_CATEGORY,
            method: "POST",
            data: {
                '_token': TOKEN,
                'name': name
            },
            success: function(rst) {
                if (rst.type == "true") {
                    $("#add-category").attr("disabled", false);
                    $("#add-category").html(
                        "<i class='fa fa-check'></i> Add category"
                    );
                    toastr.success(rst.msg);
                    setTimeout(function() {
                        location.reload();
                    }, 5000);
                } else if (rst.type == "false") {
                    $("#add-category").attr("disabled", false);
                    $("#add-category").html(
                        "<i class='fa fa-warning'></i> Failed! Try Again."
                    );
                    toastr.warning(rst.msg);
                }
            },
            error: function(rst) {
                toastr.error(rst.msg);
            }
        });
    }
});

//$("#modal .modal").each(function(index) {
$("body").find("#category_details").on("click ", "#edit-category", function() {
    var name = $("#name1").val();
    var slug = $("#slug").val();
    if (name.length < 1) {
        $("#serverErrors1").html(
            "<div class='danger-alert'>Please enter a value for name</div><br/>"
        );
    } else {
        $("#serverErrors1").html("");
        $(this).attr("disabled", true);
        $(this).html(
            "<i class='fa fa-spinner fa-spin'></i> Editing category... please wait."
        );

        $.ajax({
            url: UPDATE_URL,
            method: "POST",
            data: {
                '_token': TOKEN,
                'name': name,
                'category_id': slug
            },
            success: function(rst) {
                if (rst.type == "true") {
                    $("#edit-category").attr("disabled", false);
                    $("#edit-category").html(
                        "<i class='fa fa-check'></i> Edit Store"
                    );
                    toastr.success(rst.msg);
                    $("#serverError1").html(
                        "<div class='success-alert'>" + rst.msg + "</div><br/>"
                    );
                    window.setTimeout(function() {
                        location.reload();
                    }, 5000);
                } else if (rst.type == "false") {
                    $("#edit-category").attr("disabled", false);
                    $("#edit-category").html(
                        "<i class='fa fa-warning'></i> Failed! Try Again."
                    );
                    toastr.warning(rst.msg);
                }
            },
            error: function(rst) {
                $("#edit-category").attr("disabled", false);
                $("#edit-category").html("<i class='fa fa-warning fa-spin'></i> Failed. Try Again!");
                toastr.error(rst.msg);
            }
        });
    }
});
//});

$("body").find("table.display.nowrap.table.table-hover.table-striped.table-bordered.category tbody tr")
    .each(function(index) {
        $("#edit" + index).on("click", function() {
            $("#edit_category").modal();
            $("#loading").show();
            $("#category_details").hide();
            var category_id = $("#category_id" + index).val();

            $.ajax({
                url: GET_EDIT_INFO,
                method: "GET",
                data: {
                    '_token': TOKEN,
                    'category_id': category_id
                },
                success: function(rst) {
                    $("#loading").hide();
                    $("#category_details").fadeIn();
                    $("#category_details").html(rst);
                },
                error: function(jqXHR, textStatus, errorMessage) {
                    $("#loading").hide();
                    $("#category_details").hide();
                    toastr.error(errorMessage);
                }
            });
        });
    });

$("body").find("table.display.nowrap.table.table-hover.table-striped.table-bordered.category tbody tr")
    .each(function(index) {
        $("#btn_category_delete" + index).on("click", function() {
            $("#serverErrors").html("");
            $(this).attr("disabled", true);
            $(this).html(
                "<i class='fa fa-refresh fa-spin'></i> Deleting this category..."
            );

            //deleting category
            $.ajax({
                url: $(this).data("href"),
                method: "GET",
                data: {
                    '_token': TOKEN,
                    'req': "category_delete"
                },
                success: function(rst) {
                    if (rst.type == "true") {
                        $("#btn_category_delete").attr("disabled", false);
                        $("#btn_category_delete").html(
                            "<i class='fa fa-check'></i> deleted."
                        );
                        toastr.success(rst.msg);
                        location.reload();
                    } else if (rst.type == "false") {
                        $("#btn_category_delete").attr("disabled", false);
                        $("#btn_category_delete").html(
                            "<i class='fa fa-warning'></i> Failed! Try Again."
                        );
                        toastr.warning(rst.msg);
                    }
                },
                error: function(rst) {
                    $("#btn_category_delete").attr("disabled", false);
                    $("#btn_category_delete").html(
                        "<i class='fa fa-warning fa-spin'></i> Failed. Try Again!"
                    );
                    toastr.error(rst.msg);
                }
            });
        });
    });

$("body")
    .find("table.table-striped.table-hover.categorys tbody tr")
    .each(function(index) {
        $("#activate" + index).on("click", function() {
            $("#serverErrors").html("");
            $(this).attr("disabled", true);
            $(this).html(
                "<i class='fa fa-refresh fa-spin'></i> Activating this category..."
            );

            //deleting category
            $.ajax({
                url: $(this).data("href"),
                method: "GET",
                data: {
                    _token: TOKEN
                },
                success: function(rst) {
                    if (rst.type == "true") {
                        $("#activate").attr("disabled", false);
                        $("#activate").html("<i class='fa fa-check'></i> Not Active.");
                        toastr.success(rst.msg);
                        $("#serverErrors").html(
                            "<div class='success-alert'>" + rst.msg + "</div><br/>"
                        );
                        window.setTimeout(function() {
                            location.reload();
                        }, 5000);
                    } else if (rst.type == "false") {
                        $("#activate").attr("disabled", false);
                        $("#activate").html(
                            "<i class='fa fa-warning'></i> Failed! Try Again."
                        );
                        toastr.success(rst.msg);
                        $("#serverError1").html(
                            "<div class='success-alert'>" + rst.msg + "</div><br/>"
                        );
                    }
                },
                error: function(rst) {
                    $("#activate").attr("disabled", false);
                    $("#activate").html(
                        "<i class='fa fa-warning fa-spin'></i> Failed. Try Again!"
                    );
                    $("#serverErrors").html(
                        "<div class='danger-alert'>" + rst.msg + "</div><br/>"
                    );
                }
            });
        });
    });

$("body")
    .find("table.table-striped.table-hover.categorys tbody tr")
    .each(function(index) {
        $("#deactivate" + index).on("click", function() {
            $("#serverErrors").html("");
            $(this).attr("disabled", true);
            $(this).html(
                "<i class='fa fa-refresh fa-spin'></i> De-activating this category..."
            );

            //deleting category
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
                        $("#deactivate").html(
                            "<i class='fa fa-warning'></i> Failed! Try Again."
                        );
                        $("#serverErrors").html(
                            "<div class='danger-alert'>" + rst.msg + "</div><br/>"
                        );
                    }
                },
                error: function(rst) {
                    $("#deactivate").attr("disabled", false);
                    $("#deactivate").html(
                        "<i class='fa fa-warning fa-spin'></i> Failed. Try Again!"
                    );
                    $("#serverErrors").html(
                        "<div class='danger-alert'>" + rst.msg + "</div><br/>"
                    );
                }
            });
        });
    });