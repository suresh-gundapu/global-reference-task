$(function () {
  // debugger;
  $("#upload-file").validate({
    rules: {
      "data[file]": "required",
    },
    messages: {
      "data[file]": "Please Upload File",
    },
  });
  $(".upload_file").click(function () {
    var validator = $("#upload-file").validate();
    validator.form();
    if (validator.form() == true) {
      var data = new FormData($("#upload-file")[0]);
      console.log(data);
      $.ajax({
        url: "database/uploadFileUser.php",
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
              window.location.href = "filemanagement.php";
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
