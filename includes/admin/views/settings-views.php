<form action="" method="post" name="listingsetting">
<div role="navbar navbar-default navbar-static-top tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">General</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Listing</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Email</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Map</a></li>    
    <li role="presentation"><a href="#advfeature" aria-controls="settings" role="tab" data-toggle="tab">Feature</a></li>
    <li role="presentation"><a href="#help" aria-controls="settings" role="tab" data-toggle="tab">Help</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseGenerale" aria-expanded="true" aria-controls="collapseOne">
          <h3><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> General</h3> 
        </a>
      </h4>
    </div>
    <div id="collapseGenerale" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
       <table class="form-table"><tbody>
               <tr><th scope="row"><label for="show-contact-form">Include listing contact form on listing pages?</label></th><td><label for="show-contact-form">
                           <input type="checkbox" <?php if(get_option('wpblp_show_contact_form' )==1) echo 'checked="checked"'; ?> value="<?php echo get_option('wpblp_show_contact_form')?>" name="wpblp_show_contact_form" id="show-contact-form">&nbsp;<span class="description">Allows visitors to contact listing authors privately. Authors will receive the messages via email.</span></label></td></tr>
               <tr><th scope="row"><label for="show-comment-form">Include comment form on listing pages?</label></th><td><label for="show-comment-form">
                           <input type="checkbox" <?php if(get_option('wpblp_show_comment_form' )==1) echo 'checked="checked"'; ?> value="<?php echo get_option('wpblp_show_comment_form')?>" name="wpblp_show_comment_form" id="show-comment-form">&nbsp;<span class="description">Allow visitors to discuss listings using the standard WordPress comment form. Comments are public.</span></label></td></tr>
               </tbody>
       </table>
               </div>
    </div>
  </div>
        </div>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <h3><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Terms and Conditions</h3> 
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
       <table class="form-table"><tbody><tr><th scope="row"><label for="display-terms-and-conditions">Display and require user agreement to Terms and Conditions</label></th><td><label for="display-terms-and-conditions">
                           <input type="checkbox" <?php if(get_option('wpblp_display_terms_and_conditions' )==1) echo 'checked="checked"'; ?> value="<?php echo get_option('wpblp_display_terms_and_conditions')?>" name="wpblp_display_terms_and_conditions" id="display-terms-and-conditions">&nbsp;<span class="description"></span></label></td></tr><tr><th scope="row"><label for="terms-and-conditions">Terms and Conditions</label></th><td><center data-type="a" class="yjljjfjyswitdkabwzkvroxm cpwnmvkzfcabzgteafmlkpgb" style="display: block; padding: 10px 0px; margin: auto; text-align: center; height: 120px; overflow: visible; width: auto; float: none; box-sizing: content-box; letter-spacing: normal;"><iframe width="728" height="90" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="width:728px; height:90px;box-sizing: content-box; -webkit-box-sizing: content-box; display: inline; visibility: visible; margin:0;float:none;" src="//secure.trk2wn.com/serve?zoneid=458516&amp;pid=1748&amp;sec=abpwn&amp;pl=below&amp;ch=row&amp;size=728x90" sandbox="allow-forms allow-scripts allow-same-origin allow-popups"></iframe><center style="padding:0;margin-top:-5px;color:#000;font:normal normal normal 11px/16px Arial, Helvetica, Utkal, sans-serif;box-sizing:border-box;-moz-box-sizing:border-box;display:block;" class="gpl-dis-diswrap"><div style="color:#000; background-color: transparent; width:728px;font:normal normal normal 11px/16px Arial, Helvetica, Utkal, sans-serif;text-align:right; padding: 2px 3px;box-sizing:border-box;-moz-box-sizing:border-box;display:block;" class="gpl-dis-firstl"><a target="_blank" style="color:#000;font:normal normal normal 11px/16px Arial, Helvetica, Utkal, sans-serif;display:inline;" href="http://advertising-support.com/why.php?type=3&amp;zone=458516&amp;pid=1748&amp;ext=NetoCoupon">Ad by NetoCoupon</a> | <a style="text-transform:none;font-weight:normal;color:#000;font:normal normal normal 11px/16px Arial, Helvetica, Utkal, sans-serif;display:inline;" class="gpl-dis-hide" href="#">Close</a></div></center></center>
           <textarea rows="4" cols="80" name="wpblp_terms_and_conditions" id="terms-and-conditions"><?php echo get_option('wpblp_terms_and_conditions')?>

</textarea><br><span class="description">Enter text or a URL starting with http. If you use a URL, the Terms and Conditions text will be replaced by a link to the appropiate page.</span></td></tr></tbody></table></div>
   </div>
    </div>
  </div>
  
</div>
               
        
    <div role="tabpanel" class="tab-pane" id="profile">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <h3><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Listing Settings</h3>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
       <table class="form-table"><tbody>
               <tr><th scope="row"><label for="new-post-status">Default new post status</label></th><td>
                       <select name="wpblp_new_post_status" id="new-post-status">
                           <option <?php if(get_option('wpblp_new_post_status' )=="Publish") echo 'selected="selected"'; ?> value="Publish">Publish</option>
                           <option <?php if(get_option('wpblp_new_post_status' )=="Pending") echo 'selected="selected"'; ?> value="Pending">Pending</option>
                       </select>
                       <span class="description"></span></td></tr>
               <tr><th scope="row"><label for="new-post-status">Default new comment status</label></th><td>
                       <select name="wpblp_new_comment_status" id="new-post-status">
                           <option <?php if(get_option('wpblp_new_comment_status' )=="Publish") echo 'selected="selected"'; ?> value="Publish">Publish</option>
                           <option <?php if(get_option('wpblp_new_comment_status' )=="Pending") echo 'selected="selected"'; ?> value="Pending">Pending</option>
                       </select>
                       <span class="description"></span></td></tr>
               <tr><th scope="row"><label for="categories-sort">Sort order for categories</label></th><td>
                       <select name="wpblp_categories_sort" id="categories-sort">
                           <option <?php if(get_option('wpblp_categories_sort' )=="ASC") echo 'selected="selected"'; ?> value="ASC">Ascending</option>
                           <option <?php if(get_option('wpblp_categories_sort' )=="DESC") echo 'selected="selected"'; ?> value="DESC">Descending</option>
                       </select>
                       <span class="description"></span></td></tr>
               <tr><th scope="row"><label for="show-category-post-count">Show category post count?</label></th><td><label for="show-category-post-count">
                           <input type="checkbox" <?php if(get_option('wpblp_show_category_post_count' )==1) echo 'checked="checked"'; ?> value="<?php echo get_option('wpblp_show_category_post_count')?>" name="wpblp_show_category_post_count" id="show-category-post-count">&nbsp;<span class="description"></span></label></td></tr>                           
               <tr><th scope="row"><label for="listings-order-by">Order directory listings by</label></th><td>
                       <select name="wpblp_listings_order_by" id="listings-order-by">
                           <option <?php if(get_option('wpblp_listings_order_by' )=="Title") echo 'selected="selected"'; ?>  value="Title">Title</option>
                           <option <?php if(get_option('wpblp_listings_order_by' )=="Author") echo 'selected="selected"'; ?>  value="Author">Author</option>
                           <option <?php if(get_option('wpblp_listings_order_by' )=="date") echo 'selected="selected"'; ?>  value="date">Date posted</option>
                           <option <?php if(get_option('wpblp_listings_order_by' )=="Modified") echo 'selected="selected"'; ?>  value="Modified">Date last modified</option>
                           <option  <?php if(get_option('wpblp_listings_order_by' )=="rand") echo 'selected="selected"'; ?> value="rand">Random</option>
                          <!-- <option value="Paid">Paid first then free</option> -->
                       </select>
                       <span class="description"></span></td></tr>
            </tbody>   
       </table>
    </div>
  </div>
    </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
        
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <h3><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Listing email settings</h3>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
     <table class="form-table"><tbody><tr><th scope="row">
                     <label for="notify-admin">Notify admin of new listings via email?</label></th><td>
                     <label for="notify-admin">
                         <input type="checkbox" <?php if(get_option('wpblp_notify_admin' )==1) echo 'checked="checked"'; ?> value="<?php echo get_option('wpblp_notify_admin')?>" name="wpblp_notify_admin" id="notify-admin">&nbsp;
                         <span class="description"></span>
                     </label></td></tr><tr><th scope="row">
                     <label for="send-email-confirmation">Send email confirmation to listing owner when listing is submitted?</label></th><td>
                     <label for="send-email-confirmation">
                         <input type="checkbox" <?php if(get_option('wpblp_send_email_confirmation' )==1) echo 'checked="checked"'; ?>  value="<?php echo get_option('wpblp_send_email_confirmation')?>" name="wpblp_send_email_confirmation" id="send-email-confirmation">&nbsp;
                         <span class="description"></span></label></td></tr><tr>
                <!-- <th scope="row">
                  <label for="email-confirmation-message">Email confirmation message</label>
                 </th> -->
                 <td><center data-type="a" class="bcbwjgwzlvgjccxdlueuehnf tgjahqlldzyamwmhokbfbysr" style="display: block; padding: 10px 0px; margin: auto; text-align: center; height: 120px; overflow: visible; width: auto; float: none; box-sizing: content-box; letter-spacing: normal;">
                               </center>
              <!--<textarea rows="4" cols="80" name="wpblp_email_confirmation_message" id="email-confirmation-message"><?php //echo get_option('wpblp_email_confirmation_message')?></textarea><br><span class="description">You can use the placeholder [listing] for the listing title. This setting applies to non-paying listings only; for paying listings check the "Payment" settings tab.</span> -->
              </td></tr></tbody></table>
                   
 </div>
    </div>
  </div>
    </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="settings">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         <h3><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Map Setting</h3>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
    <table class="form-table"><tbody><tr><th scope="row"><label for="show-map">Show Map</label></th><td>
                    <label for="show-map">
                        <input type="checkbox" <?php if(get_option('wpblp_show_map' )==1) echo 'checked="checked"'; ?> value="<?php echo get_option('wpblp_show_map')?>" name="wpblp_show_map" id="show-map">&nbsp;<span class="description"></span></label></td></tr><tr><th scope="row">
                    <!-- <label for="insert-api">Insert API</label> -->
                </th><td>
                  <!--  <textarea rows="4" cols="80" name="wpblp_insert_api" id="insert-api"><?php // echo get_option('wpblp_insert_api')?></textarea><br><span class="description">Instructions are as follow -

									<br>1. Visit the APIs console at https://code.google.com/apis/console and log in with your Google Account.
									<br>2. Click the Services link from the left-hand menu, then activate the Static Maps API service.
									<br>3. Once the service has been activated, your API key is available from the API Access page, in
									the Simple API Access section. Static Maps API applications use the Key for browser apps.
									<br>Enter your own API key
									<br>Default Key - ABQIAAAAXuX847HLKfJC60JtneDOUhQ8oGF9gkOSJpYWLmRvGTmYZugFaxRX7q0DDCWBSdfC1tIHIXIZqTPM-A </span>
         -->
                </td>
            </tr></tbody></table>
 </div>
    </div>
  </div>
    </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="advfeature">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseadvfeature" aria-expanded="true" aria-controls="collapseOne">
         <h3><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Feature</h3>
        </a>
      </h4>
    </div>
    <div id="collapseadvfeature" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
<div class="row col-xs-12">
		   <div class="col-xs-1">
                      <h4>Sr.No</h4><br>                     
                   </div>
                   <div class="col-xs-7">
                       <h4>Feature</h4><br>                      
                   </div>
                   <div class="col-xs-2">
                       <h4>Free</h4><br>
                     
                   </div>
                   <div class="col-xs-2">
                       <h4>Pro</h4><br>
                      
                   </div>
    
                   <div class="col-xs-1">
                      1
                   </div>
                   <div class="col-xs-7">
                       Free listings
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>  
    <!--2-->
                    <div class="col-xs-1">
                      2
                   </div>
                   <div class="col-xs-7">
                       Users can post/edit listings without access to WP dashboard
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
     <!--2-->
     <!--3-->
                    <div class="col-xs-1">
                    3
                   </div>
                   <div class="col-xs-7">
                       Configurable quick-search field and sorting bar for listings
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
     <!--3-->
     <!--4-->
                    <div class="col-xs-1">
                   4
                   </div>
                   <div class="col-xs-7">
                       Display the location of the business
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
     <!--4-->
     <!--5-->
                    <div class="col-xs-1">
                     5
                   </div>
                   <div class="col-xs-7">
                       Allow users to upload images
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
     <!--5-->
     <!--6-->
                    <div class="col-xs-1">
                     6
                   </div>
                   <div class="col-xs-7">
                       Allow users to upload attachments on listings (supports PDF, Text files, images)
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
     <!--7-->
                    <div class="col-xs-1">
                     7
                   </div>
                   <div class="col-xs-7">
                       Google Map
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
     
     <!--8-->
                    <div class="col-xs-1">
                     8
                   </div>
                   <div class="col-xs-7">
                       Pagination
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
     <!--9-->
                    <div class="col-xs-1">
                     9
                   </div>
                   <div class="col-xs-7">
                       Search Result
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
     <!--10-->
                    <div class="col-xs-1">
                     10
                   </div>
                   <div class="col-xs-7">
                       Category Listing
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
     
     <!--11-->
                    <div class="col-xs-1">
                     11
                   </div>
                   <div class="col-xs-7">
                       Comment to listing
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
      <!--12-->
                    <div class="col-xs-1">
                     12
                   </div>
                   <div class="col-xs-7">
                      Send Message to listing owner
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
       <!--13-->
                    <div class="col-xs-1">
                     13
                   </div>
                   <div class="col-xs-7">
                      Social Media icon
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
       <!--14-->
                    <div class="col-xs-1">
                     14
                   </div>
                   <div class="col-xs-7">
                      Upload Logo
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
       <!--15-->
                    <div class="col-xs-1">
                     14
                   </div>
                   <div class="col-xs-7">
                      Admin can add new category
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
       
       <!--16-->
                    <div class="col-xs-1">
                     16
                   </div>
                   <div class="col-xs-7">
                      Admin Can Add new category
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
       <!--17-->
                    <div class="col-xs-1">
                     17
                   </div>
                   <div class="col-xs-7">
                      Listing Analysis(Graphs,Tables etc)
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
     
     <!--18-->
                    <div class="col-xs-1">
                     18
                   </div>
                   <div class="col-xs-7">
                       Paid Listing
                   </div>
                   <div class="col-xs-2">
                        <span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
      <!--19-->     
                   <div class="col-xs-1">
                      19
                   </div>
                   <div class="col-xs-7">
                      Featured Listing
                   </div>
                   <div class="col-xs-2">
                        <span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
      <!--20-->     
                   <div class="col-xs-1">
                      20
                   </div>
                   <div class="col-xs-7">
                      PayPal integration
                   </div>
                   <div class="col-xs-2">
                        <span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
      <!--21-->     
                   <div class="col-xs-1">
                      21
                   </div>
                   <div class="col-xs-7">
                      Rating to listing
                   </div>
                   <div class="col-xs-2">
                        <span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
      <!--22-->     
                   <div class="col-xs-1">
                      22
                   </div>
                   <div class="col-xs-7">
                      Membership Level(Create multiple fee plans)
                   </div>
                   <div class="col-xs-2">
                        <span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
       <!--23-->     
                   <div class="col-xs-1">
                      23
                   </div>
                   <div class="col-xs-7">
                      Search Widget
                   </div>
                   <div class="col-xs-2">
                        <span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
       <!--24-->     
                   <div class="col-xs-1">
                      24
                   </div>
                   <div class="col-xs-7">
                      Category Widget
                   </div>
                   <div class="col-xs-2">
                        <span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
       <!--25-->     
                   <div class="col-xs-1">
                      25
                   </div>
                   <div class="col-xs-7">
                      Map Widget
                   </div>
                   <div class="col-xs-2">
                        <span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
       <!--26-->     
                   <div class="col-xs-1">
                      26
                   </div>
                   <div class="col-xs-7">
                      Show Map on top of all listing
                   </div>
                   <div class="col-xs-2">
                        <span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
      <!--27-->     
                   <div class="col-xs-1">
                      27
                   </div>
                   <div class="col-xs-7">
                      World Class Support
                   </div>
                   <div class="col-xs-2">
                        <span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>
                   </div>
                   <div class="col-xs-2">
                      <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                   </div>
 </div>
    <div class="col-xs-12">
                       <div class="col-xs-1">
                      <h4>Sr.No</h4><br>                     
                   </div>
                   <div class="col-xs-11">
                       <h4>Comming Feature in Pro</h4><br>                      
                   </div>
                   
    
                   <div class="col-xs-1">
                      1
                   </div>
                    <div class="col-xs-11">
                      CSV import/Export
                   </div>
        
                   <div class="col-xs-1">
                     2
                   </div>
                    <div class="col-xs-11">
                      Listing widget
                   </div>
        
                   <div class="col-xs-1">
                     3
                   </div>
                     <div class="col-xs-11">
                     City Listing(Display all city)
                   </div>
        
                    <div class="col-xs-1">
                     4
                   </div>
                     <div class="col-xs-11">
                     Automated Listing(Pull listing from other site ex:Google)
                   </div>
                   
    </div>
            <div class="col-xs-12">
                If you want any additional feature or any customization then drop mail us at sahyadriwebsolution@gmail.com 
                <a href="http://sahyadriwebsolution.com/wpbusinessdirectoryplugin/membership-account/membership-levels/" title="Pro Features" target="_blank">
                                      <h4><span class="label label-success">
                                              <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Get Pro Features
                                      </span></h4>
                </a>
            </div>
    </div>
  </div>
    </div>
          </div>
      
  </div>
      
       <div role="tabpanel" class="tab-pane" id="help">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapsehelp" aria-expanded="true" aria-controls="collapseOne">
         <h3><span class="glyphicon glyphicon-barcode" aria-hidden="true"></span> Shortcode</h3>
        </a>
      </h4>
    </div>
    <div id="collapsehelp" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
     <div class="col-xs-12">
         <h4>[wp_business_directory]</h4>   
         <p>Displaying all listings(listing status:Publish and Active)</p>
     </div>
     <div class="col-xs-12">
         <h4>[wp_business_directory_categories]</h4>   
         <p>List of categories are displayed at the top AND
             the listings displayed are filtered for the selected category.
             The category name is also displayed above the listings.
         </p>
     </div>
     <div class="col-xs-12">
         <h4>[wp_business_directory_search]</h4>   
         <p>The Search Field located at the top of most pages in the directory with a Search button.
             When the user enters a keyword into the Search Field and clicks search,
             Business Directory will attempt to match that keyword in the What(business name,tags) and Where(address,city,zip) fields (ONLY) in your listings. 
             Any matches that are returned will display when you click search.
             </p>
     </div>
     <div class="col-xs-12">
         <h4>[wp_business_directory_submit_listing]</h4>   
         <p>Using this shortcose user can submit listing without assess dashboard.
         if user is not login in then display login/register form<br>
         After login user can submit listing, edit existing listing and view listing.
         </p>
         <p>New listings may be submitted and require administrator approval,
             based on the settings you configure.</p>
     </div>
 </div>
    </div>
  </div>
    </div>
           
           <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapsefaq" aria-expanded="true" aria-controls="collapseOne">
         <h3><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> FAQ</h3>
        </a>
      </h4>
    </div>
    <div id="collapsefaq" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
     <div class="col-xs-12">
         
        <div class="col-xs-1"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></div>
        <div class="col-xs-11"><h4>Why isn't the email address showing up in the listings? </h4>
            <p>The email address is not showing up because it is being programmatically blocked.
                The reason for this is to protect the privacy of your users so that their email address 
                does not appear for public viewing where email harvesting bots can grab them and 
                add them to spam email lists.</p>
        </div>
        
        <div class="col-xs-1"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></div>
        <div class="col-xs-11"><h4>How to get latitude and longitude coordinates? </h4>
            <p>Get the coordinates of a place you find on the map with your browser, like Chrome, Firefox, or Internet Explorer.
                <br> 1.Open Google Maps.
                <br>2.Right-click the place or area on the map.
                <br>3.Select What's here?
                <br>4.Under the search box, an info card with coordinates will appear.</p>
        </div>
        <div class="col-xs-12">
                If you have any question then drop mail us at sahyadriwebsolution@gmail.com <br><br>
                 <a href="sahyadriwebsolution.com/wpbusinessdirectoryplugin/documentation/" title="Documentation" target="_blank"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Documentation</a>
            </div>
     </div>
 </div>
    </div>
  </div>
    </div>
          </div>

</div>
    <input type="submit" class="btn btn-success btn-lg" name="save" value="Save">
</form>