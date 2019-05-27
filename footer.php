<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package min
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
            <span>
                <span id="footer_copyright"><?php echo esc_html(get_theme_mod('footer_copyright')) ?></span><br>
                <span id="footer_subtitle"><?php echo esc_html(get_theme_mod('footer_subtitle')) ?></span><br>
                <span id="footer_custom_html"><?php echo wp_kses_post(get_theme_mod('footer_custom_html')) ?></span>
            </span>
		</div><!-- .site-info -->
        <?php min_setup_cookie_banner() ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php
min_get_glitch_stylesheet();
wp_footer();
?>

</body>
</html>
