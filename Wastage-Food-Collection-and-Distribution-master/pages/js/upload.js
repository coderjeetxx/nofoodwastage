$(document).ready(function () {
    $("#uploadBtn").click(function () {
        console.log("hello");
        var file = document.getElementById('file');
        

        if (file.value != '') {
        
            var uploadForm = document.getElementById('uploadForm');
            var formData = new FormData(uploadForm);

            $.ajax({
                url: '../server/upload.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $("#loading").show();
                },
                complete: function () {
                    $("#loading").hide();
                },
                success: function (data) {
                    data=JSON.parse(data);
                    swal(data).then(()=>{
                        location.reload()
                    })
                   


                }

            });

        }else{
            Swal.fire(
                'Hi',
                'Please Upload file',
                'warning'
              )
        }












    })

})