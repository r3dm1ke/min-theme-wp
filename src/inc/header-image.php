<?php
if ( ! function_exists( 'min_render_header_image' ) ) {
	function min_render_header_image() {
		?>
		<div id="header-image">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img
					src="<?php header_image(); ?>"
					width="<?php echo absint( get_custom_header()->width ); ?>"
					height="<?php echo absint( get_custom_header()->height ); ?>"
					alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
				/>
			</a>
		</div>
		<?php
	}
}
