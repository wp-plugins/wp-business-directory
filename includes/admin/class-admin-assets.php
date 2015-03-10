<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'BDPAdmin_Assets' ) ) :

class BDPAdmin_Assets {

	public function __construct() {
		add_action( 'init', array( $this, 'admin_scripts' ) );
		add_action( 'init', array( $this, 'load_scripts_frontend' ) );
                add_action('the_posts',  array($this,'check_for_shortcode'));
	}

	 // Enqueue scripts
	public function admin_scripts() {		 
         if (isset($_GET['page'])) { 
			
            if ($_GET['page'] == "wpbdp-listing" || $_GET['page'] == "wpbdp-dashboard" || $_GET['page'] == "wpbdp-add-new-listing" || $_GET['page'] == "wpbdp-category" || $_GET['page'] == "wpbdp-listing" ||$_GET['page'] == "wpbdp-edit-listing" ||$_GET['page'] == "wpbdp-settings") {  
				
			   wp_enqueue_script('jquery');
				
                wp_enqueue_script('wpbussinessdir',WPBDP_PLUGIN_URL."assets/js/wp_bussiness_dir.js" );
                wp_enqueue_script('wpbussinessdir');
				
                wp_enqueue_style('wpdbbootstrapcss',WPBDP_PLUGIN_URL."assets/css/bootstrap.min.css" );
                wp_enqueue_style('wpdbbootstrapcss');     


                wp_enqueue_style('wpdbbootstrapcss',WPBDP_PLUGIN_URL."assets/css/bootstrap.min.css" );
                wp_enqueue_style('wpdbbootstrapcss');     

                wp_enqueue_style('admincss',WPBDP_PLUGIN_URL."assets/css/wp-business-directroy-admin.css" );
                wp_enqueue_style('admincss');    

                             //<!-- DataTables CSS -->
                wp_enqueue_style('tableadmincss',WPBDP_PLUGIN_URL."assets/css/dataTables.bootstrap.css" );
                wp_enqueue_style('tableadmincss'); 
               

                wp_enqueue_script('wpdbbootstrapjs',WPBDP_PLUGIN_URL."assets/js/bootstrap.min.js" );
                wp_enqueue_script('wpdbbootstrapjs');
            }
		   // <!-- DataTables JavaScript -->
         if ($_GET['page'] =="wpbdp-listing" || $_GET['page'] =="wpbdp-comments"){
                wp_enqueue_script('dataTables',WPBDP_PLUGIN_URL."assets/js/dataTables/jquery.dataTables.js" );
                wp_enqueue_script('dataTables');      

                wp_enqueue_script('custom',WPBDP_PLUGIN_URL."assets/js/custom.js" );
                wp_enqueue_script('custom');

				wp_enqueue_style('wpdbbootstrapcss',WPBDP_PLUGIN_URL."assets/css/bootstrap.min.css" );
                wp_enqueue_style('wpdbbootstrapcss');  

                wp_enqueue_script('jqdataTables',WPBDP_PLUGIN_URL."assets/js/dataTables/dataTables.bootstrap.js" );
                wp_enqueue_script('jqdataTables');
        }
          if ($_GET['page'] =="wpbdp-add-new-listing" ||$_GET['page'] == "wpbdp-edit-listing"){ 
                wp_enqueue_style('socialbuttons',WPBDP_PLUGIN_URL."assets/plugins/social-buttons.css" );
                wp_enqueue_style('socialbuttons');

                wp_enqueue_style('sadmin',WPBDP_PLUGIN_URL."assets/css/sb-admin-2.css" );
                wp_enqueue_style('sadmin');  
                
                wp_enqueue_script('ljqueryvalidate',WPBDP_PLUGIN_URL."assets/js/jquery.validate.min.js" );
                wp_enqueue_script('ljqueryvalidate');
                
                wp_enqueue_script('ljqueryvalidateadditionalmethods',WPBDP_PLUGIN_URL."assets/js/additional-methods.min.js" );
                wp_enqueue_script('ljqueryvalidateadditionalmethods');

              
          }
                wp_enqueue_style('fontawesome',WPBDP_PLUGIN_URL."assets/font-awesome-4.1.0/css/font-awesome.min.css" );
                wp_enqueue_style('fontawesome');
              
           if ($_GET['page'] =="wpbdp-dashboard"){
                //<!-- Morris Charts CSS -->
               wp_enqueue_style('wpmorris',WPBDP_PLUGIN_URL."assets/plugins/morris.css" );
               wp_enqueue_style('wpmorris'); 
               
               wp_enqueue_script('wpraphael',WPBDP_PLUGIN_URL."assets/plugins/morris/raphael.min.js");
               wp_enqueue_script('wpraphael');
               
               wp_enqueue_script('morrismorris',WPBDP_PLUGIN_URL."assets/plugins/morris/morris.min.js");
               wp_enqueue_script('morrismorris');
               
             
           }
            wp_enqueue_style('socialbuttons',WPBDP_PLUGIN_URL."assets/plugins/social-buttons.css" );
                wp_enqueue_style('socialbuttons');
                
                wp_enqueue_style('sadmin',WPBDP_PLUGIN_URL."assets/css/sb-admin-2.css" );
                wp_enqueue_style('sadmin');  
         }else{           
          

            }
	}

public function load_scripts_frontend() {
   
}

function check_for_shortcode($posts) {
    
    if ( empty($posts) )
        return $posts;

    // false because we have to search through the posts first
    
      $found = false;
    foreach ($posts as $post) {
        // check the post content for the short code
        if ( stripos($post->post_content, 'wp_business_directory') 
                || stripos($post->post_content, 'wp_business_directory_login') 
                || stripos($post->post_content, 'wp_business_directory_categories')
                || stripos($post->post_content, 'wp_business_directory_search')
                || stripos($post->post_content, 'wp_business_directory_submit_listing'))
        {
                       $found = true;
         }
            // stop the search
            break;
        }

     if ($found){
         
			    wp_enqueue_script('jquery');

 			    wp_enqueue_script('wpbussinessdir',WPBDP_PLUGIN_URL."assets/js/wp_bussiness_dir.js" );
                wp_enqueue_script('wpbussinessdir');
              

                wp_enqueue_style('wpdbbootstrapcss',WPBDP_PLUGIN_URL."assets/css/bootstrap.min.css" );
                wp_enqueue_style('wpdbbootstrapcss');     

                wp_enqueue_style('admincss',WPBDP_PLUGIN_URL."assets/css/wp-business-directroy-admin.css" );
                wp_enqueue_style('admincss');    

                             //<!-- DataTables CSS -->
                wp_enqueue_style('tableadmincss',WPBDP_PLUGIN_URL."assets/css/dataTables.bootstrap.css" );
                wp_enqueue_style('tableadmincss'); 

                wp_enqueue_script('wpdbbootstrapjs',WPBDP_PLUGIN_URL."assets/js/bootstrap.min.js" );
                wp_enqueue_script('wpdbbootstrapjs');

                wp_enqueue_script('dataTables',WPBDP_PLUGIN_URL."assets/js/dataTables/jquery.dataTables.js" );
                wp_enqueue_script('dataTables');      

                wp_enqueue_script('frontcustom',WPBDP_PLUGIN_URL."assets/js/front_end_custom.js" );
                wp_enqueue_script('frontcustom');

                wp_enqueue_script('jqdataTables',WPBDP_PLUGIN_URL."assets/js/dataTables/dataTables.bootstrap.js" );
                wp_enqueue_script('jqdataTables');
                
                wp_enqueue_style('prettyPhotocss',WPBDP_PLUGIN_URL."assets/css/prettyPhoto.css" );
                wp_enqueue_style('prettyPhotocss'); 

                wp_enqueue_script('prettyPhoto',WPBDP_PLUGIN_URL."assets/js/jquery.prettyPhoto.js" );
                wp_enqueue_script('prettyPhoto');
                
                wp_enqueue_script('ljqueryvalidate',WPBDP_PLUGIN_URL."assets/js/jquery.validate.min.js" );
                wp_enqueue_script('ljqueryvalidate');
                
                wp_enqueue_script('ljqueryvalidateadditionalmethods',WPBDP_PLUGIN_URL."assets/js/additional-methods.min.js" );
                wp_enqueue_script('ljqueryvalidateadditionalmethods');
                
                 wp_enqueue_style('socialbuttons',WPBDP_PLUGIN_URL."assets/plugins/social-buttons.css" );
                wp_enqueue_style('socialbuttons');
                
                wp_enqueue_style('sadmin',WPBDP_PLUGIN_URL."assets/css/sb-admin-2.css" );
                wp_enqueue_style('sadmin');  
    }
    return $posts;
}
// perform the check when the_posts() function is called
	

}

endif;

$obj= new BDPAdmin_Assets();