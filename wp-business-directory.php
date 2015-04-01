<?php
/* Plugin Name: WP Business Directory
Plugin URI: http://sahyadriwebsolution.com/wpbusinessdirectoryplugin/
Description: Build local directories, business listings, Yellow-Pages directories and much more!
Author: Sahyadri Web Solution
Author URI: http://sahyadriwebsolution.com/wpbusinessdirectoryplugin/
Version: 1.0.5
Text Domain: wp-business-directory-plugin
Domain Path: /lang
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

 if ( ! class_exists( 'WPBusinessListing' ) ) :
final class WPBusinessListing {
	
	public $version = '1.0.0';
	public $wpbdp_prefix="wpbdp";
	
	protected static $_instance = null;

	public $query = null;

		public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __clone() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), '1.0' );
	}

	public function __construct() {	
		
		// Define constants
		$this->define_constants();
                register_activation_hook( __FILE__, array($this,'installation') );
                register_activation_hook( __FILE__, array($this,'my_plugin_install_function'));
		add_action( 'plugins_loaded', array($this,'load_textdomain') );	
		$this->installation();
		// Include required files		
		$this->includes();


		
	}
	function my_plugin_install_function()
            {
             //post status and options
              $post = array(
                    'comment_status' => 'closed',
                    'ping_status' =>  'closed' ,
                    'post_author' => 1,
                    'post_date' => date('Y-m-d H:i:s'),
                    'post_name' => 'Business Directory',
                    'post_status' => 'publish' ,
                    'post_title' => 'Business Directory',
                             'post_content' => '[wp_business_directory]',
                    'post_type' => 'page',
              );  
              //insert page and save the id
              $newvalue = wp_insert_post( $post, false );
              //save the id in the database
              update_option( 'wp_business_directory_page', $newvalue );
            }
            
	private function define_constants() {
		define( 'WPBDP_PLUGIN_FILE', __FILE__ );
	        define( 'WPBDP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );    	
		define( 'WPBDP_VERSION', $this->version );
		define( 'WPBDP_PREFIX', $this->wpbdp_prefix );
		}
		
	 function includes() {
	             include_once( 'includes/admin/class-admin-assets.php' );
		     include_once( 'includes/admin/class-admin-settings.php' );  	
                     include_once( 'includes/front_end/shortcode.php' );  	
		     include_once( 'includes/front_end/widget.php' ); 
				 

	}  

	function installation(){
		include('includes/admin/installation.php');
	}

	function load_textdomain(){
		load_plugin_textdomain( 'wp-business-directory-plugin',plugin_dir_path( __FILE__ ).'/lang' , 'wp-business-directroy/lang' );
	}
}
endif;
function WPBusinessListingBD() {
	return WPBusinessListing::instance();
}
$GLOBALS['WPBusinessListingBDplugin'] = WPBusinessListingBD();?>