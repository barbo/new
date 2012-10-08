<?php


	require_once("models/config.php");
	
	//Prevent the user visiting the logged in page if he/she is not logged in
	if(!isUserLoggedIn()) { header("Location: login.php"); die(); }
	 
	 $avatar = new InsertAvatarCore;

//Forms posted
if(!empty($_POST))
{	
	$insercion = new InsertAvatarCore;

	// Array with the fields to check
	$fields = array('nombre');

	// Check for fields
	if($insercion->checkFields($fields) === false)
	$errors[] = langu('UNABLE_AVATAR_SET');
		


	$imagen = $insercion->saveAvatarImage($_FILES['avatar'], $_POST['nombre'], 'layout/');


	// Save everything in MySQL
	// Parameter 1: Name of avatar
	if($insercion->saveAvatarMySQL($imagen) === false)
		$languas[] = langu('ERR_OCCURRED');
	else
		$languas[] = langu('CORRECT_REC');
}
?>

<body>
<div id="wrapper">

	<div id="content">
    
        <div id="left-nav">
        <?php include("models/header.php"); ?>
            <div class="clear"></div>
        </div>


		<div id="main">
        
        <h1><?php echo $languas[] = langu('Change_avatar');?></h1>

		<?php if(!empty($_POST)) { if(count($errors) > 0) { ?>
		<div class="success">
		<?php errorBlock($errors); ?>
		</div>     
		<?php } } ?> 

		

    	<div id="regbox">
            <form name="changePass" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
			<img src="layout/<?php echo $avatar->getAvatarIMG($loggedInUser->avatar); ?>"  />
            
                <p>
                    <label><?php echo $languas[] = langu('avatar_:');?></label>
                    <input type="file" id="avatar" name="avatar" class="text" />
					<input type="hidden" id="nombre" name="nombre" class="text" value="<?php echo $loggedInUser->displayname; ?>" />
                </p>
                
        		<p>
                    <label>&nbsp;</label>
                    <input type="submit" value="Update Avatar" class="submit" />
               </p>
			   <p>
                    <label>&nbsp;</label>
                    <a href="user_settings.php"><?php echo $languas[] = langu('GERI_');?>&raquo;</a>
               </p>
                    
            </form>
    
   			<div class="clear"></div>
    	</div>
        
        
        </div>
    </div>
</div>
</body>
</html>