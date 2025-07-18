<?php
/**
 * The template for displaying all single posts
 * @package Geeska_Magazine
 */

get_header();
?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-x-12">
    <div id="primary" class="content-area lg:col-span-2">
        <main id="main" class="site-main">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header mb-8">
                    <div class="article-meta mb-2">
                        <?php $categories = get_the_category(); if ( ! empty( $categories ) ) : ?>
                            <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>" class="heading-font text-sm font-semibold text-primary uppercase"><?php echo esc_html( $categories[0]->name ); ?></a>
                        <?php endif; ?>
                    </div>
                    <?php the_title( '<h1 class="entry-title text-3xl md:text-5xl font-bold leading-tight heading-font">', '</h1>' ); ?>
                    <div class="article-meta mt-4 text-base">
                        By <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="font-semibold text-foreground hover:text-primary"><?php the_author(); ?></a>
                        <span class="mx-2">|</span>
                        <span><?php echo get_the_date(); ?></span>
                    </div>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail mb-8">
                        <?php the_post_thumbnail('large', ['class' => 'w-full h-auto object-cover rounded-lg', 'alt' => get_the_title()]); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content article-content text-lg">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
        endwhile;
        ?>
        </main>
    </div>
    <?php get_sidebar(); ?>
</div>

<?php
get_footer();
