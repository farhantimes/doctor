<?php
/**
 * Main Index Fallback Template
 *
 * @package MedClinic_Universal
 */

get_header();
?>

<main id="main-content" class="clinic-page" role="main">
    <div class="clinic-container clinic-py-6">
        <?php if (have_posts()) : ?>
            <div class="clinic-posts-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('clinic-card clinic-post-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="clinic-post-thumb">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('clinic-card'); ?></a>
                            </div>
                        <?php endif; ?>
                        <div class="clinic-p-4">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="clinic-post-meta">
                                <span><?php echo get_the_date(); ?></span> &bull; 
                                <span><?php the_author(); ?></span>
                            </div>
                            <div class="clinic-post-excerpt clinic-mt-2">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="clinic-text-link clinic-mt-3">Read Full Article &rarr;</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <div class="clinic-pagination clinic-mt-6">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <div class="clinic-card clinic-p-6 clinic-text-center">
                <h2>No Articles or Pages Found</h2>
                <p>The requested page or query returned no entries.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="clinic-btn clinic-btn--primary clinic-mt-4">Return to Homepage</a>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
