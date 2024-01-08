<?php get_header(); ?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">

        <section id="primary" class="content-area">
            <main id="main" class="site-main">
                <header class="page-header">
                    <h1 class="page-title">
                        <?php

                        printf(
                            esc_html__('Search Results for: %s', 'blank'),
                            '<span>' . get_search_query() . '</span>'
                        );

                        ?>
                    </h1>
                </header>
                <?php
                if (have_posts()):
                    while (have_posts()):
                        the_post();
                        // Your code to display each post goes here
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
                            <?php if (has_post_thumbnail()): ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="entry-content">
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

                    // Add pagination if needed
                    the_posts_pagination();

                else:
                    // If no posts match the query, display a message
                    echo '<p>No results found. Please try again with a different search query.</p>';
                endif;
                ?>
            </main>
        </section>

    </main>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>