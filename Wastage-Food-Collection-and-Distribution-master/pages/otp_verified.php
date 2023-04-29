<?php
session_start();
if(!isset($_SESSION['user_email']) && !$_SESSION['otpsatus'] ){
    header("Location: ../index.php");
}


?>



<?php include 'header.php' ?>
<title>Document</title>
<style>
    .card {
        width: 350px;
        padding: 10px;
        border-radius: 20px;
        background: #fff;
        border: none;
        height: 350px;
        position: relative;
    }

    .container {
        height: 100vh;
    }

    body {
        background: #eee;
    }

    .mobile-text {
        color: #989696b8;
        font-size: 15px;
    }

    .form-control {
        margin-right: 12px;
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #ff8880;
        outline: 0;
        box-shadow: none;
    }

    .cursor {
        cursor: pointer;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
</head>

<body>


    <?php include 'loading.php' ?>
    <div class="d-flex justify-content-center align-items-center container">
        <div class="card py-5 px-3">
            <h5 class="m-0">Account verification</h5><span class="mobile-text">Enter the code we just send on Email
                Id <b class="text-danger">
                    <?php echo $_SESSION['user_email'] ?>
                </b></span>
            <div class="d-flex flex-row mt-5">
                <input type="number" class="form-control" maxlength="1" id="first" autofocus
                    onkeyup="takeNextInput('start','first',this.value,'second')">
                <input type="number" class="form-control" maxlength="1" id="second"
                    onkeyup="takeNextInput('first','second',this.value,'third')">
                <input type="number" class="form-control" maxlength="1" id="third"
                    onkeyup="takeNextInput('second','third',this.value,'fourth')">
                <input type="number" class="form-control" maxlength="1" id="fourth"
                    onkeyup="takeNextInput('third','fourth',this.value,'fifth')">
                <input type="number" class="form-control" maxlength="1" id="fifth"
                    onkeyup="takeNextInput('fourth','fifth',this.value,'sixth')">
                <input type="number" class="form-control" maxlength="1" id="sixth"
                    onkeyup="takeNextInput('fifth','sixth',this.value,'end')">
            </div>
            <div class="text-center mt-5"><span class="d-block mobile-text">Don't receive the code?</span><span
                    class="font-weight-bold text-danger cursor">Resend</span></div>
        </div>
    </div>

    <script>

        function takeNextInput(backid, ownId, value, NextId) {

            var ownId = document.getElementById(ownId);

            //backspace
            if (backid != 'start') {
                var backid = document.getElementById(backid);
                ownId.addEventListener('keydown', function (event) {
                    const key = event.key;
                    console.log("key", key);
                    if (key === "Backspace" || key === "Delete") {
                        // ownId.value = '';
                        // backid.focus();
                        let inputField = document.getElementsByTagName('input');
                        for (const item of inputField) {

                            item.value = '';

                        }

                        document.getElementById('first').focus();

                    }
                });


            }

            if (NextId !== 'end') {
                var nextItem = document.getElementById(NextId);

                //going to next inputfield
                if (ownId.value.length) {
                    nextItem.focus();
                }


            } else {
                //otp validation
                ownId.blur();

                var inputField = document.getElementsByTagName('input');
                console.log("inputField", inputField);
                var checkInputFieldNotBlank = true;
                var getOTP = '';
                for (const item of inputField) {

                    if (item.value == '') {
                        checkInputFieldNotBlank = false;
                    }
                    getOTP += item.value
                    console.log("hii", item.value);

                }

                //befor ajax call check all input field not to be blank
                if (checkInputFieldNotBlank) {
                    console.log("final validation", getOTP);


                    $.ajax({
                        url: '../server/otp_validata.php',
                        type: 'POST',
                        data: { otp: getOTP },
                        beforeSend: function () {
                            $("#loading").show();
                        },
                        complete: function () {
                            $("#loading").hide();
                        },
                        success: function (data) {
                            var respose_data = JSON.parse(data) //covert json to object
                            if (respose_data.icon == 'success') {
                                swal(respose_data).then((go) => {

                                    location.href = "login.php";

                                });
                            } else {
                                swal(respose_data).then(() => {

                                    for (const item of inputField) {

                                        item.value = '';

                                    }
                                    document.getElementById('first').focus();
                                });
                            }
                        }

                    });

                } else {
                    swal("Please Enter All The Field");
                }




            }





        }





    </script>





</body>

</html>