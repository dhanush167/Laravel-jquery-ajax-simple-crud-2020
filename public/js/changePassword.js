$(function() {

  $("#btn-change-password").click(function () {

    var token = $("input[name=_token]").val();
    var email = $("input[name=email]").val();
    var password = $("input[name=password]").val();

    if (email == "") {
      $("input[name=email]").css("border","2px solid #ff1505");

      return false;

    } else {
      $("input[name=email]").css("border","2px solid");
    }

    if (password == "") {
      $("input[name=password]").css("border","2px solid #ff1505");

      return false;

    } else {
      $("input[name=password]").css("border","2px solid");
    }

    var data = {
      "_token": token,
      "email": email,
      "password": password,
    };

    $.ajax({
      type: "POST",
      url: "/changePassword",
      data: data,
      dataType: 'json',
      success: function (data) {
        $("#change-password-status").html("Change Password Successfully");
      },
      error: function (data) {
        $("#error").text('fail to send request');
      }
    });

    return false;
  });
});
