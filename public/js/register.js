$(function() {

  $("#btn-register").click(function () {

    var token = $("input[name=_token]").val();
    var name = $("input[name=name]").val();
    var email = $("input[name=email]").val();
    var password = $("input[name=password]").val();

    if (name == "") {
      $("input[name=name]").css("border","2px solid #ff1505");

      return false;

    } else {
      $("input[name=name]").css("border","2px solid");
    }

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
      "name": name,
      "email": email,
      "password": password
    };

    $.ajax({
      type: "POST",
      url: "/register",
      data: data,
      dataType: 'json',
      success: function (data) {
        $("#register-status").html("Register Successfully");
         window.location.href = "/login";
      },
      error: function (data) {
        $("#error").text('fail to send request');
      }
    });

    return false;
  });
});
