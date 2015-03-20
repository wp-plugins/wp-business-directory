<?php 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



class WPBDirectory {


       public function __construct() {
		
		add_action('init', array('WPBDirectory', 'init'));
		

		
	}
    static function version () {
        return VERSION;
    }

    static function init() {   
      
      	        add_action( 'admin_menu', array('WPBDirectory', 'adminPage') );
      
        
}
   
    static function adminPage() {
      
        add_menu_page('WPB Directory', 'WPB Directory', 'update_plugins', 'wpbdp-dashboard', array('WPBDirectory','renderAdminPage'),WPBDP_PLUGIN_URL.'/assets/images/wp-icon.png' );
		
		add_submenu_page( 'wpbdp-dashboard', 'Listing', 'Listing', 'manage_options', 'wpbdp-listing', array('WPBDirectory','listing'));
		add_submenu_page( 'wpbdp-dashboard', 'Add New Listing', 'Add New Listing', 'manage_options', 'wpbdp-add-new-listing', array('WPBDirectory','new_listing') );
		add_submenu_page( 'wpbdp-dashboard', 'Categories', 'Categories', 'manage_options', 'wpbdp-category', array('WPBDirectory','categories'));
                add_submenu_page( 'wpbdp-dashboard', 'Comments', 'Comments', 'manage_options', 'wpbdp-comments', array('WPBDirectory','comments'));
		add_submenu_page( 'wpbdp-dashboard', 'Settings', 'Settings', 'manage_options', 'wpbdp-settings', array('WPBDirectory','settings'));
                add_submenu_page( 'null', 'Settings', 'Settings', 'manage_options', 'wpbdp-edit-listing', array('WPBDirectory','editlisting'));
    }

   


   static function renderAdminPage() {
      
       include( 'views/html-admin-views.php' );
     
    } 
	
	 static function editlisting() {     
         include( 'modules/edit_listing_module.php' );
         include( 'views/edit_listing_view.php' );
     
    } 
    static function listing() {
      
       include( 'views/listing-views.php' );
     
    } 

	 static function categories() {
include( 'modules/new_category-modules.php' );
       include( 'views/categories-views.php' );
     
    }
    
	 static function comments() {	  
       include( 'modules/comment-modules.php' );
       include( 'views/comment-views.php' );
     
    }

	 static function new_listing() {
       include( 'modules/new_listing-modules.php' );
       include( 'views/new_listing-views.php' );
     
    }

	 static function settings() {
      
       include( 'modules/settings_module.php' );
       include( 'views/settings-views.php' );
     
    }

} // end WPBDirectory



$WPBDirectory= new WPBDirectory();?>