<?php 

require_once("models/config.php");
securePage($_SERVER['PHP_SELF']);

//Forms posted
if(!empty($_POST))
{
	$cfgId = array();
	$newSettings = $_POST['settings'];
	
	//Validate new site name
	if ($newSettings[1] != $websiteName) {
		$newWebsiteName = $newSettings[1];
		if(minMaxRange(1,150,$newWebsiteName))
		{
			$errors[] = langu("CONFIG_NAME_CHAR_LIMIT",array(1,150));
		}
		else if (count($errors) == 0) {
			$cfgId[] = 1;
			$cfgValue[1] = $newWebsiteName;
			$websiteName = $newWebsiteName;
		}
	}
	
	//Validate new URL
	if ($newSettings[2] != $websiteUrl) {
		$newWebsiteUrl = $newSettings[2];
		if(minMaxRange(1,150,$newWebsiteUrl))
		{
			$errors[] = langu("CONFIG_URL_CHAR_LIMIT",array(1,150));
		}
		else if (substr($newWebsiteUrl, -1) != "/"){
			$errors[] = langu("CONFIG_INVALID_URL_END");
		}
		else if (count($errors) == 0) {
			$cfgId[] = 2;
			$cfgValue[2] = $newWebsiteUrl;
			$websiteUrl = $newWebsiteUrl;
		}
	}
	
	//Validate new site email address
	if ($newSettings[3] != $emailAddress) {
		$newEmail = $newSettings[3];
		if(minMaxRange(1,150,$newEmail))
		{
			$errors[] = langu("CONFIG_EMAIL_CHAR_LIMIT",array(1,150));
		}
		elseif(!isValidEmail($newEmail))
		{
			$errors[] = langu("CONFIG_EMAIL_INVALID");
		}
		else if (count($errors) == 0) {
			$cfgId[] = 3;
			$cfgValue[3] = $newEmail;
			$emailAddress = $newEmail;
		}
	}
	
	//Validate email activation selection
	if ($newSettings[4] != $emailActivation) {
		$newActivation = $newSettings[4];
		if($newActivation != "true" AND $newActivation != "false")
		{
			$errors[] = langu("CONFIG_ACTIVATION_TRUE_FALSE");
		}
		else if (count($errors) == 0) {
			$cfgId[] = 4;
			$cfgValue[4] = $newActivation;
			$emailActivation = $newActivation;
		}
	}
	
 
	if ($newSettings[5] != $resend_activation_threshold) {
		$newResend_activation_threshold = $newSettings[5];
		if($newResend_activation_threshold > 72 OR $newResend_activation_threshold < 0)
		{
			$errors[] = langu("CONFIG_ACTIVATION_RESEND_RANGE",array(0,72));
		}
		else if (count($errors) == 0) {
			$cfgId[] = 5;
			$cfgValue[5] = $newResend_activation_threshold;
			$resend_activation_threshold = $newResend_activation_threshold;
		}
	}
	
 
	if ($newSettings[6] != $language) {
		$newLanguage = $newSettings[6];
		if(minMaxRange(1,150,$language))
		{
			$errors[] = langu("CONFIG_LANGUAGE_CHAR_LIMIT",array(1,150));
		}
		elseif (!file_exists($newLanguage)) {
			$errors[] = langu("CONFIG_LANGUAGE_INVALID",array($newLanguage));				
		}
		else if (count($errors) == 0) {
			$cfgId[] = 6;
			$cfgValue[6] = $newLanguage;
			$language = $newLanguage;
		}
	}
	
 
	if ($newSettings[7] != $template) {
		$newTemplate = $newSettings[7];
		if(minMaxRange(1,150,$template))
		{
			$errors[] = langu("CONFIG_TEMPLATE_CHAR_LIMIT",array(1,150));
		}
		elseif (!file_exists($newTemplate)) {
			$errors[] = lang("CONFIG_TEMPLATE_INVALID",array($newTemplate));				
		}
		else if (count($errors) == 0) {
			$cfgId[] = 7;
			$cfgValue[7] = $newTemplate;
			$template = $newTemplate;
		}
	}
	
 
	if (count($errors) == 0 AND count($cfgId) > 0) {
		if (updateConfig($cfgId, $cfgValue)) {
			$successes[] = langu("CONFIG_UPDATE_SUCCESSFUL");
		}
		else {
			$errors[] = langu("SQL_ERROR");	
		}
	}
}

$languages = getLanguageFiles();  
$templates = getTemplateFiles(); 
$permissionData = fetchAllPermissions();  
require_once("models/header.php");

echo "
<body>
<div id='wrapper'>
<div id='top'><div id='logo'></div></div>
<div id='content'>
<h1>My Forum</h1>
<h2> ".$languas[] = langu('Admin_config')."</h2>
<div id='left-nav'>";

include("left-nav.php");

echo "
</div>
<div id='main'>";

echo resultBlock($errors,$successes);

echo "
<div id='regbox'>
<form name='adminConfiguration' action='".$_SERVER['PHP_SELF']."' method='post'>
<p>
<label>".$languas[] = langu('Wsitename')."</label>
<input type='text' name='settings[".$settings['website_name']['id']."]' value='".$websiteName."' />
</p>
<p>
<label>".$languas[] = langu('wsiteurl')."</label>
<input type='text' name='settings[".$settings['website_url']['id']."]' value='".$websiteUrl."' />
</p>
<p>
<label>".$languas[] = langu('email')."</label>
<input type='text' name='settings[".$settings['email']['id']."]' value='".$emailAddress."' />
</p>
<p>
<label>".$languas[] = langu('ActivationThreshold')."</label>
<input type='text' name='settings[".$settings['resend_activation_threshold']['id']."]' value='".$resend_activation_threshold."' />
</p>
<p>
<label>".$languas[] = langu('Language')."</label>
<select name='settings[".$settings['language']['id']."]' >";

 
foreach ($languages as $optLang){
	if ($optLang == $language){
		echo "<option value='".$optLang."' selected>Eng</option>";
	}
	else {
		echo "<option value='".$optLang."'>Tr</option>";
	}
}

echo "
</select>
</p>
<p>
<label>".$languas[] = langu('emailactivation')."</label>
<select name='settings[".$settings['activation']['id']."]'>";

 
if ($emailActivation == "true"){
	echo "
	<option value='true' selected>True</option>
	<option value='false'>False</option>
	</select>";
}
else {
	echo "
	<option value='true'>True</option>
	<option value='false' selected>False</option>
	</select>";
}

echo "</p>
<p>
<label>".$languas[] = langu('template')."</label>
<select name='settings[".$settings['template']['id']."]'>";

 
foreach ($templates as $temp){
	if ($temp == $template){
		echo "<option value='".$temp."' selected>$temp</option>";
	}
	else {
		echo "<option value='".$temp."'>$temp</option>";
	}
}

echo "
</select><br/>
<select name='role'>
<option value='1'>New Member</option>
<option value='2'>Administrator</option>
</select>
</p>
<input type='submit' name=".$languas[] = langu('submit')." value='Submit' />


</form>
</div>
</div>
<div id='bottom'></div>
</div>
</body>
</html>";

?>
