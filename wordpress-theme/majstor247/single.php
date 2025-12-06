<?php
/**
 * Single Post Template
 *
 * @package Majstor247
 */

get_header();
?>

<section class="section" style="padding-top: 8rem;">
    <div class="container" style="max-width: 800px;">
        <?php while (have_posts()) : the_post(); ?>
        <article class="single-post">
            <header class="post-header mb-8">
                <h1><?php the_title(); ?></h1>
                
                <div class="post-meta text-muted mb-4">
                    <span><?php echo get_the_date(); ?></span>
                    <span> • </span>
                    <span><?php the_author(); ?></span>
                    <?php if (has_category()) : ?>
                    <span> • </span>
                    <span><?php the_category(', '); ?></span>
                    <?php endif; ?>
                </div>
                
                <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail" style="border-radius: var(--radius); overflow: hidden; margin-bottom: 2rem;">
                    <?php the_post_thumbnail('large'); ?>
                </div>
                <?php endif; ?>
            </header>
            
            <div class="post-content" style="line-height: 1.8;">
                <?php the_content(); ?>
            </div>
            
            <?php if (has_tag()) : ?>
            <div class="post-tags" style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--border);">
                <strong>Oznake: </strong>
                <?php the_tags('', ', ', ''); ?>
            </div>
            <?php endif; ?>
            
            <div class="post-navigation" style="margin-top: 2rem; display: flex; justify-content: space-between;">
                <?php previous_post_link('%link', '← Prethodna objava'); ?>
                <?php next_post_link('%link', 'Sljedeća objava →'); ?>
            </div>
        </article>
        
        <?php if (comments_open() || get_comments_number()) : ?>
        <div class="comments-section" style="margin-top: 3rem;">
            <?php comments_template(); ?>
        </div>
        <?php endif; ?>
        
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>
