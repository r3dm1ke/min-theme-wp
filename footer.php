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
                <span id="footer_copyright"><?php echo get_theme_mod('footer_copyright') ?></span><br>
                <span id="footer_subtitle"><?php echo get_theme_mod('footer_subtitle') ?></span><br>
                <span id="footer_custom_html"><?php echo get_theme_mod('footer_custom_html') ?></span>
            </span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
