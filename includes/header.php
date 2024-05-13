<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
  <meta name="generator" content="Hugo 0.84.0">
  <title>Refernece Globe System Task-1</title>
  <link rel="stylesheet" href="assets/css/bootstrap5/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/common.css" />
  <link rel="stylesheet" href="assets/css/jQuery/sweetalert2.min.css" />

  <script src="assets/js/jQuery/jquery.min.js"></script>
  <!-- Validation library file -->
  <script src="assets/js/jQuery/jquery.validate.min.js"></script>
  <script src="assets/js/jQuery/sweetalert2.min.js"></script>
</head>

<body>
  <div class="container-fluid g-0  overflow-hidden">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-expand-lg     justify-content-center bg-custom">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
              <img src="assets/images/logo_parent.png" style="height:60px;width:150px" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['uid'])) { ?>

                  <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="dashboard.php">Task-1</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="employee_data.php">Task-2a</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="filemanagement.php">Task-2b</a>
                  </li>
                <?php } ?>

                <?php if (!isset($_SESSION['uid'])) { ?>

                  <li class="nav-item">
                    <a class="nav-link text-white" href="signUp.php">SignUp</a>

                  </li>
                <?php } ?>

                <?php if (!isset($_SESSION['uid'])) { ?> <li class="nav-item">
                    <a class="nav-link text-white" href="index.php">Login</a>
                  </li>
                <?php } ?>

              </ul>
              <?php if (isset($_SESSION['uid'])) { ?>
                <a href="logout.php" class="text-white">Logout</a>&nbsp;&nbsp;&nbsp;
                <span class=" navbar-text text-white">
                  <a href="index.php" class="text-white"><?php echo $_SESSION['name'] ?></a>

                </span>
              <?php } ?>

            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>