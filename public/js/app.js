
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

// $('#reg-username').on('input', function(e) {
//     clearTimeout(keyupTimeoutID);
//     let sourceTxt = $(this).val()
//     keyupTimeoutID = setTimeout(function() {
//         // perform the ajax call here

//         $.ajax({

//             url : 'http://localhost:8000/check_username',
//             type : 'GET',
//             data : {
//                 'username' : sourceTxt
//             },
//             // accept:'application/json',
//             contentType:'application/json',
//             dataType:'json',
//             success : function(data) {              
//                 // alert('Data: '+ data,response);
//                 console.log(`Username Check (success): ${data}`)
//                 // check if username exists
//                 // then toggle error
//                 if (data==true){
//                     // alert("cannot")
//                     // remove class would show the text
//                     // adding it would hide it
//                     $("#reg-username-warning").removeClass("show-warning").text("Username already exists")
//                 }else{
//                     // $("#reg-username-warning").removeClass("show-warning").text("")
//                     $("#reg-username-warning").addClass("show-warning").text("")
//                 }
//             },
//             error : function(request,error)
//             {
//                 // alert("Request: "+JSON.stringify(request));
//                 console.log(`Username Check (fail): ${error}`)
//             }
//         });

//     }, 500);
// });

$('#input-date-week-identifier').on('change',function(e){
   // alert()

    // ways to add value to routes
    // Route::get('events/{event}/venues/{venue}', fn (Request $request, Event $event, Venue $venue) => /* ... */)->name('events.venues.show');
    //  route('events.venues.show', [1, 2]);                 // 'https://ziggy.test/events/1/venues/2'
    //  route('events.venues.show', { event: 1, venue: 2 }); // 'https://ziggy.test/events/1/venues/2'
    let url = route('show.daily.specific.record',{
        date: $(this).val()
    });
    // // url = url.replace(':id', id);

    document.location.href=url;
})

$('#landing-page-main-button').on('click',function(){
    document.location.href=route('show.login.form')
})
