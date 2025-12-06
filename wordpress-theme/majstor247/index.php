<?php
/**
 * Main Index Template
 *
 * @package Majstor247
 */

get_header();
?>

<section class="section" style="padding-top: 8rem;">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="grid grid-2">
                <?php while (have_posts()) : the_post(); ?>
                <article class="card">
                    <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                    <?php endif; ?>
                    
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    
                    <div class="post-meta text-muted">
                        <span><?php echo get_the_date(); ?></span>
                    </div>
                    
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    
                    <a href="<?php the_permalink(); ?>" class="btn btn-secondary">
                        Pročitaj više
                        <?php echo majstor247_icon('arrow-right'); ?>
                    </a>
                </article>
                <?php endwhile; ?>
            </div>

            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <div class="text-center">
                <h2>Nema objava</h2>
                <p class="text-muted">Trenutno nema sadržaja za prikaz.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
