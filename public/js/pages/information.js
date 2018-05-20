//adding new store
$("#add-information").on("click", function() {
    var subject = $("#subject").val();
    var message = $("#message").val();
    if (subject.length < 1) {
        toastr.error("subject can not be empty!");
    } else if (message.length < 1) {
        toastr.error("message can not be empty!");
    } else {
        $("#serverError").html("");
        $(this).attr("disabled", true);
        $(this).html("<i class='fa fa-refresh fa-spin'></i> Adding information...");

        //processing the new expense
        $.ajax({
            url: ADD,
            method: "POST",
            data: {
                _token: TOKEN,
                'subject': subject,
                'message': message
            },
            success: function(rst) {
                if (rst.type == "true") {
                    $("#add-information").attr("disabled", false);
                    $("#add-information").html(
                        "<i class='fa fa-check'></i> Add information"
                    );
                    toastr.success(rst.msg);
                    setTimeout(function() {
                        location.reload();
                    }, 5000);
                } else if (rst.type == "false") {
                    $("#add-information").attr("disabled", false);
                    $("#add-information").html(
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
$("body").find("#information_details").on("click ", "#edit-information", function() {
    var subject = $("#subject1").val();
    var message = $("#message1").val();
    var slug = $("#slug").val();
    if (subject.length < 1) {
        toastr.error("subject can not be empty");
    } else if (message.length < 1) {
        toastr.error("message can not be empty");
    } else {
        $("#serverErrors1").html("");
        $(this).attr("disabled", true);
        $(this).html("<i class='fa fa-spinner fa-spin'></i> Editing information... please wait.");

        $.ajax({
            url: UPDATE_URL,
            method: "POST",
            data: {
                _token: TOKEN,
                'subject': subject,
                'message': message,
                'information_id': slug
            },
            success: function(rst) {
                if (rst.type == "true") {
                    $("#edit-information").attr("disabled", false);
                    $("#edit-information").html(
                        "<i class='fa fa-check'></i> Edit Store"
                    );
                    toastr.success(rst.msg);
                    window.setTimeout(function() {
                        location.reload();
                    }, 5000);
                } else if (rst.type == "false") {
                    $("#edit-information").attr("disabled", false);
                    $("#edit-information").html(
                        "<i class='fa fa-warning'></i> Failed! Try Again."
                    );
                    toastr.warning(rst.msg);
                }
            },
            error: function(rst) {
                $("#edit-information").attr("disabled", false);
                $("#edit-information").html(
                    "<i class='fa fa-warning fa-spin'></i> Failed. Try Again!"
                );
                toastr.error(rst.msg);
            }
        });
    }
});
//});

$("body").find("table.display.nowrap.table.table-hover.table-striped.table-bordered.information tbody tr")
    .each(function(index) {
        $("#edit" + index).on("click", function() {
            $("#edit_information").modal();
            $("#loading").show();
            $("#information_details").hide();
            var information_id = $("#information_id" + index).val();

            $.ajax({
                url: GET_EDIT_INFO,
                method: "GET",
                data: {
                    '_token': TOKEN,
                    'information_id': information_id
                },
                success: function(rst) {
                    $("#loading").hide();
                    $("#information_details").fadeIn();
                    $("#information_details").html(rst);
                },
                error: function(jqXHR, textStatus, errorMessage) {
                    $("#loading").hide();
                    $("#information_details").hide();
                    toastr.error(errorMessage);
                }
            });
        });
    });

$("body").find("table.display.nowrap.table.table-hover.table-striped.table-bordered.information tbody tr")
    .each(function(index) {
        $("#btn_information_delete" + index).on("click", function() {
            $("#serverErrors").html("");
            $(this).attr("disabled", true);
            $(this).html(
                "<i class='fa fa-refresh fa-spin'></i> Deleting this information..."
            );

            //deleting information
            $.ajax({
                url: $(this).data("href"),
                method: "GET",
                data: {
                    '_token': TOKEN,
                    'req': "information_delete"
                },
                success: function(rst) {
                    if (rst.type == "true") {
                        $("#btn_information_delete").attr("disabled", false);
                        $("#btn_information_delete").html(
                            "<i class='fa fa-check'></i> deleted."
                        );
                        toastr.success(rst.msg);
                        location.reload();
                    } else if (rst.type == "false") {
                        $("#btn_information_delete").attr("disabled", false);
                        $("#btn_information_delete").html(
                            "<i class='fa fa-warning'></i> Failed! Try Again."
                        );
                        toastr.warning(rst.msg);
                    }
                },
                error: function(rst) {
                    $("#btn_information_delete").attr("disabled", false);
                    $("#btn_information_delete").html(
                        "<i class='fa fa-warning fa-spin'></i> Failed. Try Again!"
                    );
                    toastr.error(rst.msg);
                }
            });
        });
    });