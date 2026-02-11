jQuery(document).ready(function($){
    // Switch to Social Media settings field from the header
    $('#customize-control-header_social_media_text').on( 'click','.social_media_text', function(e){
        e.preventDefault();
        wp.customize.section( 'social_network_section' ).focus();        
    });

    // Switch to Sidebar layouts field from the sidebar settings
    $('#customize-control-sidebar_layout_text').on( 'click','.sidebar_layout_text', function(e){
        e.preventDefault();
        wp.customize.section( 'general_layout' ).focus();        
    });

    $('#sub-accordion-section-general_layout').on( 'click', '.sidebar_texts', function(e){
        e.preventDefault();
        wp.customize.section( 'general_sidebar_section' ).focus();        
    });

    $('#customize-control-sidebar_layout_text').on( 'click','.sidebar_layout_text', function(e){
        e.preventDefault();
        wp.customize.section( 'general_layout' ).focus();        
    });

    $('#customize-control-footer_widget_texts').on('click', '.footer_widget_texts', function (e) {
        e.preventDefault();
        wp.customize.panel('widgets').focus();
    });

    $('#customize-control-buttons_color_text').on('click', '.buttons_color_text', function (e) {
        e.preventDefault();
        wp.customize.section( 'general_button_section' ).focus(); 
    });

    // Get all nodes by data-grpid
    let allNodes = document.querySelectorAll('[data-grpid]');
    for (let i = 0; i < allNodes.length; i++) {
        let grpID = allNodes[i].getAttribute('data-grpid');
        let childNodes = document.querySelectorAll('._' + grpID);
        for (let j = 0; j < childNodes.length; j++) {
            let ParentOfChildElem = childNodes[j].parentNode.classList;
            ParentOfChildElem.add("customizer-hidden-class");
            let li = document.createElement('li');
            li.classList.add(...ParentOfChildElem);
            li.appendChild(childNodes[j]);
            allNodes[i].querySelector('.controls').appendChild(li);
        }
    }

    // Flush local fonts
    $('body').on('click', '.flush-it', function(event) {
        $.ajax ({
            url     : coachify_cdata.ajax_url,  
            type    : 'post',
            data    : {
                action: 'flush_local_google_fonts',
                nonce: coachify_cdata.nonce
            },
            success : function(results){
                //results can be appended in needed
                $( '.flush-it' ).val(coachify_cdata.flushit);
            },
        });
    });
});

( function( api ) {

	// Extends our custom "example-1" section.
	api.sectionConstructor['coachify-pro-section'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );