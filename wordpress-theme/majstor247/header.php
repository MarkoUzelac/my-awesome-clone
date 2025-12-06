<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <div class="header-inner">
            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    Majstor<span> 247</span>
                <?php endif; ?>
            </a>

            <!-- Main Navigation -->
            <nav class="main-nav" id="main-nav">
                <a href="#" class="nav-link nav-btn">Rezerviraj</a>
                <a href="#" class="nav-link">📄 CV Maker</a>
                <a href="#" class="nav-link">👑 Članstvo</a>
                <a href="#usluge" class="nav-link">Usluge</a>
            </nav>

            <!-- Header Actions -->
            <div class="header-actions">
                <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="Toggle menu">
                    <?php echo majstor247_icon('menu'); ?>
                </button>
                
                <a href="tel:<?php echo esc_attr(str_replace(' ', '', majstor247_get_option('phone', '098 963 0462'))); ?>" class="btn btn-primary">
                    <?php echo majstor247_icon('phone'); ?>
                    <span class="hide-mobile"><?php echo esc_html(majstor247_get_option('phone', '098 963 0462')); ?></span>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobile-menu">
    <div class="mobile-menu-inner">
        <a href="#" class="nav-link">Rezerviraj</a>
        <a href="#" class="nav-link">CV Maker</a>
        <a href="#" class="nav-link">Članstvo</a>
        <a href="#usluge" class="nav-link">Usluge</a>
    </div>
</div>

<main id="main-content">
