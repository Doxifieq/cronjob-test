<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>

        <div class="wrapper">
            <h1 class="title">Status for websites</h1>

            <div class="cards">
                <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();


                            echo '
                                <div class="card">
                                    <h3 class="site">' . the_title() . '</h3>
                                    <p class="url">' . get_field('website') . '</p>

                                    <p><span class="dot green"></span>Status Code: ' . get_post_meta(get_the_ID(), 'status_code', true) . '</p>
                                </div>
                            ';
                        }
                    }
                ?>
<!-- 
                <div class="card">
                    <h3 class="site">Google</h3>
                    <p class="url">https://www.google.com</p>

                    <p><span class="dot green"></span>Status Code: 200</p>
                </div> -->
            </div>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>

<?php
    /*
    if (have_posts()) {
        while (have_posts()) {
            the_post();

            echo '
                <li>
                    <h3>' . get_the_title() . '</h3>
                    <p>Status code: ' . get_post_meta(get_the_ID(), 'status_code', true) . '</p>
                </li>
            ';
        }
    }
    */
?>