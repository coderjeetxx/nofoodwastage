$(document).ready(function () {
    $("#contactBTN").click(function () {
       
        


        
            var contactForm = document.getElementById('contactForm');
            var formData = new FormData(contactForm);

            $.ajax({
                url: '../server/contact.php',
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
                    
                    swal(data)



                }

            });

       











    })

})