$(function () {

    $("#contactForm input, #contactForm textarea, #contactForm select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function ($form, event, errors) {
            console.log($form, event, errors)
        },
        submitSuccess: function ($form, event) {
            event.preventDefault();
            var name = $("#contactForm input#name").val();
            var email = $("#contactForm input#email").val();
            var message = $("#contactForm textarea#message").val();
            // var subject = $("#contactForm input#subject").val();
            var phone = $("#contactForm input#phoneNumber").val();
            var propertyType = $("#contactForm select#propertyType").val();
            var unitType = $("#contactForm select#unitType").val();
            var Budget = $("#contactForm input#Budget").val();
            var projectCommencement = $("#contactForm select#projectCommencement").val();
            var RoomType = $("#contactForm select#RoomType").val();
            var areaSize = $("#contactForm select#areaSize").val();
            var additionalServices = $("#contactForm select#additionalServices").val();
            var Address = $("#contactForm textarea#Address").val();
            // console.log(name, email, message, subject);

            $this = $("#sendMessageButton");
            $this.prop("disabled", true);

            $.ajax({
                url: "/mail/contact.php",
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    message: message,
                    // subject:subject,
                    phone:phone,
                    propertyType:propertyType,
                    unitType:unitType,
                    Budget:Budget,
                    projectCommencement:projectCommencement,
                    RoomType:RoomType,
                    areaSize:areaSize,
                    additionalServices:additionalServices,
                    Address:Address

                },
                cache: false,
                success: function (returnval) {
                    console.log("success",returnval)
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                    $('#success > .alert-success')
                            .append("<strong>Your message has been sent. </strong>");
                    $('#success > .alert-success')
                            .append('</div>');
                    // $('#contactForm').trigger("reset");
                },
                error: function (returnval) {
                    console.log("erroe",returnval)
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                    $('#success > .alert-danger').append($("<strong>").text("Sorry " + name + ", it seems that our mail server is not responding. Please try again later!"));
                    $('#success > .alert-danger').append('</div>');
                    // $('#contactForm').trigger("reset");
                },
                complete: function () {
                    setTimeout(function () {
                        $this.prop("disabled", false);
                    }, 1000);
                }
            });
        },
        filter: function () {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

$('#name').focus(function () {
    $('#success').html('');
});
