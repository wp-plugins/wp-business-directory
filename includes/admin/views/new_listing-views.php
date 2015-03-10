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
    <h2 class="panel-title"><?php _e('Add New Listing','wp-business-directroy-plugin');?></h2>
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
                          <?php _e('General','wp-business-directroy-plugin');?></h4><br>

				  <div class="row">
					   <div class="col-xs-12"><label id="labelNm"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Name</label>*</div>
					   <div class="col-xs-12"><input id="nm" name="nm" placeholder="Enter Business Listing Name" maxlength="45" value="<?php echo (isset($_POST['nm']) ? $_POST['nm']: '')?>" required="required"/></div>
				  </div>

				  <div class="row"><br>
					   <div class="col-xs-12"><label id="labeldesc"><span class="glyphicon glyphicon-share" aria-hidden="true"></span> Description</label></div>
					   <div class="col-xs-12"><textarea  id="desc"  maxlength="1000" placeholder="Enter Business Description" name="desc" value="<?php echo (isset($_POST['desc']) ? $_POST['desc']: '')?>" class="desc"></textarea></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label id="labelAddr" ><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Address</label></div>
					   <div class="col-xs-12"><input id="addr" onclick="init()"maxlength="1000" name="addr" placeholder="Enter Address" value="<?php echo (isset($_POST['addr']) ? $_POST['addr']: '')?>"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label id="labelC"><span class="glyphicon glyphicon-road" aria-hidden="true"></span> City</label></div>
					   <div class="col-xs-12"><input id="city" maxlength="45" name="city" placeholder="Enter City Name"  value="<?php echo (isset($_POST['city']) ? $_POST['city']: '')?>"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label id="labelZip"><span class="glyphicon glyphicon-road" aria-hidden="true"></span> Zip</label></div>
					    <div class="col-xs-12"><input id="zip"  maxlength="8" name="zip" placeholder="Enter Zip Code"  value="<?php echo (isset($_POST['zip']) ? $_POST['zip']: '')?>"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label  id="labelLng"><span class="glyphicon glyphicon-globe " aria-hidden="true"></span> Website</label></div>
					    <div class="col-xs-12"><input id="web" maxlength="255" name="web"  placeholder="Ex:http://sahyadriwebsolution.com/wpbusinessdirectoryplugin" value="<?php echo (isset($_POST['web']) ? $_POST['web']: '')?>"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label  id="labelphno"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> Phone No</label></div>
					    <div class="col-xs-12"><input id="phno" name="phno"  maxlength="20" placeholder="xxxxxxxxxx or (xxx) xxx xxxx" value="<?php echo (isset($_POST['phno']) ? $_POST['phno']: '')?>"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><label  id="labelEmail"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email ID</label>*</div>
					    <div class="col-xs-12"><input id="email" maxlength="255"  style="text-transform:lowercase;"  placeholder="Enter Email Address" name="email"  value="<?php echo (isset($_POST['email']) ? $_POST['email']: '')?>"/></div>
				  </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a><label  id="labelFb">FB Account</label></div>
					    <div class="col-xs-12"><input id="FB" name="FB" maxlength="255"  placeholder="Ex:https://www.facebook.com/wp-business-directroy-plugin" value="<?php echo (isset($_POST['FB']) ? $_POST['FB']: '')?>"/></div>
				   </div>

				    <div class="row"><br>
					   <div class="col-xs-12"><a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a><label  id="labelTwiiter">Twitter Account</label></div>
					    <div class="col-xs-12"><input id="Twiiter" maxlength="255"  placeholder="Ex:https://twitter.com/wp-business-directroy-plugin" name="Twiiter"  value="<?php echo (isset($_POST['Twiiter']) ? $_POST['Twiiter']: '')?>"/></div>
				   </div>

				   <div class="row"><br>
					   <div class="col-xs-12"><a class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a><label  id="labelGp">Google Plus</label></div>
					    <div class="col-xs-12"><input id="GP" name="GP" placeholder="Ex:https://plus.google.com/wp-business-directroy-plugin" maxlength="255"  value="<?php echo (isset($_POST['GP']) ? $_POST['GP']: '')?>"/></div>
				   </div>

				    <div class="row"><br>
					   <div class="col-xs-12"><a class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a><label  id="labelLi">Linked In</label></div>
					    <div class="col-xs-12"><input id="LI" maxlength="255"  placeholder="Ex:https://www.linkedin.com/wp-business-directroy-plugin" name="linkedin"  value="<?php echo (isset($_POST['linkedin']) ? $_POST['linkedin']: '')?>"/></div>
				   </div>

				    <div class="row"><br>
					   <div class="col-xs-12"><label id="labelblog"><span class="glyphicon glyphicon-globe " aria-hidden="true"></span> Blog</label></div>
					    <div class="col-xs-12"><input id="blog" name="blog" maxlength="255" placeholder="Ex:http://sahyadriwebsolution.com/blog" value="<?php echo (isset($_POST['blog']) ? $_POST['blog']: '')?>"/></div>
				   </div>

				    <div class="row"><br>
					   <div class="col-xs-12"><label><span class="glyphicon glyphicon-tags" aria-hidden="true"> Keyword</label></div>
					    <div class="col-xs-12"><input id="special" name="special" placeholder="Tags" maxlength="1000"  value="<?php echo (isset($_POST['special']) ? $_POST['special']: '')?>"/></div>
				   </div>

			 
		  
		  </div>		  
                  <div class="col-xs-6">
                      <div class="col-xs-12">
                      <h4><span class="glyphicon glyphicon-map-marker" data-toggle="tooltip" data-placement="top" title="Allow to display physical location using Google Maps" aria-hidden="true"></span>
                          <?php _e('Map','wp-business-directroy-plugin');?></h4><br>
                          <div class="col-xs-6"><input type="text" name="lat" value="<?php echo (isset($_POST['lat']) ? $_POST['lat']: '')?>" placeholder="Latitude" ></div>
                          <div class="col-xs-6"><input type="text" name="glong" value="<?php echo (isset($_POST['glong']) ? $_POST['glong']: '')?>" placeholder="Longitude" ></div>
                      <div id="map_canvas"></div>
                      </div>
                      <div class="col-xs-12"><hr>
                          <h4><span class="glyphicon glyphicon-tag" data-toggle="tooltip" data-placement="top" title="Select Categories for listing" aria-hidden="true"></span>
                              <?php _e('Categories','wp-business-directroy-plugin');?></h4><br>
                          <?php
                             global $wpdb;
                             $categories = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}wpbdp_categories" );
                            ?>
                          <?php foreach ($categories as $category){?>	
                          <label class="checkbox-inline">
                          <input type="checkbox" name="category[]" value="<?php echo $category->cid?>"><?php _e($category->category_name,'wp-business-directroy-plugin');?><br>
                          </label>
								
	  		
		          <?php }?>
                      
                      
                      
                      </div>
                    <div class="col-xs-12">
                          <hr>
                          <h4><span class="glyphicon glyphicon-picture" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Upload Logo for listing"></span>
                              <?php _e('Upload Logo/Listing Image','wp-business-directroy-plugin');?></h4><br>
                                    <input id="uploadBtn" type="file" name="logo" class="upload" />   
                      </div>
                      <div class="col-xs-12">
                          <hr>
                          <h4><span class="glyphicon glyphicon-picture" data-toggle="tooltip" data-placement="top" title="Allow users to put more images on listings" aria-hidden="true"></span>
                              <?php _e('Upload Images/Screenshots','wp-business-directroy-plugin');?></h4><br>
                                    <input id="uploadBtn1" type="file" name="image[]" class="upload" />
                                    <input id="uploadBtn2" type="file" name="image[]" class="upload" />
                                    <input id="uploadBtn3" type="file" name="image[]" class="upload" />
                                    <input id="uploadBtn4" type="file" name="image[]" class="upload" />
                                    
                      </div>
                       <div class="col-xs-12"><hr>  
                            <h4><span class="glyphicon glyphicon-paperclip" data-toggle="tooltip" data-placement="top" title="Upload files for quote requests, resumes, or anything you can think of. You can also put more information on your business listings, such as menus, price sheets, or other user-useful documents.Supports :Pdf/Office/Image files are only allowed!" aria-hidden="true"></span>
                                <?php _e('Upload File','wp-business-directroy-plugin');?></h4><br>File attachment to listings<br>
                             <input id="uploadBtn5" type="file" name="file" class="upload" />
                                           
                      </div>
                     </div>
                      
                      
                  </div>
		</div>
    
  </div>
  <div class="panel-footer">
  <input type="submit" class="btn btn-primary" value="<?php _e('Save','wp-business-directroy-plugin');?>" name="save"/>
  <?php echo '<a href="'.get_bloginfo('url').'/wp-admin/admin.php?page=wpbdp-listing"
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
 