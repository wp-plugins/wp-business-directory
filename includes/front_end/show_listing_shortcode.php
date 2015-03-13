<?php
  if(isset($_GET['page_id'])){
        $permalink='&list=';
        $permalinkcat='&cid=';
        
    }else{
        $permalink='?list=';
        $permalinkcat='?cid=';
    }
    $sussesEmailFlag="";
    if(isset($_GET['list'])){
        $return.='<div class="col-md-12"><a href="'.get_permalink().'"><button>Back to Listing</button></a></div>';
        global $wpdb;
        $listId=$_GET['list'];
        $listings = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}wpbdp_listing where id=$listId");        
        if(count($listings)==1){  
            $listing=$listings[0];
                               $listing_categorys = $wpdb->get_results( "SELECT c.category_name,c.cid FROM {$wpdb->prefix}wpbdp_listing_categories lc,{$wpdb->prefix}wpbdp_categories c where c.cid=lc.cid AND listing_id=$listing->id" );
                                $listing_categorys_count=count($listing_categorys);
                                $cidcnt=1;
                                foreach ($listing_categorys as $listing_category){
                                    if($listing_categorys_count>1 && $cidcnt>1){
                                         $Businesslisting_category.=", ";
                                    }
                                     $Businesslisting_category.='<a href="'.get_permalink().$permalinkcat.$listing_category->cid.'">'.$listing_category->category_name.'</a>';                                     
                                     $cidcnt++;
                                }
                        $return.='<style>.tab-content input, textarea {
                                width: 70%;
                            }</style><div class="col-md-12 odd gradeX">';
 if(get_option('wpblp_show_map')==1 && (!empty($listing->lat)) && (!empty($listing->glong))){
                       $return.='<div class="col-md-12"><div id="map" class="map" style="height: 300px"></div><hr></div> ';
                    
		      $return.="<script>
                                    var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                                            osmAttrib = '&copy; <a href=\"http://openstreetmap.org/copyright\">OpenStreetMap</a> contributors',
                                            osm = L.tileLayer(osmUrl, {maxZoom: 18, attribution: osmAttrib});

                                    var map = L.map('map').setView([$listing->lat, $listing->glong], 15).addLayer(osm);

                                    L.marker([$listing->lat, $listing->glong])
                                            .addTo(map)
                                            .bindPopup('$listing->business_name.')
                                            .openPopup();
                            </script>";
                      }
                       $return.='<div class="col-md-9">';
                       if(!empty($listing->business_name)){
                         $return.='<a href="'.$permalink.$listing->id.'"><h4>'.$listing->business_name.'</h4></a>';
                       }
                       if(!empty($listing->address)){
                         $return.='<span class="glyphicon glyphicon-home" aria-hidden="true"></span> <strong>Address:</strong>'.$listing->address;
                       }
                         if(!empty($listing->city)){
                            $return.=', '.$listing->city;
                         }
                           if(!empty($listing->zip)){
                                $return.=', '.$listing->zip;
                               
                           }
                       if(!empty($listing->description)){                           
                         $return.='<br><span class="glyphicon glyphicon-share" aria-hidden="true"></span> <strong>Description:</strong>'.$listing->description;
                                 
                       }
                       if(!empty($listing->phone)){
                         $return.='<br><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> <strong>Contact No.:</strong>'.$listing->phone;
                       }
                       if(!empty($Businesslisting_category)){
                         $return.='<br><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> <strong>Category:</strong>'.$Businesslisting_category;
                       }
                       if(!empty($listing->tags)){
                         $return.='<br><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> <strong>Tags:</strong>'.$listing->tags;
                       }
                       if(!empty($listing->website)){
                         $return.='<br><span class="glyphicon glyphicon-globe " aria-hidden="true"></span> <a href="'.$listing->website.'" target="_blank">'.$listing->website.'</a>';
                       } 
                       $return.='<br>';
                       if(!empty($listing->fb)){
                         $return.='<a href="'.$listing->fb.'" target="_blank" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>';
                       }
                       if(!empty($listing->tw)){
                         $return.=' <a href="'.$listing->tw.'" target="_blank" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>';
                       }
                       if(!empty($listing->googleplus)){
                         $return.=' <a href="'.$listing->googleplus.'" target="_blank" class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a>';
                       }
                       if(!empty($listing->linkedin)){
                         $return.=' <a href="'.$listing->linkedin.'" target="_blank" class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>';
                       }
                    $return.='</div>';
                       $logoImage="";
                       $path_info = wp_upload_dir();	
                       $logo = $path_info['basedir'].'/wp_business_directory_plugin/logo/logo_'.$listing->id."-200x200.jpg";
                       if(file_exists($logo)){
                            $logopath = $path_info['baseurl'].'/wp_business_directory_plugin/logo/logo_'.$listing->id."-200x200.jpg";                      
                           $logoImage.="<img src='$logopath' style='max-width:100px'>";
                           $return.='<div class="col-md-2">'.$logoImage.'</div>';
                       }
                      
                       $return.="</div>";   
                       $return1="";
                       $return.='<div class="col-md-10 gallery clearfix"">';
                       $image_one = $path_info['basedir'].'/wp_business_directory_plugin/image_'.$listing->id."_1.jpg";
                       if(file_exists($image_one)){
                            $image_one_path = $path_info['baseurl'].'/wp_business_directory_plugin/image_'.$listing->id."_1.jpg";                      
                           $image_1_Image='<a href="'.$image_one_path.'" rel="prettyPhoto[gallery2]" title="'.$listing->business_name.'">'."<img src='$image_one_path' style='max-width:100px'></a>";
                           $return1.=$image_1_Image.' ';
                       }
                       
                       $image_2 = $path_info['basedir'].'/wp_business_directory_plugin/image_'.$listing->id."_2.jpg";
                       if(file_exists($image_2)){
                            $image_2_path = $path_info['baseurl'].'/wp_business_directory_plugin/image_'.$listing->id."_2.jpg";                      
                           $image_2_Image='<a href="'.$image_2_path.'" rel="prettyPhoto[gallery2]" title="'.$listing->business_name.'">'."<img src='$image_2_path' style='max-width:100px'></a>";
                           $return1.=$image_2_Image.' ';
                       }
                       
                       $image_3 = $path_info['basedir'].'/wp_business_directory_plugin/image_'.$listing->id."_3.jpg";
                       if(file_exists($image_3)){
                            $image_3_path = $path_info['baseurl'].'/wp_business_directory_plugin/image_'.$listing->id."_3.jpg";                      
                           $image_3_Image='<a href="'.$image_3_path.'" rel="prettyPhoto[gallery2]" title="'.$listing->business_name.'">'."<img src='$image_3_path' style='max-width:100px'></a>";
                           $return1.=$image_3_Image.' ';
                       }
                       
                       $image_4 = $path_info['basedir'].'/wp_business_directory_plugin/image_'.$listing->id."_0.jpg";
                       if(file_exists($image_4)){
                            $image_4_path = $path_info['baseurl'].'/wp_business_directory_plugin/image_'.$listing->id."_0.jpg";                      
                           $image_4_Image='<a href="'.$image_4_path.'" rel="prettyPhoto[gallery2]" title="'.$listing->business_name.'"><img src="'.$image_4_path.'" style="max-width:100px"></a>';
                           $return1.=$image_4_Image.' ';
                       }
                       if(!empty($return1)){
                           $return.='<hr>';
                       }
                       $return.=$return1;
                       $return.='</div>';
                       
                        $attachment = $path_info['basedir'].'/wp_business_directory_plugin/file/'.$listing->attachment;
                                $attachmentfile=$listing->attachment;
                                if((!empty($listing->attachment)) && file_exists($attachment)){
                                     $attachmentpath = $path_info['baseurl'].'/wp_business_directory_plugin/file/'.$listing->attachment;
                                     $attachmentRemovePath=$_SERVER['PHP_SELF']."?page=wpbdp-edit-listing&edit_listing_id=$listing->id&edit=Edit&remove=file";
                                    $attachmentfile="<div class='col-md-6'><a href='$attachmentpath' target='_blank'><span class='glyphicon glyphicon-paperclip' aria-hidden='true'></span> View Attachment</a></div>";                                   
                                    $return.='<div class="col-md-12"><hr>'.$attachmentfile.'</div>';
                                } 
                      
                       $return.='<div class="col-md-12" style="text-align:center;"><hr>';                      
                      $return.='<div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs col-md-12" role="tablist">';
                       $activeTab="";
                      if(get_option('wpblp_show_comment_form')==1)
                      {
                          $return.='<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Comment</a></li>';
                      }else {
                            $activeTab="active";
                        }
                        if(isset($_POST['comment']) && $_POST['comment']=="Comment" && isset($_POST['username']) && isset($_POST['usercomment']) && isset($_POST['useremail'])){
                         if(get_option('wpblp_new_comment_status')){
                                $wpblp_new_comment_status=get_option('wpblp_new_comment_status');
                            } else{
                                $wpblp_new_comment_status="Pending";
                            }
                             if(get_option('wpblp_new_comment_status')=="Pending"){
                                 $cmtMessage="Your comment are waiting for approval.";
                             }else{
                                  $cmtMessage="Your comment was added successfully!";
                             }
                            $values=array('listing_id'=>$listing->id,'view_name'=>$_POST['username'],'view_email'=>$_POST['useremail'],'comment'=>$_POST['usercomment'],'status'=>$wpblp_new_comment_status);		
                                if($wpdb->insert($wpdb->prefix.'wpbdp_comment',$values)){
                                       $sussesEmailFlag="<span class='label label-success'>$cmtMessage</span>";
                                }
                        }
                        
                        if(isset($_POST['comment']) && $_POST['comment']=="Submit" && isset($_POST['emailname']) && isset($_POST['emailaddress']) && isset($_POST['textmessage'])){
                            $subject="Listing -".$listing->business_name;                             
                            $emailtext=$_POST['textmessage'];
                            $emailtext.="<br><br>You're receiving this email because you have submited listing (".$listing->business_name.") on <a href='".get_permalink()."' target='_blank'>".get_permalink()."</a>";
                            $emailtext.="<br><br>If you have any questions, comments or suggestions for improvement, please feel free to contact us.<br><br>
                               Cheers,<br>".get_site_url();
                            $headers[] = 'From:'. $_POST['emailname'].' <'.$_POST['emailaddress'].'>';  
                            add_filter( 'wp_mail_content_type', function( $content_type ) {
                                    return 'text/html';
                            });
                            if(wp_mail( $listing->email, $subject,$emailtext,$headers)){
                                $sussesEmailFlag="<span class='label label-success'>Your message was sent successfully!</span>";
                            }
                            
                        }
                        if(get_option('wpblp_show_contact_form')==1)
                         {
                             
                            
                        if(get_option('wpblp_show_contact_form')==1)
                        {
                          $return.='<li role="presentation" class="'.$activeTab.'"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Send Message</a></li>';
                         }
                        $return.='</ul>

                        <!-- Tab panes -->
                        <div class="tab-content">';                       
                        if(get_option('wpblp_show_comment_form')==1)
                        {
                          $return.='<div role="tabpanel" class="tab-pane active" id="home">';
                          // List comment                          
                           $return.='<style>
                                    td, tr, th, table
                                    {
                                    border:none !important;
                                   }
                                   .dataTables_filter {
                                        display: none;
                                    }
                        </style>
                        <div class="col-md-12"><h4>Comments</h4>
       
                            <div class="table-responsive">
                              <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <table class="table table-striped table-bordered table-hover display" id="example">
                                  <thead>
                                <tr>
                                <th></th>
                                </tr>
                                </thead>
                                  <tbody>';
                           $listings_comments = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}wpbdp_comment WHERE listing_id=$listing->id AND status='Publish'" );     
                           foreach ($listings_comments as $listings_comments){
                              $return.='<tr class="odd gradeX">
                                     <td>';   
                              $return.=$listings_comments->comment;
                              $return.="<br>comment by : ".$listings_comments->view_name." | ".$listings_comments->create_date;
                              $return.='</td></tr>';
  
                           }
                           $return.=' </tbody>
                                        </table>
                                      </div>
                                    </div>
                                    <!-- /.table-responsive --> 
                                  <hr></div>';                
                          $return.='<h4>Comment to listing</h4>
                          <form action="'.esc_url( $_SERVER['REQUEST_URI'] ).'" method="post">
                          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                          <input type="text" name="username" placeholder="Your Name" required><br><br>
                          <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                          <input type="text" name="useremail" placeholder="Your Email" required><br><br>
                          <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                          <textarea id="wpbdpl-contact-form-message" name="usercomment" rows="4" placeholder="Comment" maxlength="500" required></textarea><br><br>
                          <input style="width:30%" type="submit" name="comment" value="Comment">
                          </form>                          
                          </div>';                          
                        }
                         
                          $return.='<div role="tabpanel" class="tab-pane '.$activeTab.'" id="messages">
                          <h4>Send Message to listing owner</h4>
                          <form action="'.esc_url( $_SERVER['REQUEST_URI'] ).'" method="post">
                          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                          <input type="text" name="emailname" placeholder="Your Name" required><br><br>
                          <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                          <input type="text" name="emailaddress" placeholder="Your Email" required><br><br>
                          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                          <textarea id="wpbdpl-contact-form-message" name="textmessage" rows="4" placeholder="Message" maxlength="500" required></textarea><br><br>
                          <input style="width:30%" type="submit" name="comment" value="Submit">
                          </form>
                          </div>';
                        }
                        $return.='</div>
                        

                      </div>';
                      $return.='<div class="col-md-12">'.$sussesEmailFlag.'</div>';                       
                      $return.="</div>";
        }
    }else{
    global $wpdb;
   
    $searchlist="";
    
    if(isset($_GET['cid']))
    {
        $wpblp_categories_sort="";
		if(get_option('wpblp_categories_sort')=="ASC"){
			$wpblp_categories_sort="ORDER BY category_name ASC";
		}elseif(get_option('wpblp_categories_sort')=="DESC"){
			$wpblp_categories_sort="ORDER BY category_name DESC";
		} 	
	
        $cid=$_GET['cid'];
        $clistings = $wpdb->get_results("SELECT lc.category_name FROM  {$wpdb->prefix}wpbdp_listing as l , {$wpdb->prefix}wpbdp_listing_categories as c,{$wpdb->prefix}wpbdp_categories as lc WHERE c.cid=lc.cid AND l.id=c.listing_id AND lc.cid=$cid group BY c.cid $wpblp_categories_sort");       
	
        $listings = $wpdb->get_results("SELECT l.id, l.business_name, l.phone,l.address, l.website,l.blog, l.fb,l.tw, l.googleplus, l.linkedin, l.description, l.tags FROM {$wpdb->prefix}wpbdp_listing l,{$wpdb->prefix}wpbdp_listing_categories c WHERE l.id=c.listing_id AND c.cid=$cid AND l.is_active=1 AND l.status='Publish'" );         
        $return.='<div class="col-md-12"><a href="'.get_permalink().'"><button><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> All Listings</button></a></div>';
         foreach ($clistings as $clistings){
            $return.='<div class="col-md-12"><h3>Category : '.$clistings->category_name.'<h3></div>';
         }
    }else if(isset($_GET['search']) && $_GET['search']=="Search"){
        if(isset($_GET['what']) && !empty($_GET['what']))
         {
             $searchlist.="AND (business_name LIKE '%".$_GET['what']."%' OR tags LIKE '%".$_GET['what']."%')";
         }
         if(isset($_GET['where']) && !empty($_GET['where']))
         {
             $searchlist.="AND (city LIKE '%".$_GET['where']."%' OR address LIKE '%".$_GET['where']."%' OR zip LIKE '%".$_GET['where']."%')";
         }
         $listings = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}wpbdp_listing  WHERE is_active=1 AND status='Publish' $searchlist" );     
    }else{
    $listings = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}wpbdp_listing  WHERE is_active=1 AND status='Publish'" );     
    }
	$return.='<style>
            td, tr, th, table
            {
            border:none !important;
           }
h4 {   
    margin: 5px 0 !important;
}</style> <div class="col-md-12">
       
            <div class="table-responsive">
              <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                <table class="table table-striped table-bordered table-hover display" id="example">
                  <thead>
		<tr>
                <th></th>
                <th></th>
     		</tr>
                </thead>
                  <tbody>';
        $Businesslisting_category="";
         foreach ($listings as $listing){
                               $Businesslisting_category="";
                               $listing_categorys = $wpdb->get_results( "SELECT c.category_name,c.cid FROM {$wpdb->prefix}wpbdp_listing_categories lc,{$wpdb->prefix}wpbdp_categories c where c.cid=lc.cid AND listing_id=$listing->id" );
                                $listing_categorys_count=count($listing_categorys);
                                $cidcnt=1;
                                foreach ($listing_categorys as $listing_category){
                                    if($listing_categorys_count>1 && $cidcnt>1){
                                         $Businesslisting_category.=", ";
                                    }
                                     $Businesslisting_category.='<a href="'.get_permalink().$permalinkcat.$listing_category->cid.'">'.$listing_category->category_name.'</a>';                                                                         
                                     $cidcnt++;
                                }
                        $return.='<tr class="odd gradeX">
                      <td>';
                       if(!empty($listing->business_name)){
                         $return.='<a href="'.get_permalink().$permalink.$listing->id.'"><h4>'.$listing->business_name.'</h4></a>';
                       }
                       if(!empty($listing->address)){
                         $return.='<span class="glyphicon glyphicon-home" aria-hidden="true"></span> <strong>Address:</strong>'.$listing->address;
                       }
                       if(!empty($listing->city)){
                            $return.=', '.$listing->city;
                         }
                           if(!empty($listing->zip)){
                                $return.=', '.$listing->zip;
                               
                           }
                       if(!empty($listing->description)){
                           if (strlen($listing->description) > 150){
                                      $description=substr($listing->description, 0, 150).".....";
                                }else{
                                         $description=$listing->description;
                                 }
                         $return.='<br><span class="glyphicon glyphicon-share" aria-hidden="true"></span> <strong>Description:</strong>'.$description;
                                 
                       }
                       if(!empty($listing->phone)){
                         $return.='<br><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> <strong>Contact No.:</strong>'.$listing->phone;
                       }
                       if(!empty($Businesslisting_category)){
                         $return.='<br><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> <strong>Category: </strong>'.$Businesslisting_category;
                       }
                       if(!empty($listing->tags)){
                         $return.='<br><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> <strong>Tags:</strong>'.$listing->tags;
                       }
                       if(!empty($listing->website)){
                         $return.='<br><span class="glyphicon glyphicon-globe " aria-hidden="true"></span> <a href="'.$listing->website.'" target="_blank">'.$listing->website.'</a>';
                       }$return.='<br>';
                       if(!empty($listing->fb)){
                         $return.='<a href="'.$listing->fb.'" target="_blank" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>';
                       }
                       if(!empty($listing->tw)){
                         $return.=' <a href="'.$listing->tw.'" target="_blank" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>';
                       }
                       if(!empty($listing->googleplus)){
                         $return.=' <a href="'.$listing->googleplus.'" target="_blank" class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a>';
                       }
                       if(!empty($listing->linkedin)){
                         $return.=' <a href="'.$listing->linkedin.'" target="_blank" class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>';
                       }
                         $return.='<br><a href="'.$permalink.$listing->id.'"><span class="label label-default">View</span></a>';
                    $return.='</td>';
                       $logoImage="";
                       $path_info = wp_upload_dir();	
                       $logo = $path_info['basedir'].'/wp_business_directory_plugin/logo/logo_'.$listing->id."-200x200.jpg";
                       if(file_exists($logo)){
                            $logopath = $path_info['baseurl'].'/wp_business_directory_plugin/logo/logo_'.$listing->id."-200x200.jpg";                      
                           $logoImage.="<img src='$logopath' style='max-width:100px'>";
                       }
                      $return.='<td>'.$logoImage.'</td>
                    </tr>';
         }      
                    
                 $return.=' </tbody>
                </table>
              </div>
            </div>
            <!-- /.table-responsive --> 
          </div> ';                
    }               
       
