function changeStatus(data) {
    console.log(data);
    if (data.status !== "Delivery" && data.status!=="Distributed"  ) {
        var html = '<select class="form-select" name="status" id="status" aria-label="Default select example">' +
            '<option value="" selected>Change Status</option>' +
            '<option value="Packed">Packed</option>' +
            '<option value="Delivery">Delivery</option>' +
            '<option value="cancel">cancel</option>' +
            '</select>'
        Swal.fire({
            title: 'Change Status',
            html: html,
            showCancelButton: true,
            confirmButtonText: 'Change',
            denyButtonText: `Don't save`,
            showCancelButton: true
        }).then((result) => {

            var status = document.getElementById('status').value;

            if (result.isConfirmed && status != '') {
                data['changeStatusTo'] = status;
                console.log(data);
                $.ajax({
                    url: '../../../server/change_status.php',
                    type: 'POST',
                    data: data,

                    success: function (data) {

                        console.log(data);
                        var respose_data = JSON.parse(data) //covert json to object
                        Swal.fire(respose_data).then((ok) => {
                            location.reload();

                        })
                    }

                });

            }


        })

    }else{
        Swal.fire(`This Order Already ${data.status}`)
    }

}


function searchOrder(searchValue) {
    console.log(searchValue);

    var filter, team
    filter = searchValue.toUpperCase();
    orderClass = document.getElementsByClassName("order");

    for (i = 0; i < orderClass.length; i++) {
        span = orderClass[i].getElementsByTagName("span")[0];
        if (span.innerHTML.toUpperCase().indexOf(filter) > -1) {
            orderClass[i].style.display = "";
        } else {
            orderClass[i].style.display = "none";
        }
    }

}