<?php 
class CustomButtons {
	private static $instance;
	private function __construct(){
		$this->init_actions();
	}
	public static function get_instance(){
		if ( !isset(self::$instance) ){
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}
	public function __clone(){
		trigger_error( 'Clone is not allowed.', E_USER_ERROR );
	}
	public function init_actions() {
		add_action('admin_head', array( $this, 'add_tinymce_button' ) );
		add_action('admin_enqueue_scripts', array($this, 'custom_button_css' ) );
		/*
			Shortcodes
		*/
		add_shortcode( 'icn', array( $this, 'stampa_icon_shortcode' ) );
		add_shortcode( 'titulo', array( $this, 'stampa_icon_title_shortcode' ) );
		add_shortcode( 'contenido-parallax', array( $this, 'contenido_parallax' ) );
	}
	public function add_tinymce_button() {
		global $typenow;
	    // check permisos
	    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
	    	return;
	    }
	    // check si editor está activo
	    if ( get_user_option('rich_editing') == 'true') {
	        add_filter("mce_external_plugins", array( $this, 'add_tinymce_plugin' ) );
	        //añadimos los iconos a la tercera fila de iconos
	        add_filter('mce_buttons_3', array( $this, 'register_button' ) );
	    }
	}
	public function custom_button_css() {
    	wp_enqueue_style( 'custom-button-admin', THEME_CSS.'/custom-button.css' );
	}
	public function add_tinymce_plugin($plugin_array) {
		$plugin_array['custom_button_ead'] = THEME_JS.'/custom-button.js';
		$plugin_array['custom_button_parallax_content'] = THEME_JS.'/custom-button-parallax.js';
		return $plugin_array;
	}
	function register_button($buttons) {
		array_push($buttons, 'custom_button_ead' );
		array_push($buttons, 'custom_button_parallax_content' );
			return $buttons;
	}
	public function stampa_icon_shortcode( $atts ) {
	    $a = shortcode_atts( array(
	        'icono' => 'icn-stampa'
	    ), $atts );
	    $out = '<i class="icn '.$a['icono'].'"></i> ';
	    return $out;
	}
	public function stampa_icon_title_shortcode( $atts, $content = null ) {
	    $a = shortcode_atts( array(
	        'icono' => 'icn-stampa',
	        'h' => 'h3'
	    ), $atts );
	    $out = '<'.$a['h'].'><i class="icn '.$a['icono'].'"></i> '.$content.' </'.$a['h'].'>';
	    return $out;
	}
	public function contenido_parallax( $atts, $content = null) {
		$out = '<div class="fondo-blanco">';
			$out .= '<div class="pag">';
				$out .= $content;
			$out .= '</div>';
		$out .= '</div>';
		return $out;
	}
}

$custom_buttons = CustomButtons::get_instance();