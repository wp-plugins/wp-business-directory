<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $wpdb;

//Database
if ($wpdb->get_var("SHOW TABLES LIKE '{$wpdb->prefix}wpbdp_listing'") != $wpdb->prefix . 'wpbdp_listing'){
	$wpdb->query("CREATE TABLE {$wpdb->prefix}wpbdp_listing (
	id INT(11) NOT NULL AUTO_INCREMENT,
	business_name VARCHAR(100) NOT NULL,
	address VARCHAR(500) NULL,
	city varchar(100) DEFAULT NULL,
    zip varchar(11) DEFAULT NULL,
	lat double DEFAULT NULL,
    glong double DEFAULT NULL,
	website VARCHAR(100) NULL,
	phone VARCHAR(20) NULL,
	blog VARCHAR(50) NULL, 
	fb VARCHAR(50) NULL, 
	tw VARCHAR(50) NULL,
	googleplus VARCHAR(50) NULL, 
	linkedin VARCHAR(50) NULL, 
	description VARCHAR(1000) NULL, 
	category VARCHAR(100) NULL,
	tags VARCHAR(500) NULL,
	user_id INT(11) NOT NULL, 
	attachment varchar(200) DEFAULT NULL,
	created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
	created_by INT(11) NULL,
	modify_date DATE NULL, 
	modify_by INT(11) NULL,   
	is_active BOOL NULL DEFAULT '1',
	is_featured BOOL NULL DEFAULT '0',
	is_paid tinyint(1) NOT NULL DEFAULT '0',
	status VARCHAR(20) NULL DEFAULT 'pending', 
	email VARCHAR(100) NOT NULL,
	PRIMARY KEY (id)
	);");
}

if ($wpdb->get_var("SHOW TABLES LIKE '{$wpdb->prefix}wpbdp_categories'") != $wpdb->prefix . 'wpbdp_categories'){
	$wpdb->query("CREATE TABLE {$wpdb->prefix}wpbdp_categories (
	cid INT(11) NOT NULL AUTO_INCREMENT, 
	category_name VARCHAR(100) NOT NULL, 
    created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    modify_date DATE NULL,
	PRIMARY KEY (cid)
	);");

	$wpdb->query("INSERT INTO {$wpdb->prefix}wpbdp_categories (category_name) VALUES ('General')");
}

if ($wpdb->get_var("SHOW TABLES LIKE '{$wpdb->prefix}wpbdp_listing_categories'") != $wpdb->prefix . 'wpbdp_listing_categories'){
	$wpdb->query("CREATE TABLE {$wpdb->prefix}wpbdp_listing_categories (
	 id int(11) NOT NULL AUTO_INCREMENT,
            cid int(11) NOT NULL,
            listing_id int(11) NOT NULL,
            PRIMARY KEY (id),
            KEY cid (cid,listing_id)
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
          ");
}

if ($wpdb->get_var("SHOW TABLES LIKE '{$wpdb->prefix}wpbdp_comment'") != $wpdb->prefix . 'wpbdp_comment'){
	$wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}wpbdp_comment (
                id int(11) NOT NULL AUTO_INCREMENT,
                listing_id int(11) NOT NULL,
                view_name varchar(100) NOT NULL,
                view_email varchar(250) NOT NULL,
                comment varchar(1000) NOT NULL,
                create_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                status varchar(100) NOT NULL DEFAULT 'Pending',
                PRIMARY KEY (id)
              ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
          ");

		  $wpdb->query("ALTER TABLE {$wpdb->prefix}wpbdp_comment
			  ADD CONSTRAINT {$wpdb->prefix}wpbdp_comment_ibfk_1 FOREIGN KEY (listing_id) REFERENCES {$wpdb->prefix}wpbdp_listing (id) ON DELETE NO ACTION ON UPDATE NO ACTION;
          ");
}



 add_option('wpblp_show_contact_form',1);
 add_option('wpblp_show_comment_form',1);
 add_option('wpblp_display_terms_and_conditions',1);
 add_option('wpblp_terms_and_conditions','Terms and Conditions text goes here...');
 add_option('wpblp_new_post_status',"Pending");
 add_option('wpblp_new_comment_status',"Pending");
 add_option('wpblp_categories_sort','Ascending');
 add_option('wpblp_show_category_post_count',1);
 add_option('wpblp_listings_order_by','Title');
 add_option('wpblp_notify_admin',1);
 add_option('wpblp_send_email_confirmation',1);
 add_option('wpblp_email_confirmation_message',"Your submission '[listing]' has been received and it's pending review. This review process could take up to 48 hours.");
 add_option('wpblp_show_map',1);
 add_option('wpblp_insert_api','ABQIAAAAXuX847HLKfJC60JtneDOUhQ8oGF9gkOSJpYWLmRvGTmYZugFaxRX7q0DDCWBSdfC1tIHIXIZqTPM-A');