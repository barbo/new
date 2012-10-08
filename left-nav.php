<?php

securePage($_SERVER['PHP_SELF']);


if(isUserLoggedIn()) {
	echo "

	<table width='1340' border='0' cellpadding='1' cellspacing='1'>
  <tr>
	  <td align='left'></td>
    <td><a href='account.php'>".$languas[] = langu('Account_Home')."</a></td>
  </tr>
    <tr>
	  <td align='left'></td>
    <td><a href='user_settings.php'>".$languas[] = langu('User_settings')."</a></td>
  </tr>
  <tr>
	  <td align='left'></td>
    <td><a href='logout.php'>".$languas[] = langu('LOGOUT_')."</a></td>
  </tr>  

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>";
	

	if ($loggedInUser->checkPermission(array(2))){
	echo "
	<form>
	<table width='1340' border='0' cellpadding='1' cellspacing='1'>
  <tr>
	  <td align='left'></td>
    <td><a href='admin_configuration.php'>".$languas[] = langu('Admin_config')."</a></td>
  </tr>
    <tr>
	  <td align='left'></td>
    <td><a href='admin_users.php'>".$languas[] = langu('Admin_Users')."</a></td>
  </tr>
  <tr>
	  <td align='left'></td>
    <td><a href='admin_permissions.php'>".$languas[] = langu('Admin_permission')."</a></td>
  </tr>  
	<tr>
	  <td align='left'></td>
    <td><a href='admin_pages.php'>".$languas[] = langu('admin_pages')."</a></td>
  </tr>  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  </form>";
	}
} 

else {
	echo "
	<form>
	<table width='1340' border='0' cellpadding='1' cellspacing='1'>
  <tr>
	  <td align='left'></td>
    <td><a href='index.php'>".$languas[] = langu('HOME_')."</a></td>
  </tr>
    <tr>
	  <td align='left'></td>
    <td><a href='login.php'>".$languas[] = langu('LOGIN_')."</a></td>
  </tr>
   </tr>
 
  <tr>
	  <td align='left'></td>
    <td><a href='register.php'>".$languas[] = langu('REGISTER_')."</a></td>
  </tr>  
<tr>
	  <td align='left'></td>
    <td><a href='forgot-password.php'>".$languas[] = langu('Forgot_Pass')."</a></td>
  </tr> 
<tr>
	  <td align='left'></td>
    <td><a href='admin_pages.php'>".$languas[] = langu('admin_pages')."</a></td>
  </tr>  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  </form>";
  
	if ($emailActivation)
	{
	echo "
	<form>
	<table width='1225' border='0' cellpadding='1' cellspacing='1'>
	<tr>
	  <td align='left'></td>
    <td><a href='resend-activation.php'>".$languas[] = langu('Resend_Activation_Email')."</a></td>
  </tr>
  </table>
  </form>";
	}
	echo "</ul>";
}

?>
