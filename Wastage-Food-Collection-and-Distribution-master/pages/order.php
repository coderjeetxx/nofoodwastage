<?php
session_start();

?>

<?php include 'header.php' ?>

<title>Order</title>
<link rel="stylesheet" href="css/order.css">
<link rel = "icon" href = 
"img/logo2.png.png" 
        type = "image/x-icon">
</head>

<body>
    <?php include 'loading.php' ?>

    <?php include 'navbar.php' ?>

    <div class="container" style="min-height:600px;margin-bottom:50px">
        <div class="row height d-flex justify-content-center align-items-center">

            <div class="col-md-8">

                <div class="search">
                    <i class="fa fa-search"></i>
                    <input type="text" class="form-control" value="<?php if (isset($_SESSION['recentOrderID'])) echo $_SESSION['recentOrderID']  ?>" placeholder="<?php if (!isset($_SESSION['recentOrderID'])) echo "Enter Your Order No"  ?>" id="orderNo">
                    <button class="btn btn-primary" id="order-check">Check Now</button>
                </div>

            </div>

        </div>

        <article class="card" id="statusDisplay" style="display: none;">
            <header class="card-header"> My Orders / Tracking </header>
            <div class="card-body" id="result">
                <h6>Order ID: OD45345345435</h6>
                <article class="card">
                    <div class="card-body row">
                        <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
                        <div class="col"> <strong>Shipping BY:</strong> <br> demo@gmail.com</div>
                        <div class="col"> <strong>Status:</strong> <br> Picked by the courier </div>
                        <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div>
                    </div>
                </article>
                <div class="track">
                    <div class="step active"> <span class="icon"> <i class="fa fa-paper-plane"></i> </span> <span class="text">Order Requested</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">
                            Picked by courier</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Delevered</span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Distribution Done</span> </div>
                </div>
                <hr>
                <p class="text-center">Thank You for helping to giving Food to hungry People</p>
                <p class="text-center fw-bold">"God bless You!"</p>
                <hr>
                <a href="../index.php" class="btn btn-primary btn-lg"><i class="fa fa-chevron-left"></i>&nbsp; Back</a>

            </div>
        </article>

        


    </div>






    <script src="js/order.js"></script>

    <?php include 'footer.php' ?>