<?php
/**
 * Page Template
 *
 * @package Majstor247
 */

get_header();
?>

<section class="section" style="padding-top: 8rem;">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
        <article class="page-content">
            <h1><?php the_title(); ?></h1>
            
            <div class="content">
                <?php the_content(); ?>
            </div>
        </article>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>
