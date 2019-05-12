<?php
/**
 * Template Name: Fullwidth (No title)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package min
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main nosidebar">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page-notitle' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
