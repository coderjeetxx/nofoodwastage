$(document).ready(function () {

    // check box
    $("#requestedfoodcheck").click(function () {

        var checkBoxValue = document.getElementById("requestedfoodcheck").checked;
        console.log("checkBoxValue", checkBoxValue);
        var food_requested_btn = document.getElementById("food-requested-btn")
        if (checkBoxValue) {
            food_requested_btn.disabled = false;
        } else {
            food_requested_btn.disabled = true;
        }
    });

    //on click submit order


    $("#food-requested-btn").click(function () {
        var food_requested_form = document.getElementById('food-requested-form');
        console.log("loginFormData", food_requested_form);
        var food_requested_formData = new FormData(food_requested_form);
        $.ajax({
            url: 'server/requested-food.php',
            type: 'POST',
            data: food_requested_formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#food-requested-btn").hide();
                $("#requsting-spin").show();

            },
            complete: function () {
                $("#requsting-spin").hide();
                $("#food-requested-btn").show();
            },
            success: function (data) {
                console.log("data", data)
                var respose_data = JSON.parse(data) //covert json to object
                console.log("respose_data", respose_data.data);
                if (respose_data.icon == 'success') {

                    Swal.fire(
                        'Good job!',
                        `We Send Your Requeste Please Note Your Order <span class="fw-bold">ID-${respose_data.data}</span> and Check Status`,
                        'success'
                      ).then(()=>{
                        
                        location.href = "pages/order.php";

                      })

                } else if(respose_data.icon == 'warning') {
                    var incompliteField = respose_data.data.split(" ");               
                    var msg = `<p class="fw-bold" style="margin:0;padding:0;">Please Fill Up These Field </p><br/><ul>`
                    incompliteField.forEach(element => {
                        switch (element) {
                            case "userName":
                                msg += `<li>User Name</li>`;

                                break;
                            case "userEmail":
                                msg += `<li>User Email</li>`;

                                break;
                            case "userContact":
                                msg += `<li>User Contact</li>`;

                                break;
                            case "userAddress1":
                                msg += `<li>User Address1</li>`;

                                break;
                            case "userAddress2":
                                msg += `<li>User Adress 2</li>`;

                                break;
                            case "noOfPeople":
                                msg += `<li>No Of People</li>`;

                                break;
                            case "userState":
                                msg += `<li>User State</li>`;

                                break;
                            case "userCity":
                                msg += `<li>User City</li>`;

                                break;
                            case "userZip":
                                msg += `<li>User Zip</li>`;

                                break;
                  
                        }
                    });
                    msg += `</ul></div>`;
                    Swal.fire('warning', msg, 'warning');
                }else{
                    Swal.fire("Sorry!", respose_data.title,'error');

                }
            }

        });

    });















})