<?php
/**
 * Majstor 247 Theme Functions
 *
 * @package Majstor247
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function majstor247_setup() {
    // Add default posts and comments RSS feed links
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'majstor247'),
        'footer'  => __('Footer Menu', 'majstor247'),
    ));

    // HTML5 support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Custom logo support
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Responsive embeds
    add_theme_support('responsive-embeds');

    // Wide alignment support
    add_theme_support('align-wide');
}
add_action('after_setup_theme', 'majstor247_setup');

/**
 * Enqueue scripts and styles
 */
function majstor247_scripts() {
    // Google Fonts - Inter
    wp_enqueue_style(
        'majstor247-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap',
        array(),
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'majstor247-style',
        get_stylesheet_uri(),
        array('majstor247-google-fonts'),
        wp_get_theme()->get('Version')
    );

    // Main JavaScript
    wp_enqueue_script(
        'majstor247-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        wp_get_theme()->get('Version'),
        true
    );

    // Localize script for AJAX
    wp_localize_script('majstor247-main', 'majstor247Ajax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('majstor247_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'majstor247_scripts');

/**
 * Register widget areas
 */
function majstor247_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'majstor247'),
        'id'            => 'footer-widgets',
        'description'   => __('Add widgets here for footer area.', 'majstor247'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'majstor247_widgets_init');

/**
 * Handle contact form submission via AJAX
 */
function majstor247_handle_contact_form() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'majstor247_nonce')) {
        wp_send_json_error(array('message' => 'Security check failed'));
    }

    // Sanitize form data
    $name    = sanitize_text_field($_POST['name']);
    $phone   = sanitize_text_field($_POST['phone']);
    $service = sanitize_text_field($_POST['service']);
    $message = sanitize_textarea_field($_POST['message']);

    // Validate required fields
    if (empty($name) || empty($phone)) {
        wp_send_json_error(array('message' => 'Molimo ispunite sva obavezna polja.'));
    }

    // Get admin email
    $admin_email = get_option('admin_email');
    
    // Email subject
    $subject = sprintf('[Majstor 247] Novi upit - %s', $service);
    
    // Email body
    $body = sprintf(
        "Novi upit s web stranice:\n\n" .
        "Ime: %s\n" .
        "Telefon: %s\n" .
        "Usluga: %s\n" .
        "Poruka: %s\n",
        $name,
        $phone,
        $service,
        $message
    );

    // Email headers
    $headers = array('Content-Type: text/plain; charset=UTF-8');

    // Send email
    $sent = wp_mail($admin_email, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success(array('message' => 'Upit poslan! Javit ćemo vam se u najkraćem roku.'));
    } else {
        wp_send_json_error(array('message' => 'Greška pri slanju. Molimo pokušajte ponovo.'));
    }
}
add_action('wp_ajax_majstor247_contact', 'majstor247_handle_contact_form');
add_action('wp_ajax_nopriv_majstor247_contact', 'majstor247_handle_contact_form');

/**
 * Add custom image sizes
 */
function majstor247_custom_image_sizes() {
    add_image_size('service-card', 400, 300, true);
    add_image_size('testimonial', 100, 100, true);
}
add_action('after_setup_theme', 'majstor247_custom_image_sizes');

/**
 * Customizer settings
 */
function majstor247_customize_register($wp_customize) {
    // Contact Info Section
    $wp_customize->add_section('majstor247_contact', array(
        'title'    => __('Contact Information', 'majstor247'),
        'priority' => 30,
    ));

    // Phone Number
    $wp_customize->add_setting('majstor247_phone', array(
        'default'           => '098 963 0462',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('majstor247_phone', array(
        'label'   => __('Phone Number', 'majstor247'),
        'section' => 'majstor247_contact',
        'type'    => 'text',
    ));

    // Email Address
    $wp_customize->add_setting('majstor247_email', array(
        'default'           => 'info@majstor247.online',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('majstor247_email', array(
        'label'   => __('Email Address', 'majstor247'),
        'section' => 'majstor247_contact',
        'type'    => 'email',
    ));

    // Hero Section
    $wp_customize->add_section('majstor247_hero', array(
        'title'    => __('Hero Section', 'majstor247'),
        'priority' => 35,
    ));

    // Hero Title
    $wp_customize->add_setting('majstor247_hero_title', array(
        'default'           => 'Hitni Majstori',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('majstor247_hero_title', array(
        'label'   => __('Hero Title', 'majstor247'),
        'section' => 'majstor247_hero',
        'type'    => 'text',
    ));

    // Hero Subtitle
    $wp_customize->add_setting('majstor247_hero_subtitle', array(
        'default'           => 'Poreč & Istra',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('majstor247_hero_subtitle', array(
        'label'   => __('Hero Subtitle (Gradient)', 'majstor247'),
        'section' => 'majstor247_hero',
        'type'    => 'text',
    ));

    // Stats
    $wp_customize->add_setting('majstor247_stat_interventions', array(
        'default'           => '5000+',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('majstor247_stat_interventions', array(
        'label'   => __('Interventions Stat', 'majstor247'),
        'section' => 'majstor247_hero',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('majstor247_stat_satisfied', array(
        'default'           => '98%',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('majstor247_stat_satisfied', array(
        'label'   => __('Satisfied Customers Stat', 'majstor247'),
        'section' => 'majstor247_hero',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('majstor247_stat_years', array(
        'default'           => '10+',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('majstor247_stat_years', array(
        'label'   => __('Years of Experience Stat', 'majstor247'),
        'section' => 'majstor247_hero',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'majstor247_customize_register');

/**
 * Get theme mod with default
 */
function majstor247_get_option($key, $default = '') {
    return get_theme_mod('majstor247_' . $key, $default);
}

/**
 * SVG Icons helper function
 */
function majstor247_icon($icon) {
    $icons = array(
        'phone' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>',
        'mail' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>',
        'clock' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>',
        'zap' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>',
        'users' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
        'shield' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
        'star' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>',
        'check' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>',
        'droplet' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path></svg>',
        'key' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21 2-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0 3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>',
        'sparkles' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"></path><path d="M5 3v4"></path><path d="M19 17v4"></path><path d="M3 5h4"></path><path d="M17 19h4"></path></svg>',
        'truck' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 18H3c-.6 0-1-.4-1-1V7c0-.6.4-1 1-1h10c.6 0 1 .4 1 1v11"></path><path d="M14 9h4l4 4v4c0 .6-.4 1-1 1h-2"></path><circle cx="7" cy="18" r="2"></circle><path d="M15 18H9"></path><circle cx="17" cy="18" r="2"></circle></svg>',
        'car' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path><circle cx="7" cy="17" r="2"></circle><path d="M9 17h6"></path><circle cx="17" cy="17" r="2"></circle></svg>',
        'wrench' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>',
        'map-pin' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path><circle cx="12" cy="10" r="3"></circle></svg>',
        'arrow-right' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>',
        'send' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 2-7 20-4-9-9-4Z"></path><path d="M22 2 11 13"></path></svg>',
        'menu' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"></line><line x1="4" x2="20" y1="6" y2="6"></line><line x1="4" x2="20" y1="18" y2="18"></line></svg>',
        'x' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>',
        'user' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>',
        'cart' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="21" r="1"></circle><circle cx="19" cy="21" r="1"></circle><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path></svg>',
    );

    return isset($icons[$icon]) ? $icons[$icon] : '';
}
