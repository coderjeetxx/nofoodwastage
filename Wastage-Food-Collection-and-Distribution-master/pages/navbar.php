<div style="background-color: #e3f2fd;">

    <nav class="container navbar navbar-expand-lg border-bottom navbar-light">
        <div class="container-fluid ">
            <a class="navbar-brand" href="#">
                <img src="../img/logo2.png.png" alt="" class="logo">
            </a>
            <button class="navbar-toggler border border-success" type="button" data-bs-toggle="collapse"
                data-bs-target="#navBarButtonSowHide" aria-controls="navBarButtonSowHide" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navBarButtonSowHide">
                <ul class="navbar-nav me-auto mb-6 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="../index.php"><i class="fas fa-home me-1"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="../pages/about.php"><i
                                class="fas fa-address-card me-1"></i>About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="../admin/template"><i class="fa fa-user me-1"
                                aria-hidden="true"></i>Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  fw-bold" href="../pages/contact.php"><i class="fa fa-phone me-1"
                                aria-hidden="true"></i>Contact</a>
                    </li>


                </ul>

                <div class="d-grid gap-2 d-md-block">

                    <?php
    
                    if ((isset($_SESSION['login_status']) && isset($_SESSION['login_user_email']) && $_SESSION['login_status'])) {
                        ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false"
                            id="profileDropdown" style="color: white;">
                            <img src="../img/user.png" alt="profile">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li class="p-2"><a class="dropdown-item text-center active" href="pages/profile.php">Login
                                    as</a></li>
                            <li><a class="dropdown-item">
                                    <?php echo $_SESSION['login_user_name']?>
                                </a></li>
                            <li><a class="dropdown-item "
                                    href="myorder.php?email=<?php echo $_SESSION['login_user_email']?>">My Order</a>
                            </li>
                            <li><a class="dropdown-item" href="../pages/logout.php">Log Out</a></li>
                        </ul>
                    </li>
                    <?php
         
                    } else {
                      ?>
                     <a class="btn btn-info fw-bold" type="button" href="../pages/resister.php">Sign Up</a>
                     <a class="btn btn-warning fw-bold" type="button" href="../pages/login.php">Sign In</a>
                    <?php
                    }
                ?>


                </div>


            </div>


        </div>
    </nav>

</div>