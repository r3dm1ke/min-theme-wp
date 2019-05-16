<?php

if (!function_exists('min_get_glitch_stylesheet')) {
	function min_get_glitch_stylesheet() {
		if (get_theme_mod('min_glitch_turned_on') == '1') {
			?>
			<style>
				.glitch {
					text-decoration: none;
					margin: 0;
					position: relative;
                    display: block;
				}

				.glitch:before, .glitch:after {
					display: block;
					content: attr(data-glitch);
					width: 100%;
					position: absolute;
					top: 0;
					right: 0;
					bottom: 0;
					left: 0;
					opacity: 0;
				}

				.glitch:after {
					color: <?php echo get_theme_mod('min_glitch_color_2'); ?>;
					z-index: -2;
				}

				.glitch:before {
					color: <?php echo get_theme_mod('min_glitch_color_1'); ?>;
					z-index: -1;
				}

				.glitch:hover:before {
					-webkit-animation: glitch 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) both 10;
					animation: glitch 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) both 10;
					opacity: .8;
				}

				.glitch:hover:after {
					animation: glitch 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) reverse both 10;
					opacity: .8;
				}

				@-webkit-keyframes glitch {
					0% {
						-webkit-transform: translate(0);
						transform: translate(0);
					}
					20% {
						-webkit-transform: translate(-3px, 3px);
						transform: translate(-3px, 3px);
					}
					40% {
						-webkit-transform: translate(-3px, -3px);
						transform: translate(-3px, -3px);
					}
					60% {
						-webkit-transform: translate(3px, 3px);
						transform: translate(3px, 3px);
					}
					80% {
						-webkit-transform: translate(3px, -3px);
						transform: translate(3px, -3px);
					}
					to {
						-webkit-transform: translate(0);
						transform: translate(0);
					}
				}

				@keyframes glitch {
					0% {
						-webkit-transform: translate(0);
						transform: translate(0);
					}
					20% {
						-webkit-transform: translate(-3px, 3px);
						transform: translate(-3px, 3px);
					}
					40% {
						-webkit-transform: translate(-3px, -3px);
						transform: translate(-3px, -3px);
					}
					60% {
						-webkit-transform: translate(3px, 3px);
						transform: translate(3px, 3px);
					}
					80% {
						-webkit-transform: translate(3px, -3px);
						transform: translate(3px, -3px);
					}
					to {
						-webkit-transform: translate(0);
						transform: translate(0);
					}
				}
			</style>
			<?php
		}
	}
}
