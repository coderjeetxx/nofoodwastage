

function acceptThisOrder(data){
    console.log('data',data)
    $.ajax({
        url: '../server/accept_order.php',
        type: 'POST',
        data: data,
        // contentType: false,
        // processData: false,
        beforeSend: function() {
            // $("#loading").show();
        },
        complete: function() {
            // $("#loading").hide();
        },
        success: function (data) {
            console.log(data);
            var response=JSON.parse(data);
            // console.log(response);
            swal(response).then(()=>{
                location.reload();
            });
        }

    });
}