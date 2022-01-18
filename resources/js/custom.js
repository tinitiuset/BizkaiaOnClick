$("button").click(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "/pages/test/",
        data: {
            id: $(this).val(), // < note use of 'this' here
            access_token: $("#access_token").val()
        },
        success: function(result) {
            alert('ok');
        },
        error: function(result) {
            alert('error');
        }
    });
});
