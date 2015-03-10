<?php
// Creating the widget 
class wpbdpwidget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'wpbdpwidget', 

// Widget name will appear in UI
__('Business Directroy-Search Widget', 'wp-business-directroy-plugin'), 

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
$html_content="<div class='row'>
    <form action='' method='get'>
    <input type='hidden' name='page_id' value='$page_id'/>
    <div class='col-xs-12'><input type='What' name='what' placeholder='what'></div></br></br>
    <div class='col-xs-12'><input type='where' name='where' placeholder='Where'></div></br></br>
    <div class='col-xs-12'><input type='submit' name='search' value='Search'></div>    
    </form>
</div>";
       
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
'wpbdpwidget_categories', 

// Widget name will appear in UI
__('Business Directroy-Categories Widget', 'wp-business-directroy-plugin'), 

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

// This is where you run the code and display the output
$html_content="home";
       
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

// Register and load the widget
function wpbdpload_widget() {
	register_widget( 'wpbdpwidget' );       
}
function wpbdpload_widget_category() {	
        register_widget( 'wpbdpwidgetcategory' );
}
add_action( 'widgets_init', 'wpbdpload_widget' );
add_action( 'widgets_init', 'wpbdpload_widget_category' );