$(function() {

  $("#btn-forgot-password").click(function () {
    var token = $("input[name=_token]").val();
    var email = $("input[name=email]").val();

    if (email == "") {
      $("input[name=email]").css("border","2px solid #ff1505");

      return false;

    } else {
      $("input[name=email]").css("border","2px solid");
    }

    var data = {
      "_token": token,
      "email": email,
    };

    $.ajax({
      type: "POST",
      url: "/forgotPassword",
      data: data,
      dataType: 'json',
      success: function (data) {
        $("#forgot-password-status").html("Forgot Password Successfully");
      },
      error: function (data) {
        $("#error").text('fail to send request');
      }
    });

    return false;
  });
});
