<?php

session_start();
include_once('db_conn.php');

$orderNo=mysqli_real_escape_string($con,$_POST['orderNo']);


$sql = mysqli_query($con, "SELECT * FROM user_order WHERE orderID='{$orderNo}'");

if(mysqli_num_rows($sql) > 0){
    $sql2 = mysqli_query($con, "SELECT * FROM user_order WHERE orderID='{$orderNo}' AND accept=1 ");
    if(mysqli_num_rows($sql2) > 0){
        $sql3=mysqli_query($con, "SELECT * FROM accept_order WHERE order_id='{$orderNo}'");
        $row=mysqli_fetch_assoc($sql3);
      
        switch ($row['status']) {
            case 'conform':
                echo '<h6>Order ID: '.$orderNo.'</h6>
                <article class="card border:none" >
                    <div class="card-body row">
                        <div class="col"> <strong>Accepted BY:'.$row['order_accept_By'] .'</strong> <br> </div>
                        <div class="col"> <strong>Status:</strong> <br> Picked by :Not Availble </div>
                    </div>
                </article>
                <div class="track">
                    <div class="step active"> <span class="icon"> <i class="fa fa-paper-plane"></i> </span> <span class="text">Order Requested</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Packed</span> </div>

                    <div class="step "> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">
                            Picked by you</span> </div>
                    
                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Distribution Done</span> </div>
                </div>
                <hr><hr>
                <p class="text-center">Thank You for helping to giving Food to hungry People</p>
                <p class="text-center fw-bold">"God bless You!"</p>
                <hr>
                <a href="../index.php" class="btn btn-primary btn-lg"><i class="fa fa-chevron-left"></i>&nbsp; Back</a>';
                
                break;
            case 'Packed':
                echo '<h6>Order ID: '.$orderNo.'</h6>
                <article class="card border:none" >
                    <div class="card-body row">
                        <div class="col"> <strong>Accepted BY:'.$row['order_accept_By'] .' </strong> <br> </div>
                        <div class="col"> <strong>Status:</strong> <br> Picked by :</div>
                    </div>
                </article>
                <div class="track">
                    <div class="step active"> <span class="icon"> <i class="fa fa-paper-plane"></i> </span> <span class="text">Order Requested</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Packed</span> </div>

                    <div class="step "> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">
                            Picked by You</span> </div>
                    
                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Distribution Done</span> </div>
                </div>
                <hr><hr>
                <p class="text-center">Thank You for helping to giving Food to hungry People</p>
                <p class="text-center fw-bold">"God bless You!"</p>
                <hr>
                <a href="../index.php" class="btn btn-primary btn-lg"><i class="fa fa-chevron-left"></i>&nbsp; Back</a>';
                    
                    break;
            case 'Delivery';
                    echo '<h6>Order ID: '.$orderNo.'</h6>
                    <article class="card border:none" >
                        <div class="card-body row">
                            <div class="col"> <strong>Accepted BY:'.$row['order_accept_By'] .' </strong> <br> </div>
                            <div class="col"> <strong>Status:</strong> <br> Picked by : '.$row['order_place_By']. '</div>
                        </div>
                    </article>
                    <div class="track">
                        <div class="step active"> <span class="icon"> <i class="fa fa-paper-plane"></i> </span> <span class="text">Order Requested</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Packed</span> </div>

                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">
                                Picked by You</span> </div>
                     
                        <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Distribution Done</span> </div>
                    </div>
                    <hr><hr>
                    <p class="text-center">Thank You for helping to giving Food to hungry People</p>
                    <p class="text-center fw-bold">"God bless You!"</p>
                    <hr>
                    <a href="../index.php" class="btn btn-primary btn-lg"><i class="fa fa-chevron-left"></i>&nbsp; Back</a>';
                        
                        break;

                  
            case 'cancel':
                echo '<h6>Order ID: '.$orderNo.'</h6>
                    <article class="card border:none" >
                        <div class="card-body row">
                            <div class="col"> <strong>canceld BY:'.$row['order_accept_By'] .' </strong> <br> </div>
                            <div class="col"> <strong>Status:</strong> <br> Picked by :</div>
                        </div>
                    </article>
                    <div class="track">
                        <div class="step active"> <span class="icon"> <i class="fa fa-paper-plane"></i> </span> <span class="text">Order Requested</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">canceld</span> </div>
                    </div>
                    <hr><hr>
                    <p class="text-center">Thank You for helping to giving Food to hungry People</p>
                    <p class="text-center fw-bold">"God bless You!"</p>
                    <hr>
                    <a href="../index.php" class="btn btn-primary btn-lg"><i class="fa fa-chevron-left"></i>&nbsp; Back</a>';
                        
                        break;

            case 'Distributed':
                echo '<h6>Order ID: '.$orderNo.'</h6>
                    <article class="card border:none" >
                        <div class="card-body row">
                            <div class="col"> <strong>Accepted BY:'.$row['order_accept_By'] .' </strong> <br> </div>
                            <div class="col"> <strong>Status:</strong> <br> Picked by : '.$row['order_place_By']. '</div>
                        </div>
                    </article>
                    <div class="track">
                        <div class="step active"> <span class="icon"> <i class="fa fa-paper-plane"></i> </span> <span class="text">Order Requested</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Packed</span> </div>

                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">
                                Picked by You</span> </div>
                     
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Distribution Done</span> </div>
                    </div>
                    <hr><hr>
                    <p class="text-center">Thank You for helping to giving Food to hungry People</p>
                    <p class="text-center fw-bold">"God bless You!"</p>
                    <hr>
                    <a href="../index.php" class="btn btn-primary btn-lg"><i class="fa fa-chevron-left"></i>&nbsp; Back</a>';
                
                    $getImg=mysqli_query($con,"SELECT * FROM order_img WHERE orderID='{$orderNo}'");
                    $URL=mysqli_fetch_assoc($getImg)['image'];
                    echo '
                    <div class="text-center m-5">
                    <img src="../server/upload/'.$URL.'" class="rounded" alt="...">
                  </div>';
                  
                               

                    

                break;
            default:
                # code...
                break;
        }

    }else{
        echo '<h6>Order ID: '.$orderNo.'</h6>
        <article class="card border:none" >
            <div class="card-body row">
                <div class="col"> <strong>Accepted BY: </strong> <br> </div>
                <div class="col"> <strong>Status:</strong> <br> Picked by :</div>
            </div>
        </article>
        <div class="track">
            <div class="step active"> <span class="icon"> <i class="fa fa-paper-plane"></i> </span> <span class="text">Order Requested</span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
            <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Packed</span> </div>

            <div class="step "> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">
                    Picked by You</span> </div>
          
            <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Distribution Done</span> </div>
        </div>
        <hr><hr>
        <p class="text-center">Thank You for helping to giving Food to hungry People</p>
        <p class="text-center fw-bold">"God bless You!"</p>
        <hr>
        <a href="../index.php" class="btn btn-primary btn-lg"><i class="fa fa-chevron-left"></i>&nbsp; Back</a>';
    }


}else{

    echo '<p class="text-center">No Data Found!</p>';
    
}
