<?php
if (!function_exists('min_setup_cookie_banner')) {
	function min_setup_cookie_banner() {
		// All sanitized in customizer
        $turned_on = get_theme_mod('min_cookie_banner_turned_on');
        if ($turned_on == '1') {
	        $text = get_theme_mod('min_cookie_banner_text');
	        $button_text = get_theme_mod('min_cookie_banner_button_text');
	        $read_more_link = get_theme_mod('min_cookie_banner_learn_more_link');
	        $read_more_text = get_theme_mod('min_cookie_banner_learn_more_text');
	        ?>
            <div id="cookie-banner" class="hidden">
                <p><span id="cookie-banner-text"><?php echo esc_html($text) ?></span>
                    <a id='cookie-banner-link' href="<?php echo esc_attr($read_more_link) ?>"><?php echo esc_html($read_more_text) ?></a>
                </p>
                <button id="cookie-banner-button"><?php echo esc_html($button_text) ?></button>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    let is_agreed = localStorage.getItem('cookie_consent');

                    function show_banner () {
                        const banner = document.getElementById('cookie-banner');
                        banner.classList.remove('hidden');
                    }

                    function hide_banner () {
                        const banner = document.getElementById('cookie-banner');
                        banner.classList.add('hidden');
                    }

                    function grant_consent () {
                        localStorage.setItem('cookie_consent', '1');
                    }


                    if (is_agreed !== '1') {
                        const agree_button = document.getElementById('cookie-banner-button');
                        agree_button.onclick = function () {
                            hide_banner();
                            grant_consent();
                        };
                        show_banner();
                    }
                })
            </script>
	        <?php
        }
	}
}