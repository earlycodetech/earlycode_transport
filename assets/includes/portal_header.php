<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | ECTransit</title>
    <link rel="shortcut icon" href="../assets/img/earlycode_logo.jpg">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/css/all.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>

    <!-- DASHBOARD NAV -->
    <section>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <img src="../assets/img/earlycode_logo.jpg" width="70px" alt="">
              <a class="navbar-brand fs-2 ms-3 fw-bold text-warning" href="#">EarlyCode Transit</a>
              <span class="span-text" style="position: absolute; top: 0; margin-left: 150px; margin-top: 50px; color: whitesmoke;">....lets take you round the world safely</span>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link fw-bold ms-3  text-light" href="#">OUR SERVICES</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link fw-bold ms-3 text-light" href="#">CONTACT US</a>
                  </li>       
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn btn-oultine-light " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     ACCOUNT
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="#">Profile</a></li>
                      <li><a class="dropdown-item" href="../assets/config/logout">Log-out</a></li>
    
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </section>
    <section class="section" style="background-color: whitesmoke;">
    <div style="display: flex; gap: 20px;">
            <div style="background-color: rgb(85, 20, 20);">
                    <div class="ps-2 pe-3 pt-5">
                      <ul style="list-style: none;">
                        <li  style="margin-left: 0;">
                        <a href="dashboard" class="card-link text-light text-decoration-none" style=" padding-top: 5px; padding-bottom: 5px; padding-right: 90px; margin-left: 0; background-color: rgb(99, 55, 55);"><i class="fas fa-tachometer-alt me-1 ps-1"></i> Dashboard</a></li>
                        <li class="mt-4"><a href="profile" class="card-link text-light text-decoration-none"><i class="fas fa-user"></i> Profile</a></li>
                        <?php if($_SESSION['role'] == 'admin') {?>
                          <li class="mt-4"><a href="route" class="card-link text-light text-decoration-none"><i class="fas fa-map-marker-alt"></i> Create New Route</a></li>
                        <?php } ?>
                        <li class="mt-4"><a href="#" class="card-link text-light text-decoration-none"><i class="fas fa-history"></i> History</a></li>
                        <li class="mt-4"><a href="#" class="card-link text-light text-decoration-none"><i class="fas fa-wallet"> </i>  E-wallet</a></li>
                        <?php if($_SESSION['role'] == 'driver') {?>
                        <li class="mt-4"><a href="#" class="card-link text-light text-decoration-none"><i class="fas fa-portrait"></i> Process Driver's ID</a></li>
                        <li class="mt-4"><a href="#" class="card-link text-light text-decoration-none"><i class="fas fa-user-check"></i> Validate ID</a></li>
                        <?php } ?>
                        <li class="mt-4"><a href="route" class="card-link text-light text-decoration-none"><i class="fas fa-bus-alt"></i> Hire a Vehicle</a></li>
                        <li class="mt-4"><a href="#" class="card-link text-light text-decoration-none"><i class="fas fa-link"></i> Referral</a></li>
                        <li class="mt-4"><a href="#" class="card-link text-light text-decoration-none"><i class="fas fa-lock"></i> Reset Password</a></li>
                        <li class="mt-4"><a href="#" class="card-link text-light text-decoration-none"><i class="fas fa-sign-out-alt"></i> Log-out</a></li>
                      </ul>
                    </div>
              </div>




   