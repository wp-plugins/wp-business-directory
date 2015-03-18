<?php
if ( isset( $_POST['login_submit'] ) ) {

			$creds                  = array();
			$creds['user_login']    = esc_attr( $_POST['login_username'] );
			$creds['user_password'] = esc_attr( $_POST['login_password'] );
			$creds['remember']      = esc_attr( $_POST['remember_login'] );

			$login_user = wp_signon( $creds, false );

			if ( ! is_wp_error( $login_user ) ) {
				@wp_redirect(get_permalink());
			} elseif ( is_wp_error( $login_user ) ) {
				$login_status = $login_user->get_error_message();
			}
		}

if ( isset( $_POST['reg_submit'] ) ) {
    $registration_status="";
    $login_status="";
	        if(isset($_POST['registration_username'])){
			$username = esc_attr( $_POST['registration_username'] );
			}else{
				$username="";
			}
				if(isset($_POST['registration_password'])){
			$password = esc_attr( $_POST['registration_password'] );
			}else{
				$password="";
			}
			
			$email    = esc_attr( $_POST['registration_email'] );

			$register_user = wp_create_user( $username, $password, $email );

			if ( $register_user && ! is_wp_error( $register_user ) ) {

				$registration_status = 'Registration completed.';
			} elseif ( is_wp_error( $register_user ) ) {
				$registration_status = $register_user->get_error_message();
			}

		}
		
                    $pageURL=get_permalink();
                    $html='';
                   $html .= '<div class="login-reg-error">'.$registration_status.'<br></div>';
                   $html .= '	<div class="login-reg-error">'.$login_status.'<br></div>';
			$html.='<div class="panel panel-default">
           <div class="panel-heading col-xs-12">
			  <div role="tabpanel">

				  <!-- Nav tabs -->
				 <div class="panel-heading2"> <ul class="nav nav-tabs col-xs-12" role="tablist">
					<li id="logintab" role="presentation" class="active"><a href="#login" aria-controls="home" role="tab" data-toggle="tab">Login</a></li>
					<li id="registertab" role="presentation"><a href="#register" aria-controls="profile" role="tab" data-toggle="tab">Register</a></li>   
				  </ul></div></div></div>';

		  $html .='<!-- Tab panes -->
		  <div class="panel-body">
		  <div class="tab-content">';
   
  
	    $html .='<div id="login" role="tabpanel" class="tab-pane active">
                <h1>Login</h1>';
	    
        $html .= '<form method="post" action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '">';
		$html .= '<input type="text" name="login_username" placeholder="Username" /><br/><br/>';
		$html .= '<input type="password" name="login_password" placeholder="Password" /><br/><br/>';
		$html .= '<input type="checkbox" name="remember_login" value="true" checked="checked"/> Remember Me<br/><br/>';
		$html .= '<input type="submit" name="login_submit" value="Login" /><br/><br/>';
		$html .= '</form>';
		$html .='<a href="'.wp_lostpassword_url(get_permalink()).'" title="Lost Password">Lost Password</a><br/>';
		$html.='Don\'t have account? click on <strong style="color:#2B96CC;">Registration</strong>';
		$html .="</div>";


		//register form
		$html .='<div id="register" role="tabpanel" class="tab-pane">
                <h1>Register</h1>';	    
		$html .= '<form method="post" action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '">';
		$html .= '<input type="text" name="registration_username" placeholder="Username" /><br/><br/>';
		$html .= '<input type="password" name="registration_password" placeholder="Password" /><br/><br/>';
		$html .= '<input type="email" name="registration_email" placeholder="Email" /><br/><br/>';
		$html .= '<input type="submit" name="reg_submit" value="Sign Up" /><br/><br/>';
		$html .= '</form>';		
		$html.=' Already Registered? click on <strong style="color:#2B96CC;">Login</strong>';
		$html .="</div>";
		$html .='</div>
		         </div></div>';
                
                $return.=$html;	
		
               
			// $html='<a href="'.wp_logout_url( get_permalink() ).'" title="Logout"> Logout</a>';
			