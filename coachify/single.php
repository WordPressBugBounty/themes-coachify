<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Coachify
 */

get_header(); ?>
    <div class="page-grid">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">

            <?php
            while ( have_posts() ) : the_post();


                get_template_part( 'template-parts/content', 'single' );

            endwhile; // End of the loop.
            ?>

            </main><!-- #main -->
            
            <?php
            /**
             * @hooked coachify_navigation    - 15
             * @hooked coachify_author        - 20
             * @hooked coachify_comment       - 40
            */
            if( !is_singular(['sfwd-courses', 'sfwd-lessons', 'sfwd-topic', 'sfwd-quiz'])) do_action( 'coachify_after_post_content' );
            ?>
            
        </div><!-- #primary -->     
        <?php get_sidebar(); ?>
    </div>
    <?php if( !is_singular(['sfwd-courses', 'sfwd-lessons', 'sfwd-topic', 'sfwd-quiz'])) coachify_related_posts(); ?>
<?php
get_footer();