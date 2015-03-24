<?php
// Creating the widget 
class wpbdpwidgetsearch extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'wpbdpwidgetsearch', 

// Widget name will appear in UI
__('WPB Directroy-Search', 'wp-business-directroy-plugin'), 

// Widget description
array( 'description' => __( 'Search business listing', 'wp-business-directroy-plugin' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
global $wpdb;
$page_id=$post_page_title_ID->ID;
// This is where you run the code and display the output
$html_content="
    <form action='".get_page_link(get_option('wp_business_directory_page'))."' method='get'>
    <input type='hidden' name='page_id' value='".$page_id."'/>
    <input type='What' name='what' placeholder='what'></br></br>
    <input type='where' name='where' placeholder='Where'></br></br>
    <input type='submit' name='search' value='Search'> 
    </form>";
       
echo $html_content;
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Search Listing ', 'wp-business-directroy-plugin' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpbdpwidget ends here


// Creating the widget 
class wpbdpwidgetcategory extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'wpbdpwidgetcategory', 

// Widget name will appear in UI
__('WPB Directroy-Categories', 'wp-business-directroy-plugin'), 

// Widget description
array( 'description' => __( 'Business listing categories', 'wp-business-directroy-plugin' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
 if(isset($_GET['page_id'])){        
        $permalinkcat='&cid=';
        
    }else{      
        $permalinkcat='?cid=';
    }
$wpblp_categories_sort="";
		if(get_option('wpblp_categories_sort')=="ASC"){
			$wpblp_categories_sort="ORDER BY category_name ASC";
		}elseif(get_option('wpblp_categories_sort')=="DESC"){
			$wpblp_categories_sort="ORDER BY category_name DESC";
		}
	 
		global $wpdb;
		$clistings = $wpdb->get_results("SELECT lc.category_name,lc.cid,count(c.cid) as lcat_count FROM  {$wpdb->prefix}wpbdp_listing as l , {$wpdb->prefix}wpbdp_listing_categories as c,{$wpdb->prefix}wpbdp_categories as lc WHERE c.cid=lc.cid AND l.is_active=1 AND l.status='Publish' AND l.id=c.listing_id group BY c.cid $wpblp_categories_sort");       
		
		$return='<div><ul>';
		foreach ($clistings as $clisting){
			
			if( get_option('wpblp_show_category_post_count')==1){
			$return.='<li><a href="'.get_page_link(get_option("wp_business_directory_page")).$permalinkcat.$clisting->cid.'">'.$clisting->category_name.'('.$clisting->lcat_count.')</a></li>';      
		  }else{
			$return.='<li><a href="'.get_page_link(get_option("wp_business_directory_page")).$permalinkcat.$clisting->cid.'">'.$clisting->category_name.'</a></li>';      
		  }
		}
                $return.='</ul></div>';
// This is where you run the code and display the output
$html_content=$return;
   
echo $html_content;
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Listing Categories', 'wp-business-directroy-plugin' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpbdpwidget ends here



// Creating the widget 
class wpbdpwidgetcategorydropdown extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'wpbdpwidgetcategorydropdown', 

// Widget name will appear in UI
__('WPB Directroy- Dropdown Categories', 'wp-business-directroy-plugin'), 

// Widget description
array( 'description' => __( 'A list or dropdown of business categories. ', 'wp-business-directroy-plugin' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
 
$wpblp_categories_sort_dp="";
		if(get_option('wpblp_categories_sort')=="ASC"){
			$wpblp_categories_sort_dp="ORDER BY category_name ASC";
		}elseif(get_option('wpblp_categories_sort')=="DESC"){
			$wpblp_categories_sort_dp="ORDER BY category_name DESC";
		}
	 
		global $wpdb;
		$clistings_dp = $wpdb->get_results("SELECT lc.category_name,lc.cid,count(c.cid) as lcat_count FROM  {$wpdb->prefix}wpbdp_listing as l , {$wpdb->prefix}wpbdp_listing_categories as c,{$wpdb->prefix}wpbdp_categories as lc WHERE c.cid=lc.cid AND l.is_active=1 AND l.status='Publish' AND l.id=c.listing_id group BY c.cid $wpblp_categories_sort_dp");       
		$return_dp="<div><form action='".get_page_link(get_option('wp_business_directory_page'))."' method='get'>";
		$return_dp.='<select style="width:100%;color:black;" name="cid">';
                $return_dp.='<option selected value="all">All</option>';      
		foreach ($clistings_dp as $clisting_dp){			
			$return_dp.='<option value="'.$clisting_dp->cid.'">'.$clisting_dp->category_name.'</option>';      
		  
		}
                 $return_dp.="</select><br><br>
                     <input type='submit' name='quicksearch' value='Search'> 
    </form></div>";
// This is where you run the code and display the output
$html_content_dp=$return_dp;
   
echo $html_content_dp;
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Listing Categories', 'wp-business-directroy-plugin' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpbdpwidget ends here


// Register and load the widget
function wpbdpwidget_search() {
	register_widget( 'wpbdpwidgetsearch' );       
}
function wpbdpload_widget_category() {	
        register_widget( 'wpbdpwidgetcategory' );
}
function wpbdpload_widget_category_dropdown() {	
        register_widget( 'wpbdpwidgetcategorydropdown' );
}

add_action( 'widgets_init', 'wpbdpwidget_search' );
add_action( 'widgets_init', 'wpbdpload_widget_category' );
add_action( 'widgets_init', 'wpbdpload_widget_category_dropdown' );
