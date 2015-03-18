<?php 
	$errorFlag=0;
	$errormessage ="";
	$sucssesMessage="";
        $attachment="";
	if(isset($_POST['save']))
     {

	if(isset($_POST['nm']) && !(empty($_POST['nm']))){
		$nm=sanitize_text_field($_POST['nm']);
	}else
	{
		$errormessage.="<span class='label label-danger'>Enter Bussiness Name</span><br>";
		$errorFlag=1;
	}

	if(isset($_POST['desc'])){
		$desc=sanitize_text_field($_POST['desc']);
	}else
	{
		$desc="";
	}
        
        if(isset($_POST['lat'])){
		$lat=sanitize_text_field($_POST['lat']);
	}else
	{
		$lat="";
	}
        
        if(isset($_POST['glong'])){
		$long=sanitize_text_field($_POST['glong']);
	}else
	{
		$long="";
	}

	if(isset($_POST['addr'])){
		$addr=sanitize_text_field($_POST['addr']);
	}else
	{
		$addr="";
	}

	if(isset($_POST['city'])){
		$city=sanitize_text_field($_POST['city']);
	}else
	{
		$city="";
	}

    if(isset($_POST['zip'])){
		$zip=sanitize_text_field($_POST['zip']);
	}else
	{
		$zip="";
	}

	if(isset($_POST['web'])){
		$web=$_POST['web'];
		if ((!(empty($web))) && (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$web))) {
			$errormessage.="<span class='label label-danger'>Invalid website URL</span><br>";
		    $errorFlag=1;     
    }
	}else
	{
		$web="";
	}

	 if(isset($_POST['phno'])){
		$phno=sanitize_text_field($_POST['phno']);
		
	}else
	{
		$phno="";
	}

	if(isset($_POST['email']) && !(empty($_POST['email']))){
		$email=$_POST['email'];
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errormessage.="<span class='label label-danger'>Enter valid email id</span><br>";
		    $errorFlag=1;
		}
	}else
	{
		$email="";
		$errormessage.="<span class='label label-danger'>Email is required</span><br>";
		$errorFlag=1;
	}

   if(isset($_POST['FB'])){
		$FB=$_POST['FB'];
		if ((!(empty($FB))) && (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$FB))) {
			$errormessage.="<span class='label label-danger'>Invalid facebook URL</span><br>";
		    $errorFlag=1;     
    }
	}else
	{
		$FB="";
	}

	if(isset($_POST['Twiiter'])){
		$Twiiter=$_POST['Twiiter'];
		if ((!(empty($Twiiter))) && (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$Twiiter))) {
			$errormessage.="<span class='label label-danger'>Invalid twitter URL</span><br>";
		    $errorFlag=1;     
    }
	}else
	{
		$Twiiter="";
	}
     
	 if(isset($_POST['GP'])){
		$GP=$_POST['GP'];
		if ((!(empty($GP))) && (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$GP))) {
			$errormessage.="<span class='label label-danger'>Invalid google plus URL</span><br>";
		    $errorFlag=1;     
    }
	}else
	{
		$GP="";
	}

	if(isset($_POST['linkedin'])){
		$linkedin=$_POST['linkedin'];
		if ((!(empty($linkedin))) && (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$linkedin))) {
			$errormessage.="<span class='label label-danger'>Invalid linked in URL</span><br>";
		    $errorFlag=1;     
    }
	}else
	{
		$linkedin="";
	}

	if(isset($_POST['blog'])){
		$blog=$_POST['blog'];
		if ((!(empty($blog))) && (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$blog))) {
			$errormessage.="<span class='label label-danger'>Invalid blog URL</span><br>";
		    $errorFlag=1;     
    }
	}else
	{
		$blog="";
	}

	
	if(isset($_POST['special'])){
		$special=sanitize_text_field($_POST['special']);
	}else
	{
		$special="";
	}
             if(isset($_FILES['image'])){
                            $path_info=array();
                            $path_info = wp_upload_dir();	
	                    wp_mkdir_p($path_info['basedir'].'/wp_business_directory_plugin');
                            
                            for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
                                if($_FILES["image"]["name"][$i]=='' || empty($_FILES["image"]["name"][$i]))
                                    continue;
                             // Loop to get individual element from the array
                             $allowExtention=array('jpg','png','jpeg');
                             $fileExtention=explode('.',$_FILES["image"]["name"][$i]);
                              $extention=end($fileExtention);
                        if(($_FILES['image']['type'][$i]=='image/jpg' 
                           ||$_FILES['image']['type'][$i]=='image/jpeg'     
                           ||$_FILES['image']['type'][$i]=='image/pjpeg'     
                           ||$_FILES['image']['type'][$i]=='image/pjpg'     
                           ||$_FILES['image']['type'][$i]=='image/png'     
                           ||$_FILES['image']['type'][$i]=='image/x-png')
                           && in_array($extention,$allowExtention)        )
                           {
                            if(!$_FILES['image']['error'][$i]>0)
                            {
                                 global $wpdb;
                                 $tablename=$wpdb->prefix.'wpbdp_listing';                        
                                 $query = mysql_query("SHOW TABLE STATUS LIKE '$tablename'");                           
                                 $row = @mysql_fetch_array($query);
                                 $next_id = $row['Auto_increment'];
                                                           
                                move_uploaded_file($_FILES['image']['tmp_name'][$i],$path_info['basedir'].'/wp_business_directory_plugin/image_'.$next_id."_".$i.".jpg");                               
                                 require_once(ABSPATH . '/wp-admin/includes/media.php');
                                require_once(ABSPATH . '/wp-admin/includes/image.php');

                                $file = $path_info['basedir'].'/wp_business_directory_plugin/image_'.$next_id."_".$i.".jpg";

                                $max_w = 200;
                                $max_h = 200;
                                $crop = true;

                                $filePathInfo = pathinfo($file);
                                $fileName = $filePathInfo['basename'];

                                $wpUploadPath = $path_info['basedir'].'/wp_business_directory_plugin';
                                $destpath = $wpUploadPath.'/'.$fileName;

                                image_resize( $file, $max_w, $max_h, $crop );

                            }
                            else{
                                   $Updatedmessage = "Error".$_FILES['image']['error'][$i];
                                   $errormessage.="<span class='label label-danger'>Upload Images/Screenshots : $Updatedmessage</span><br>";
                                   $Updatedmessageflag="true";
                                   $errorFlag=1;  
                                 }
                              }

                        else{
                                            
                             $Updatedmessage = "Upload Images/Screenshots:Invalid File";
                             $errormessage.="<span class='label label-danger'> $Updatedmessage</span><br>";
                              $errorFlag=1;  
                                             
        }
      }                 
                        }
                         if(isset($_FILES['logo'])){
                            $path_info=array();
                            $path_info = wp_upload_dir();	
	                    wp_mkdir_p($path_info['basedir'].'/wp_business_directory_plugin/logo');
                            
                          
                                if(!($_FILES["logo"]["name"]==''))
                                {
                             // Loop to get individual element from the array
                             $allowExtention=array('jpg','png','jpeg');
                             $fileExtention=explode('.',$_FILES["logo"]["name"]);
                              $extention=end($fileExtention);
                        if(($_FILES['logo']['type']=='image/jpg' 
                           ||$_FILES['logo']['type']=='image/jpeg'     
                           ||$_FILES['logo']['type']=='image/pjpeg'     
                           ||$_FILES['logo']['type']=='image/pjpg'     
                           ||$_FILES['logo']['type']=='image/png'     
                           ||$_FILES['logo']['type']=='image/x-png')
                           && in_array($extention,$allowExtention)        )
                           {
                            if(!$_FILES['logo']['error']>0)
                            {
                                 global $wpdb;
                                 $tablename=$wpdb->prefix.'wpbdp_listing';                        
                                 $query = mysql_query("SHOW TABLE STATUS LIKE '$tablename'");                           
                                 $row = @mysql_fetch_array($query);
                                 $next_id = $row['Auto_increment'];
                                                           
                                move_uploaded_file($_FILES['logo']['tmp_name'],$path_info['basedir'].'/wp_business_directory_plugin/logo/logo_'.$next_id.".jpg");                               
                                require_once(ABSPATH . '/wp-admin/includes/media.php');
                                require_once(ABSPATH . '/wp-admin/includes/image.php');

                                $file = $path_info['basedir'].'/wp_business_directory_plugin/logo/logo_'.$next_id.".jpg";

                                $max_w = 200;
                                $max_h = 200;
                                $crop = true;

                                $filePathInfo = pathinfo($file);
                                $fileName = $filePathInfo['basename'];

                                $wpUploadPath = $path_info['basedir'].'/wp_business_directory_plugin';
                                $destpath = $wpUploadPath.'/'.$fileName;

                                image_resize( $file, $max_w, $max_h, $crop );

                            }
                            else{
                                   $Updatedmessage = "Error".$_FILES['logo']['error'];
                                   $errormessage.="<span class='label label-danger'>Upload Logo/Listing Image: $Updatedmessage</span><br>";
                                   $Updatedmessageflag="true";
                                   $errorFlag=1;  
                                 }
                              }

                        else{
                                            
                             $Updatedmessage = "Invalid File";
                             $errormessage.="<span class='label label-danger'>Upload Logo/Listing Image :$Updatedmessage</span><br>";
                              $errorFlag=1;  
                                             
        }
                                }
                      
                        }
     
                        if(isset($_FILES['file'])){
                            $path_info=array();
                            $path_info = wp_upload_dir();	
	                    wp_mkdir_p($path_info['basedir'].'/wp_business_directory_plugin/file');
                            
                          
                                if(!($_FILES["file"]["name"]==''))
                                {
                             // Loop to get individual element from the array
                             $allowExtention=array("jpg","pdf","jpeg","gif","png","doc","docx","xls","xlsx","ppt","txt");
                             $fileExtention=explode('.',$_FILES["file"]["name"]);
                              $extention=end($fileExtention);
                        if(in_array($extention,$allowExtention))
                           {
                            if(!$_FILES['file']['error']>0)
                            {
                                 global $wpdb;
                                 $tablename=$wpdb->prefix.'wpbdp_listing';                        
                                 $query = mysql_query("SHOW TABLE STATUS LIKE '$tablename'");                           
                                 $row = @mysql_fetch_array($query);
                                 $next_id = $row['Auto_increment'];
                                                           
                                move_uploaded_file($_FILES['file']['tmp_name'],$path_info['basedir'].'/wp_business_directory_plugin/file/file_'.$next_id.".".$extention);     
                                $attachment='file_'.$next_id.'.'.$extention;

                            }
                            else{
                                   $Updatedmessage = "Error".$_FILES['file']['error'];
                                   $errormessage.="<span class='label label-danger'>File attachment : $Updatedmessage</span><br>";
                                   $Updatedmessageflag="true";
                                   $errorFlag=1;  
                                 }
                              }

                        else{
                                            
                             $Updatedmessage = "File attachment : Pdf/Office/Image files are only allowed!";
                             $errormessage.="<span class='label label-danger'>$Updatedmessage</span><br>";
                              $errorFlag=1;  
                                             
        }
                                }
                      
                        }
     
    $user_ID = get_current_user_id();
	if(!($errorFlag==1)){
		global $wpdb;
		if(get_option('wpblp_new_post_status'))
                {
                    $status=get_option('wpblp_new_post_status');
                }else{
                    $status="Pending";
                }
		$values=array('business_name'=>$nm,'address'=>$addr,'city'=>$city,'zip'=>$zip,'lat'=>$lat,'glong'=>$long,'status'=>$status,'website'=>$web,'phone'=>$phno,'blog'=>$blog,'fb'=>$FB,'tw'=>$Twiiter,'googleplus'=>$GP,'linkedin'=>$linkedin,'description'=>$desc,'category'=>$special,'tags'=>$special,'user_id'=>$user_ID,
		'created_by'=>$user_ID,'email'=>$email,'attachment'=>$attachment);		
		if($wpdb->insert($wpdb->prefix.'wpbdp_listing',$values)){
                        $listing_insert_id=$wpdb->insert_id;
                        if(isset($_POST['category'])){                            
                            $categoies=array();
                            $categoies=$_POST['category'];
                            foreach ($categoies as $category){
                                $category_values=array('cid'=>$category,'listing_id'=>$listing_insert_id); 
                                if( $wpdb->insert($wpdb->prefix.'wpbdp_listing_categories',$category_values)){                                  
                                }
                              
                            }
                        }
                   
			$sucssesMessage.="listing added successfully";
     		$errorFlag=2;
                        //wp_redirect($_SERVER['PHP_SELF']."?page=wpbdp-add-new-listing");
                        $_POST['nm']="";
			$_POST['desc']="";
			$_POST['lat']="";
			$_POST['glong']="";
			$_POST['addr']="";
			$_POST['city']="";
			$_POST['zip']="";
			$_POST['web']="";
			$_POST['phno']="";
			$_POST['email']="";
			$_POST['FB']="";
			$_POST['Twiiter']="";
			$_POST['linkedin']="";
			$_POST['GP']="";
			$_POST['blog']="";
			$_POST['special']="";
			//unset($_POST);
		}	
		
	}

}
	
?>


