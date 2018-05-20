var AppBeneficiary = (function() {
    var submitForm = function() {
        var child_name = $("#child_name").val();
        var parent_name = $("#parent_name").val();
        var email = $("#email").val();
        var gender = $("#gender").val();
        var dob = $("#dob").val();
        var telephone = $("#telephone").val();

        if (parent_name.length < 1) {
            toastr.error("Parent Name is required");
        } else if (telephone.length < 1) {
            toastr.error("Phone Number is required");
        } else {
            $("#add-beneficiary").attr("disabled", true);
            $("#add-beneficiary").html("<i class='fa fa-spinner fa-spin'></i> Processing...");
            $.ajax({
                url: ADD_BENEFICIARY,
                method: "POST",
                data: {
                    '_token': TOKEN,
                    'child_name': child_name,
                    'parent_name': parent_name,
                    'email': email,
                    'dob': dob,
                    'gender': gender,
                    'telephone': telephone
                },
                success: function(rst) {
                    if (rst.type == "true") {
                        $("#add-beneficiary").attr("disabled", false);
                        $("#add-beneficiary").html(
                            "<i class='fa fa-check'></i> Add beneficiary"
                        );
                        toastr.success(rst.msg);
                        setTimeout(function() {
                            location.reload();
                        }, 5000);
                    } else if (rst.type == "false") {
                        $("#add-beneficiary").attr("disabled", false);
                        $("#add-beneficiary").html(
                            "<i class='fa fa-warning'></i> Failed! Try Again."
                        );
                        toastr.warning(rst.msg);
                    }
                },
                error: function(rst) {
                    $("#add-beneficiary").attr("disabled", false);
                    $("#add-beneficiary").html(
                        "<i class='fa fa-warning fa-spin'></i> Failed. Try Again!"
                    );
                    toastr.error(rst.msg);
                }
            });
        }
    };

    var GetDetails = function(index) {
        $("#edit_beneficiary").modal();
        $("#loading").show();
        $("#beneficiary_details").hide();
        var beneficiary_id = $("#beneficiary_id" + index).val();

        $.ajax({
            url: GET_EDIT_INFO,
            method: "GET",
            data: {
                '_token': TOKEN,
                'beneficiary_id': beneficiary_id
            },
            success: function(rst) {
                $("#loading").hide();
                $("#beneficiary_details").fadeIn();
                $("#beneficiary_details").html(rst);
            },
            error: function(jqXHR, textStatus, errorMessage) {
                $("#loading").hide();
                $("#beneficiary_details").hide();
                $("#serverErrors1").show();
                $("#serverErrors1").html(
                    "<div class='danger-alert'>" + errorMessage + "</div>"
                );
            }
        });
    }
    var Updatebeneficiary = function() {
        var child_name = $("#child_name1").val();
        var parent_name = $("#parent_name1").val();
        var email = $("#email1").val();
        var gender = $("#gender1").val();
        var dob = $("#dob1").val();
        var telephone = $("#telephone1").val();
        var slug = $("#slug").val();
        if (child_name.length < 1) {
            toastr.error("Child Name is required");
        } else if (parent_name.length < 1) {
            toastr.error("Parent Name is required");
        } else if (dob.length < 1) {
            toastr.error("Date of Birth is required");
        } else if (telephone.length < 1) {
            toastr.error("Phone Number is required");
        } else {
            $("#serverErrors1").html("");
            $('#edit-beneficiary').attr("disabled", true);
            $("#edit-beneficiary").html("<i class='fa fa-spinner fa-spin'></i> Editing permission... please wait.");

            $.ajax({
                url: UPDATE_URL,
                method: "POST",
                data: {
                    '_token': TOKEN,
                    'child_name': child_name,
                    'parent_name': parent_name,
                    'email': email,
                    'dob': dob,
                    'gender': gender,
                    'telephone': telephone,
                    'beneficiary_id': slug
                },
                success: function(rst) {
                    if (rst.type == "true") {
                        $("#edit-beneficiary").attr("disabled", false);
                        $("#edit-beneficiary").html(
                            "<i class='fa fa-check'></i> Edit Store"
                        );
                        toastr.success(rst.msg);
                        window.setTimeout(function() {
                            location.reload();
                        }, 5000);
                    } else if (rst.type == "false") {
                        $("#edit-beneficiary").attr("disabled", false);
                        $("#edit-beneficiary").html(
                            "<i class='fa fa-warning'></i> Failed! Try Again."
                        );
                        toastr.warning(rst.msg);
                    }
                },
                error: function(rst) {
                    $("#edit-beneficiary").attr("disabled", false);
                    $("#edit-beneficiary").html(
                        "<i class='fa fa-warning fa-spin'></i> Failed. Try Again!"
                    );
                    toastr.error(rst.msg);
                }
            });
        }
    }

    Deletebeneficiary = function(index) {
        $("#serverErrors").html("");
        $("#btn_beneficiary_delete").attr("disabled", true);
        $("#btn_beneficiary_delete").html("<i class='fa fa-refresh fa-spin'></i> Deleting this beneficiary...");

        //deleting beneficiary
        $.ajax({
            url: $('#btn_beneficiary_delete' + index).data("href"),
            method: "GET",
            data: {
                '_token': TOKEN,
                'req': "beneficiary_delete"
            },
            success: function(rst) {
                if (rst.type == "true") {
                    $("#btn_beneficiary_delete").attr("disabled", false);
                    $("#btn_beneficiary_delete").html(
                        "<i class='fa fa-check'></i> deleted."
                    );
                    toastr.success(rst.msg);
                    $("#serverError1").html("<div class='success-alert'>" + rst.msg + "</div><br/>");
                    window.setTimeout(function() {
                        location.reload();
                    }, 5000);
                } else if (rst.type == "false") {
                    $("#btn_beneficiary_delete").attr("disabled", false);
                    $("#btn_beneficiary_delete").html(
                        "<i class='fa fa-warning'></i> Failed! Try Again."
                    );
                    $("#serverErrors").html(
                        "<div class='danger-alert'>" + rst.msg + "</div><br/>"
                    );
                }
            },
            error: function(rst) {
                $("#btn_beneficiary_delete").attr("disabled", false);
                $("#btn_beneficiary_delete").html(
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
            $("#add-beneficiary").on("click", function() {
                submitForm();
            });

            $("body").find("table.display.nowrap.table.table-hover.table-striped.table-bordered.beneficiary tbody tr")
                .each(function(index) {
                    $("#edit" + index).on("click", function() {
                        GetDetails(index);
                    });
                });

            $('body').find("#beneficiary_details").on("click ", "#edit-beneficiary", function() {
                Updatebeneficiary();
            });

            $('body').find("table.display.nowrap.table.table-hover.table-striped.table-bordered.beneficiary tbody tr").each(function(index) {
                $("#btn_beneficiary_delete" + index).on("click", function() {
                    Deletebeneficiary(index);
                });
            });
        }
    };
})();

jQuery(document).ready(function() {
    AppBeneficiary.init();
});