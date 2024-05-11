<div class="layout-fixed  bg-body-tertiary">
    <?php include('includes/header.php');
    if (isset($_SESSION['name'])) {
        header('location:dashboard.php');
    }
    ?>
    <div class="container-fluid">
        <div class='row justify-content-center'>
            <div class='wrapper mt-4 p-4 col-sm-8 col-md-4 col-lg-6 col-xl-3'>
                <div class="card border-primary shadow my-2">
                    <div class="card-header border-bottom border-primary">
                        <h4 class="text-primary text-center">
                            Login
                        </h4>
                    </div>
                    <div class="card-body border-bottom">
                        <form class="row g-3 valid-err" id="form-login" action="javascript:void(0)">

                            <div class="col-12">
                                <label htmlFor="e" class="form-label">Email</label>
                                <input type="email" class="form-control" id="e" name="data[email]" value="">

                            </div>
                            <div class="col-md-12">
                                <label htmlFor="inputCity" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="data[password]" value="">

                            </div>
                            <div class="col-md-12">
                                <a class="form-label" href="#" data-bs-toggle="modal" data-bs-target="#forgotPwdModel">Forgot Password</a>
                            </div>
                            <div class="col-12">
                                <button type="button" class="btn btn-primary login"> Login</button>
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


    <script src="assets/js/user_login.js"></script>

    <?php include('includes/footer.php'); ?>
</div>