<?php 
	$errorFlag=0;
	$errormessage ="";
	$sucssesMessage="";
	$category_name="";
	$category_cid="";
	$category_edit=0;
	if(isset($_POST['create']))
     {

	if(isset($_POST['category']) && !(empty($_POST['category']))){
		$category_name=ucfirst(sanitize_text_field($_POST['category']));
	}else
	{
		$errormessage.="<span class='label label-danger'>Please enter category name</span><br>";
		$errorFlag=1;
	}

	
     
    $user_ID = get_current_user_id();
	if(!($errorFlag==1)){
		global $wpdb;
		
		$values=array('category_name'=>$category_name);		
		if($wpdb->insert($wpdb->prefix.'wpbdp_categories',$values)){
			$sucssesMessage.="Category added successfully";
     		$errorFlag=2;
			unset($_POST);
		}	
		
	}

}

if(isset($_POST['update']) && isset($_POST['editcategory']) && !(empty($_POST['editcategory'])))
     {

	if(isset($_POST['category_cid']) && !(empty($_POST['category_cid']))){
		$categoryid=sanitize_text_field($_POST['category_cid']);
		$editcategory=ucfirst(sanitize_text_field($_POST['editcategory']));
		global $wpdb;
		
		$values=array(
		'cid'=>$categoryid,
		'category_name'=>$editcategory	 
		);
		$wpdb->update($wpdb->prefix.'wpbdp_categories',$values,array('cid'=>$categoryid));
		
	}
}

if(isset($_GET['action']) && $_GET['action']=="removecategory")
     {

	if(isset($_GET['cid']) && !(empty($_GET['cid']))){
		$cid=sanitize_text_field($_GET['cid']);
		global $wpdb;
		
		$values=array(
		'category'=>1
		);
		$wpdb->update($wpdb->prefix.'wpbdp_listing',$values,array('category'=>$cid));
		
		$wpdb->delete($wpdb->prefix.'wpbdp_categories',array('cid'=>$cid));
		
		//echo 'deleted';

	}
}


if(isset($_GET['action']) && $_GET['action']=="editcategory")
     {

	if(isset($_GET['cid']) && !(empty($_GET['cid']))){
		$cid=sanitize_text_field($_GET['cid']);
		global $wpdb;
		//echo $cid;
		
		$sql="select cid,category_name FROM {$wpdb->prefix}wpbdp_categories WHERE  cid=".$cid;
		$currentCid = $wpdb->get_row( $sql );
	
        $category_name=$currentCid->category_name;
        $category_cid=$currentCid->cid;
		$category_edit=1;
		
		

	}
}

if(isset($_POST['Cancle']) && $_POST['Cancle']=="Cancle"){
	$category_edit=0;	
}	
?>


