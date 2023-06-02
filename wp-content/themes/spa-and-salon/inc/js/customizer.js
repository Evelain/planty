( function( api ) {

	// Extends our custom "example-1" section.
	api.sectionConstructor['pro-section'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );

jQuery(document).ready(function($) {
	$('body').on('click', '.flush-it', function(event) {
		$.ajax ({
			url     : spa_and_salon_cdata.ajax_url,  
			type    : 'post',
			data    : 'action=flush_local_google_fonts',    
			nonce   : spa_and_salon_cdata.nonce,
			success : function(results){
				//results can be appended in needed
				$( '.flush-it' ).val(spa_and_salon_cdata.flushit);
			},
		});
	});

	/* Move widgets to their respective sections */
    wp.customize.panel( 'spa_and_salon_home_page_settings', function( section ) {
        section.expanded.bind( function( isExpanded ) {
            if ( isExpanded ) {
                wp.customize.previewer.previewUrl.set( spa_and_salon_cdata.frontpage  );
            }
        } );
    } );
    
    // Scroll to Home section starts
    $('body').on('click', '#sub-accordion-panel-spa_and_salon_home_page_settings .control-subsection .accordion-section-title', function(event) {
        var section_id = $(this).parent('.control-subsection').attr('id');
        scrollToSection( section_id );
    });	
});

function scrollToSection( section_id ){
    var preview_section_id = "banner";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {        
        case 'accordion-section-spa_and_salon_featured_settings':
        preview_section_id = "featured";
        break;

        case 'accordion-section-spa_and_salon_about_settings':
        preview_section_id = "about";
        break;

        case 'accordion-section-medical_spa_homepage_cta':
        preview_section_id = "cta";
        break;

        case 'accordion-section-spa_and_salon_service_settings':
        preview_section_id = "service";
        break;  

        case 'accordion-section-spa_and_salon_testimonial_settings':
        preview_section_id = "testimonial";
        break;
    }

    if( $contents.find('#'+preview_section_id).length > 0 && $contents.find('.home').length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + preview_section_id ).offset().top
        }, 1000);
    }        
}