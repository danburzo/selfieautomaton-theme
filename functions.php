<?php 
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) ); 

	// Add Shortcode
	function staticimage_shortcode( $atts , $content = null ) {

		// Attributes
		$atts = shortcode_atts(
			array(
				'path' => '',
				'link' => '',
				'klass' => ''
			),
			$atts,
			'svg_logo'
		);

		$output = '<figure class="static-image ' . $atts['klass'] . '">';

		if ($atts['link'] != '') {
			$output .= '<a href="' . $atts['link'] . '" target="_blank">'; 
		}

		$output .= '<img src="' . get_bloginfo('template_directory') . '/' . $atts['path'] . '" alt="' . $content . '" />';
		$output .= '<figcaption>' . $content . '</figcaption>';

		if ($atts['link'] != '') {
			$output .= '</a>';
		}

		$output .= '</figure>';
		return $output;

	}
	add_shortcode( 'staticimage', 'staticimage_shortcode' );


	// WPGlobus custom language switcher
	function the_language_switcher() {
		if (class_exists('WPGlobus')) {
			echo '<ul class="language-switcher">';
			foreach(WPGlobus::Config()->enabled_languages as $lang){
				if($lang == WPGlobus::Config()->language) {
					echo "<li class='current-language'>{$lang}</li>";
				} else {
					echo "<li><a href='".WPGlobus_Utils::localize_current_url($lang)."'>{$lang}</a></li>";
				}
			}
			echo '</ul>';
		}
	}

	function the_breadcrumb() {
		if (!is_home()) {
			$parents = array_reverse(get_post_ancestors( get_the_ID() ));
			echo '<ul>';
			foreach ($parents as $p) {
				echo '<li>';
				echo '<a href="' . get_permalink($p) . '">' . get_the_title($p) . '</a>';
				echo '</li>';
			}
			echo '</ul>';
		}
	}

?>