<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Coachify
 */
    
    /**
     * After Content
     * 
     * @hooked coachify_content_end - 20
    */
    do_action( 'coachify_before_footer' );
    
    /**
     * Footer
     * 
     * @hooked coachify_footer_instagram_section - 15
     * @hooked coachify_footer_start             - 20
     * @hooked coachify_footer_mid               - 30
     * @hooked coachify_footer_bottom            - 40
     * @hooked coachify_footer_end               - 50
    */
    do_action( 'coachify_footer' );
    
    /**
     * After Footer
     * 
     * @hooked coachify_scrolltotop  - 15
     * @hooked coachify_page_end     - 20
    */
    do_action( 'coachify_after_footer' );

    wp_footer(); ?>

</body>
</html>
