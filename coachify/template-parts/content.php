<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Coachify
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); if( ! is_single() ) echo ' itemscope itemtype="https://schema.org/Blog"'; ?>>
	<?php 
        /**
         * @hooked coachify_post_thumbnail - 15
         * @hooked coachify_entry_header   - 20
        */
        do_action( 'coachify_before_post_entry_content' );
    
        /**
         * @hooked coachify_entry_content - 15
         * @hooked coachify_entry_footer  - 20
        */
        do_action( 'coachify_post_entry_content' );
    ?>
</article><!-- #post-<?php the_ID(); ?> -->