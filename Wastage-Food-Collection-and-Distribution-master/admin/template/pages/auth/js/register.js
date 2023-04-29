$(document).ready(function(){

    console.log("register Stript Ready");

    $("#donorRegister").click(function(){

        var registerFormDataid = document.getElementById('registerForm');
        console.log("registerFormData",registerFormDataid);
        var registerFormData = new FormData(registerFormDataid);

        $.ajax({
            url: '../../../server/register.php',
            type: 'POST',
            data: registerFormData,
            contentType: false,
            processData: false,
            success: function (data) {
                var respose_data =JSON.parse(data) //covert json to object
                console.log(data);
                console.log("respose_data",respose_data);
                if (respose_data.icon == 'success') {
                    swal(respose_data).then((go)=>{
                        if(go){
                            location.href = "otp_verified.php";

                        }else{
                            location.href = "../../index.php";
                        }
                    });
                } else {
                    swal(respose_data);
                }

            }


        });

    });


    $("#checkBox").click(function(){
            var checkBoxValue=document.getElementById("checkBox").checked;
            console.log("checkBoxValue",checkBoxValue );
            var registerBotton =document.getElementById("donorRegister")
            if(checkBoxValue){
                registerBotton.disabled=false;
            }else{
                registerBotton.disabled=true;
            }
        });

});