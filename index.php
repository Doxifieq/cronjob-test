<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>

        <?php wp_link_pages(); ?>

        <?php wp_footer(); ?>
    </body>
</html>