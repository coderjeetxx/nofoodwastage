$(document).ready(function(){
    $("#order-check").click(function(){

        var orderNo=document.getElementById('orderNo').value;
        var statusDisplay=document.getElementById('statusDisplay');
        var result=document.getElementById('result');
        if (orderNo!=='') {
            $.ajax({
                url: '../server/getOrderStatus.php',
                type: 'POST',
                data: {orderNo:orderNo},
                // contentType: false,
                // processData: false,
                beforeSend: function() {
                    $("#loading").show();
                },
                complete: function() {
                    $("#loading").hide();
                },
                success: function (data) {
                    console.log(data);
                    statusDisplay.style.display='block';

                    result.innerHTML=data
    
                }
    
            });


            
        }else{
            swal("Hi", "Please Enter Your Order No", "warning")
        }







    })

})