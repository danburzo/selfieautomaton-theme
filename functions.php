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

		$output .= '<img src="' . get_bloginfo('template_directory') . '/' . $atts['path'] . '" alt="' . $content . '" />';
		$output .= '<figcaption>' . $content . '</figcaption>';
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

?>