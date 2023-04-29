<?php include 'header.php' ?>
<title>Register</title>

<body>
  <?php include 'loading.php' ?>

  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11 w-100">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                  <form class="mx-1 mx-md-4" id="registerFormData">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" class="form-control" name="username" />
                        <label class="form-label" for="form3Example1c">User Name</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" id="form3Example3c" class="form-control" name="useremail" />
                        <label class="form-label" for="form3Example3c">User Email</label>
                      </div>
                    </div>
<!-- 

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user-plus fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <select class="form-select" aria-label="Default select example" name="userrole">
                          <option value="" selected>select</option>
                          <option value="user">User</option>
                          <option value="doner">Doner</option>
                        </select>
                        <label class="form-label" for="form3Example3c">User Role</label>
                      </div>
                    </div> -->

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-building fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <select class="form-select" aria-label="Default select example" name="state">
                          <option value="" selected>select</option>
                          <option value="odisha">ODISHA</option>
                        </select>
                        <label class="form-label" for="form3Example3c">User State</label>
                      </div>
                    </div>


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-shopping-bag fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <select class="form-select" aria-label="Default select example" name="city">
                          <option value="" selected>select</option>
                          <option value="bhubaneswar">BHUBANESWAR</option>
                        </select>
                        <label class="form-label" for="form3Example3c">User City</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="form3Example4c" class="form-control" name="password" />
                        <label class="form-label" for="form3Example4c">Password</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="form3Example4cd" class="form-control" name="repassword" />
                        <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      </div>
                    </div>

                    <div class="form-check d-flex justify-content-center mb-5">
                      <input class="form-check-input me-2" type="checkbox" id="formCheckBox" />
                      <label class="form-check-label" for="formCheckBox">
                        I agree all statements in <a href="#!">Terms of service</a>
                      </label>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="button" class="btn btn-primary btn-lg" id="register" disabled>Register</button>
                    </div>

                  </form>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img
                    src="../img/mg1.png.jpg"
                    class="img-fluid" alt="Sample image">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  </section>
  <script src="../js/register.js"></script>


</body>

</html>