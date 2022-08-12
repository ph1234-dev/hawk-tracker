
$("#new-account-form").on("submit",function(e){
    let pass = $("#reg-password").val().trim()
    let confirmation = $("#reg-confirm-password").val().trim()
    if ( pass != confirmation ){
        alert("password do not match")
        e.preventDefault()
    }

    // check also if username has no error
})


// MUST Read to handle cors
// https://stackoverflow.com/questions/20035101/why-does-my-javascript-code-receive-a-no-access-control-allow-origin-header-i
// just ad jsonp in jquery


var keyupTimeoutID = 0;

$('#reg-username').on('input', function(e) {
    clearTimeout(keyupTimeoutID);
    let sourceTxt = $(this).val()
    keyupTimeoutID = setTimeout(function() {
        // perform the ajax call here

        $.ajax({

            url : 'http://localhost:8000/check_username',
            type : 'GET',
            data : {
                'username' : sourceTxt
            },
            // accept:'application/json',
            contentType:'application/json',
            dataType:'json',
            success : function(data) {              
                // alert('Data: '+ data,response);
                console.log(`Username Check (success): ${data}`)
                // check if username exists
                // then toggle error
                if (data==true){
                    // alert("cannot")
                    // remove class would show the text
                    // adding it would hide it
                    $("#reg-username-warning").removeClass("show-warning").text("Username already exists")
                }else{
                    // $("#reg-username-warning").removeClass("show-warning").text("")
                    $("#reg-username-warning").addClass("show-warning").text("")
                }
            },
            error : function(request,error)
            {
                // alert("Request: "+JSON.stringify(request));
                console.log(`Username Check (fail): ${error}`)
            }
        });

    }, 500);
});

$('#show_record_today').on('click',function(){
    alert("okay showing")
})

// set date picker
// document.getElementById("show_record_today").valueAsDate = new Date()

// $(document).ready(function() {
//     var date = new Date();
//     var day = date.getDate();
//     var month = date.getMonth() + 1;
//     var year = date.getFullYear();
//     if (month < 10) month = "0" + month;
//     if (day < 10) day = "0" + day;
//     var today = year + "-" + month + "-" + day +"T00:00";       
//     $("#record_date_picker").attr("value", today);
// });
