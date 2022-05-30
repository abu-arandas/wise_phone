$( document )
    .ready( function ( ) {

        $( ".filter_button" )
            .click( function ( ) {
                var value = $( this )
                    .attr( 'data-filter' );

                if ( value == "all" ) {
                    $( '.filter' )
                        .show( '1000' );
                } 
                else {
                    $( ".filter" )
                        .not( '.' + value )
                        .hide( '3000' );
                        
                    $( '.filter' )
                        .filter( '.' + value )
                        .show( '3000' );
                }
            } );

    } );

// Add active class to the current button (highlight it)

$(document).ready(function () {
    $("ul.navbar-nav > li").click(function (e) {
     $("ul.navbar-nav > li").removeClass("active");
     $(this).addClass("active");
      });
  });
  
var selector = '.filter_buttons button';

$(selector).on('click', function(){
    $(selector).removeClass('active');
    $(this).addClass('active');
});