<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Coachify
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
        /**
         * @hooked coachify_post_thumbnail - 10
         * @hooked coachify_entry_header   - 15
        */
        do_action( 'coachify_before_single_post_entry_content' );
    
        /**
         * @hooked coachify_entry_content - 15
         * @hooked coachify_entry_footer  - 20
        */
        do_action( 'coachify_single_post_entry_content' );
    ?>
</article><!-- #post-<?php the_ID(); ?> -->