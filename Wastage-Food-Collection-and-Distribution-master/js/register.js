

$(document).ready(function(){
    $("#register").click(function(){
        var registerFormDataid = document.getElementById('registerFormData');
        // console.log(registerFormDataid);
        var registerFormData = new FormData(registerFormDataid);
        $.ajax({
            url: '../server/register.php',
            type: 'POST',
            data: registerFormData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loading").show();
            },
            complete: function() {
                $("#loading").hide();
            },
            success: function (data) {
                var respose_data =JSON.parse(data) //covert json to object
                console.log("respose_data",respose_data);
                if (respose_data.icon == 'success') {
                    swal(respose_data).then((go)=>{
                        if(go){
                            location.href = "otp_verified.php";

                        }else{
                            location.href = "../index.php";
                        }
                    });
                } else {
                    swal(respose_data);
                }

            }

        });

    });


    $("#formCheckBox").click(function(){
        var checkBoxValue=document.getElementById("formCheckBox").checked;
        console.log("checkBoxValue",checkBoxValue);
        var registerButton =document.getElementById("register")
        if(checkBoxValue){
            registerButton.disabled=false;
        }else{
            registerButton.disabled=true;
        }
    });


  });