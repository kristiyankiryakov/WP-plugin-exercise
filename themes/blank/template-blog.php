<?php
/*
Template Name: Blog Page
*/

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <header class="page-header">
            <h1 class="page-title">
                <?php echo get_the_title(); ?>
            </h1>
        </header>

        <div class="posts-list">
            <?php
            $args = array(
                'post_type' => 'post',
            );

            $query = new WP_Query($args);

            if ($query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
                        <?php if (has_post_thumbnail()): ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="entry-content-blog-post">
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>" rel="bookmark">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <?php
                            the_excerpt();
                            ?>
                        </div>
                    </article>
                    <?php
                endwhile;
            else:
                get_template_part('template-parts/content', 'none');
            endif;
            wp_reset_postdata();
            ?>
        </div>

    </main>
</div>

<?php get_footer(); ?>