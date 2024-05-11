<div class="layout-fixed  bg-body-tertiary">
  <?php include('includes/header.php');
  if (isset($_SESSION['name'])) {
    header('location:dashboard.php');
  } ?>
  <div class="container-fluid">
    <div class='row justify-content-center'>
      <div class='wrapper mt-4 p-4 col-sm-8 col-md-8 col-lg-8 col-xl-6'>
        <div class="card border-primary shadow my-2">
          <div class="card-header border-bottom border-primary">
            <h4 class="text-primary text-center">
              Register
            </h4>
          </div>
          <div class="card-body border-bottom">
            <form class="row g-3 valid-err" id="frm-add-user" action="javascript:void(0)">
              <div class="row mt-3">
                <div class="col-md-6">
                  <label htmlFor="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="data[name]" value="">

                </div>
                <div class="col-md-6">
                  <label htmlFor="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="data[email]" value="">

                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6">
                  <label htmlFor="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="data[password]" value="">
                </div>
                <div class="col-md-6">
                  <label htmlFor="mob" class="form-label">Mobile Number</label>
                  <input type="text" class="form-control" id="mob" name="data[mobile_no]" value="">
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6">
                  <label htmlFor="dob" class="form-label">DOB</label>
                  <input type="date" class="form-control" id="dob" name="data[dob]">
                </div>
                <div class="col-md-6">
                  <label htmlFor="address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" name="data[address]" value="">

                </div>
              </div>
              <div class="row mt-3">

                <div class="col-md-12">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="data[gender]" id="inlineRadio1" value="male">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="data[gender]" id="inlineRadio2" value="female">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6">
                  <label htmlFor="image" class="form-label">Profile Image</label>
                  <input type="file" class="form-control" id="image" name="data[user_image]">
                </div>
                <div class="col-md-6">
                  <label htmlFor="siimage" class="form-label">Signature</label>
                  <input type="file" class="form-control" id="siimage" name="data[signature]">
                </div>
              </div>

              <div class="col-md-12">
                Already An Acount ? <a class="form-label" href="index.php">Login Here</a>
              </div>
              <div class="col-12">
                <button type="button" class="btn btn-primary login"> Register</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="forgotPwdModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3 valid-err" id="frgt-pwd-mdl" action="javascript:void(0)">

              <div class="col-12">
                <label htmlFor="inputAddress" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="">
              </div>
              <div class="col-12">
                <button type="button" class="btn btn-primary frgt-pwd-mdl"> Submit</button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="assets/js/signup.js"></script>

  <?php include('includes/footer.php'); ?>
</div>