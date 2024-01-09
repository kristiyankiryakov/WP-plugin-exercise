<?php
/*
Template Name: Home Page
*/

get_header(); ?>

<div class="home-page-container">

    <h1 class="home-page-heading">WUBBA LUBBA DUB-BLOG!</h1>

    <div class="home-image-container">
        <a href="/blog">
            <img src="<?php echo get_template_directory_uri(); ?>/images/home-rick-morty.jpg" alt="Rick and Morty">
        </a>
    </div>
</div>

<?php get_footer(); ?>