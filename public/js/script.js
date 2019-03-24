

$(document).ready(function() {
$('.lienhistoire').click(function(){
    var page = $(this).attr('href');


    $('html, body').animate({
        scrollTop: $(page).offset().top
    }, 800);

})
$('#login').hide();

$( ".clicklogin" ).click(function() {

    if ( $( "#login" ).is( ":hidden" ) && $( "#inscription" ).is( ":hidden" )) {
        $( "#login" ).slideDown( "slow" );
    } else if ($("#inscription").is(":visible") && $( "#login" ).is( ":hidden" ) ){
        $( "#login" ).slideDown( "slow" );
        $( "#inscription" ).slideUp();

    } else {
        $( "#login" ).slideUp();
    }

});

$('#inscription').hide();


$( ".clickregister" ).click(function() {

    if ( $( "#inscription" ).is( ":hidden" ) &&  $("#login").is(":hidden") ) {
        $( "#inscription" ).slideDown( "slow" );
    }  else if ($("#login").is(":visible") && $( "#inscription" ).is( ":hidden" ) ){
        $( "#inscription" ).slideDown( "slow" );
        $( "#login" ).slideUp();

    }
    else {
        $( "#inscription" ).slideUp();
    }

});

$('.togglecontainer').click(function() {

            $(".toggle").toggleClass('active');


        });

});

