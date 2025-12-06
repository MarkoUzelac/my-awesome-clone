<?php
/**
 * 404 Page Template
 *
 * @package Majstor247
 */

get_header();
?>

<section class="section" style="padding-top: 8rem; min-height: 60vh; display: flex; align-items: center;">
    <div class="container text-center">
        <h1 style="font-size: 6rem; color: var(--primary);">404</h1>
        <h2 class="mb-4">Stranica nije pronađena</h2>
        <p class="text-muted mb-8">Stranica koju tražite ne postoji ili je premještena.</p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
            <?php echo majstor247_icon('arrow-right'); ?>
            Povratak na početnu
        </a>
    </div>
</section>

<?php get_footer(); ?>
