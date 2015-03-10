<?php 
	$errorFlag=0;
	$errormessage ="";
	$sucssesMessage="";
	if(isset($_POST['save']) && $_POST['save']=="Save")
        {

            if(isset($_POST['wpblp_show_contact_form'])){                   
                    update_option('wpblp_show_contact_form',1);
            }else{
                  update_option('wpblp_show_contact_form',0);
            }
            
            if(isset($_POST['wpblp_show_comment_form'])){                    
                    update_option('wpblp_show_comment_form',1);
            }else{
                  update_option('wpblp_show_comment_form',0);
            }
            
            if(isset($_POST['wpblp_display_terms_and_conditions'])){
                  
                    update_option('wpblp_display_terms_and_conditions',1);
            }else{
                  update_option('wpblp_display_terms_and_conditions',0);
            }
            
             if(isset($_POST['wpblp_terms_and_conditions']) ){
                  
                    update_option('wpblp_terms_and_conditions',sanitize_text_field($_POST['wpblp_terms_and_conditions']));
            }else{
                  update_option('wpblp_terms_and_conditions',0);
            }
            if(isset($_POST['wpblp_new_post_status'])){
         
                    update_option('wpblp_new_post_status',sanitize_text_field($_POST['wpblp_new_post_status']));
            }else{
                  update_option('wpblp_new_post_status',0);
            }
            if(isset($_POST['wpblp_new_comment_status'])){
         
                    update_option('wpblp_new_comment_status',sanitize_text_field($_POST['wpblp_new_comment_status']));
            }else{
                  update_option('wpblp_new_comment_status',0);
            }
            
            if(isset($_POST['wpblp_categories_sort'])){
      
                    update_option('wpblp_categories_sort',sanitize_text_field($_POST['wpblp_categories_sort']));
            }else{
                  update_option('wpblp_categories_sort','');
            }
            
             if(isset($_POST['wpblp_show_category_post_count'])){
               
                    update_option('wpblp_show_category_post_count',1);
            }else{
                  update_option('wpblp_show_category_post_count',0);
            }
            
            if(isset($_POST['wpblp_listings_order_by'])){
                
                    update_option('wpblp_listings_order_by',sanitize_text_field($_POST['wpblp_listings_order_by']));
            }else{
                  update_option('wpblp_listings_order_by','');
            }
            
             if(isset($_POST['wpblp_notify_admin'])){
        
                    update_option('wpblp_notify_admin',1);
            }else{
                  update_option('wpblp_notify_admin',0);
            }
            
             if(isset($_POST['wpblp_send_email_confirmation'])){
       
                    update_option('wpblp_send_email_confirmation',1);
            }else{
                  update_option('wpblp_send_email_confirmation',0);
            }
            
             if(isset($_POST['wpblp_email_confirmation_message'])){
   
                    update_option('wpblp_email_confirmation_message',sanitize_text_field($_POST['wpblp_email_confirmation_message']));
            }else{
                  update_option('wpblp_email_confirmation_message','');
            }
            
             if(isset($_POST['wpblp_show_map'])){
     
                    update_option('wpblp_show_map',1);
            }else{
                  update_option('wpblp_show_map',0);
            }
            
            if(isset($_POST['wpblp_insert_api'])){
         
                    update_option('wpblp_insert_api',sanitize_text_field($_POST['wpblp_insert_api']));
            }else{
                  update_option('wpblp_insert_api','');
            }
            
            
            
        
        
      }
	
?>


