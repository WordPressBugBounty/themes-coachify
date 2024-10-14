<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package Coachify
 */

get_header(); 

$defaults        = coachify_get_general_defaults();
$error_image     = get_theme_mod( 'error_image', $defaults['error_image'] );
$error_img_class = ( empty( get_theme_mod( '404_image') ) ) ? ' error-img-active' : '';
?>
<div class="error-page-top-wrapper<?php echo esc_attr( $error_img_class); ?>">
    <div class="container">
        <section class="error-404 not-found">
            <div class="error-404-content-wrapper">
                <div class="error404-grid">
                    <div class="page-content">
                        <?php if( !empty( $error_image ) ){ ?>
                            <div class="error-img-wrapper">
                                <div class="error-404-img">
                                    <img src="<?php echo esc_url( $error_image ); ?>" alt="404-image" />
                                </div>
                            </div>
                        <?php } ?>
                        <div class="error-content-wrapper">
                            <span class="page-title"><?php esc_html_e( '404 ERROR', 'coachify' );?></span>
                            <div class="sub-title-wrapper">
                                <h1 class="sub-title"><?php esc_html_e( 'Page Not Found!', 'coachify' );?></h1>
                            </div>
                            <p><?php esc_html_e( 'The page you are looking for may have been moved, deleted, or possibly never existed. Go back to home and explore again.', 'coachify' ); ?></p>
                            <a class="btn-primary"
                                href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'GO TO HOMEPAGE', 'coachify' ); ?>
                            </a>
                            <div class="error-404-search">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    </div><!-- .page-content -->
                </div>
            </div>
        </section><!-- .error-404 -->
    </div>
</div>
<?php if(  get_theme_mod( 'ed_latest_post', $defaults['ed_latest_post'] ) ) { ?>
    <div class="container">
        <div class="page-grid">
            <div id="primary" class="content-area">
                <?php
                /**
                 * @see coachify_latest_posts
                */
                do_action( 'coachify_latest_posts' ); ?>
            </div><!-- #primary -->
        </div>
    </div>
<?php }
get_footer();