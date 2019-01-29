$(document).ready(function() {

    $('#msgSubmit').hide();
    $("#contactForm").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            console.log("fail");
        } else {
            // everything looks good!
            console.log("ca passe");
            event.preventDefault();
            submitForm();
        }
    });

    function submitForm(){
        // Initiate Variables With Form Content
        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();
        console.log("submit");
        console.log(name+" "+email+" " +message);
        $.ajax({

            type: "POST",
            url: "php/process.php",
            data: "name=" + name + "&email=" + email + "&message=" + message,
            success : function(text){
                if (text){
                    console.log(text);
                    formSuccess();
                    console.log("on est dans le if");
                }else {
                    console.log("fail ajax");
                }
            }

        });
    }
    function formSuccess(){
        $( "#msgSubmit" ).show();
    }




});

