<?php
/**
 * Geeska Magazine functions and definitions
 * @package Geeska_Magazine
 */

function geeska_setup() {
	load_theme_textdomain( 'geeska', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus(
		array(
			'main-menu' => esc_html__( 'Main Menu', 'geeska' ),
		)
	);
}
add_action( 'after_setup_theme', 'geeska_setup' );

function geeska_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style( 'geeska-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Lora:wght@400;500;600;700&display=swap', array(), null );
    
    // Enqueue Tailwind CSS from CDN
    wp_enqueue_script( 'tailwindcss', 'https://cdn.tailwindcss.com', array(), null, false );
    
    // Enqueue main stylesheet
	wp_enqueue_style( 'geeska-style', get_stylesheet_uri(), array(), '1.1' );
}
add_action( 'wp_enqueue_scripts', 'geeska_scripts' );

function geeska_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Main Sidebar', 'geeska' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'geeska' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s bg-secondary p-6 rounded-lg">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title section-title !mb-4">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'geeska_widgets_init' );
