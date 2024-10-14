<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Coachify
 */
    /**
     * Doctype Hook
     * 
     * @hooked coachify_doctype
    */
    do_action( 'coachify_doctype' );
?>
<head itemscope itemtype="https://schema.org/WebSite">
	<?php 
    /**
     * Before wp_head
     * 
     * @hooked coachify_head
    */
    do_action( 'coachify_before_wp_head' );
    
    wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

<?php
    wp_body_open();
    
    /**
     * Before Header
     * 
     * @hooked coachify_page_start - 20 
    */
    do_action( 'coachify_before_header' );
    
    /**
     * Header
     * 
     * @hooked coachify_header - 20     
    */
    do_action( 'coachify_header' );
    
    /**
     * Before Content
     *
    */
    do_action( 'coachify_after_header' );
    
    /**
     * Content
     * 
     * @hooked coachify_content_start
    */
    do_action( 'coachify_content' );