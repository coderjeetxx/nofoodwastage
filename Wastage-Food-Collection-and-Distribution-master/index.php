<?php
session_start();
include_once('server/db_conn.php');

?>

<!-- header Part -->
<?php include 'pages/header.php' ?>
<link rel="stylesheet" href="css/style.css">
<title>Let's Say No To Food Waste</title>
<link rel = "icon" href = 
"img/logo2.png.png" 
        type = "image/x-icon">
</head>

<body>

  <div class="background">
    <nav class="container navbar navbar-expand-lg border-bottom">
      <div class="container-fluid ">
        <a class="navbar-brand" href="#">
          <img src="img/logo2.png.png" alt="" class="logo">
        </a>
        <button class="navbar-toggler border border-success" type="button" data-bs-toggle="collapse" data-bs-target="#navBarButtonSowHide" aria-controls="navBarButtonSowHide" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
          </span>
        </button>
        <div class="collapse navbar-collapse" id="navBarButtonSowHide">
          <ul class="navbar-nav me-auto mb-6 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link fw-bold" href="#"><i class="fas fa-home me-1"></i>HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="pages/about.php"><i class="fas fa-address-card me-1"></i>ABOUT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="admin/template"><i class="fa fa-user me-1" aria-hidden="true"></i>ADMIN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  fw-bold" href="pages/contact.php"><i class="fa fa-phone me-1" aria-hidden="true"></i>CONTACT</a>
            </li>


          </ul>

          <div class="d-grid gap-2 d-md-block">

            <?php

            if ((isset($_SESSION['login_status']) && isset($_SESSION['login_user_email']) && $_SESSION['login_status'])) {
            ?>
              <!-- <a class="btn btn-secondary fw-bold" type="button" href="pages/logout.php">Log Out</a> -->
              <!-- <li class="nav-item nav-profile dropdown"> -->
              <li class="dropdown">
                <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="profileDropdown" style="color: white;">
                  <img src="img/user.png" alt="profile">
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li class="p-2"><a class="dropdown-item text-center active" href="pages/profile.php">Login as</a></li>
                  <li><a class="dropdown-item">
                      <?php echo $_SESSION['login_user_name'] ?>
                    </a></li>
                  <li><a class="dropdown-item " href="pages/myorder.php?email=<?php echo $_SESSION['login_user_email'] ?>">My Order</a></li>
                  <li><a class="dropdown-item" href="pages/logout.php">Log Out</a></li>
                </ul>
              </li>
            <?php

            } else {
            ?>
              <a class="btn btn-primary fw-bold" type="button" href="pages/resister.php">SIGN UP</a>
              <a class="btn btn-info fw-bold" type="button" href="pages/login.php">SIGN IN</a>
            <?php
            }
            ?>


          </div>


        </div>


      </div>
    </nav>
    <div class="text text-center">
      <h1>Let's Say No To Food Waste</h1>
      <div class="button-place">
        <a href="pages/order.php"><button type="button" class="btn btn-info text-light fw-bold">Check Your Order
            Status</button></a>
      </div>
    </div>
  </div>

  <!-- requested food -->
  <div class="container">
    <h2 class="text-center fw-bold m-5" style="color: #888;">Ask For Meal</h2>
    <h4 class="text-center fw-bold m-5" style="color: #888;">(Create a new id if you're a new user)</h4>
    <form class="row g-3 p-3" id="food-requested-form" style="box-shadow: 2px 2px 4px #888;border-radius: 10px;">
      <div class="col-md-4">
        <label for="inputtext" class="form-label fw-bold">Name</label>
        <input type="text" class="form-control p-2 fw-bold" id="inputtext" value="<?php if (isset($_SESSION['login_status'])) echo $_SESSION['login_user_name'] ?>" disabled>
      </div>
      <div class="col-md-4">
        <label for="inputemail" class="form-label fw-bold">Email</label>
        <input type="email" class="form-control p-2 fw-bold" id="inputemail" value="<?php if (isset($_SESSION['login_status'])) echo $_SESSION['login_user_email'] ?> " disabled>
      </div>
      <div class="col-md-4">
        <label for="inputcontact" class="form-label fw-bold">Contact No</label>
        <input type="text" class="form-control p-2fw-bold" id="inputcontact" name="userContact">
      </div>

      <div class="col-12">
        <label for="inputAddress" class="form-label fw-bold">Address</label>
        <input type="text" class="form-control p-2 fw-bold" id="inputAddress" placeholder="1234 Main St" name="userAddress1">
      </div>
      <div class="col-6">
        <label for="inputAddress2" class="form-label fw-bold">Address 2</label>
        <input type="text" class="form-control p-2 fw-bold" id="inputAddress2" placeholder="Apartment, studio, or floor" name="userAddress2">
      </div>
      <div class="col-6">
        <label for="inputnoofpeople" class="form-label fw-bold">No Of People</label>
        <select id="inputnoofpeople" class="form-select p-2 fw-bold" name="noOfPeople">
          <option value="" selected>Choose...</option>
          <option value="1">01</option>
          <option value="2">02</option>
          <option value="3">03</option>
          <option value="4">04</option>
          <option value="5">05</option>
          <option value="6">06</option>
          <option value="7">07</option>
          <option value="8">08</option>
          <option value="9">09</option>
          <option value="10">10</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="inputState" class="form-label fw-bold">State</label>
        <select id="inputState" class="form-select p-2 fw-bold" name="userState">
          <option value="" selected>Choose...</option>
          
          <option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
        </select>

      </div>
      <div class="col-md-4">
        <label for="inputCity" class="form-label fw-bold">City</label>
        <input type="text" class="form-control p-2 fw-bold" id="inputCity" name="userCity">
      </div>
      <div class="col-md-2">
        <label for="inputZip" class="form-label fw-bold">Zip</label>
        <input type="text" class="form-control p-2 fw-bold" id="inputZip" name="userZip">
      </div>
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input p-2 fw-bold" type="checkbox" id="requestedfoodcheck">
          <label class="form-check-label" for="requestedfoodcheck">
            Check me out
          </label>
        </div>
      </div>
      <div class="col-12">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button class="btn btn-warning" id="requsting-spin" style="display: none;">
            <span class="spinner-border spinner-border-sm"></span>
            Requesting..
          </button>
          <button type="button" class="btn btn-warning btn-lg fw-bold" id="food-requested-btn" style="display: block;" disabled>Request For Food</button>
          <button class="btn btn-info btn-lg fw-bold" type="reset">Reset</button>
        </div>
      </div>


    </form>

  </div>

  <div class="container">
  <h2 class="text-center fw-bold m-5" style="color: #888;">Some of our successfully delivered stories</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php

      $resultsql = mysqli_query($con, "SELECT * FROM accept_order,order_img WHERE accept_order.order_id=order_img.orderID");

      while ($data = mysqli_fetch_assoc($resultsql)) {
      ?>

        <div class="col">
          <div class="card shadow-sm">
            <img class="bd-placeholder-img card-img-top" src="server/upload/<?php echo $data['image']; ?> " width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail">

            <div class="card-body text-center">
              <p class="card-text">Order ID:<?php echo $data['order_id']; ?></p>
              <p class="card-text">Status:<?php echo $data['status']; ?></p>
              <p class="card-text">Food Given By:<?php echo $data['order_accept_By']; ?></p>

              <p class="card-text">Distributed By:<?php echo $data['order_place_By']; ?></p>
              <p class="card-text">Date:<?php echo $data['time']; ?></p>

            </div>
          </div>
        </div>



      <?php
      }


      ?>




    </div>
  </div>
  <script src="js/requested-food.js"></script>


  <div class="container marketing">
    <h2 class="text-center fw-bold m-5" style="color: #888;">Features</h2>
    <!-- Three columns of text below the carousel -->
    <div class="row">
      <!-- START THE FEATURETTES -->
      <hr class="featurette-divider">

      <div class="row featurette mt-3">
        <div class="col-md-7">
          <h2 class="featurette-heading fw-normal lh-1">Distributed food. <span class="text-muted">for poor&hungry
              peoples.</span></h2>
          <p class="lead">In a single day high amount of food are weastage by different places,those food are packed by
            fresh and distributed by poor and hungry peoples.
          </p>
        </div>
        <div class="col-md-5">
          <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="img/distribution.webp">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette mt-3">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. <span class="text-muted"> for
              Health.</span></h2>
          <p class="lead">Of course, it is good and healthy for our body,and it is always distributed with freshness.</p>
        </div>

        <div class="col-md-5 order-md-1">
          <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="img/download (2).jpg">

        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette mt-3">
        <div class="col-md-7">
          <h2 class="featurette-heading fw-normal lh-1">And lastly, this one. <span class="text-muted">Checkmate.</span>
          </h2>
          <p class="lead">It will be distributed by distributer.it is more helpfull for people.</p>
        </div>
        <div class="col-md-5">
          <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="img/Screenshot (147).png">

        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

    </div>
  </div>


  <?php include 'pages/footer.php' ?>