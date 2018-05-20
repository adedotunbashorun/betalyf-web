var Apphospital = (function() {
    $("#locals").hide();
    var submitForm = function() {
        var name = $("#name").val();
        var category_id = $("#category_id").val();
        var state_id = $("#state_id").val();
        var local_id = $("#local_id").val();
        var lat = $("#lat").val();
        var lng = $("#lng").val();
        var telephone = $("#telephone").val();
        var location = $("#location").val();
        var website = $("#website").val();
        var email = $("#email").val();
        var extension = $('#icon').val().split('.').pop().toLowerCase();

        if (name.length < 1) {
            toastr.error("Name is required");
        } else if (category_id.length < 1) {
            toastr.error("Category is required");
        } else if (state_id.length < 1) {
            toastr.error("State is required");
        } else if (local_id.length < 1) {
            toastr.error("Local Govt is required");
        } else if (lat.length < 1) {
            toastr.error("latitude is required");
        } else if (lng.length < 1) {
            toastr.error("Longtitude is required");
        } else if ($.inArray(extension, ['jpg', 'jpeg', 'png']) == -1) {
            toastr.error("This extension is not supported");
        } else {
            $("#add-hospital").attr("disabled", true);
            $("#add-hospital").html("<i class='fa fa-spinner fa-spin'></i> Processing...");
            var icon = $("#icon").prop("files")[0];

            var form_data = new FormData();
            form_data.append('name', name);
            form_data.append('icon', icon);
            form_data.append('category_id', category_id);
            form_data.append('state_id', state_id);
            form_data.append('local_id', local_id);
            form_data.append('lat', lat);
            form_data.append('lng', lng);
            form_data.append('location', location);
            form_data.append('email', email);
            form_data.append('telephone', telephone);
            form_data.append('website', website);
            form_data.append('_token', TOKEN);
            $.ajax({
                url: ADD_HOSPITAL, // point to server-side PHP script
                data: form_data,
                type: "POST",
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false,
                success: function(rst) {
                    if (rst.type == "true") {
                        $("#add-hospital").attr("disabled", false);
                        $("#add-hospital").html(
                            "<i class='fa fa-check'></i> Add hospital"
                        );
                        toastr.success(rst.msg);
                        setTimeout(function() {
                            location.reload();
                        }, 5000);
                    } else if (rst.type == "false") {
                        $("#add-hospital").attr("disabled", false);
                        $("#add-hospital").html(
                            "<i class='fa fa-warning'></i> Failed! Try Again."
                        );
                        toastr.warning(rst.msg);
                    }
                },
                error: function(rst) {
                    $("#add-hospital").attr("disabled", false);
                    $("#add-hospital").html(
                        "<i class='fa fa-warning fa-spin'></i> Failed. Try Again!"
                    );
                    toastr.error(rst.msg);
                }
            });
        }
    };

    var GetLocal = function(state_id) {
        $("#loading").show();

        $.ajax({
            url: LOCAL_GOVT,
            method: "GET",
            data: {
                '_token': TOKEN,
                'state_id': state_id
            },
            success: function(rst) {
                $("#loading").hide();
                $("#locals").hide();
                $("#locals").addClass("col-md-6");
                $("#locals").fadeIn();
                $("#local_id").html(rst);
            },
            error: function(jqXHR, textStatus, errorMessage) {
                $("#loading").hide();
                toastr.error(errorMessage);
            }
        });
    }

    var GetLocals = function(state_id) {
        $("#loading").show();

        $.ajax({
            url: LOCAL_GOVT,
            method: "GET",
            data: {
                '_token': TOKEN,
                'state_id': state_id
            },
            success: function(rst) {
                $("#loading").hide();
                $("#local").hide();
                $("#localss").addClass("col-md-6");
                $("#localss").fadeIn();
                $("#localss").html(rst);
            },
            error: function(jqXHR, textStatus, errorMessage) {
                $("#loading").hide();
                toastr.error(errorMessage);
            }
        });
    }

    var GetDetails = function(index) {
        $("#edit_hospital").modal();
        $("#loading").show();
        $("#hospital_details").hide();
        var hospital_id = $("#hospital_id" + index).val();

        $.ajax({
            url: GET_EDIT_INFO,
            method: "GET",
            data: {
                '_token': TOKEN,
                'hospital_id': hospital_id
            },
            success: function(rst) {
                $("#loading").hide();
                $("#hospital_details").fadeIn();
                $("#hospital_details").html(rst);
            },
            error: function(jqXHR, textStatus, errorMessage) {
                $("#loading").hide();
                $("#hospital_details").hide();
                $("#serverErrors1").show();
                $("#serverErrors1").html(
                    "<div class='danger-alert'>" + errorMessage + "</div>"
                );
            }
        });
    }

    var Updatehospital = function() {
        var name = $("#name1").val();
        var category_id = $("#category_id1").val();
        var state_id = $("#state_id1").val();
        var local_id = $("#local_id").val();
        var lat = $("#lat1").val();
        var lng = $("#lng1").val();
        var telephone = $("#telephone1").val();
        var location = $("#location1").val();
        var website = $("#website1").val();
        var email = $("#email1").val();
        var extension = $('#icon1').val().split('.').pop().toLowerCase();

        if (name.length < 1) {
            toastr.error("Name is required");
        } else if (category_id.length < 1) {
            toastr.error("Category is required");
        } else if (state_id.length < 1) {
            toastr.error("State is required");
        } else if (local_id.length < 1) {
            toastr.error("Local Govt is required");
        } else if (lat.length < 1) {
            toastr.error("latitude is required");
        } else if (lng.length < 1) {
            toastr.error("Longtitude is required");
        } else if ($.inArray(extension, ['jpg', 'jpeg', 'png']) == -1) {
            toastr.error("This extension is not supported");
        } else {
            $("#serverErrors1").html("");
            $('#edit-hospital').attr("disabled", true);
            $("#edit-hospital").html("<i class='fa fa-spinner fa-spin'></i> Editing permission... please wait.");

            var icon = $("#icon1").prop("files")[0];

            var form_data = new FormData();
            form_data.append('name', name);
            form_data.append('icon', icon);
            form_data.append('category_id', category_id);
            form_data.append('state_id', state_id);
            form_data.append('local_id', local_id);
            form_data.append('lat', lat);
            form_data.append('lng', lng);
            form_data.append('location', location);
            form_data.append('email', email);
            form_data.append('telephone', telephone);
            form_data.append('website', website);
            form_data.append('_token', TOKEN);

            $.ajax({
                url: UPDATE_URL, // point to server-side PHP script
                data: form_data,
                type: "POST",
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false,
                success: function(rst) {
                    if (rst.type == "true") {
                        $("#edit-hospital").attr("disabled", false);
                        $("#edit-hospital").html(
                            "<i class='fa fa-check'></i> Edit Store"
                        );
                        toastr.success(rst.msg);
                        window.setTimeout(function() {
                            location.reload();
                        }, 5000);
                    } else if (rst.type == "false") {
                        $("#edit-hospital").attr("disabled", false);
                        $("#edit-hospital").html(
                            "<i class='fa fa-warning'></i> Failed! Try Again."
                        );
                        toastr.warning(rst.msg);
                    }
                },
                error: function(rst) {
                    $("#edit-hospital").attr("disabled", false);
                    $("#edit-hospital").html(
                        "<i class='fa fa-warning fa-spin'></i> Failed. Try Again!"
                    );
                    toastr.error(rst.msg);
                }
            });
        }
    }

    var UpdatehospitalProfile = function() {
        var name = $("#name1").val();
        var category_id = $("#category_id1").val();
        var state_id = $("#state_id1").val();
        var local_id = $("#local_id").val();
        var lat = $("#lat1").val();
        var lng = $("#lng1").val();
        var telephone = $("#telephone1").val();
        var location = $("#location1").val();
        var website = $("#website1").val();
        var email = $("#email1").val();
        var extension = $('#icon1').val().split('.').pop().toLowerCase();

        if (name.length < 1) {
            toastr.error("Name is required");
        } else if (category_id.length < 1) {
            toastr.error("Category is required");
        } else if (state_id.length < 1) {
            toastr.error("State is required");
        } else if (local_id.length < 1) {
            toastr.error("Local Govt is required");
        } else if (lat.length < 1) {
            toastr.error("latitude is required");
        } else if (lng.length < 1) {
            toastr.error("Longtitude is required");
        } else if ($.inArray(extension, ['jpg', 'jpeg', 'png']) == -1) {
            toastr.error("This extension is not supported");
        } else {
            $("#serverErrors1").html("");
            $("#updateProfile").attr("disabled", true);
            $("#updateProfile").html("<i class='fa fa-spinner fa-spin'></i> Updating Profile... please wait.");

            var icon = $("#icon1").prop("files")[0];

            var form_data = new FormData();
            form_data.append('name', name);
            form_data.append('icon', icon);
            form_data.append('category_id', category_id);
            form_data.append('state_id', state_id);
            form_data.append('local_id', local_id);
            form_data.append('lat', lat);
            form_data.append('lng', lng);
            form_data.append('location', location);
            form_data.append('email', email);
            form_data.append('telephone', telephone);
            form_data.append('website', website);
            form_data.append('_token', TOKEN);

            $.ajax({
                url: UPDATE_URL, // point to server-side PHP script
                data: form_data,
                type: "POST",
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false,
                success: function(rst) {
                    if (rst.type == "true") {
                        $("#updateProfile").attr("disabled", false);
                        $("#updateProfile").html("<i class='fa fa-check'></i> Edit Store");
                        toastr.success(rst.msg);
                        window.setTimeout(function() {
                            location.reload();
                        }, 5000);
                    } else if (rst.type == "false") {
                        $("#updateProfile").attr("disabled", false);
                        $("#updateProfile").html("<i class='fa fa-warning'></i> Failed! Try Again.");
                        toastr.warning(rst.msg);
                    }
                },
                error: function(rst) {
                    $("#updateProfile").attr("disabled", false);
                    $("#updateProfile").html("<i class='fa fa-warning fa-spin'></i> Failed. Try Again!");
                    toastr.error(rst.msg);
                }
            });
        }
    }

    Deletehospital = function(index) {
        $("#serverErrors").html("");
        $("#btn_hospital_delete").attr("disabled", true);
        $("#btn_hospital_delete").html("<i class='fa fa-refresh fa-spin'></i> Deleting this hospital...");

        //deleting hospital
        $.ajax({
            url: $('#btn_hospital_delete' + index).data("href"),
            method: "GET",
            data: {
                '_token': TOKEN,
                'req': "hospital_delete"
            },
            success: function(rst) {
                if (rst.type == "true") {
                    $("#btn_hospital_delete").attr("disabled", false);
                    $("#btn_hospital_delete").html(
                        "<i class='fa fa-check'></i> deleted."
                    );
                    toastr.success(rst.msg);
                    $("#serverError1").html("<div class='success-alert'>" + rst.msg + "</div><br/>");
                    window.setTimeout(function() {
                        location.reload();
                    }, 5000);
                } else if (rst.type == "false") {
                    $("#btn_hospital_delete").attr("disabled", false);
                    $("#btn_hospital_delete").html(
                        "<i class='fa fa-warning'></i> Failed! Try Again."
                    );
                    $("#serverErrors").html(
                        "<div class='danger-alert'>" + rst.msg + "</div><br/>"
                    );
                }
            },
            error: function(rst) {
                $("#btn_hospital_delete").attr("disabled", false);
                $("#btn_hospital_delete").html(
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
            $("#add-hospital").on("click", function() {
                submitForm();
            });

            $("body").find("table.display.nowrap.table.table-hover.table-striped.table-bordered.hospital tbody tr")
                .each(function(index) {
                    $("#edit" + index).on("click", function() {
                        GetDetails(index);
                    });
                });

            $('body').find("#hospital_details").on("click ", "#edit-hospital", function() {
                Updatehospital();
            });

            $("#updateProfile").on("click", function() {
                UpdatehospitalProfile();
            });

            $("#state_id").on("change", function() {
                GetLocal($("#state_id").val());
            });

            $("#state_id1").on("change", function() {
                GetLocal($("#state_id1").val());
            });

            $('body').find("#hospital_details").on("change ", "#state_id1", function() {
                GetLocals($("#state_id1").val());
            });

            $('body').find("table.display.nowrap.table.table-hover.table-striped.table-bordered.hospital tbody tr").each(function(index) {
                $("#btn_hospital_delete" + index).on("click", function() {
                    Deletehospital(index);
                });
            });
        }
    };
})();

jQuery(document).ready(function() {
    Apphospital.init();
});