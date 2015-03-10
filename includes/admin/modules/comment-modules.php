<?php

if(isset($_GET['edit_comment_id']) && isset($_GET['edit'])){
    global $wpdb;
    $cid=sanitize_text_field($_GET['edit_comment_id']);
    if($_GET['edit']=="delete"){
        $wpdb->delete($wpdb->prefix.'wpbdp_comment',array('id'=>$cid));
    }
    if($_GET['edit']=="Publish"){
             $values=array(
		'id'=>$cid,
		'status'=>"Publish"	 
		);
		$wpdb->update($wpdb->prefix.'wpbdp_comment',$values,array('id'=>$cid));
    }    
    if($_GET['edit']=="Pending"){
             $values=array(
		'id'=>$cid,
		'status'=>"Pending"	 
		);
		$wpdb->update($wpdb->prefix.'wpbdp_comment',$values,array('id'=>$cid));
    }
    
}
?>
