$(document).ready(function(){



    $("#login").click(function(){
        var loginFormDataid = document.getElementById('loginFormData');
        console.log("loginFormData",loginFormDataid);
        var loginFormData = new FormData(loginFormDataid);
        $.ajax({
            url: '../server/login.php',
            type: 'POST',
            data: loginFormData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loading").show();
            },
            complete: function() {
                $("#loading").hide();
            },
            success: function (data) {
            console.log("data",data)
                var respose_data =JSON.parse(data) //covert json to object
                console.log("respose_data",respose_data);
                if (respose_data.icon == 'success') {
                    swal(respose_data).then((go)=>{
                       
                            location.href = "../index.php";
                        
                    });
                }else if(respose_data.icon=='warning'){
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
        var loginBotton =document.getElementById("login")
        if(checkBoxValue){
            loginBotton.disabled=false;
        }else{
            loginBotton.disabled=true;
        }
    });









  });