<?php if(isset($_GET['edit']) && isset($_GET['edit_listing_id'])) {       
        $listId=$_GET['edit_listing_id'];
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
                    @wp_redirect(get_bloginfo('url')."?page=wpbdp-edit-listing&edit_listing_id=$listing->id&edit=Edit");
                }
            }
            if($_GET['remove']=="logo"){                
                $path_info = wp_upload_dir();	 
                $removelogoSmall = $path_info['basedir'].'/wp_business_directory_plugin/logo/logo_'.$listing->id.'-200x200.jpg';
                $removelogo = $path_info['basedir'].'/wp_business_directory_plugin/logo/logo_'.$listing->id.'.jpg';             
                if(file_exists($removelogoSmall)){                              
                    @unlink($removelogoSmall);
                    @unlink($removelogo);
                    @wp_redirect(get_bloginfo('url')."?page=wpbdp-edit-listing&edit_listing_id=$listing->id&edit=Edit");
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
                    @wp_redirect(get_bloginfo('url')."?page=wpbdp-edit-listing&edit_listing_id=$listing->id&edit=Edit");
                }
            }
        }
    ?>
<style>
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
  <div class="panel-heading">
    <h2 class="panel-title"><?php _e("Edit Listing (Listing ID : $listing->id)",'wp-business-directroy-plugin');?></h2>
  </div>
  <div class="panel-body">   
  <?php if(($errorFlag==1)){ ?>
     <?php _e($errormessage,'wp-business-directroy-plugin'); ?>
    <?php }else if($errorFlag==2){ ?>
     <span class="label label-success"><?php _e($sucssesMessage,'wp-business-directroy-plugin'); ?></span>
    <?php }	?>
	
		<div class="row col-xs-12">
		  <div class="col-xs-6 leftpan">	
                      <h4><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                          <?php _e('General','wp-business-directroy-plugin');?></h4>
                           <div class="col-xs-12"><input type="hidden" id="wpbdp_edit_listing" name="wpbdp_edit_listing"  value="<?php echo (isset($listing->id) ? $listing->id: '')?>"/></div>

				  <div class="row">
					   <div class="col-xs-12"><label id="labelNm"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Name</label>*</div>
					   <div class="col-xs-12"><input id="nm" name="nm" placeholder="Enter Business Listing Name" maxlength="45" value="<?php echo (isset($listing->business_name) ? $listing->business_name: '')?>" required="required"/></div>
				  </div>

				  <div class="row"><br>
					   <div class="col-xs-12"><label id="labeldesc"><span class="glyphicon glyphicon-share" aria-hidden="true"></span> Description</label></div>
					   <div class="col-xs-12"><textarea  id="desc"  maxlength="1000" placeholder="Enter Business Description" name="desc" value="<?php echo (isset($listing->description) ? $listing->description: '')?>" class="desc"><?php echo (isset($listing->description) ? $listing->description: '')?></textarea></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label id="labelAddr" ><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Address</label></div>
					   <div class="col-xs-12"><input id="addr" onclick="init()"maxlength="1000" name="addr" placeholder="Enter Address" value="<?php echo (isset($listing->address) ? $listing->address: '')?>"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label id="labelC"><span class="glyphicon glyphicon-road" aria-hidden="true"></span> City</label></div>
					   <div class="col-xs-12"><input id="city" maxlength="45" name="city" placeholder="Enter City Name"  value="<?php echo (isset($listing->city) ? $listing->city: '')?>"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label id="labelZip"><span class="glyphicon glyphicon-road" aria-hidden="true"></span> Zip</label></div>
					    <div class="col-xs-12"><input id="zip"  maxlength="8" name="zip" placeholder="Enter Zip Code"  value="<?php echo (isset($listing->zip) ? $listing->zip: '')?>"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label  id="labelLng"><span class="glyphicon glyphicon-globe " aria-hidden="true"></span> Website</label></div>
					    <div class="col-xs-12"><input id="web" maxlength="255" name="web"  placeholder="Ex:http://sahyadriwebsolution.com/wpbusinessdirectoryplugin" value="<?php echo (isset($listing->website) ? $listing->website: '')?>"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label  id="labelphno"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> Phone No</label></div>
					    <div class="col-xs-12"><input id="phno" name="phno"  maxlength="20" placeholder="xxxxxxxxxx or (xxx) xxx xxxx" value="<?php echo (isset($listing->phone) ? $listing->phone: '')?>"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label  id="labelEmail"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email ID</label>*</div>
					    <div class="col-xs-12"><input id="email" maxlength="255"  style="text-transform:lowercase;"  placeholder="Enter Email Address" name="email"  value="<?php echo (isset($listing->email) ? $listing->email: '')?>"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a><label  id="labelFb">FB Account</label></div>
					    <div class="col-xs-12"><input id="FB" name="FB" maxlength="255"  placeholder="Ex:https://www.facebook.com/wp-business-directroy-plugin" value="<?php echo (isset($listing->fb) ? $listing->fb: '')?>"/></div>
				   </div>

				    <div class="row"><br>
					   <div class="col-xs-12"><a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a><label  id="labelTwiiter">Twitter Account</label></div>
					    <div class="col-xs-12"><input id="Twiiter" maxlength="255"  placeholder="Ex:https://twitter.com/wp-business-directroy-plugin" name="Twiiter"  value="<?php echo (isset($listing->tw) ? $listing->tw: '')?>"/></div>
				   </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><a class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a><label  id="labelGp">Google Plus</label></div>
					    <div class="col-xs-12"><input id="GP" name="GP" placeholder="Ex:https://plus.google.com/wp-business-directroy-plugin" maxlength="255"  value="<?php echo (isset($listing->googleplus) ? $listing->googleplus: '')?>"/></div>
				   </div>

				    <div class="row"><br>
					   <div class="col-xs-12"><a class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a><label  id="labelLi">Linked In</label></div>
					    <div class="col-xs-12"><input id="LI" maxlength="255"  placeholder="Ex:https://www.linkedin.com/wp-business-directroy-plugin" name="linkedin"  value="<?php echo (isset($listing->linkedin) ? $listing->linkedin: '')?>"/></div>
				   </div>

				    <div class="row"><br>
					   <div class="col-xs-12"><label id="labelblog"><span class="glyphicon glyphicon-globe " aria-hidden="true"></span> Blog</label></div>
					    <div class="col-xs-12"><input id="blog" name="blog" maxlength="255" placeholder="Ex:http://sahyadriwebsolution.com/blog" value="<?php echo (isset($listing->blog) ? $listing->blog: '')?>"/></div>
				   </div>

				    <div class="row"><br>
					   <div class="col-xs-12"><label><span class="glyphicon glyphicon-tags" aria-hidden="true"> Keyword</label></div>
					    <div class="col-xs-12"><input id="special" name="special" placeholder="Tags" maxlength="1000"  value="<?php echo (isset($listing->tags) ? $listing->tags: '')?>"/></div>
				   </div>

			 
		  
		  </div>		  
                  <div class="col-xs-6">
                      <div class="col-xs-12">
                      <h4><span class="glyphicon glyphicon-map-marker" data-toggle="tooltip" data-placement="top" title="Allow to display physical location using Google Maps" aria-hidden="true"></span>
                          <?php _e('Map','wp-business-directroy-plugin');?></h4><br>
                          <div class="col-xs-6"><input type="text" name="lat" value="<?php echo (isset($listing->lat) ? $listing->lat: '')?>" placeholder="Latitude" ></div>
                          <div class="col-xs-6"><input type="text" name="glong" value="<?php echo (isset($listing->glong) ? $listing->glong: '')?>" placeholder="Longitude" ></div>
                      <div id="map_canvas"></div>
                      </div>
                      <div class="col-xs-12"><hr>
                          <h4><span class="glyphicon glyphicon-tag" data-toggle="tooltip" data-placement="top" title="Select Categories for listing" aria-hidden="true"></span>
                              <?php _e('Categories','wp-business-directroy-plugin');?></h4><br>
                              <?php 
                                global $wpdb;
		                $listing_categorys = $wpdb->get_results( "SELECT c.cid FROM {$wpdb->prefix}wpbdp_listing_categories lc,{$wpdb->prefix}wpbdp_categories c where c.cid=lc.cid AND listing_id=$listing->id" );                                
                                $checkedlisting_categorys=array();
                                foreach ($listing_categorys as $listing_category){
                                     $checkedlisting_categorys[]=$listing_category->cid; 
                                }
                                ?>
                          <?php
                             global $wpdb;
                             $categories = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}wpbdp_categories" );
                            ?>
                          <?php foreach ($categories as $category){?>	
                          <label class="checkbox-inline">
                              <input type="checkbox" <?php if(in_array($category->cid, $checkedlisting_categorys)) echo 'checked';?> name="category[]" value="<?php echo $category->cid?>"><?php _e($category->category_name,'wp-business-directroy-plugin');?><br>
                          </label>
								
	  		
		          <?php }?>
                      
                      
                      
                      </div>
                    <div class="col-xs-12">
                          <hr>
                          <?php
                          $logoImage="";
                                $path_info = wp_upload_dir();	
                                $logo = $path_info['basedir'].'/wp_business_directory_plugin/logo/logo_'.$listing->id."-200x200.jpg";
                                if(file_exists($logo)){
                                     $logopath = $path_info['baseurl'].'/wp_business_directory_plugin/logo/logo_'.$listing->id."-200x200.jpg";                      
                                    $logoImage.="<img src='$logopath' style='max-width:80px'>".'<a href="'.$_SERVER["PHP_SELF"].'?page=wpbdp-edit-listing&edit_listing_id='.$listing->id.'&edit=Edit&remove=logo"><span style="color:red; vertical-align: top;" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>';
                                    echo '<div class="col-md-12">'.$logoImage.'</div>';
                                }
                          ?><div class="col-xs-12">
                          <h4><span class="glyphicon glyphicon-picture" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Upload Logo for listing"></span>
                              <?php _e('Upload Logo/Listing Image','wp-business-directroy-plugin');?></h4><br>
                                    <input id="uploadBtn" type="file" name="logo" class="upload" />   
                          </div>
                          </div>
                      <div class="col-xs-12">
                          <hr>
                          <?php
                       $return='';
                       $image_4 = $path_info['basedir'].'/wp_business_directory_plugin/image_'.$listing->id."_0.jpg";
                       if(file_exists($image_4)){
                            $image_4_path = $path_info['baseurl'].'/wp_business_directory_plugin/image_'.$listing->id."_0.jpg";                            
                           $image_4_Image.='<img src="'.$image_4_path.'" style="max-width:80px">'.'<a href="'.$_SERVER["PHP_SELF"].'?page=wpbdp-edit-listing&edit_listing_id='.$listing->id.'&edit=Edit&remove=image&image_id=0"><span style="color:red; vertical-align: top;" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>';
                           $return.=$image_4_Image.' ';
                       }
                       $image_one = $path_info['basedir'].'/wp_business_directory_plugin/image_'.$listing->id."_1.jpg";
                       if(file_exists($image_one)){
                            $image_one_path = $path_info['baseurl'].'/wp_business_directory_plugin/image_'.$listing->id."_1.jpg";                      
                           $image_1_Image.="<img src='$image_one_path' style='max-width:80px'>".'<a href="'.$_SERVER["PHP_SELF"].'?page=wpbdp-edit-listing&edit_listing_id='.$listing->id.'&edit=Edit&remove=image&image_id=1"><span style="color:red; vertical-align: top;" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>';
                           $return.=$image_1_Image.' ';
                       }
                       
                       $image_2 = $path_info['basedir'].'/wp_business_directory_plugin/image_'.$listing->id."_2.jpg";
                       if(file_exists($image_2)){
                            $image_2_path = $path_info['baseurl'].'/wp_business_directory_plugin/image_'.$listing->id."_2.jpg";                      
                           $image_2_Image.="<img src='$image_2_path' style='max-width:80px'>".'<a href="'.$_SERVER["PHP_SELF"].'?page=wpbdp-edit-listing&edit_listing_id='.$listing->id.'&edit=Edit&remove=image&image_id=2"><span style="color:red; vertical-align: top;" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>';
                           $return.=$image_2_Image.' ';
                       }
                       
                       $image_3 = $path_info['basedir'].'/wp_business_directory_plugin/image_'.$listing->id."_3.jpg";
                       if(file_exists($image_3)){
                            $image_3_path = $path_info['baseurl'].'/wp_business_directory_plugin/image_'.$listing->id."_3.jpg";                      
                           $image_3_Image.="<img src='$image_3_path' style='max-width:80px'>".'<a href="'.$_SERVER["PHP_SELF"].'?page=wpbdp-edit-listing&edit_listing_id='.$listing->id.'&edit=Edit&remove=image&image_id=3"><span style="color:red; vertical-align: top;" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>';
                           $return.=$image_3_Image.' ';
                       }
                       
                       
                       echo "<div class='col-md-12'>$return</div>";
                          ?>
                          <div class="col-xs-12">
                          <h4><span class="glyphicon glyphicon-picture" data-toggle="tooltip" data-placement="top" title="Allow users to put more images on listings" aria-hidden="true"></span>
                              <?php _e('Upload Images/Screenshots','wp-business-directroy-plugin');?></h4><br>
                                    <input id="uploadBtn1" type="file" name="image[]" class="upload" />
                                    <input id="uploadBtn2" type="file" name="image[]" class="upload" />
                                    <input id="uploadBtn3" type="file" name="image[]" class="upload" />
                                    <input id="uploadBtn4" type="file" name="image[]" class="upload" />
                                    
                          </div>
                      </div>
                      
                           <?php
                               
                                $attachment = $path_info['basedir'].'/wp_business_directory_plugin/file/'.$listing->attachment;
                                $attachmentfile=$listing->attachment;
                                if((!empty($listing->attachment)) && file_exists($attachment)){
                                     $attachmentpath = $path_info['baseurl'].'/wp_business_directory_plugin/file/'.$listing->attachment;
                                     $attachmentRemovePath=get_bloginfo('url')."?page=wpbdp-edit-listing&edit_listing_id=$listing->id&edit=Edit&remove=file";
                                    $attachmentfile="<div class='col-md-6'><a href='$attachmentpath' target='_blank'><span class='glyphicon glyphicon-pushpin' aria-hidden='true'></span> View Attachment</a></div>";
                                    $attachmentfile.="<div class='col-md-6'><a href='$attachmentRemovePath'><span style='color:red' class='glyphicon glyphicon-remove' aria-hidden='true'></span> Remove Attachment</a></div>";
                                    echo '<div class="col-md-12"><hr>'.$attachmentfile.'</div><hr>';
                                } 
                          ?> <div class="col-xs-12"><hr>
                            <h4><span class="glyphicon glyphicon-paperclip" data-toggle="tooltip" data-placement="top" title="Upload files for quote requests, resumes, or anything you can think of. You can also put more information on your business listings, such as menus, price sheets, or other user-useful documents.Supports :Pdf/Office/Image files are only allowed!" aria-hidden="true"></span>
                                <?php _e('Upload File','wp-business-directroy-plugin');?></h4><br>File attachment to listings<br>
                             <input id="uploadBtn5" type="file" name="file" class="upload" />
                                           
                      </div>
                     </div>
                     
                  </div>
     
     <div class="row col-xs-12"><hr>
                        <div class="col-xs-6">
                            <span class="glyphicon glyphicon-flag" data-toggle="tooltip" data-placement="right" title="Make status Pending/Publish" aria-hidden="true"></span> Listing Status <br><br>
                            <select name="wpblp_new_post_status" id="status">
                                 <option <?php if($listing->status=="Pending") echo 'selected="selected"'; ?> value="Pending">Pending</option>
                                 <option <?php if($listing->status=="Publish") echo 'selected="selected"'; ?> value="Publish">Publish</option>
                             </select>
                        </div>
                    <div class="col-xs-6">
                        <span class="glyphicon glyphicon-flag" data-toggle="tooltip" data-placement="right" title="Make status Active/Deactive" aria-hidden="true"></span> Listing Status<br><br>
                            <select name="wpblp_is_active" id="is_active">
                                 <option <?php if($listing->is_active=="0") echo 'selected="selected"'; ?> value="0">Deactivate</option>
                                 <option <?php if($listing->is_active=="1") echo 'selected="selected"'; ?> value="1">Activate</option>
                             </select>
                        </div>
                    </div>
     <div class="row col-xs-12"><hr>
         <div class="col-xs-6"><a href="<?php echo "".get_permalink()."?page=wpbdp-comments&listing_id=$listing->id"; ?>"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> View comments</a></div>
         <div class="col-xs-6"></div>
     </div>
     <div class="row col-xs-12"><hr>
        <?php if(isset($listing->user_id)){ 
            $Userdata = get_userdata($listing->user_id);
         echo '<div class="col-xs-6"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Created By: '.$Userdata->user_login.' (User ID :'.$listing->user_id.')</div>';
        }?>
         <?php if(isset($listing->created_date)){ 
         echo '<div class="col-xs-6"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Created Date: '.$listing->created_date.'</div>';
        }?>         
         <?php if(isset($listing->modify_by)){               
         echo '<div class="col-xs-6"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Last Modify By: '.$listing->modify_by.'</div>';
        }?>         
          <?php if(isset($listing->modify_date)){ 
         echo '<div class="col-xs-6"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Modify Date: '.$listing->modify_date.'</div>';
        }?>         
        
        
     </div>
</div>
    
  </div>
  <div class="panel-footer">
  <input type="submit" class="btn btn-primary" value="<?php _e('Save','wp-business-directroy-plugin');?>" name="save"/>
  <?php echo '<a href="'.get_permalink().'?page=wpbdp-listing"
		    ><span class="btn btn-primary">';
			_e('Cancle','wp-business-directroy-plugin');
			echo '</span></a>';?>
</div>
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
                          'image[]':{
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
                           'image[]':{accept:"Please select a valid file."}
                      }
                      
          });
      });
      
    
 

    $(function () {
  $('[data-toggle="tooltip"]').tooltip();
})
 </script>
<?php

        }else{
            @wp_redirect(get_permalink()."/wp-admin/admin.php?page=wpbdp-listing");
        }
    }else{
            @wp_redirect(get_permalink()."/wp-admin/admin.php?page=wpbdp-listing");
        } ?>