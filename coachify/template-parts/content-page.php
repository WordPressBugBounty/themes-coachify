<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Coachify
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
        /**
         * Post Thumbnail
         * 
         * @hooked coachify_post_thumbnail
        */
        do_action( 'coachify_before_page_entry_content' );
    
        /**
         * Entry Content
         * 
         * @hooked coachify_entry_content - 10
         * @hooked coachify_entry_content - 15
         * @hooked coachify_entry_footer  - 20
        */
        do_action( 'coachify_page_entry_content' );    
    ?>
</article><!-- #post-<?php the_ID(); ?> -->
