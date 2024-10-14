<?php
/**
 * Coachify Template Functions which enhance the theme by hooking into WordPress
 *
 * @package Coachify
 */

if( ! function_exists( 'coachify_doctype' ) ): 
/**
 * Doctype Declaration
 * @return void
*/
function coachify_doctype(){ ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;
add_action( 'coachify_doctype', 'coachify_doctype' );

if( ! function_exists( 'coachify_head' ) ): 
/**
 * Before wp_head 
 * @return void
*/
function coachify_head(){ ?>
    <meta charset = "<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <link rel = "profile" href = "https://gmpg.org/xfn/11">
    <?php
}
endif;
add_action( 'coachify_before_wp_head', 'coachify_head' );

if( ! function_exists( 'coachify_page_start' ) ): 
/**
 * Page Start
 * @return mixed
*/
function coachify_page_start(){ ?>
    <div id = "page" class = "site">
    <a class = "skip-link screen-reader-text" href = "#content"><?php esc_html_e( 'Skip to content (Press Enter)', 'coachify' ); ?></a>
    <?php
}
endif;
add_action( 'coachify_before_header', 'coachify_page_start', 20 );

if( ! function_exists( 'coachify_header' ) ): 
/**
 * Header Start
 * @return mixed
*/
function coachify_header(){ 
    $defaults           = coachify_get_general_defaults();
    $siteDefaults       = coachify_get_site_defaults();
    $phone              = get_theme_mod( 'header_phone', $defaults['header_phone'] );
    $email              = get_theme_mod( 'header_email', $defaults['header_email'] );
    $ed_social_media    = get_theme_mod( 'ed_social_links', $defaults['ed_social_links'] );
    $social_media_order = get_theme_mod( 'social_media_order', $defaults['social_media_order']  );
    $ed_cart            = get_theme_mod( 'ed_woo_cart', $defaults['ed_woo_cart'] );
    $ed_search          = get_theme_mod( 'ed_header_search', $defaults['ed_header_search'] );
    $blogname           = get_option('blogname');
    $hideblogname       = get_theme_mod('hide_title', $siteDefaults['hide_title']);
    $blogdesc           = get_option('blogdescription');
    $hideblogdesc       = get_theme_mod('hide_tagline', $siteDefaults['hide_tagline']);
    $header_width       = get_theme_mod( 'header_width_layout', $defaults['header_width_layout']);
    $defaults           = coachify_get_general_defaults();
    $menu_stretch       = get_theme_mod('header_strech_menu', $defaults['header_strech_menu']);
    $data_stretch       = $menu_stretch ? 'data-stretch=yes' : 'data-stretch=no';

    if ( $header_width === 'fullwidth' ){
        $add_class = 'c-full';
    }elseif ( $header_width === 'custom' ){
        $add_class = 'c-custom';
    }else {
        $add_class = '';
    } ?>

    <header id = "masthead" class = "site-header style-one" itemscope itemtype = "https://schema.org/WPHeader">
        <?php if( ( $ed_social_media && $social_media_order ) || $phone || $email || $ed_search || $ed_cart  ){ ?>
            <div class="header-top">
                <div class="container <?php echo esc_attr( $add_class ); ?>">
                    <?php if( $phone || $email ){ ?>
                        <div class="header-left">
                            <div class="contact-info">
                                <?php coachify_header_contact(); ?>
                            </div>
                        </div>
                    <?php } 
                    if( ( $ed_social_media && $social_media_order ) || $ed_search || $ed_cart ){ ?>
                    <div class="header-right">
                        <?php if( $ed_social_media && $social_media_order ){ ?>
                            <div class="header-social">
                                <?php
                                    $social_icons = new Coachify_Social_Lists;
                                    $social_icons->coachify_social_links( $ed_social_media );
                                ?>
                            </div> 
                        <?php }
                            if( $ed_search ) coachify_search();
                            if( coachify_is_woocommerce_activated() && $ed_cart ) coachify_wc_cart_count();
                        ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        <?php } if( has_nav_menu( 'primary') || has_custom_logo() || (!empty($blogname) && !$hideblogname) || ( !empty($blogdesc) && !$hideblogdesc) ) { ?>
            <div class="header-main">
                <div class="container <?php echo esc_attr( $add_class ); ?>">
                    <?php coachify_site_branding(); ?>
                    <div class="nav-wrap" <?php echo esc_attr( $data_stretch ); ?>><?php
                        coachify_primary_navigation(); 
                        coachify_header_button();?>
                    </div>
                </div>
            </div>
            <?php coachify_mobile_navigation(); 
        } ?>
	</header>
    <?php  
}
endif;

if( coachify_pro_is_activated() && function_exists( 'coachify_header_layouts') ){
    add_action( 'coachify_header', 'coachify_header_layouts', 20 );
} else {
    add_action( 'coachify_header', 'coachify_header', 20 );
}

if( ! function_exists( 'coachify_content_start' ) ): 
/**
 * Content Start
 * @return mixed
*/
function coachify_content_start(){
    $defaults          = coachify_get_general_defaults();
    $ed_blog_title     = get_theme_mod( 'ed_blog_title', $defaults['ed_blog_title'] );
    $ed_blog_desc      = get_theme_mod( 'ed_blog_desc', $defaults['ed_blog_desc'] );
    $blog_alignment    = get_theme_mod( 'blog_alignment', $defaults['blog_alignment'] );
    $ed_archive_title  = get_theme_mod( 'ed_archive_title', $defaults['ed_archive_title'] );
    $ed_archive_desc   = get_theme_mod( 'ed_archive_desc', $defaults['ed_archive_desc'] );
    $archive_count     = get_theme_mod( 'ed_archive_post_count', $defaults['ed_archive_post_count'] );
    $archive_alignment = get_theme_mod( 'archivetitle_alignment', $defaults['archivetitle_alignment'] );
    $header_image      = get_theme_mod( 'header_bg_img', $defaults['header_bg_img']);
    $bg_img            = wp_get_attachment_image_url($header_image, 'coachify-header-bg-img');
    $bg_style          = $bg_img ? ' style="background-image: url(' . esc_url($bg_img) . ')" data-bg-image="yes"' : 'data-bg-image="no"';
    $alignment         = '';
    $page_hdr_class    = '';
    if( is_home() ) {
        $alignment      = ' data-alignment='.  $blog_alignment;
        $page_hdr_class = ( $ed_blog_title || $ed_blog_desc) ? 'page-header' : 'no-header-text';
	}
    if( is_archive() || is_search() ) {
        $alignment      = ' data-alignment='.  $archive_alignment;
        $page_hdr_class = ( $ed_archive_title || $ed_archive_desc) ? 'page-header' : 'no-header-text';
	}
    
    if( !( is_front_page() && !is_home() ) ){ ?>
    <div id= "content" class = "site-content">
        <?php if ( ( !is_front_page() && is_home() ) || is_archive() || is_search()  ) {?>
            <div class = "page-header-img-wrap"<?php if( is_archive() || ( !is_front_page() && is_home() ) || is_search() ) echo $bg_style; ?>>
            <?php if (  !( is_front_page() && !is_home() ) && ! ( coachify_is_elementor_activated() && coachify_is_elementor_activated_post() ) ) coachify_breadcrumb(); ?>
                <div class = "container">
                    <?php 
                    if(!is_singular()) echo '<div class="' . esc_attr( $page_hdr_class ) . '"' . esc_attr( $alignment) . '>';       
                        if (  !is_front_page() && is_home() ) {
                            if ($ed_blog_title){ 
                                echo '<h1 class="page-title">';
                                single_post_title();
                                echo '</h1>';
                            }
                            if( $ed_blog_desc ){
                                $posts_id   = get_option('page_for_posts');
                                $posts_desc = get_post_field( 'post_content', $posts_id );
                                echo '<div class="archive-description">'. wp_kses_post( $posts_desc ) .'</div>';
                            }
                        }
                        
                        if( is_archive() ){
                            if( is_author() ){
                                $author_title = get_the_author();
                                if( get_the_author_meta( 'description' ) || $author_title ){ ?>
                                    <section class = "coachify-author-box">
                                        <div class = "author-archive-section">
                                            <div class = "img-holder"><?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?></div>
                                            <div class = "author-meta">
                                            
                                                <?php
                                                    /* translators: %1$s: Opening heading tag
                                                        %2$s%3$s: post author in span tag 
                                                        %4$s: Closing heading tag */ 
                                                    printf( esc_html__( '%1$s %2$s%3$s%4$s', 'coachify' ), '<h3 class="author-name">', '<span class="vcard">', esc_html( get_the_author_meta( 'display_name' ) ), '</span></h3>' );                
                                                    echo '<div class="author-description">' . wp_kses_post( get_the_author_meta( 'description' ) ) . '</div>';
                                                
                                                if( coachify_pro_is_activated() && function_exists( 'coachify_author_social' ) ){ ?>
                                                        <div class = "author-social-links"><?php coachify_author_social(); ?></div>
                                                    <?php 
                                                } ?>
                                                <section class = "coachify-search-count">
                                                    <?php coachify_search_post_count(); ?>
                                                </section>
                                            </div>
                                        </div>
                                    </section>
                                    <?php 
                                }
                            } else {  
                                if( $ed_archive_title ) the_archive_title();
                                if( $ed_archive_desc ) the_archive_description( '<div class="archive-description">', '</div>' );
                            }         
                        }
                        
                        if( is_search() ){
                            echo '<h1 class="page-title">' . esc_html__( 'Search', 'coachify' ) . '</h1>';
                            get_search_form();
                        }

                        /**
                         * Show post count on search and archive pages
                         */
                        if( ( $archive_count && ( is_archive() ) && !is_post_type_archive('product') && ! is_author() )
                        || is_search() 
                        ) {
                            echo '<section class="coachify-search-count">';
                            coachify_search_post_count();
                            echo '</section>';
                        }
                    if(!is_singular()) echo '</div>';
                    ?>
                </div>
            </div>
        <?php } ?>
        
        <?php
        if ( is_single() || (is_singular('page') && !coachify_is_elementor_activated_post() && !is_page_template( 'event.php' ))){ ?>
            <div class="page-header-img-wrap">
                <?php coachify_breadcrumb(); ?>
            </div>
            <?php 
            /**
             * Hook before site container
             */
            do_action( 'coachify_content_before_container' );
            
        }
        
        if ( !is_404() && !is_page_template( 'event.php' )){
            echo '<div class="container">'; 
        }
    }
    
    if( is_front_page() && !is_home() && !coachify_is_elementor_activated_post()){
        echo '<div class="container">'; 
    }
}
endif;
add_action( 'coachify_content', 'coachify_content_start' );

if ( ! function_exists( 'coachify_post_thumbnail' ) ): 
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 * @return mixed
 */
function coachify_post_thumbnail( $set_image = '' ) {
	global $wp_query;
    $image_size       = 'thumbnail';
    $defaults         = coachify_get_general_defaults();
    $ed_featured      = get_theme_mod( 'ed_post_featured_image', $defaults['ed_post_featured_image']);
    $post_crop_image  = get_theme_mod( 'post_crop_image', $defaults[ 'post_crop_image' ] );
    $blog_crop_img    = get_theme_mod( 'blog_crop_image', $defaults[ 'blog_crop_image' ] );
    $sidebar          = coachify_sidebar();
    $ed_page_featured = get_theme_mod( 'ed_page_featured_image', $defaults['ed_page_featured_image'] );
    $blog_svg         = '';
    $archive_svg      = '';
    if( coachify_pro_is_activated() ){
        $prodefaults    = coachify_pro_get_customizer_defaults();
        $blog_layout    = get_theme_mod( 'blog_layouts', $prodefaults['blog_layouts'] );
        $archive_layout = get_theme_mod( 'archive_layouts', $prodefaults['archive_layouts'] );
        $blog_svg       = ($blog_layout === 'four' && ! has_post_thumbnail()) ? ' chfy-add-svg' : '';
        $archive_svg    = ($archive_layout === 'four' && ! has_post_thumbnail()) ? ' chfy-add-svg' : '';
    }

    if( is_home() ){ 
        echo '<a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail'. esc_attr($blog_svg) . '">';
        if( coachify_pro_is_activated() && $blog_layout !== 'one'){
            if ( $blog_layout === 'two' ) $image_size   = 'coachify-withsidebar';
            if ( $blog_layout === 'three' ) $image_size = 'blog-layout-two';
            if ( $blog_layout === 'four' ) $image_size  = 'full';
        }else {
            if( $wp_query->current_post == 0 && $blog_crop_img ){                
                $image_size = ( $sidebar ) ? 'coachify-withsidebar' : 'coachify-fullwidth';
            }elseif( $blog_crop_img ){
                $image_size = 'coachify-blog-home';
            }else {
                $image_size = 'full';
            }
        }

        if( has_post_thumbnail() ){                        
            the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
        }else{
            coachify_get_fallback_svg( $image_size );//fallback    
        }        
        echo '</a>';
    }elseif( is_archive() || is_search() ){
        echo '<a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail'. esc_attr($archive_svg) . '">';
        if( coachify_pro_is_activated() && $archive_layout !== 'one' ){
            if ( $archive_layout === 'two' ) $image_size   = 'coachify-withsidebar';
            if ( $archive_layout === 'three' ) $image_size = 'blog-layout-two';
            if ( $archive_layout === 'four' ) $image_size  = 'full';
        } else {
            if( $wp_query->current_post == 0 ){
                $image_size = ( $sidebar ) ? 'coachify-withsidebar' : 'coachify-fullwidth';
            }else {
                $image_size = 'coachify-blog-home';
            }
        }
        
        if( has_post_thumbnail() ){
            the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
        }else{
            coachify_get_fallback_svg( $image_size );//fallback
        }
        echo '</a>';
    }elseif( is_singular() ){
        $image_size = ( $sidebar ) ? 'coachify-withsidebar' : 'coachify-fullwidth';
        if( is_single() ){
            if( $set_image == '' ){
                $image_size = !$post_crop_image ? 'full' : $image_size;
            } else {
                $image_size = $set_image;
            }
            if( $ed_featured && has_post_thumbnail() ){
                echo '<div class="post-thumbnail single-post-img">';
                the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                echo '</div>';    
            }
        }else{
            if( $ed_page_featured && has_post_thumbnail() ){
                echo '<div class="post-thumbnail">';
                the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                echo '</div>';    
            }            
        }
    }
}
endif;
add_action( 'coachify_before_page_entry_content', 'coachify_post_thumbnail' );
add_action( 'coachify_before_post_entry_content', 'coachify_post_thumbnail', 15 );
add_action( 'coachify_before_single_post_entry_content', 'coachify_post_thumbnail', 10 );


if( ! function_exists( 'coachify_entry_header' ) ): 
/**
 * Entry Header
 * @return mixed
*/
function coachify_entry_header(){
    global $post; 
    $defaults          = coachify_get_general_defaults();
    $meta_structure    = get_theme_mod( 'blog_meta_order', $defaults['blog_meta_order'] );
    $single_post_meta  = get_theme_mod( 'post_meta_order', $defaults['post_meta_order'] );
    $ed_page_title     = get_theme_mod( 'ed_page_title', $defaults['ed_page_title'] );
    $page_alignment    = get_theme_mod( 'pagetitle_alignment', $defaults['pagetitle_alignment'] );
    $alignment         = '';
    if (is_page()){
        $alignment = ' data-alignment='. $page_alignment;
    }
    if( coachify_pro_is_activated() ){
        $prodefaults    = coachify_pro_get_customizer_defaults();
        $blog_layout    = get_theme_mod( 'blog_layouts', $prodefaults['blog_layouts'] );
        $archive_layout = get_theme_mod( 'archive_layouts', $prodefaults['archive_layouts'] );
    }
    if( coachify_pro_is_activated() ) { 
        if ( is_home() && $blog_layout === 'two' || 
            ( (is_archive() || is_search() ) && $archive_layout === 'two') 
        ) echo '<div class="content-wrapper">'; 
    } ?>
        <header class = "entry-header"<?php echo esc_attr($alignment); ?>>
            <?php 
                $ed_cat_single = get_theme_mod( 'ed_post_category', $defaults['ed_post_category'] );

                if( 'post' === get_post_type() ){
                    echo '<div class="entry-meta">';
                    if( is_single() ){
                        if( $ed_cat_single ) coachify_category();
                    }else{
                        coachify_category();    
                    }
                    echo '</div>';
                }
                
                if ( is_singular() ) {
                    if( is_page() && $ed_page_title && !is_front_page() ) the_title( '<h1 class="entry-title">', '</h1>' );
                    if( is_single() ) the_title( '<h1 class="entry-title">', '</h1>' );
                } else {
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                };

                if( 'post' === get_post_type() ){
                    echo '<div class="entry-meta">';
                    if( is_home()) {
                        foreach( $meta_structure as $post_meta ){
                            if( $post_meta == 'author' ) coachify_posted_by();
                            if( $post_meta == 'date' ) coachify_posted_on();				
                            if( $post_meta == 'comment' ) coachify_comment_count();				
                            if( $post_meta == 'reading-time' ) coachify_estimated_reading_time( get_post( get_the_ID() )->post_content );				
                        }
                    }else if( is_single() ){
                        foreach( $single_post_meta as $post_meta ){
                            if( $post_meta == 'author' ) coachify_posted_by();
                            if( $post_meta == 'date' ) coachify_posted_on();				
                            if( $post_meta == 'comment' ) coachify_comment_count();				
                            if( $post_meta == 'reading-time' ) coachify_estimated_reading_time( get_post( get_the_ID() )->post_content );				
                        }
                    }elseif( !is_single()){
                        coachify_posted_by();
                        coachify_posted_on();				
                        coachify_comment_count();
                        coachify_estimated_reading_time( get_post( get_the_ID() )->post_content );
                    }
                    echo '</div>';
                }
            ?>
        </header>         
    <?php    
}
endif;
add_action( 'coachify_before_page_entry_content', 'coachify_entry_header', 10 );
add_action( 'coachify_before_post_entry_content', 'coachify_entry_header', 20 );
add_action( 'coachify_before_single_post_entry_content', 'coachify_entry_header', 15 );

if( ! function_exists( 'coachify_entry_content' ) ): 
/**
 * Entry Content
 * @return mixed
*/
function coachify_entry_content(){
    $defaults     = coachify_get_general_defaults();
    $blog_content = get_theme_mod( 'blog_content', $defaults['blog_content'] );

    if( coachify_pro_is_activated() ){
        $prodefaults         = coachify_pro_get_customizer_defaults();
        $ed_social_sharing   = get_theme_mod( 'ed_social_sharing', $prodefaults['ed_social_sharing'] );
        $ed_sticky_sharing   = get_theme_mod( 'ed_sticky_social_sharing', $prodefaults['ed_sticky_social_sharing'] );
        $author_sign         = get_theme_mod( 'author_signature', $prodefaults['author_signature'] );
        $img_id              = attachment_url_to_postid( $author_sign );
        $ed_toggle_social    = get_theme_mod( 'ed_toggle_social', $prodefaults['ed_toggle_social'] );
        $alignment_signature = get_theme_mod( 'alignment_signature', $prodefaults['alignment_signature'] );
    }

	if ( is_single() ) echo '<div class="article-wrapper">'; ?>
        <div class = "entry-content" itemprop = "text">
            <?php
                if( is_singular() || $blog_content === 'content' || ( get_post_format() != false ) ){
                    the_content();    
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'coachify' ),
                        'after'  => '</div>',
                    ) );
                }else{
                    the_excerpt();
                }
            ?>
        </div><!-- .entry-content -->
        <?php if( !is_singular('sfwd-courses') && is_single() && function_exists( 'coachify_social_share' ) && $ed_social_sharing ) coachify_social_share($ed_sticky_sharing);
    if ( is_single() ) echo '</div>';

    if( coachify_pro_is_activated() ){
        if( is_singular( 'post' ) && $author_sign ) {
            echo '<div class="author-signature ' . esc_attr( $alignment_signature ) . '">';                          
            echo wp_get_attachment_image($img_id, 'full');
            if( $ed_toggle_social ) {
                $social_icons = new Coachify_Social_Lists;
                $social_icons->coachify_social_links( $ed_toggle_social );
            }
            echo '</div>';
        }
    }
}
endif;
add_action( 'coachify_page_entry_content', 'coachify_entry_content', 15 );
add_action( 'coachify_post_entry_content', 'coachify_entry_content', 15 );
add_action( 'coachify_single_post_entry_content', 'coachify_entry_content', 15 );
add_action( 'coachify_event_entry_content', 'coachify_entry_content', 15 );

if( ! function_exists( 'coachify_entry_footer' ) ): 
/**
 * Entry Footer
 * @return mixed
*/
function coachify_entry_footer(){ 
    $defaults  = coachify_get_general_defaults();
    $readmore  = get_theme_mod( 'read_more_text',  $defaults['read_more_text'] );
    $post_tags = get_theme_mod( 'ed_post_tags', $defaults['ed_post_tags'] );
    if( coachify_pro_is_activated() ){
        $prodefaults    = coachify_pro_get_customizer_defaults();
        $blog_layout    = get_theme_mod( 'blog_layouts', $prodefaults['blog_layouts'] );
        $archive_layout = get_theme_mod( 'archive_layouts', $prodefaults['archive_layouts'] );
    }
    if( is_front_page() && !is_home() ) return; ?>
	<footer class = "entry-footer">
		<?php
			if( is_single() && $post_tags ){
                coachify_tag();
			}
            
            if( is_home() || is_archive() || is_search() ){
                echo '<a href="' . esc_url( get_the_permalink() ) . '" class="btn-tertiary">' . esc_html( $readmore ) . '</a>';    
            }
            
            if( get_edit_post_link() ){
                edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'coachify' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
            }
		?>
	</footer><!-- .entry-footer -->
    <?php 
    if( coachify_pro_is_activated() ) { 
        if ( is_home() && $blog_layout === 'two' || 
            ( (is_archive() || is_search() ) && $archive_layout === 'two') 
        ) echo '</div><!-- .content-wrapper -->'; 
    }

}
endif;
add_action( 'coachify_page_entry_content', 'coachify_entry_footer', 20 );
add_action( 'coachify_post_entry_content', 'coachify_entry_footer', 20 );
add_action( 'coachify_single_post_entry_content', 'coachify_entry_footer', 20 );

if( ! function_exists( 'coachify_navigation' ) ): 
/**
 * Navigation
 * @return mixed
*/
function coachify_navigation(){
	$defaults   = coachify_get_general_defaults();
	$pagination = get_theme_mod( 'ed_post_pagination',  $defaults['ed_post_pagination'] );
	if( is_single() && $pagination ){
		$next_post = get_next_post();
		$prev_post = get_previous_post();

		if( $prev_post || $next_post ){?>            
			<nav class="post-navigation navigation" role = "navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Post Navigation', 'coachify' ); ?></h2>
                <div class="nav-links">
					<?php if( $prev_post ){ ?>
						<div class="nav-previous">
                            <figure class="post-thumbnail">
                                <?php  $prev_img = get_post_thumbnail_id( $prev_post->ID ); ?>
                                    <a href= "<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" rel = "prev">
                                        <?php if( $prev_img ){
                                            echo wp_get_attachment_image( $prev_img, 'thumbnail' );                                       
                                        }else{
                                            coachify_get_fallback_svg( 'thumbnail' );
                                        } ?>
								</a>
							</figure>
							<a href= "<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" rel = "prev">
                                <span class="meta-nav"><?php esc_html_e( 'Previous Article', 'coachify' ); ?></span>
                                <article class="post">
                                    <div class="content-wrap">
                                        <header class="entry-header">
                                            <h3 class="entry-title"><?php echo esc_html( get_the_title( $prev_post->ID ) ); ?></h3>
										</header>
									</div>
								</article>
							</a>
						</div>
					<?php }
					if( $next_post ){ ?>
						<div class= "nav-next">
                            <figure class= "post-thumbnail">
                                <?php $next_img = get_post_thumbnail_id( $next_post->ID ); ?>
                                <a href= "<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" rel = "next">
									<?php if( $next_img ){
										echo wp_get_attachment_image( $next_img, 'thumbnail' );                                       
									}else{
										coachify_get_fallback_svg( 'thumbnail' );
									} ?>
								</a>
							</figure>
							<a href= "<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" rel = "prev">
                                <span class="meta-nav"><?php esc_html_e( 'Next Article', 'coachify' ); ?></span>
                                <article class="post">
                                    <div class="content-wrap">
                                        <header class="entry-header">
                                            <h3 class="entry-title"><?php echo esc_html( get_the_title( $next_post->ID ) ); ?></h3>
										</header>
									</div>
								</article>
							</a>
						</div>
					<?php } ?>
				</div>
			</nav>        
			<?php
		}
	}elseif( ! is_single() && coachify_pro_is_activated() ){
		$prodefaults = coachify_pro_get_customizer_defaults();
		$pagination  = get_theme_mod( 'pagination_type', $prodefaults['pagination_type'] );

		switch( $pagination ){
			case 'default':   // Default Pagination
			
			the_posts_navigation();
			
			break;
			
			case 'numbered':   // Numbered Pagination
			
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous', 'coachify' ),
				'next_text'          => __( 'Next', 'coachify' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'coachify' ) . ' </span>',
			) );
			
			break;
			
			case 'load_more'      :   // Load More Button
			case 'infinite_scroll':   // Auto Infinite Scroll
			
			echo '<div class="pagination"></div>';
			
			break;
			
			default: 
			
			the_posts_navigation();
			
			break;
		}
	}else {
		the_posts_pagination( array(
			'prev_text'          => __( 'Previous', 'coachify' ),
			'next_text'          => __( 'Next', 'coachify' ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'coachify' ) . ' </span>',
		) );
	}
}
endif;
add_action( 'coachify_after_post_content', 'coachify_navigation', 15 );
add_action( 'coachify_after_posts_content', 'coachify_navigation' );


if( ! function_exists( 'coachify_author' ) ): 
    /**
     * Author Section
     * @return mixed
    */
    function coachify_author(){
        $defaults     = coachify_get_general_defaults();
        $ed_author    = get_theme_mod( 'ed_author', $defaults['ed_author'] );
        $author_title = get_theme_mod( 'author_title', $defaults['author_title'] );
        if( $ed_author && get_the_author_meta( 'description' ) ){ ?>
            <section class="coachify-author-box">
                <div class="author-section">
                    <div class="img-holder"><?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?></div>
                        <div class="author-content">
                            <div class="author-meta">
                            <?php 
                                if( $author_title ) echo '<span class="sub-title">' . esc_html( $author_title ) . '</span>';
                                echo '<h3 class="title">' . esc_html(  get_the_author_meta( 'display_name' ) ) . '</h3>';
                                echo wp_kses_post( wpautop( get_the_author_meta( 'description' ) ) );
                            ?>		
                        </div>
                        <?php 
                            if( coachify_pro_is_activated() && function_exists( 'coachify_author_social' ) ){
                                ?>
                                    <div class="author-social-links"><?php coachify_author_social(); ?></div>
                                <?php 
                            }
                        ?>
                    </div>
                </div>
            </section>
        <?php 
        }
    }
    endif;
    add_action( 'coachify_after_post_content', 'coachify_author', 20 );

if( ! function_exists( 'coachify_latest_posts' ) ): 
/**
 * Latest Posts
 * @return void
*/
function coachify_latest_posts(){ 
    coachify_get_posts_list( 'latest' );
}
endif;
add_action( 'coachify_latest_posts', 'coachify_latest_posts' );

if( ! function_exists( 'coachify_comment' ) ): 
/**
 * Comments Template 
 * @return void
*/
function coachify_comment(){
    // If comments are open or we have at least one comment, load up the comment template.
    
    $defaults      = coachify_get_general_defaults();
    $page_comments = get_theme_mod( 'ed_page_comments', $defaults['ed_page_comments'] );
    $post_comments = get_theme_mod( 'ed_post_comments', $defaults['ed_post_comments'] );
    if ( (is_page() && !$page_comments) || (is_single() && !$post_comments) ) return;
	
    if ( comments_open() || get_comments_number() ): 
		comments_template();
	endif;
}
endif;
add_action( 'coachify_after_page_content', 'coachify_comment' );

if( ! function_exists( 'coachify_comment_location_hook' ) ): 
/**
 * Comments Location Hook in Single Post
 * @return void
*/
function coachify_comment_location_hook(){
    add_action( 'coachify_after_post_content', 'coachify_comment', coachify_comment_toggle() );
}
endif;
add_action( 'wp', 'coachify_comment_location_hook', 10 );

if( ! function_exists( 'coachify_content_end' ) ): 
/**
 * Content End
 * @return mixed
*/
function coachify_content_end(){ 
    
    if( !( is_front_page() && ! is_home() ) ){
        if(!is_404()) echo '</div><!-- .container -->'; ?>        
    </div><!-- .site-content -->
    <?php
    }

    if( is_front_page() && !is_home() && !coachify_is_elementor_activated_post()){
        echo '</div>'; 
    }
}
endif;
add_action( 'coachify_before_footer', 'coachify_content_end', 20 );

if( ! function_exists( 'coachify_footer_instagram_section' ) ): 
/**
 * Bottom Instagram Section
 * @return mixed
*/
function coachify_footer_instagram_section(){ 
    $defaults     = coachify_get_general_defaults();
    $ed_instagram = get_theme_mod( 'ed_instagram', $defaults['ed_instagram'] );
    $home_instagram = get_theme_mod( 'ed_home_only_instagram', $defaults['ed_home_only_instagram'] );
    $insta_code   = get_theme_mod('instagram_shortcode', $defaults['instagram_shortcode'] );
    if( $ed_instagram ){
        if( $home_instagram && is_front_page() || !$home_instagram ){
            echo '<div class="instagram-section">' . do_shortcode( $insta_code ) . '</div>';
        }
    }
}
endif;
add_action( 'coachify_footer', 'coachify_footer_instagram_section', 15 );

if( ! function_exists( 'coachify_footer_start' ) ): 
/**
 * Footer Start
 * @return mixed
 * 
*/
function coachify_footer_start(){
    $coachify_widget_layouts = get_theme_mod('coachify_widget_layouts', 'one'); ?>
    <footer id="colophon" class = "site-footer lay-<?php echo esc_attr( $coachify_widget_layouts ); ?>" itemscope itemtype = "https://schema.org/WPFooter">
    <?php
}
endif;
add_action( 'coachify_footer', 'coachify_footer_start', 20 );


if( ! function_exists( 'coachify_footer_mid' ) ): 
/**
 * Footer Mid Section where widgets are registered
 * @return mixed
 * 
*/
function coachify_footer_mid(){    
    $footer_sidebars = array( 'footer-one', 'footer-two', 'footer-three', 'footer-four' );
    $active_sidebars = array();
    $sidebar_count   = 0;
	$defaults        = coachify_get_color_defaults();
    $site_bg         = coachify_rgba2hex(get_theme_mod( 'site_bg_color', $defaults['site_bg_color'] ));
    $foot_bg         = coachify_rgba2hex(get_theme_mod( 'foot_bg_color', $defaults['foot_bg_color'] ));

    foreach ( $footer_sidebars as $sidebar ) {
        if( is_active_sidebar( $sidebar ) ){
            array_push( $active_sidebars, $sidebar );
            $sidebar_count++ ;
        }
    }

    if( $active_sidebars ){ ?>
        <div class="footer-t <?php if( $site_bg != $foot_bg ) echo esc_attr('foot-has-bg'); ?>">
            <div class="container">
                <div class="grid column-<?php echo esc_attr( $sidebar_count ); ?>">
                    <?php foreach( $active_sidebars as $active ){ ?>
                        <div class="col">
                            <?php dynamic_sidebar( $active ); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php 
    }   
}
endif;
add_action( 'coachify_footer', 'coachify_footer_mid', 30 );

if( ! function_exists( 'coachify_footer_bottom' ) ): 
/**
 * Footer Bottom where credits are given
 * @return mixed
 * 
*/
function coachify_footer_bottom(){ ?>
    <div class = "footer-b">
        <div class = "container">
            <div class = "footer-bottom-t">
                <div class = "site-info">
                    <?php
                        coachify_get_footer_copyright();
                        if( coachify_pro_is_activated() ){
                            $partials = new Coachify_Partials;
                            $partials->coachify_ed_author_link();
                            $partials->coachify_ed_wp_link();
                            if( function_exists( 'the_privacy_policy_link' ) ){
                                the_privacy_policy_link();
                            }
                        } else {
                            echo esc_html__( ' Coachify | Developed By ', 'coachify' ); 
                            echo '<a href="' . esc_url( 'https://wpcoachify.com' ) .'" rel="nofollow" target="_blank">' . esc_html__( 'Coachify', 'coachify' ) . '</a>.';                
                            /* translators: %s: Link to WordPress */ 
                            printf( esc_html__( ' Powered by %s. ', 'coachify' ), '<a href="'. esc_url( 'https://wordpress.org/', 'coachify' ) .'" rel="nofollow" target="_blank">WordPress</a>' );
                            if( function_exists( 'the_privacy_policy_link' ) ){
                                the_privacy_policy_link();
                            }
                        }
                    ?> 
                </div>
            </div>
		</div>
	</div>
    <?php
}
endif;
add_action( 'coachify_footer', 'coachify_footer_bottom', 40 );

if( ! function_exists( 'coachify_footer_end' ) ): 
/**
 * Footer End 
 * @return mixed
 * 
*/
function coachify_footer_end(){ ?>
    </footer><!-- #colophon -->
    <?php
}
endif;
add_action( 'coachify_footer', 'coachify_footer_end', 50 );

if( ! function_exists( 'coachify_scrolltotop' ) ): 
/**
 * Scroll To Top
 * @return mixed
 * 
 */
function coachify_scrolltotop(){
    $defaults    = coachify_get_general_defaults();
    $scrolltotop = get_theme_mod( 'ed_scroll_top', $defaults['ed_scroll_top'] );
    if( $scrolltotop ){ ?>
        <div class = "back-to-top">
            <?php 
                $social_icons = new Coachify_Social_Lists;
                echo $social_icons->coachify_lists_all_svgs( 'back-to-top');
            ?>
        </div>
        <?php
    }
}
endif;
add_action( 'coachify_after_footer', 'coachify_scrolltotop', 15 );

if( ! function_exists( 'coachify_page_end' ) ): 
/**
 * Page End
 * @return mixed
 * 
*/
function coachify_page_end(){ ?>
    </div><!-- #page -->
    <?php
}
endif;
add_action( 'coachify_after_footer', 'coachify_page_end', 20 );