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
                                 $row = mysql_fetch_array($query);
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
                                 $row = mysql_fetch_array($query);
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
                if(get_option('wpblp_notify_admin')==1)
                      {
                           $subject="New Listing Added";   
                           $emailtext="Dear ".get_option('blogname')." Admin";
                           $emailtext.="<br>New Listing Added on your site(".get_option('siteurl').").";
                           $emailtext.="<br>Listing Name : ".$nm;
                           $emailtext.="<br>Listing Status : ".get_option('wpblp_new_post_status');
                           $emailtext.="<br><br>You're receiving this email because you have enabled 'Notify admin of new listings via email' option";                            
                           $emailtext.="<br>Cheers,<br>".get_site_url();
                           $headers[] = 'From:Admin'. $_POST['emailname'].' <'.get_option('admin_email').'>';  
                            add_filter( 'wp_mail_content_type', function( $content_type ) {
                                    return 'text/html';
                            });
                            if(wp_mail(get_option('admin_email'), $subject,$emailtext,$headers)){
                                $sussesEmailFlag="<span class='label label-success'>Your message was sent successfully!</span>";
                            }
                    
                }
                if(get_option('wpblp_send_email_confirmation')==1)
                      {
                           $subject="New Listing Added";   
                           $emailtext="Dear User";
                           $emailtext.="<br>You have successfully Added your Listing on site(".get_option('siteurl').").";
                           $emailtext.="<br>Listing Name : ".$nm;
                           $emailtext.="<br>Listing Status : ".get_option('wpblp_new_post_status');
                           if(get_option('wpblp_new_post_status')=="Pending"){
                               $emailtext.="<br>Your Business Listing waiting for admin approval";
                           }
                           $emailtext.="<br><br>You're receiving this email because you have sumbit your business listing on ".get_option('siteurl');                            
                           $emailtext.="<br>Cheers,<br>".get_site_url();
                           $headers[] = 'From:'. get_option('blogname').' <'.get_option('admin_email').'>';  
                            add_filter( 'wp_mail_content_type', function( $content_type ) {
                                    return 'text/html';
                            });
                            if(wp_mail( $email, $subject,$emailtext,$headers)){
                                $sussesEmailFlag="<span class='label label-success'>Your message was sent successfully!</span>";
                            }
                    
                }
                      @wp_redirect(get_permalink());
			//unset($_POST);
		}	
		
	}

}
	
$return.=" <style>
    .checkbox-inline{
         margin-left: 0 !important;
    }
    .error{
        color:red !important;
    }
     .leftpan input, select, textarea {
    border: 1px solid #ccc !important;
}
</style>";

 
$return.='<form id="venueForm" enctype="multipart/form-data" method="post">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title">Add New Listing</h2>
  </div>
  <div class="panel-body">';  
 if(($errorFlag==1)){ 
     _e($errormessage,'wp-business-directroy-plugin');
     }else if($errorFlag==2){ 
     $return.='<span class="label label-success">'.$sucssesMessage.'</span>';
    }	
        $listName=(isset($_POST['nm']) ? sanitize_text_field($_POST['nm']): '');
        $desc=(isset($_POST['desc']) ? sanitize_text_field($_POST['desc']): '');
        $addrpost=(isset($_POST['addr']) ? sanitize_text_field($_POST['addr']): '');
        $citypost=(isset($_POST['city']) ? sanitize_text_field($_POST['city']): '');
        $zippost=(isset($_POST['zip']) ? sanitize_text_field($_POST['zip']): '');
        $webpost=(isset($_POST['web']) ? $_POST['web']: '');
        $phnopost=(isset($_POST['phno']) ? sanitize_text_field($_POST['phno']): '');
        $emailpost=(isset($_POST['email']) ? $_POST['email']: '');
        $FBpost=(isset($_POST['FB']) ? $_POST['FB']: '');
        $Twiiterpost=(isset($_POST['Twiiter']) ? $_POST['Twiiter']: '');
        $GPpost=(isset($_POST['GP']) ? $_POST['GP']: '');
        $linkedinpost=(isset($_POST['linkedin']) ? $_POST['linkedin']: '');
        $blogpost=(isset($_POST['blog']) ? $_POST['blog']: '');
        $specialpost=(isset($_POST['special']) ? sanitize_text_field($_POST['special']): '');
        $latpost=(isset($_POST['lat']) ? sanitize_text_field($_POST['lat']): '');
        $longpost=(isset($_POST['glong']) ? sanitize_text_field($_POST['glong']): '');
    
	
		$return.='<div class="row col-xs-12">
		  <div class="col-xs-6 leftpan">	
                      <h4><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                         General</h4><br>

				  <div class="row">
					   <div class="col-xs-12"><label id="labelNm"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Name</label>*</div>
					   <div class="col-xs-12"><input id="nm" name="nm" placeholder="Enter Business Listing Name" maxlength="45" value="'.$listName.'" required="required"/></div>
				  </div>

				  <div class="row"><br>
					   <div class="col-xs-12"><label id="labeldesc"><span class="glyphicon glyphicon-share" aria-hidden="true"></span> Description</label></div>
					   <div class="col-xs-12"><textarea  id="desc"  maxlength="1000" placeholder="Enter Business Description" name="desc" value="'.$desc.'" class="desc"></textarea></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label id="labelAddr" ><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Address</label></div>
					   <div class="col-xs-12"><input id="addr" onclick="init()"maxlength="1000" name="addr" placeholder="Enter Address" value="'.$addrpost.'"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label id="labelC"><span class="glyphicon glyphicon-road" aria-hidden="true"></span> City</label></div>
					   <div class="col-xs-12"><input id="city" maxlength="45" name="city" placeholder="Enter City Name"  value="'.$citypost.'"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label id="labelZip"><span class="glyphicon glyphicon-road" aria-hidden="true"></span> Zip</label></div>
					    <div class="col-xs-12"><input id="zip"  maxlength="8" name="zip" placeholder="Enter Zip Code"  value="'.$zippost.'"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label  id="labelLng"><span class="glyphicon glyphicon-globe " aria-hidden="true"></span> Website</label></div>
					    <div class="col-xs-12"><input id="web" maxlength="255" name="web"  placeholder="Ex:http://sahyadriwebsolution.com/wpbusinessdirectoryplugin" value="'.$webpost.'"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label  id="labelphno"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> Phone No</label></div>
					    <div class="col-xs-12"><input id="phno" name="phno"  maxlength="20" placeholder="xxxxxxxxxx or (xxx) xxx xxxx" value="'.$phnopost.'"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label  id="labelEmail"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email ID</label>*</div>
					    <div class="col-xs-12"><input id="email" maxlength="255"  style="text-transform:lowercase;"  placeholder="Enter Email Address" name="email"  value="'.$emailpost.'"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a><label  id="labelFb">FB Account</label></div>
					    <div class="col-xs-12"><input id="FB" name="FB" maxlength="255"  placeholder="Ex:https://www.facebook.com/wp-business-directroy-plugin" value="'.$FBpost.'"/></div>
				   </div>

				    <div class="row"><br>
					   <div class="col-xs-12"><a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a><label  id="labelTwiiter">Twitter Account</label></div>
					    <div class="col-xs-12"><input id="Twiiter" maxlength="255"  placeholder="Ex:https://twitter.com/wp-business-directroy-plugin" name="Twiiter"  value="'.$Twiiterpost.'"/></div>
				   </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><a class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a><label  id="labelGp">Google Plus</label></div>
					    <div class="col-xs-12"><input id="GP" name="GP" placeholder="Ex:https://plus.google.com/wp-business-directroy-plugin" maxlength="255"  value="'.$GPpost.'"/></div>
				   </div>

				    <div class="row"><br>
					   <div class="col-xs-12"><a class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a><label  id="labelLi">Linked In</label></div>
					    <div class="col-xs-12"><input id="LI" maxlength="255"  placeholder="Ex:https://www.linkedin.com/wp-business-directroy-plugin" name="linkedin"  value="'.$linkedinpost.'"/></div>
				   </div>

				    <div class="row"><br>
					   <div class="col-xs-12"><label id="labelblog"><span class="glyphicon glyphicon-globe " aria-hidden="true"></span> Blog</label></div>
					    <div class="col-xs-12"><input id="blog" name="blog" maxlength="255" placeholder="Ex:http://sahyadriwebsolution.com/blog" value="'.$blogpost.'"/></div>
				   </div>

				    <div class="row"><br>
					   <div class="col-xs-12"><label><span class="glyphicon glyphicon-tags" aria-hidden="true"> Keyword</label></div>
					    <div class="col-xs-12"><input id="special" name="special" placeholder="Tags" maxlength="1000"  value="'.$specialpost.'"/></div>
				   </div>';

			 
		  
		  $return.='</div>		  
                  <div class="col-xs-6">
                      
                      <h4><span class="glyphicon glyphicon-map-marker" data-toggle="tooltip" data-placement="top" title="Allow to display physical location using Google Maps" aria-hidden="true"></span>
                         Map</h4><br>
                          <div class="col-xs-6"><input style="width:100%" type="text" name="lat" value="'.$latpost.'" placeholder="Latitude" ></div>
                          <div class="col-xs-6"><input style="width:100%" type="text" name="glong" value="'.$longpost.'" placeholder="Longitude" ></div>
                      <div id="map_canvas">
                     ';
                      
                      $return.='<hr>
                          <h4><span class="glyphicon glyphicon-tag" data-toggle="tooltip" data-placement="top" title="Select Categories for listing" aria-hidden="true"></span>
                              Categories</h4><br>';
                         
                             global $wpdb;
                             $categories = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}wpbdp_categories" );
                           
                             foreach ($categories as $category){	
                          $return.='<label class="checkbox-inline">';
                          $return.='<input type="checkbox" name="category[]" value="'.$category->cid.'">'.$category->category_name.'<br>';
                          $return.='</label>';
			 }
                         
                      
                      
                      
                       $return.='
                    
                          <hr>
                          <h4><span class="glyphicon glyphicon-picture" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Upload Logo for listing"></span>
                              Upload Logo/Listing Image</h4><br>
                                    <input id="uploadBtn" type="file" name="logo" class="upload" />   
                      </div>
                      
                          <hr>
                          <h4><span class="glyphicon glyphicon-picture" data-toggle="tooltip" data-placement="top" title="Allow users to put more images on listings" aria-hidden="true"></span>
                             Upload Images/Screenshots</h4><br>
                                    <input id="uploadBtn1" type="file" name="image[]" class="upload" />
                                    <input id="uploadBtn2" type="file" name="image[]" class="upload" />
                                    <input id="uploadBtn3" type="file" name="image[]" class="upload" />
                                    <input id="uploadBtn4" type="file" name="image[]" class="upload" />
                                    
                      <hr>  
                            <h4><span class="glyphicon glyphicon-paperclip" data-toggle="tooltip" data-placement="top" title="Upload files for quote requests, resumes, or anything you can think of. You can also put more information on your business listings, such as menus, price sheets, or other user-useful documents.Supports :Pdf/Office/Image files are only allowed!" aria-hidden="true"></span>
                               Upload File</h4><br>File attachment to listings<br>
                             <input id="uploadBtn5" type="file" name="file" class="upload" />
                                           
                     
                     </div>
                      
                      
                  </div>
		</div>
    
 ';
   
  $return.='<div class="panel-footer">';
if(get_option('wpblp_display_terms_and_conditions')==1){
$return.='<div class="col-xs-12">';
    $return.='<input style="width:10%" type="checkbox" value="" name="term" required> Accept Terms & Condition';
   $return.='<br>['.get_option('wpblp_terms_and_conditions');        
   $return.=']<br></div>';
   }
  $return.='<input type="submit" class="btn btn-success" value="Save" name="save"/>';
  $return.=' <a href="'.get_permalink().'"
		    ><span class="btn btn-primary">Cancle</span></a>';

$return.='</div> </div>
</form>
<script>
 $(document).ready(function(){
     $("#venueForm").validate({
            wrapper: "div",
           
              rules :
                      {                                               
                       name:
                               {
                                required:true,
                                maxlength: 100,
                                fregx:/^[A-Za-z_ ]{1,20}$/
                               },                      
                      
                      
                       phno:
                               {                             
                                phoneUS: true
                               },                       
                        web:{
                                url: true                       
                             },
                        blog:{
                                url: true                       
                             },
                        FB:{
                                url: true                       
                             },
                        Twiiter:{
                                url: true                       
                             },
                        GP:{
                                url: true                       
                             },
                        linkedin:{
                                url: true                       
                             },
                        lat:{
                                 number: true                      
                             },
                        glong:{
                                 number: true                      
                             },
                        email:{
                                required: true,
                                email: true                   
                             },
                        logo:{
                                accept: "image/*"               
                             },
                         file:{
                                accept: "image/*,application/pdf,application/doc,application/docx,application/xls,application/xlsx,application/ppt,application/txt"               
                             }, 
                          \'image[]\':{
                                accept: "image/*"               
                             },
                         },
              messages :
                      {                                   
                            confirmPassword:{regx:"Please enter a valid password."},
                            file:{accept:"Please select a valid file."},
                            logo:{accept:"Please select a valid file."},
                            lat:{number:"Please enter a valid latitude."},
                            glong:{number:"Please enter a valid longitude."},                            
                           \'image[]\':{accept:"Please select a valid file."}
                      }
                      
          });
      });
     $(function () {
  $(\'[data-toggle="tooltip"]\').tooltip();
})
 </script>';