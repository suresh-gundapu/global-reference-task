$(function () {
  // debugger;
  $("#profile-frm").validate({
    rules: {
      "data[email]": "required",
      "data[name]": "required",
      "data[user_image]": "required",
      "data[dob]": "required",
      "data[address]": "required",
      "data[gender]": "required",
      "data[signature]": "required",
      "data[mobile_no]": "required",
    },
    messages: {
      "data[email]": "Please enter email",
      "data[name]": "Please enter username",
      "data[user_image]": "Please upload profileImage",
      "data[dob]": "Please choose date of birth",
      "data[gender]": "Please select gender",
      "data[signature]": "Please upload signature",
      "data[mobile_no]": "Please select mobile number",
    },
  });
  $(".update_profile").click(function () {
    var validator = $("#profile-frm").validate();
    validator.form();
    if (validator.form() == true) {
      var data = new FormData($("#profile-frm")[0]);
      console.log(data);
      $.ajax({
        url: "database/updateProfileAction.php",
        type: "POST",
        cache: false,
        data: data,
        processData: false,
        contentType: false,
        mimeType: "multipart/form-data",
        contentType: false,
        success: function (result) {
          var obj = jQuery.parseJSON(result);
          if (obj.status == "1") {
            Swal.fire({
              icon: "success",
              title: obj.message,
              showConfirmButton: false,
              timer: 1500,
            });
            setTimeout(function () {
              window.location.href = "dashboard.php";
            }, 1000);
          } else {
            Swal.fire({
              icon: "error",
              title: obj.message,
              showConfirmButton: false,
              timer: 1500,
            });
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          // alert('Error at add data');
        },
      });
    }
  });
});
$(document).ready(function () {
  $.getJSON("database/fetchUsers.php", function (data) {}).done(function (
    data
  ) {
    var json_data;
    $(".demo-table").show();
    $("#demo-table-content").empty();
    $.each(data, function (i, tutorial) {
      json_data =
        "<tr>" +
        "<td>" +
        tutorial.name +
        "</td>" +
        "<td>" +
        tutorial.email +
        "</td>" +
        "<td>" +
        tutorial.mobile_no +
        "</td>" +
        "<td>" +
        tutorial.address +
        "</td>" +
        "<td>" +
        tutorial.dob +
        "</td>" +
        "<td>" +
        '<img src="' +
        tutorial.user_image +
        '" width="50" />' +
        "</td>" +
        "<td>" +
        '<button class="btn ' +
        (tutorial.status == 1 ? "btn-success" : "btn-danger") +
        '" onclick="userChangeStatus(' +
        tutorial.status +
        "," +
        tutorial.user_id +
        ')">' +
        (tutorial.status == 1 ? "Active" : "InActive") +
        "</button> " +
        "</td>" +
        "<td>" +
        '<a href="usersEdit.php?uid=' +
        tutorial.user_id +
        '"><button class="btn btn-success">Edit</button> </a><button class="btn btn-danger" onclick="userDelete(' +
        tutorial.user_id +
        ')">Delete</button> ' +
        "</td>" +
        "</tr>";

      $(json_data).appendTo("#demo-table-content");
    });
  });
});

function userChangeStatus(status_code, user_id) {
  Swal.fire({
    title: "Are you sure?",
    text: "",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Yes, change it!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "database/userUpdateStatus.php",
        data: {
          status_code: status_code,
          user_id: user_id,
        },
        cache: false,
        type: "POST",
        success: function (result) {
          var obj = jQuery.parseJSON(result);
          if (obj.status == "1") {
            Swal.fire({
              icon: "success",
              title: obj.message,
              showConfirmButton: false,
              timer: 1500,
            });
            setTimeout(function () {
              window.location.href = "dashboard.php";
            }, 1000);
          } else {
            Swal.fire({
              icon: "error",
              title: obj.message,
              showConfirmButton: false,
              timer: 1500,
            });
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          // alert('Error at add data');
        },
      });
    }
  });
}

function userDelete(id = 0) {
  Swal.fire({
    title: "Are you sure?",
    text: "This action cannot be undone!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "database/usersDeleteAction.php",
        data: {
          id: id,
        },
        cache: false,
        type: "POST",
        success: function (result) {
          var obj = jQuery.parseJSON(result);
          if (obj.status == "1") {
            Swal.fire({
              icon: "success",
              title: obj.message,
              showConfirmButton: false,
              timer: 1500,
            });
            setTimeout(function () {
              window.location.href = "dashboard.php";
            }, 1000);
          } else {
            Swal.fire({
              icon: "error",
              title: obj.message,
              showConfirmButton: false,
              timer: 1500,
            });
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          // alert('Error at add data');
        },
      });
    }
  });
}
