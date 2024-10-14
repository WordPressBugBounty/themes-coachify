<?php
/**
 * Coachify Woocommerce hooks and functions.
 *
 * @link https://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 *
 * @package Coachify
 */

/**
 * Woocommerce related hooks
*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar',             'woocommerce_get_sidebar', 10 );

if( ! function_exists( 'coachify_woocommerce_support' ) ) :
/**
 * Declare Woocommerce Support
*/
function coachify_woocommerce_support() {
    global $woocommerce;
    
    add_theme_support( 'woocommerce' );
    
    if( version_compare( $woocommerce->version, '3.0', ">=" ) ) {
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }
}
endif;
add_action( 'after_setup_theme', 'coachify_woocommerce_support');

if( ! function_exists( 'coachify_wc_widgets_init' ) ) :
/**
 * Woocommerce Sidebar
*/
function coachify_wc_widgets_init(){
    register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'coachify' ),
		'id'            => 'shop-sidebar',
		'description'   => esc_html__( 'Sidebar displaying only in woocommerce pages.', 'coachify' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );    
}
endif;
add_action( 'widgets_init', 'coachify_wc_widgets_init' );

if( ! function_exists( 'coachify_wc_wrapper' ) ) :
/**
 * Before Content
 * Wraps all WooCommerce content in wrappers which match the theme markup
*/
function coachify_wc_wrapper(){    
    ?>
    <div class="page-grid">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
    <?php
}
endif;
add_action( 'woocommerce_before_main_content', 'coachify_wc_wrapper' );

if( ! function_exists( 'coachify_wc_wrapper_end' ) ) :
/**
 * After Content
 * Closes the wrapping divs
*/
function coachify_wc_wrapper_end(){
    ?>
                </main>
            </div>
        <?php do_action( 'coachify_wo_sidebar' ); ?>
    </div>
    <?php
}
endif;
add_action( 'woocommerce_after_main_content', 'coachify_wc_wrapper_end' );

if( ! function_exists( 'coachify_wc_sidebar_cb' ) ) :
/**
 * Callback function for Shop sidebar
*/
function coachify_wc_sidebar_cb(){
    if( is_active_sidebar( 'shop-sidebar' ) ){
        echo '<aside id="secondary" class="widget-area" role="complementary">';
        dynamic_sidebar( 'shop-sidebar' );
        echo '</aside>'; 
    }
}
endif;
add_action( 'coachify_wo_sidebar', 'coachify_wc_sidebar_cb' );

/**
 * Removes the "shop" title on the main shop page
*/
add_filter( 'woocommerce_show_page_title' , '__return_false' );

if( ! function_exists( 'coachify_wc_cart_count' ) ) :
/**
 * Woocommerce Cart Count
 * 
 * @link https://isabelcastillo.com/woocommerce-cart-icon-count-theme-header 
*/
function coachify_wc_cart_count(){
    $cart_page = get_option( 'woocommerce_cart_page_id' );
    $count = WC()->cart->cart_contents_count; 
    if( $cart_page){ ?>
        <div class="header-cart">
            <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart" title="<?php esc_attr_e( 'View your shopping cart', 'coachify' ); ?>">
                <?php 
                    $social_icons = new Coachify_Social_Lists;
                    echo $social_icons->coachify_lists_all_svgs( 'header-cart');
                ?>
                <span class="number"><?php echo absint( $count ); ?></span>
            </a>
        </div>
    <?php
    }
}
endif;

if( ! function_exists( 'coachify_add_to_cart_fragment' ) ) :
/**
 * Ensure cart contents update when products are added to the cart via AJAX
 *
 * @link https://isabelcastillo.com/woocommerce-cart-icon-count-theme-header
 */
function coachify_add_to_cart_fragment( $fragments ){
    ob_start();
    $count = WC()->cart->cart_contents_count; ?>
    <div class="header-cart">
        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart" title="<?php esc_attr_e( 'View your shopping cart', 'coachify' ); ?>">
            <?php 
                $social_icons = new Coachify_Social_Lists;
                echo $social_icons->coachify_lists_all_svgs( 'header-cart');
            ?>
            <span class="number"><?php echo absint( $count ); ?></span>
        </a>
    </div>
    <?php

    $fragments['a.cart'] = ob_get_clean();

    return $fragments;
}
endif;
add_filter( 'woocommerce_add_to_cart_fragments', 'coachify_add_to_cart_fragment' );
