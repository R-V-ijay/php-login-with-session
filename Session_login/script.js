function checkUserExist() {
  var userEmail = $("#userEmail").val();
  var userPassword = $("#userPassword").val();
  var error = 0;
  $.ajax({
    type: "post",
    url: "manage_function.php",
    data: {
      email: userEmail,
      password: userPassword,
      login_check: "yes",
    },
    async: false,
    success: function (response) {
      var info = $.parseJSON(response);
      if (info.status == "faild") {
        $("#loginStatus").text(info.message);
        error = 1;
      }
    },
  });

  if (error == 1) {
    return false;
  } else {
    return true;
  }
}
