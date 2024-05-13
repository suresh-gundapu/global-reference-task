<div class="layout-fixed  bg-body-tertiary">
    <?php include('includes/header.php');
    include_once "database/connection.php";

    if (!isset($_SESSION['name'])) {
        header('location:index.php');
    }

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

            <?php if ($_SESSION['auth'] == "1" || $_SESSION['auth'] == "2" || $_SESSION['auth'] == "3") { ?>
                <div class="col-md-12 border-right card shadow border-1 m-4">
                    <div class="m-2">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">File Management System</h4>
                            <a href=""><button class="btn btn-success text-left">+Upload File</button></a>

                            <div class="form-group">
                                <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Type file name" />
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" id="dynamic_content">
                    </div>

                </div>
            <?php } ?>

        </div>

    </div>
</div>

<script src="assets/js/file_manage.js"></script>
< <?php include('includes/footer.php'); ?> </div>