$(function() {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("#btn-login").click(function () {
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
      "password": password
    };

    $.ajax({
      type: "POST",
      url: "/login",
      data: data,
      dataType: 'json',
      success: function (data) {
        if (data != "") {
          window.location.href = "/posts";
        }
      },
      error: function (data) {
        $("#login-status").text('fail to send request');
        console.log("error");
      }
    });

    return false;
  });
});
