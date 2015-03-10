<?php 
	$errorFlag=0;
	$errormessage ="";
	$sucssesMessage="";
        $attachmentfile="";
	if(isset($_POST['save']) && isset($_POST['wpbdp_edit_listing']))
       {          
           $wpbdp_edit_listing=$_POST['wpbdp_edit_listing'];
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
                                if($_FILES["image"]["name"][$i]=='')
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
                                                           
                                move_uploaded_file($_FILES['image']['tmp_name'][$i],$path_info['basedir'].'/wp_business_directory_plugin/image_'.$wpbdp_edit_listing."_".$i.".jpg");                               
                                 require_once(ABSPATH . '/wp-admin/includes/media.php');
                                require_once(ABSPATH . '/wp-admin/includes/image.php');

                                $file = $path_info['basedir'].'/wp_business_directory_plugin/image_'.$wpbdp_edit_listing."_".$i.".jpg";

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
                                                           
                                move_uploaded_file($_FILES['logo']['tmp_name'],$path_info['basedir'].'/wp_business_directory_plugin/logo/logo_'.$wpbdp_edit_listing.".jpg");                               
                                require_once(ABSPATH . '/wp-admin/includes/media.php');
                                require_once(ABSPATH . '/wp-admin/includes/image.php');

                                $file = $path_info['basedir'].'/wp_business_directory_plugin/logo/logo_'.$wpbdp_edit_listing.".jpg";

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
                                move_uploaded_file($_FILES['file']['tmp_name'],$path_info['basedir'].'/wp_business_directory_plugin/file/file_'.$wpbdp_edit_listing.".".$extention);                               
                                 $attachmentfile='file_'.$wpbdp_edit_listing.'.'.$extention;

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
                $modify_date=date('Y-m-d');
                if(!empty($attachmentfile)){
                    $values=array('business_name'=>$nm,'address'=>$addr,'city'=>$city,'zip'=>$zip,'lat'=>$lat,'glong'=>$long,'website'=>$web,'phone'=>$phno,'blog'=>$blog,'fb'=>$FB,'tw'=>$Twiiter,'googleplus'=>$GP,'linkedin'=>$linkedin,'description'=>$desc,'category'=>$special,'tags'=>$special,'modify_by'=>$user_ID,
		'created_by'=>$user_ID,'email'=>$email,'modify_date'=>$modify_date,'attachment'=>$attachmentfile);          
                }else{
		$values=array('business_name'=>$nm,'address'=>$addr,'city'=>$city,'zip'=>$zip,'lat'=>$lat,'glong'=>$long,'website'=>$web,'phone'=>$phno,'blog'=>$blog,'fb'=>$FB,'tw'=>$Twiiter,'googleplus'=>$GP,'linkedin'=>$linkedin,'description'=>$desc,'category'=>$special,'tags'=>$special,'modify_by'=>$user_ID,
		'created_by'=>$user_ID,'email'=>$email,'modify_date'=>$modify_date);
                }
                $where=array('id'=>$_POST['wpbdp_edit_listing'],'user_id'=>$user_ID);
                if(isset($_POST['category'])){                            
                            $categoies=array();
                            $categoies=$_POST['category'];
                            $wpdb->delete($wpdb->prefix.'wpbdp_listing_categories',array('listing_id'=>$_POST['wpbdp_edit_listing']));
                            foreach ($categoies as $category){
                                $category_values=array('cid'=>$category,'listing_id'=>$_POST['wpbdp_edit_listing']); 
                                if( $wpdb->insert($wpdb->prefix.'wpbdp_listing_categories',$category_values)){                                  
                                }
                              
                            }
                        }
		if($wpdb->update($wpdb->prefix.'wpbdp_listing',$values,$where)){
                        $listing_insert_id=$wpdb->insert_id;
                        $sucssesMessage.="listing updated successfully";
     		$errorFlag=2;
			
		}	
		
	}

}
	
 if(isset($_GET['edit']) && isset($_GET['edit_listing_id'])) {       
        $listId=sanitize_text_field($_GET['edit_listing_id']);
        global $wpdb;
        $listings = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}wpbdp_listing where id=$listId");
        $listing=$listings[0];
        if(count($listing)==1){        
           
                               $listing_categorys = $wpdb->get_results( "SELECT c.category_name FROM {$wpdb->prefix}wpbdp_listing_categories lc,{$wpdb->prefix}wpbdp_categories c where c.cid=lc.cid AND listing_id=$listing->id" );
                               /* foreach ($listing_categorys as $listing_category){
                                     $Businesslisting_category.=$listing_category->category_name;                                     
                                     $Businesslisting_category.= " ";
                                }*/
    
      if(isset($_GET['remove'])){
            if($_GET['remove']=="file"){                
                $path_info = wp_upload_dir();	 
                $removeAttachment = $path_info['basedir'].'/wp_business_directory_plugin/file/'.$listing->attachment;              
       
                if(file_exists($removeAttachment)){                              
                    @unlink($removeAttachment);
                    wp_redirect(get_permalink().$permalinksymbolt."edit_listing=edit_listing&edit_listing_id=$listing->id&edit=Edit");
                }
            }
            if($_GET['remove']=="logo"){                
                $path_info = wp_upload_dir();	 
                $removelogoSmall = $path_info['basedir'].'/wp_business_directory_plugin/logo/logo_'.$listing->id.'-200x200.jpg';
                $removelogo = $path_info['basedir'].'/wp_business_directory_plugin/logo/logo_'.$listing->id.'.jpg';             
                if(file_exists($removelogoSmall)){                              
                    @unlink($removelogoSmall);
                    @unlink($removelogo);
                    wp_redirect(get_permalink().$permalinksymbolt."edit_listing=edit_listing&edit_listing_id=$listing->id&edit=Edit");
                }
            }
            if($_GET['remove']=="image" && isset($_GET['image_id'])){ 
                $image_id=$_GET['image_id'];
                $path_info = wp_upload_dir();	 
                $removeImageSmall = $path_info['basedir'].'/wp_business_directory_plugin/image_'.$listing->id.'_'.$image_id.'-200x200.jpg';
                $removeImage = $path_info['basedir'].'/wp_business_directory_plugin/image_'.$listing->id.'_'.$image_id.'.jpg';             
                if(file_exists($removeImage)){                              
                    @unlink($removeImageSmall);
                    @unlink($removeImage);
                    wp_redirect(get_permalink().$permalinksymbolt."edit_listing=edit_listing&edit_listing_id=$listing->id&edit=Edit");
                }
            }
        }
   
$return.='<style>
    .checkbox-inline{
         margin-left: 0 !important;
    }
    .error{
        color:red !important;
    }
    .leftpan input, select, textarea {
    border: 1px solid #ccc !important;
}
</style>
 <form id="venueForm" enctype="multipart/form-data" method="post">
<div class="panel panel-primary">
  <div class="panel-heading">';
    $return.='<h2 class="panel-title">Edit Listing (Listing ID : '.$listing->id.')</h2>';
  $return.='</div>
  <div class="panel-body">';  
  if(($errorFlag==1)){ 
      $return.=$errormessage; 
      }else if($errorFlag==2){
     $return.='<span class="label label-success">'.$sucssesMessage.'</span>';
            }	
            $editid=(isset($listing->id) ? $listing->id: '');
        $editbusiness_name=(isset($listing->business_name) ? $listing->business_name: '');
        $editdescription=(isset($listing->description) ? $listing->description: '');
        $editaddress= (isset($listing->address) ? $listing->address: '');
        $editcity=(isset($listing->city) ? $listing->city: '');
        $editzip=(isset($listing->zip) ? $listing->zip: '');
        $editwebsite=(isset($listing->website) ? $listing->website: '');
        $editphone=(isset($listing->phone) ? $listing->phone: '');
        $editemail=(isset($listing->email) ? $listing->email: '');
        $editfb=(isset($listing->fb) ? $listing->fb: '');
        $edittw=(isset($listing->tw) ? $listing->tw: '');
        $editgoogleplus=(isset($listing->googleplus) ? $listing->googleplus: '');
        $editlinkedin=(isset($listing->linkedin) ? $listing->linkedin: '');
        $editblog=(isset($listing->blog) ? $listing->blog: '');
        $edittags=(isset($listing->tags) ? $listing->tags: '');
        $editlat=(isset($listing->lat) ? $listing->lat: '');
        $editlong=(isset($listing->glong) ? $listing->glong: '');
		$return.='
		  <div class="col-xs-6 leftpan">	
                      <h4><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                          General</h4>
                           <div class="col-xs-12"><input type="hidden" id="wpbdp_edit_listing" name="wpbdp_edit_listing"  value="'.$editid.'"/></div>

				  <div class="row">
					   <div class="col-xs-12"><label id="labelNm"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Name</label>*</div>
					   <div class="col-xs-12"><input id="nm" name="nm" placeholder="Enter Business Listing Name" maxlength="45" value="'.$editbusiness_name.'" required="required"/></div>
				  </div>

				  <div class="row"><br>
					   <div class="col-xs-12"><label id="labeldesc"><span class="glyphicon glyphicon-share" aria-hidden="true"></span> Description</label></div>
					   <div class="col-xs-12"><textarea  id="desc"  maxlength="1000" placeholder="Enter Business Description" name="desc" value="'.$editdescription.'" class="desc">'.$editdescription.'</textarea></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label id="labelAddr" ><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Address</label></div>
					   <div class="col-xs-12"><input id="addr" onclick="init()"maxlength="1000" name="addr" placeholder="Enter Address" value="'.$editaddress.'"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label id="labelC"><span class="glyphicon glyphicon-road" aria-hidden="true"></span> City</label></div>
					   <div class="col-xs-12"><input id="city" maxlength="45" name="city" placeholder="Enter City Name"  value="'.$editcity.'"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label id="labelZip"><span class="glyphicon glyphicon-road" aria-hidden="true"></span> Zip</label></div>
					    <div class="col-xs-12"><input id="zip"  maxlength="8" name="zip" placeholder="Enter Zip Code"  value="'.$editzip.'"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label  id="labelLng"><span class="glyphicon glyphicon-globe " aria-hidden="true"></span> Website</label></div>
					    <div class="col-xs-12"><input id="web" maxlength="255" name="web"  placeholder="Ex:http://sahyadriwebsolution.com/wpbusinessdirectoryplugin" value="'.$editwebsite.'"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label  id="labelphno"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> Phone No</label></div>
					    <div class="col-xs-12"><input id="phno" name="phno"  maxlength="20" placeholder="xxxxxxxxxx or (xxx) xxx xxxx" value="'.$editphone.'"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label  id="labelEmail"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email ID</label>*</div>
					    <div class="col-xs-12"><input id="email" maxlength="255"  style="text-transform:lowercase;"  placeholder="Enter Email Address" name="email"  value="'.$editemail.'"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a><label  id="labelFb">FB Account</label></div>
					    <div class="col-xs-12"><input id="FB" name="FB" maxlength="255"  placeholder="Ex:https://www.facebook.com/wp-business-directroy-plugin" value="'.$editfb.'"/></div>
				   </div>

				    <div class="row"><br>
					   <div class="col-xs-12"><a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a><label  id="labelTwiiter">Twitter Account</label></div>
					    <div class="col-xs-12"><input id="Twiiter" maxlength="255"  placeholder="Ex:https://twitter.com/wp-business-directroy-plugin" name="Twiiter"  value="'.$edittw.'"/></div>
				   </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><a class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a><label  id="labelGp">Google Plus</label></div>
					    <div class="col-xs-12"><input id="GP" name="GP" placeholder="Ex:https://plus.google.com/wp-business-directroy-plugin" maxlength="255"  value="'.$editgoogleplus.'"/></div>
				   </div>

				    <div class="row"><br>
					   <div class="col-xs-12"><a class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a><label  id="labelLi">Linked In</label></div>
					    <div class="col-xs-12"><input id="LI" maxlength="255"  placeholder="Ex:https://www.linkedin.com/wp-business-directroy-plugin" name="linkedin"  value="'.$editlinkedin.'"/></div>
				   </div>

				    <div class="row"><br>
					   <div class="col-xs-12"><label id="labelblog"><span class="glyphicon glyphicon-globe " aria-hidden="true"></span> Blog</label></div>
					    <div class="col-xs-12"><input id="blog" name="blog" maxlength="255" placeholder="Ex:http://sahyadriwebsolution.com/blog" value="'.$editblog.'"/></div>
				   </div>

				    <div class="row"><br>
					   <div class="col-xs-12"><label><span class="glyphicon glyphicon-tags" aria-hidden="true"> Keyword</label></div>
					    <div class="col-xs-12"><input id="special" name="special" placeholder="Tags" maxlength="1000"  value="'.$edittags.'"/></div>
				   </div>

			 
		  
		  </div>  
                  <div class="col-xs-6">
                      
                      <h4><span class="glyphicon glyphicon-map-marker" data-toggle="tooltip" data-placement="top" title="Allow to display physical location using Google Maps" aria-hidden="true"></span>
                          Map</h4><br>
                          <div class="col-xs-6"><input style="width:100%" type="text" name="lat" value="'.$editlat.'" placeholder="Latitude" ></div>
                          <div class="col-xs-6"><input style="width:100%" type="text" name="glong" value="'.$editlong.'" placeholder="Longitude" ></div>
                      <div id="map_canvas"></div>
                     '; 		
                      $return.='<hr>
                          <h4><span class="glyphicon glyphicon-tag" data-toggle="tooltip" data-placement="top" title="Select Categories for listing" aria-hidden="true"></span>
                              Categories</h4><br>';                             
                                global $wpdb;
		                $listing_categorys = $wpdb->get_results( "SELECT c.cid FROM {$wpdb->prefix}wpbdp_listing_categories lc,{$wpdb->prefix}wpbdp_categories c where c.cid=lc.cid AND listing_id=$listing->id" );                                
                                $checkedlisting_categorys=array();
                                foreach ($listing_categorys as $listing_category){
                                     $checkedlisting_categorys[]=$listing_category->cid; 
                                } 
                             global $wpdb;
                             $categories = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}wpbdp_categories" );
                            foreach ($categories as $category){	
                          $return.='<label class="checkbox-inline">';
                              $return.='<input type="checkbox"';
                                 if(in_array($category->cid, $checkedlisting_categorys)){ 
                                         $return.=' checked ';
                                 }
                                 $return.='name="category[]" value="';
                                     $return.=$category->cid.'">'.$category->category_name.'<br>
                          </label>';
		      }
                      $return.='
                    
                          <hr>';                         
                          $logoImage="";
                                $path_info = wp_upload_dir();	
                                $logo = $path_info['basedir'].'/wp_business_directory_plugin/logo/logo_'.$listing->id."-200x200.jpg";
                                if(file_exists($logo)){
                                     $logopath = $path_info['baseurl'].'/wp_business_directory_plugin/logo/logo_'.$listing->id."-200x200.jpg";                      
                                    $logoImage.="<img src='$logopath' style='max-width:80px'>".'<a href="'.get_permalink().$permalinksymbolt.'edit_listing=edit_listing&edit_listing_id='.$listing->id.'&edit=Edit&remove=logo"><span style="color:red; vertical-align: top;" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>';
                                    $return.='<div class="col-md-12">'.$logoImage.'</div>';
                                }
                        
                          $return.='<div class="col-xs-12">
                          <h4><span class="glyphicon glyphicon-picture" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Upload Logo for listing"></span>
                              Upload Logo/Listing Image</h4><br>
                                    <input id="uploadBtn" type="file" name="logo" class="upload" />   
                          </div>
                          
                      
                          <hr>';
                         
                       $return1='';
                       $image_4 = $path_info['basedir'].'/wp_business_directory_plugin/image_'.$listing->id."_0.jpg";
                       if(file_exists($image_4)){
                            $image_4_path = $path_info['baseurl'].'/wp_business_directory_plugin/image_'.$listing->id."_0.jpg";                            
                           $image_4_Image.='<img src="'.$image_4_path.'" style="max-width:80px">'.'<a href="'.get_permalink().$permalinksymbolt.'edit_listing=edit_listing&edit_listing_id='.$listing->id.'&edit=Edit&remove=image&image_id=0"><span style="color:red; vertical-align: top;" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>';
                           $return1.=$image_4_Image.' ';
                       }
                       $image_one = $path_info['basedir'].'/wp_business_directory_plugin/image_'.$listing->id."_1.jpg";
                       if(file_exists($image_one)){
                            $image_one_path = $path_info['baseurl'].'/wp_business_directory_plugin/image_'.$listing->id."_1.jpg";                      
                           $image_1_Image.="<img src='$image_one_path' style='max-width:80px'>".'<a href="'.get_permalink().$permalinksymbolt.'edit_listing=edit_listing&edit_listing_id='.$listing->id.'&edit=Edit&remove=image&image_id=1"><span style="color:red; vertical-align: top;" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>';
                           $return1.=$image_1_Image.' ';
                       }
                       
                       $image_2 = $path_info['basedir'].'/wp_business_directory_plugin/image_'.$listing->id."_2.jpg";
                       if(file_exists($image_2)){
                            $image_2_path = $path_info['baseurl'].'/wp_business_directory_plugin/image_'.$listing->id."_2.jpg";                      
                           $image_2_Image.="<img src='$image_2_path' style='max-width:80px'>".'<a href="'.get_permalink().$permalinksymbolt.'edit_listing=edit_listing&edit_listing_id='.$listing->id.'&edit=Edit&remove=image&image_id=2"><span style="color:red; vertical-align: top;" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>';
                           $return1.=$image_2_Image.' ';
                       }
                       
                       $image_3 = $path_info['basedir'].'/wp_business_directory_plugin/image_'.$listing->id."_3.jpg";
                       if(file_exists($image_3)){
                            $image_3_path = $path_info['baseurl'].'/wp_business_directory_plugin/image_'.$listing->id."_3.jpg";                      
                           $image_3_Image.="<img src='$image_3_path' style='max-width:80px'>".'<a href="'.get_permalink().$permalinksymbolt.'edit_listing=edit_listing&edit_listing_id='.$listing->id.'&edit=Edit&remove=image&image_id=3"><span style="color:red; vertical-align: top;" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>';
                           $return1.=$image_3_Image.' ';
                       }
                       
                       
                       $return.="<div class='col-md-12'>$return1</div>";
                          $return.='<div class="col-xs-12">
                          <h4><span class="glyphicon glyphicon-picture" data-toggle="tooltip" data-placement="top" title="Allow you to put more images on listings" aria-hidden="true"></span>
                              Upload Images/Screenshots</h4><br>
                                    <input id="uploadBtn1" type="file" name="image[]" class="upload" />
                                    <input id="uploadBtn2" type="file" name="image[]" class="upload" />
                                    <input id="uploadBtn3" type="file" name="image[]" class="upload" />
                                    <input id="uploadBtn4" type="file" name="image[]" class="upload" />
                                    
                         
                      </div>';
                                $attachment = $path_info['basedir'].'/wp_business_directory_plugin/file/'.$listing->attachment;
                                $attachmentfile=$listing->attachment;
                                if((!empty($listing->attachment)) && file_exists($attachment)){
                                     $attachmentpath = $path_info['baseurl'].'/wp_business_directory_plugin/file/'.$listing->attachment;
                                     $attachmentRemovePath=get_permalink().$permalinksymbolt."edit_listing=edit_listing&edit_listing_id=$listing->id&edit=Edit&remove=file";
                                    $attachmentfile="<div class='col-md-6'><a href='$attachmentpath' target='_blank'><span class='glyphicon glyphicon-pushpin' aria-hidden='true'></span> View Attachment</a></div>";
                                    $attachmentfile.="<div class='col-md-6'><a href='$attachmentRemovePath'><span style='color:red' class='glyphicon glyphicon-remove' aria-hidden='true'></span> Remove Attachment</a></div>";
                                    $return.='<div class="col-md-12"><hr>'.$attachmentfile.'</div><hr>';
                                } 
                            $return.='<div class="col-xs-12"><hr>
                            <h4><span class="glyphicon glyphicon-paperclip" data-toggle="tooltip" data-placement="top" title="Upload files for quote requests, resumes, or anything you can think of. You can also put more information on your business listings, such as menus, price sheets, or other user-useful documents.Supports :Pdf/Office/Image files are only allowed!" aria-hidden="true"></span>
                               Upload File</h4><br>File attachment to listings<br>
                             <input id="uploadBtn5" type="file" name="file" class="upload" />
                                           
                      </div>
                    ';
      $return.='</div>

    
  </div>
  <div class="panel-footer">
  <input type="submit" class="btn btn-primary" value="Save" name="save"/>';
   $return.='<a href="'.get_permalink().'"
		    ><span class="btn btn-primary">
			Cancle</span></a>';
 $return.='</div></div>
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
        }else{
            wp_redirect(get_permalink());
        }
    }else{
            wp_redirect(get_permalink());
        } 