<?php
/**
 * The template for displaying the homepage.
 * @package Geeska_Magazine
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main space-y-12">

        <!-- Featured Post Section -->
        <?php
        $featured_query = new WP_Query( array('posts_per_page' => 1, 'ignore_sticky_posts' => 1) );
        if ( $featured_query->have_posts() ) :
            while ( $featured_query->have_posts() ) : $featured_query->the_post();
        ?>
            <section class="featured-article-section">
                <article id="post-<?php the_ID(); ?>" <?php post_class('grid grid-cols-1 md:grid-cols-2 gap-8 items-center'); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="featured-image">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large', ['class' => 'w-full h-auto object-cover rounded-lg shadow-md', 'alt' => get_the_title()]); ?></a>
                        </div>
                    <?php endif; ?>

                    <div class="article-content">
                        <div class="article-meta mb-2">
                            <?php $categories = get_the_category(); if ( ! empty( $categories ) ) : ?>
                                <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>" class="heading-font text-sm font-semibold text-primary uppercase"><?php echo esc_html( $categories[0]->name ); ?></a>
                            <?php endif; ?>
                        </div>
                        <header class="entry-header">
                            <?php the_title( sprintf( '<h2 class="entry-title text-3xl md:text-4xl font-bold my-2 leading-tight heading-font hover:text-primary-light transition-colors"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                        </header>
                        <div class="entry-summary text-lg text-muted-foreground">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </article>
            </section>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>

        <!-- Latest News Grid Section -->
        <section class="latest-news-section">
            <h2 class="section-title">Latest Analysis</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $latest_query = new WP_Query( array('posts_per_page' => 6, 'offset' => 1, 'ignore_sticky_posts' => 1) );
                if ( $latest_query->have_posts() ) :
                    while ( $latest_query->have_posts() ) : $latest_query->the_post();
                ?>
                    <div class="article-card flex flex-col">
                        <?php if(has_post_thumbnail()): ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-48 object-cover', 'alt' => get_the_title()]); ?>
                        </a>
                        <?php endif; ?>
                        <div class="p-4 flex flex-col flex-grow">
                            <div class="article-meta mb-1">
                                <?php $categories = get_the_category(); if ( ! empty( $categories ) ) : ?>
                                    <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>" class="heading-font text-xs font-semibold text-primary uppercase"><?php echo esc_html( $categories[0]->name ); ?></a>
                                <?php endif; ?>
                            </div>
                            <?php the_title( sprintf( '<h3 class="heading-font text-xl font-semibold my-2 text-foreground hover:text-primary-light transition-colors leading-tight flex-grow"><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                            <div class="article-meta text-xs mt-2">
                                <?php echo get_the_date(); ?>
                            </div>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>
    </main>
</div>

<?php
get_footer();
