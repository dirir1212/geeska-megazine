<?php
/**
 * The main template file
 * @package Geeska_Magazine
 */

get_header();
?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div id="primary" class="content-area lg:col-span-2">
        <main id="main" class="site-main">
            <header class="page-header mb-8">
                <?php
                the_archive_title( '<h1 class="page-title section-title">', '</h1>' );
                the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
            </header>
            <div class="space-y-12">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    // You can create a template part for displaying posts, e.g., template-parts/content.php
                    get_template_part( 'template-parts/content', get_post_format() );
                endwhile;
                the_posts_pagination();
            else :
                // Or a template for no content found, e.g., template-parts/content-none.php
                get_template_part( 'template-parts/content', 'none' );
            endif;
            ?>
            </div>
        </main>
    </div>
    <?php get_sidebar(); ?>
</div>

<?php
get_footer();
