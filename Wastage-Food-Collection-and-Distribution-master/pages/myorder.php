<?php
session_start();
include_once("../server/db_conn.php")

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

    <div class="container mt-2 d-<?php if (isset($_GET['email'])) {
                                        echo "block";
                                    } else {
                                        echo "none";
                                    } ?>">

        <table class="table table-hover">
            <h2 class="m-3">My Place Order Request</h2>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Order Accepted By</th>
                    <th scope="col">Status</th>

                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $disabled = `disabled`;
                $email = $_GET['email'];
                $sql = mysqli_query($con, "SELECT * FROM accept_order WHERE order_place_By='{$email}'");
                $no = 0;
                while ($row = mysqli_fetch_assoc($sql)) {

                ?>
                    <tr>
                        <th scope="row"><?php echo $no++; ?></th>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['order_accept_By']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td>
                            <button type="button" class="btn btn-success" <?php if ($row['status'] != 'Delivery') {
                                                                                echo "disabled";
                                                                            } ?>><a class="text-decoration-none text-light" href='myorder.php?orderID=<?php echo $row['order_id']; ?>'>Distribution</a></button>
                        </td>

                    </tr>

                <?php

                }




                ?>


            </tbody>
        </table>
    </div>

    <div class="container mt-2 d-<?php if (isset($_GET['orderID'])) {
                                        echo "block";
                                    } else {
                                        echo "none";
                                    } ?>">
        <div class="card border m-5 p-5">

            <form id="uploadForm">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Order ID</label>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="orderID">

                        <option value="<?php echo $_GET['orderID']; ?> "><?php echo $_GET['orderID']; ?> </option>

                    </select>
                    <!-- <input class="form-control" type="text" name="orderID" value="<?php echo $_GET['orderID']; ?> " disabled> -->
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Set Status</label>
                    <!-- <input class="form-control" type="text" name="status" value="Distributed" disabled> -->
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="status">

                        <option value="Distributed">Distributed</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Hear upload your Photo</label>
                    <input class="form-control" type="file" id="file" name="fileToUpload" required>
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-warning btn-lg" id="uploadBtn">Submit Now</button>
                </div>

                

            </form>

        </div>





    </div>


    <script src="js/upload.js"></script>




    <?php include 'footer.php' ?>