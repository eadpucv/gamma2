<?php
	/**
	* Functions: lista de funciones del theme giornata de la e[ad]
	* Funciones nuevas para el sitio
	* giornata 2015
	* @version 2.0
	* @package giornata
	*/
use GutenPress\Forms;
use GutenPress\Forms\Element;
use GutenPress\Validate;
use GutenPress\Validate\Validations;
use GutenPress\Model;
/* Theme Constants (to speed up some common things) ------*/
define('HOME_URI', get_bloginfo( 'url' ));
define('PRE_HOME_URI',get_bloginfo('url').'/wp-content/themes');
define('SITE_NAME', get_bloginfo( 'name' ));
define('THEME_URI', get_template_directory_uri());
define('THEME_IMG', THEME_URI . '/img');
define('THEME_CSS', THEME_URI . '/css');
define('THEME_FONTS', THEME_URI . '/fonts');
define('PRE_THEME_JS', PRE_HOME_URI . '/js');
define('THEME_JS', THEME_URI. '/js');
define('MULTILINGUAL', function_exists( 'qtrans_use' ));
/*
	calling related files
*/

	//include TEMPLATEPATH . '/inc/widgets.php';
	//include TEMPLATEPATH . '/inc/taxonomies.php';
	//include TEMPLATEPATH . '/inc/helpers.php';
	// include TEMPLATEPATH . '/inc/modules.php';
	//include TEMPLATEPATH . '/inc/metaboxes.php';
	// include TEMPLATEPATH . '/inc/walkers.php';
	// include TEMPLATEPATH . '/inc/modules-helpers.php';
	// include TEMPLATEPATH . '/inc/mail-share.php';
	//include TEMPLATEPATH . '/inc/shortcodes.php';
	// include TEMPLATEPATH . '/inc/ajax-tabs.php';
/**
 * Images
 * ------
 * */
// Add theme suppor for post thumbnails
add_theme_support( 'post-thumbnails' );
// Define the default post thumbnail size

// set_post_thumbnail_size( 200, 130, true );

// Define custom thumbnail sizes
// add_image_size( $name, $width, $height, $crop );
add_image_size('squared', 300, 300, true);



$mandatory_sidebars = array(
	'Entrada' => 'single-right',
	'Home' => 'sidebar-home'
);
foreach ( $mandatory_sidebars as $sidebar => $id_sidebar ) {
	register_sidebar( array(
		'name'          => $sidebar,
		'id'			=> $id_sidebar,
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget'  => '</section>',
		'before_title'  => '<header class="widget-header"><h3 class="widget-title">',
		'after_title'   => '</h3></header>'
	) );
}

/**
 * Theme specific stuff
 * --------------------
 * */

/**
 * Theme singleton class
 * ---------------------
 * Stores various theme and site specific info and groups custom methods
 **/
class site {
	private static $instance;

	protected $settings;

	const id = __CLASS__;
	const theme_ver = '20140624';
	const theme_settings_permissions = 'edit_theme_options';
	private function __construct(){
		/**
		 * Get our custom theme options so we can easily access them
		 * on templates or other admin pages
		 * */
		// $this->settings = get_option( __CLASS__ .'_theme_settings' );

		$this->actions_manager();

	}
	public function __get($key){
		return isset($this->$key) ? $this->$key : null;
	}
	public function __isset($key){
		return isset($this->$key);
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
	/**
	 * Setup theme actions, both in the front and back end
	 * */
	public function actions_manager(){
		if ( is_admin() ) {
			//
		} else {
			//add_filter('wp_title', array($this, 'original_title'), 1, 1);
			//add_filter('wp_title', array($this, 'wp_title'), 99, 3);
			//add_filter('wpseo_canonical', array($this, 'canonical'), 99, 1);
			//add_filter('request', array($this, 'filter_request'));
		}
		add_action( 'after_setup_theme', array($this, 'setup_theme') );
		add_action( 'wp_enqueue_scripts', array($this, 'enqueue_styles') );
		add_action( 'wp_enqueue_scripts', array($this, 'enqueue_scripts') );
		add_action( 'admin_enqueue_scripts', array($this, 'enqueue_scripts') );
		add_action( 'admin_enqueue_scripts', array($this, 'admin_enqueue_scripts') );
		add_action('init', array($this, 'init_functions') );
		add_action('init', array($this,'register_menus_locations') );

	}
	public function init_functions() {
		add_post_type_support( 'page', 'excerpt' );
	}
	public function filter_request( $request ){
		$q = new WP_Query;
		$q->parse_query( $request );
		if ( $q->is_post_type_archive('person') || $q->is_tax('people_tax') ) {
			$request['orderby'] = 'title';
			$request['order']   = 'ASC';
		} elseif ( $q->is_post_type_archive('wufoo_diploma') || $q->is_post_type_archive('wufoo_course') || $q->is_post_type_archive('wufoo_seminar') )	{
			$request['posts_per_page'] = -1;
		} elseif ( $q->is_post_type_archive('faq') ) {
			$request['posts_per_page'] = -1;
		} elseif ( $q->is_category() ) {
			$request['posts_per_page'] = 6;
		}
		return $request;
	}
	/**
	 * habilitar funcionalidades del tema
	 * @return void
	 */
	public function setup_theme(){
		// habilitar post formats
		add_theme_support('post-formats', array('gallery', 'image', 'video', 'audio'));
		add_theme_support('post-thumbnails');
		add_theme_support('automatic_feed_links');
		add_theme_support('menus');
	}

	public function register_menus_locations(){
		register_nav_menus(array(
			'principal' => 'Menú Principal'
		));
	}

	public function get_post_thumbnail_url( $postid = null, $size = 'landscape-medium' ){
		if ( is_null($postid) ){
			global $post;
			$postid = $post->ID;
		}
		$thumb_id = get_post_thumbnail_id( $postid );
		$img_src  = wp_get_attachment_image_src( $thumb_id, $size );
		return $img_src ? current( $img_src ) : '';
	}

	public function enqueue_styles(){
		// Front-end styles
		wp_enqueue_style( 'ead_style', get_stylesheet_uri() );
		wp_enqueue_style( 'dashicons' );
	}

	function admin_enqueue_scripts(){

		// admin scripts
		 global $pagenow;
		// wp_enqueue_script( 'theme_admin_scripts', THEME_JS .'/admin_scripts.js', array('jquery'), true );
		 if ( is_admin() && (($pagenow == 'index.php' ) || ($pagenow == 'admin.php')) ) {
		 	if ($_GET['page'] == 'ead-site-settings')
		 		wp_enqueue_media();
		 	//wp_enqueue_script( 'script-admin', THEME_JS . '/admin_scripts.js', array('jquery'), THEME_VERSION );
		 }
		 if ( is_admin() && ($pagenow == 'widgets.php' ) ) {
		 	//wp_enqueue_media();
		 	//wp_enqueue_script( 'script-admin', THEME_JS . '/admin_scripts.js', array('jquery'), THEME_VERSION );
		 }
		// if ($pagenow == 'nav-menus.php' || $pagenow == 'edit-tags.php') {
		// 	wp_enqueue_media();
		// }
	}

	function enqueue_scripts(){
		// front-end scripts
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'collapse', THEME_JS .'/collapse.js', array('jquery'), self::theme_ver, '' );
		wp_enqueue_script( 'carousel', THEME_JS .'/carousel.js', array('jquery'), self::theme_ver, '' );
		wp_enqueue_script( 'transition', THEME_JS .'/transition.js', array('jquery'), self::theme_ver, '' );
		wp_enqueue_script( 'modal', THEME_JS .'/modal.js', array('jquery'), self::theme_ver, '' );
		wp_enqueue_script( 'tooltip', THEME_JS .'/tooltip.js', array('jquery'), self::theme_ver, '' );
		wp_enqueue_script( 'popover', THEME_JS .'/popover.js', array('jquery'), self::theme_ver, '' );
		wp_enqueue_script( 'affix', THEME_JS .'/affix.js', array('jquery'), self::theme_ver, '' );
		wp_enqueue_script( 'scrollspy', THEME_JS .'/scrollspy.js', array('jquery'), self::theme_ver, '' );
		wp_enqueue_script( 'dropdown', THEME_JS .'/dropdown.js', array('jquery'), self::theme_ver, '' );
		wp_enqueue_script( 'nav', THEME_JS .'/nav.js', array('jquery'), self::theme_ver, '' );
		wp_enqueue_script( 'smooth-scroll', THEME_JS .'/smooth-scroll.js', array('jquery'), self::theme_ver, '' );
		wp_enqueue_script( 'tab', THEME_JS .'/tab.js', array('jquery'), self::theme_ver, '' );
		wp_enqueue_script( 'jquery.sticky', THEME_JS .'/jquery.sticky.js', array('jquery'), self::theme_ver, '' );
		wp_enqueue_script( 'jquery.parallax-1.1.3', THEME_JS .'/jquery.parallax-1.1.3.js', array('jquery'), self::theme_ver, '' );
		wp_enqueue_script( 'jquery.localScroll', THEME_JS .'/jquery.localScroll.js', array('jquery'), self::theme_ver, '' );
		wp_enqueue_script( 'giornata_script', THEME_JS .'/script.js', array('jquery'), self::theme_ver, '' );

		//attach data to script.js
		$ajax_data = array(
			'url' => admin_url( 'admin-ajax.php' )
		);
		wp_localize_script( 'giornata_script', 'Ajax', $ajax_data );
	}
}

/**
 * Instantiate the class object
 * You can access its methods or variables by globalizing $wpbp or
 * using the get_instance() method (it's a singleton class, so it won't
 * create a new instance)
 * */

$_s = site::get_instance();


class ThemeSettings{
	private $flash;
	public $settings;
	public function __construct(){
		$this->init();
		$this->flash = array(
			'updated' => __('Configuraciones del sitio guardadas', 'ead'),
			'error'   => __('Hubo un problema guardando las opciones del sitio', 'ead')
		);
		$this->settings = get_option( 'site_theme_settings');
	}
	public function init(){
		add_action('admin_menu', array($this, 'addAdminMenu'));
		add_action('admin_init', array($this, 'saveSettings'));
	}
	public function addAdminMenu(){
		add_submenu_page( 'index.php' , _x('Configuraciones', 'site settings title', 'ead'), _x('Configuraciones', 'site settings menu', 'ead'), 'edit_theme_options', 'ead-site-settings', array($this, 'adminMenuScreen'));
	}
	public function adminMenuScreen(){
		echo '<div class="wrap">';
			screen_icon('index');
			echo '<h2>'. _x('Configuraciones', 'site settings title', 'ead') .'</h2>';
			if ( ! empty($_GET['msg']) && isset($this->flash[ $_GET['msg'] ]) ) :
				echo '<div class="updated">';
					echo '<p>'. $this->flash[ $_GET['msg'] ] .'</p>';
				echo '</div>';
			endif;
			$data = get_option( 'site_theme_settings' );
			$form = new Forms\Form('site-settings');
			$form->addElement( new Element\InputUrl(
				_x('Facebook page URL', 'site settings fields', 'ead'),
				'facebook_url',
				array(
					'value' => isset($data['facebook_url']) ? $data['facebook_url'] : ''
				)
			) )->addElement( new Element\InputText(
				_x('Twitter username', 'site settings fields', 'ead'),
				'twitter_username',
				array(
					'value' => isset($data['twitter_username']) ? $data['twitter_username'] : ''
				)
			) );

			$form->addElement( new Element\WPImage(
				_x('Imagen Principal', 'site settings fields', 'ead'),
				'home_image',
				array(
					'value' => isset($data['home_image']) ? $data['home_image'] : '',
					'description' => _x('Imagen de la portada', 'ead')
				)
			) )->addElement( new Element\InputText(
				_x('Desfase vertical', 'site settings fields', 'ead'),
				'home_image_offset',
				array(
					'value' => isset($data['home_image_offset']) ? $data['home_image_offset'] : ''
				)
			) )->addElement( new Element\InputText(
				_x('Frase portada', 'site settings fields', 'ead'),
				'home_phrase',
				array(
					'value' => isset($data['home_phrase']) ? $data['home_phrase'] : '',
				)
			) )->addElement( new Element\InputText(
				_x('Frase Empresa', 'site settings fields', 'ead'),
				'home_phrase_2',
				array(
					'value' => isset($data['home_phrase_2']) ? $data['home_phrase_2'] : '',
				)
			) )->addElement( new Element\DivContent(
				'<h3>Configuraciones de contenido de la pagina principal</h3>'
				) )->addElement( new Element\DivContent(
				'<h4>Primer elemento</h4>'
				) )->addElement( new Element\WPImage(
				_x('Imagen', 'site settings fields', 'ead'),
				'home_e1',
				array(
					'value' => isset($data['home_e1']) ? $data['home_e1'] : '',
					'description' => _x('Primer elemento arriba a la izquierda','site settings fields', 'ead')
				)
			) )->addElement( new Element\InputText(
				_x('Título', 'site settings fields', 'ead'),
				'home_e1_title',
				array(
					'value' => isset($data['home_e1_title']) ? $data['home_e1_title'] : '',
				)
			) )->addElement( new Element\InputText(
				_x('Enlace', 'site settings fields', 'ead'),
				'home_e1_url',
				array(
					'value' => isset($data['home_e1_url']) ? $data['home_e1_url'] : '',
				)
			) )->addElement( new Element\Textarea(
				_x('Bajada 1', 'site settings fields', 'ead'),
				'home_e1_summary',
				array(
					'class' => 'large-text',
					'value' => isset($data['home_e1_summary']) ? $data['home_e1_summary'] : ''
				)
			))->addElement( new Element\DivContent(
				'<h4>Segundo elemento</h4>'
				) )->addElement( new Element\WPImage(
				_x('Imagen', 'site settings fields', 'ead'),
				'home_e2',
				array(
					'value' => isset($data['home_e2']) ? $data['home_e2'] : '',
					'description' => _x('Primer elemento arriba a la izquierda','site settings fields', 'ead')
				)
			) )->addElement( new Element\InputText(
				_x('Título', 'site settings fields', 'ead'),
				'home_e2_title',
				array(
					'value' => isset($data['home_e2_title']) ? $data['home_e2_title'] : '',
				)
			) )->addElement( new Element\InputText(
				_x('Enlace', 'site settings fields', 'ead'),
				'home_e2_url',
				array(
					'value' => isset($data['home_e2_url']) ? $data['home_e2_url'] : '',
				)
			) )->addElement( new Element\Textarea(
				_x('Bajada 2', 'site settings fields', 'ead'),
				'home_e2_summary',
				array(
					'class' => 'large-text',
					'value' => isset($data['home_e2_summary']) ? $data['home_e2_summary'] : ''
				)
			))->addElement( new Element\DivContent(
				'<h4>Tercer elemento</h4>'
				) )->addElement( new Element\WPImage(
				_x('Imagen', 'site settings fields', 'ead'),
				'home_e3',
				array(
					'value' => isset($data['home_e3']) ? $data['home_e3'] : '',
					'description' => _x('Primer elemento arriba a la izquierda','site settings fields', 'ead')
				)
			) )->addElement( new Element\InputText(
				_x('Título', 'site settings fields', 'ead'),
				'home_e3_title',
				array(
					'value' => isset($data['home_e3_title']) ? $data['home_e3_title'] : '',
				)
			) )->addElement( new Element\InputText(
				_x('Enlace', 'site settings fields', 'ead'),
				'home_e3_url',
				array(
					'value' => isset($data['home_e3_url']) ? $data['home_e3_url'] : '',
				)
			) )->addElement( new Element\Textarea(
				_x('Bajada 3', 'site settings fields', 'ead'),
				'home_e3_summary',
				array(
					'class' => 'large-text',
					'value' => isset($data['home_e3_summary']) ? $data['home_e3_summary'] : ''
				)
			));

			/*
			Fin opciones newsletter
			*/
			$form->addElement( new Element\InputSubmit(
				_x('Guardar', 'site settings fields', 'ead')
			) )->addElement( new Element\WPNonce(
				'update_site_settings',
				'_site_settings_nonce'
			) )->addElement( new Element\InputHidden(
				'action',
				'update_site_settings'
			) );
			echo '<h3>'._x('Home settings', 'site settings fields', 'ead').'</h3>';
			echo $form;
		echo '</div>';
	}


	public function saveSettings(){
		if ( empty($_POST['action']) )
			return;
		if ( $_POST['action'] !== 'update_site_settings' )
			return;
		if ( ! wp_verify_nonce( $_POST['_site_settings_nonce'], 'update_site_settings' ) )
			wp_die( _x("You are not supposed to do that", 'site settings error', 'ead') );
		if ( ! current_user_can( 'edit_theme_options' ) )
			wp_die( _x("You are not allowed to edit this options", 'site settings error', 'ead') );
		$fields = array(
			'facebook_url',
			'twitter_username',
			'home_phrase',
			'home_phrase_2',
			'home_image',
			'home_image_offset',

			'home_e1',
			'home_e1_title',
			'home_e1_url',
			'home_e1_summary',

			'home_e2',
			'home_e2_title',
			'home_e2_url',
			'home_e2_summary',

			'home_e3',
			'home_e3_title',
			'home_e3_url',
			'home_e3_summary',
		);
		$raw_post = stripslashes_deep( $_POST );
		$data = array_intersect_key($raw_post, array_combine($fields, $fields) );
		update_option( 'site_theme_settings' , $data );
		wp_redirect( admin_url('admin.php?page=ead-site-settings&msg=updated', 303) );
		exit;
	}
}
$_set = new ThemeSettings;