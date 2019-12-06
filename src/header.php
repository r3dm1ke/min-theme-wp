<?php
/**
 * The header for our src
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package min
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="https://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
    <?php do_action( 'wp_body_open' ); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'min' ); ?></a>

        <header id="masthead" class="site-header">
            <div class="site-branding">

                <?php the_custom_logo(); ?>
                <?php
                    $min_blog_name = get_bloginfo('name');
                    $min_blog_description = get_bloginfo( 'description', 'display' );
                ?>

                <h1 class="site-title">
                    <a
                        class="glitch"
                        data-glitch="<?php echo $min_blog_name ?>"
                        href="<?php echo esc_url( home_url( '/' ) ); ?>"
                        rel="home"
                    >
                        <?php echo $min_blog_name ?>
                    </a>
                </h1>

                <?php
                if ( $min_blog_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo esc_html($min_blog_description); /* WPCS: xss ok. */ ?></p>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation">
                <?php searchform_hideable() ?>
                <?php
                wp_nav_menu( array(
                    'theme_location'    => 'menu-1',
                    'container_class'   => 'primary-menu-container'
                ) );
                $min_night_mode = get_theme_mod('min_night_mode_turned_on');
                $min_search_form = get_theme_mod('min_search_widget_turned_on');
                if ($min_night_mode == '1' || $min_search_form == '1') {
                ?>
                <div class="permanent-menu-container">
                    <ul id="permanent-menu" class="menu">
                        <?php if ($min_night_mode == '1') { ?>
                        <li id="menu-item-9" class="night_mode_toggle menu-item menu-item-type-custom menu-item-object-custom">
                            <a href="#" data-glitch="<?php esc_html_e('night mode', 'min') ?>" class="glitch"><?php esc_html_e('night mode', 'min') ?></a>
                        </li> <?php }
                        if ($min_search_form == '1') { ?>
                        <li id="menu-item-10" class="search-trigger menu-item menu-item-type-custom menu-item-object-custom">
                            <a href="#" data-glitch="<?php esc_html_e('search', 'min') ?>" class="glitch"><?php esc_html_e('search', 'min') ?></a>
                        </li> <?php } ?>
                    </ul>
                </div>
                <?php } ?>
            </nav><!-- #site-navigation -->
            <?php if ( get_header_image() ) : ?>
                <div id="header-image">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                    </a>
                </div>
            <?php endif; ?>
        </header><!-- #masthead -->

        <div id="content" class="site-content">
