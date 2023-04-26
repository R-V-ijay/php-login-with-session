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


$(document).ready(function () {

  $(".check_in_btn").on("click", function () {
    $con = confirm("Are you Sure To Check In...?");

    if ($con) {
      var userid = $("#userid").text();

      $.ajax({
        type: "post",
        url: "manage_function.php",
        data: {
          userid: userid,
          check_in: "yes",
        },
        async: false,
        success: function (response) {
          var info = $.parseJSON(response);
          if (info.status == 'success') {
            $("#check_in_time").text("Started At : " + info.CheckInTime);
            $(".check_in_btn").hide();
            $(".check_out_btn").css("display", "block");

          } else {
            $("#check_in_time").text(info.message);
          }
        }
      });
    }
  });

  $(".check_out_btn").on("click", function () {
    $con = confirm("Are you Sure To Check Out...?");

    if ($con) {
      var userid = $("#userid").text();

      $.ajax({
        type: "post",
        url: "manage_function.php",
        data: {
          userid: userid,
          check_out: "yes",
        },
        async: false,
        success: function (response) {

          var info = $.parseJSON(response);
          console.log(info);
          if (info.status == 'success') {
            $("#check_out_time").text("Ended At : " + info.CheckOutTime);
            $(".check_out_btn").hide();

          } else {
            $("#check_out_time").text(info.message);
          }
        }
      });

    }

  });
});
