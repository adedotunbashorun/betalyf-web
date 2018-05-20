$(document).ready(function() {
    $("#routine-immunization").hide();
    window.setTimeout(function() {
        $("#errors").html("");
    }, 3000);
    $("#get_routine").on("click", function() {
        var name = $("#name").val();
        var email = $("#email").val();
        var gender = $("#gender").val();
        var dob = $("#dob").val();
        $("#errors").html("");
        if (name.length < 1) {
            $("#errors").html("<div class='alert alert-danger alert-dismiss'>Please enter child full name</div>");
        } else if (email.length < 1) {
            $("#errors").html("<div class='alert alert-danger alert-dismiss'>Please enter parent email</div>");
        } else if (gender.length < 1) {
            $("#errors").html("<div class='alert alert-danger alert-dismiss'>Please enter child gender</div>");
        } else if (dob.length < 1) {
            $("#errors").html("<div class='alert alert-danger alert-dismiss'>Please enter child date of birth</div>");
        } else {
            $("#get_routine").attr('disabled', true);
            $("#get_routine").html("<i class='fa fa-refresh fa-spin'></i> Processing...");

            $.ajax({
                url: SCHEDULE,
                method: "GET",
                data: {
                    '_token': TOKEN,
                    'full_name': name,
                    'email': email,
                    'gender': gender,
                    'dob': dob,
                },
                success: function(rst) {
                    $("#routine-immunization").show();
                    $(".immunization_header").html("Immunization Schedule For " + $("#name").val());
                    $("#routine-immunization").fadeIn();
                    $("#routine-immunization table.display.nowrap.table.table-bordered tbody").html(rst);
                    $("#get_routine").attr('disabled', false);
                    $("#get_routine").html(
                        "<i class='fa fa-check'></i> Submit!"
                    );
                    var name = $("#name").val("");
                    var email = $("#email").val("");
                    var gender = $("#gender").val("");
                    var dob = $("#dob").val("");
                },
                error: function(rst) {
                    $("#get_routine").attr("disabled", false);
                    $("#get_routine").html("<i class='fa fa-warning fa-spin'></i> Failed. Try Again!");
                    $("#errors").html(
                        "<div class='alert alert-danger'>" + rst.msg + "</div><br/>"
                    );
                }
            });
        }
    });
})