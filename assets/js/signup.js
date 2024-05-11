$(function () {
  $("#frm-add-user").validate({
    rules: {
      "data[email]": "required",
      "data[name]": "required",
      "data[password]": "required",
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
      "data[password]": "Please enter password",
      "data[user_image]": "Please upload profileImage",
      "data[dob]": "Please choose date of birth",
      "data[gender]": "Please select gender",
      "data[signature]": "Please upload signature",
      "data[mobile_no]": "Please select mobile number",
    },
  });
  //We can add more values to form data
  //formData.append("key", "value");
  $(".login").click(function () {
    var validator = $("#frm-add-user").validate();
    validator.form();
    if (validator.form() == true) {
      var data = new FormData($("#frm-add-user")[0]);
      console.log(data);
      $.ajax({
        url: "database/signUpAction.php",
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
              window.location.href = "index.php";
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
