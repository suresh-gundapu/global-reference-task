<div class="layout-fixed  bg-body-tertiary">
    <?php include('includes/header.php');
    include_once "database/connection.php";

    if (($_SESSION['auth'] == "3")) {
        header('location:index.php');
    } elseif ($_SESSION['auth'] == "2") {
        header('location:dashboard.php');
    }
    $id = $_GET['uid'];
    $ret = "select * from users where user_id=?";
    $stmt2 = $db->prepare($ret);
    $stmt2->bind_param('i', $id);
    $stmt2->execute();
    $res = $stmt2->get_result();

    ?>

    <div class="container wrapper1 rounded bg-white mt-5 mb-5">
        <div class="row">
            <header class="pb-3  border-bottom">
                <h3 class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4">Welcome <span class="text-danger ms-2"><?= $_SESSION['name'] ?> !!(<?php if ($_SESSION['auth'] == "1") {
                                                                                                                echo "Super Admin";
                                                                                                            } elseif ($_SESSION['auth'] == "2") {
                                                                                                                echo "Admin";
                                                                                                            } else {
                                                                                                                echo "User";
                                                                                                            } ?>)</span></span>
                </h3>
            </header>
            <div class="col-md-12 border-right card shadow border-1 m-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <?php $cnt = 1;
                    while ($row = $res->fetch_object()) { ?>
                        <form class="row g-3 valid-err" id="profile-frm" action="javascript:void(0)">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label htmlFor="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="data[name]" value="<?php echo $row->name; ?>">

                                </div>
                                <div class="col-md-6">
                                    <label htmlFor="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="data[email]" value="<?php echo $row->email; ?>">

                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label htmlFor="mob" class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control" id="mob" name="data[mobile_no]" value="<?php echo $row->mobile_no; ?>">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label htmlFor="dob" class="form-label">DOB</label>
                                    <input type="date" class="form-control" id="dob" name="data[dob]" value="<?php echo $row->dob; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label htmlFor="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="data[address]" value="<?php echo $row->address; ?>">

                                </div>
                            </div>
                            <div class="row mt-3">

                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="data[gender]" id="inlineRadio1" value="male" <?php if ($row->gender == "male") echo "checked"; ?>>
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="data[gender]" id="inlineRadio2" value="female" <?php if ($row->gender == "female") echo "checked"; ?>>
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label htmlFor="image" class="form-label">Profile Image</label>
                                    <input type="file" class="form-control" id="image" name="data[user_image]" value="<?php echo $row->user_image ?>">

                                    <p> <img src="<?php echo $row->user_image ?>" width="75" height="75" /></p>

                                </div>
                                <div class="col-md-6">
                                    <label htmlFor="siimage" class="form-label">Signature</label>
                                    <input type="file" class="form-control" id="siimage" name="data[signature]" value="<?php echo $row->signature ?>">
                                    <p> <img src="<?php echo $row->signature ?>" width="75" height="75" /></p>

                                </div>
                            </div>
                            <input type="hidden" name="data[uid]" value="<?php if (isset($id)) {
                                                                                echo $id;
                                                                            }; ?>">
                            <div class="mt-5 text-center"><button class="btn btn-primary update_profile" type="button">Update Profile</button>
                        </form>
                    <?php } ?>

                </div>
            </div>


        </div>

    </div>
</div>

<script src="assets/js/user_dashboard.js"></script>
< <?php include('includes/footer.php'); ?> </div>