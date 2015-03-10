<?php

add_shortcode( 'wp_business_directory', 'wp_business_directory' );
add_shortcode( 'wp_business_directory_login', 'wp_business_directory_login' );
add_shortcode( 'wp_business_directory_categories', 'wp_business_directory_categories' );
add_shortcode( 'wp_business_directory_search', 'wp_business_directory_search' );
add_shortcode( 'wp_business_directory_submit_listing', 'wp_business_directory_submit_listing' );

function wp_business_directory_search() {
	$return="";
        if(!isset($_GET['list'])){
        $return.="<style>
                   #example_filter {
                    display:none !important;
                  }
                  </style>";
	$return.='<div class="col-md-12"><form action="'.get_permalink().'" method="get">';
	$return.='<div class="col-md-4">';       
	$return.='<input type="text" name="what" placeholder="ex:Hotel ,Medical etc">';        
        $return.='<br>What';
	$return.='</div>';
	$return.='<div class="col-md-4">';        
	$return.='<input type="text" name="where" placeholder="ex:Dallas,New Yark etc">';
        $return.='<br>Where';
        $return.='</div>';
        $return.='<div class="col-md-3">';
	$return.='<input type="submit" name="search" value="Search">';        
	$return.='</div>';
	
	$return.='</form></div>';
        $return.="<div class='col-md-12'><hr></div>";
        $wherecondition="";
        $headerTitle="";
        if(isset($_GET['search'])){
            if(isset($_GET['what'])){
               $headerTitle.=ucfirst($_GET['what']);
            }
            if(isset($_GET['where']) && !empty($_GET['where'])){
                $headerTitle.=" In ".ucfirst($_GET['where']);
            }
            $return.="<div class='col-md-12'><h3>$headerTitle</h3></div>";
            
        }
        }
                 include('show_listing_shortcode.php');
	
    return $return;
    
}
function wp_business_directory_categories() {
	$return="";
        if(isset($_GET['page_id'])){        
        $permalinkcat='&cid=';
        
    }else{      
        $permalinkcat='?cid=';
    }
    if(!isset($_GET['list'])){
	$wpblp_categories_sort="";
		if(get_option('wpblp_categories_sort')=="ASC"){
			$wpblp_categories_sort="ORDER BY category_name ASC";
		}elseif(get_option('wpblp_categories_sort')=="DESC"){
			$wpblp_categories_sort="ORDER BY category_name DESC";
		}
	 
		global $wpdb;
		$clistings = $wpdb->get_results("SELECT lc.category_name,lc.cid,count(c.cid) as lcat_count FROM  {$wpdb->prefix}wpbdp_listing as l , {$wpdb->prefix}wpbdp_listing_categories as c,{$wpdb->prefix}wpbdp_categories as lc WHERE c.cid=lc.cid AND l.id=c.listing_id group BY c.cid $wpblp_categories_sort");       
		
		$return.='<div class="col-md-12"><ul>';
		foreach ($clistings as $clisting){
			
			if( get_option('wpblp_show_category_post_count')==1){
			$return.='<div class="col-md-4"><li><a href="'.get_permalink().$permalinkcat.$clisting->cid.'">'.$clisting->category_name.'('.$clisting->lcat_count.')</a></li></div>';      
		  }else{
			$return.='<div class="col-md-4"><li><a href="'.get_permalink().$permalinkcat.$clisting->cid.'">'.$clisting->category_name.'</a></li></div>';      
		  }
		}
			$return.='</ul></div><div class="col-md-12"><hr></div>';
    }		
		include('show_listing_shortcode.php');	
	return $return;

}
function wp_business_directory() {
        $return="";
        include('show_listing_shortcode.php');
        return $return;
}

function wp_business_directory_login() {
           $return="";
           if ( !is_user_logged_in() ){
	   include('login_shortcode.php');	
             }else{
                 $return.='<a href="'.wp_logout_url( get_permalink() ).'" title="Logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a>';
             }
           return $return;
}
function wp_business_directory_submit_listing() {
    $return="";
    if(isset($_GET['page_id'])){        
        $permalinklist='&add_new_listing=add_listing';
        $permalinkviewlist='&view_listing=view_listing';
        $permalinkviewlist='&';
    }else{      
        $permalinklist='?add_new_listing=add_listing';
        $permalinkviewlist='?view_listing=view_listing';
        $permalinksymbolt='?';
    }
    if ( !is_user_logged_in() ){
          include('login_shortcode.php');	
    }else{
        $user_info = get_userdata(get_current_user_id());
        $dashboard='<div class="col-xs-4"><a href="'.get_bloginfo('url').'/wp-admin/profile.php" title="'.$user_info->user_login.'" target="_blank"><h4><span class="label label-success"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> My Profile</span></h4></a></div>';
        $dashboard.='<div class="col-xs-3"><a href="'.wp_logout_url( get_permalink() ).'" title="Logout"><h4><span class="label label-success"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</span></h4></a></div>';
        $return.='<div class="col-xs-12">';
        if(isset($_GET['add_new_listing'])){
            $return.='<div class="col-xs-5"><a href="'.$permalinkviewlist.'"><h4><span class="label label-success"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> View My Listings</span></h4></a></div>';            
            $return.=$dashboard;            
            $return.='<div class="col-xs-12">';
               include('submit_listing_shortcode.php');	
            $return.='</div>';
        }else if(isset($_GET['edit_listing'])){
            $return.='<div class="col-xs-5"><a href="'.$permalinkviewlist.'"><h4><span class="label label-success"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> View My Listings</span></h4></a></div>';            
            $return.=$dashboard;
            $return.='<div class="col-xs-12">';
               include('edit_listing_shortcode.php');	
            $return.='</div>';
        }else{
          $return.='<div class="col-xs-5"><a href="'.$permalinklist.'"><h4><span class="label label-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add New Listing</span></h4></a></div>';
          $return.=$dashboard;          
          $return.='<div class="col-xs-12">';
               include('view_listings_shortcode.php');	
          $return.='</div>';
        }
        $return.='</div>';
       
    }
	return $return;
}
?>


