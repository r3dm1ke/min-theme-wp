<?php
/**
 * The header for our theme
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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'min' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
            ?>
            <h1 class="site-title"><a class="glitch" data-glitch="<?php bloginfo( 'name' ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php
			$min_description = get_bloginfo( 'description', 'display' );
			if ( $min_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $min_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<!--<a class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'min' ); ?></a>-->
            <?php searchform_hideable() ?>
			<?php
			wp_nav_menu( array(
				'theme_location'    => 'menu-1',
				'menu_id'           => 'primary-menu',
                'container_class'   => 'primary-menu-container'
			) );
			$night_mode = get_theme_mod('min_night_mode_turned_on');
			$search_form = get_theme_mod('min_search_widget_turned_on');
			if ($night_mode == '1' || $search_form == '1') {
			?>
            <div class="permanent-menu-container">
                <ul id="permanent-menu" class="menu">
                    <?php if ($night_mode == '1') { ?>
                    <li id="menu-item-9" class="night_mode_toggle menu-item menu-item-type-custom menu-item-object-custom">
                        <a href="#" data-glitch="night mode" class="glitch"><?php _e('night mode', 'min') ?></a>
                    </li> <?php }
                    if ($search_form == '1') { ?>
                    <li id="menu-item-10" class="search-trigger menu-item menu-item-type-custom menu-item-object-custom">
                        <a href="#" data-glitch="search" class="glitch"><?php _e('search', 'min') ?></a>
                    </li> <?php } ?>
                </ul>
            </div>
            <?php } ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
