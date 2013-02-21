jQuery( document ).ready( function () {
    jQuery( ".riq-slider" ).slider({
        value: jpegQuality,
        min: 0,
        max: 100,
        step: 1,
        slide: function( event, ui ) {
            // UX update
            jQuery( ".riq-amount" ).val( ui.value + "%" );
            
            // Update hidden element for form submit
            jQuery( "#riq-integer" ).val( ui.value );
        }
    });
    jQuery( ".riq-amount" ).val( jQuery( ".riq-slider" ).slider( "value" ) + "%" );
});