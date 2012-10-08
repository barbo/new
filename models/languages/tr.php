<?php

	$langu = array();
	

	$langu = array_merge($langu,array(

			"ACCOUNT_SPECIFY_USERNAME" 		=> "L�tfen kullan�c� ad�n� girin",
			"ACCOUNT_SPECIFY_PASSWORD" 		=> "l�tfen parolay� girin",
			"ACCOUNT_SPECIFY_EMAIL"			=> "L�tfen e mail adresini girin",
			"ACCOUNT_INVALID_EMAIL"			=> "ge�ersiz email adresi",
			"ACCOUNT_USER_OR_EMAIL_INVALID"		=> "Kullan�c� ad� veya email adresi ge�ersiz",
			"ACCOUNT_USER_OR_PASS_INVALID"		=> "kullan�c� ad� veya parola ge�ersiz",
			"ACCOUNT_ALREADY_ACTIVE"		=> "Hesab�n�z aktifle�tirildi",
			"ACCOUNT_INACTIVE"			=> "Hesab�n�z aktif de�il. E mail hesab�n�zda size gelen mail ile aktif hale getirebilirsiniz",
			"ACCOUNT_USER_CHAR_LIMIT"		=> "Kullan�c� ad�n�z 8 ile 16 karakter aras�nda olmal�d�r",
			"ACCOUNT_DISPLAY_CHAR_LIMIT"		=> "Nikiniz 8 ila 18 karakter aras�nda olmal�d�r",
			"ACCOUNT_PASS_CHAR_LIMIT"		=> "Parolan�z 8 ila 16 karakter aras�nda olmal�d�r",
			"ACCOUNT_TITLE_CHAR_LIMIT"		=> "Ba�l�k 8 ila 16 karakter aras�nda olmal�d�r",
			"ACCOUNT_PASS_MISMATCH"			=> "Parolan�z ve tekrar parolan�z e�le�melidir",
			"ACCOUNT_DISPLAY_INVALID_CHARACTERS"	=> "Nikiniz alpha-numeric karakterlerden olu�mal�d�r",
			"ACCOUNT_USERNAME_IN_USE"		=> "bu kullan�c� ad� kullan�l�yor",
			"ACCOUNT_DISPLAYNAME_IN_USE"		=> "Bu nik kullan�l�yor",
			"ACCOUNT_EMAIL_IN_USE"			=> "Bu email adresi kullan�l�yor",
			"ACCOUNT_LINK_ALREADY_SENT"		=> "Aktivasyon maili daha �nce g�nderildi",
			"ACCOUNT_NEW_ACTIVATION_SENT"		=> "Aktivasyon maili tekrar g�nderildi. L�tfen kontrol edin",
			"ACCOUNT_SPECIFY_NEW_PASSWORD"		=> "L�tfen yeni yarolan�z� girin",	
			"ACCOUNT_SPECIFY_CONFIRM_PASSWORD"	=> "L�tfen yeni tekrar parolan�z� girin",
			"ACCOUNT_NEW_PASSWORD_LENGTH"		=> "yeni parola 8 ila 16 karakter aras�nda olmal�d�r",	
			"ACCOUNT_PASSWORD_INVALID"		=> "Parolan�z bizim kay�d�m�zdaki ile e�le�medi",	
			"ACCOUNT_DETAILS_UPDATED"		=> "Hesap ayarlar�n�z g�ncellendi",
			"ACCOUNT_ACTIVATION_MESSAGE"		=> "Giri� yapmadan �nce hesab�n�z� aktifle�tirmeniz gerekir. L�tfen bu linkten hesab�n�z� aktifle�tirin. \n\n
			%m1%activate-account.php?token=%m2%",							
			"ACCOUNT_ACTIVATION_COMPLETE"		=> "Hesab�n�z� aktifle�tirdiniz.  <a href=\"login.php\">Giri�</a> yapabilirsiniz.",
			"ACCOUNT_REGISTRATION_COMPLETE_TYPE1"	=> "Hesab�n�z� aktifle�tirdiniz.  <a href=\"login.php\">Giri�</a> yapabilirsiniz.",
			"ACCOUNT_REGISTRATION_COMPLETE_TYPE2"	=> "Ba�ar� il kayd�n�z� ger�ekle�tirdiniz. Mailinize gelecek olan aktifle�tirme mailinden sonra giri� yapabilirsiniz",
			"ACCOUNT_PASSWORD_NOTHING_TO_UPDATE"	=> "Ayn� parola ile g�ncelleyemezsiniz",
			"ACCOUNT_PASSWORD_UPDATED"		=> "Hesap g�ncellendi",
			"ACCOUNT_EMAIL_UPDATED"			=> "hesap email g�ncellendi",
			"ACCOUNT_TOKEN_NOT_FOUND"		=> "Token yok / hesap daha �nce aktifle�tirilmi�",
			"ACCOUNT_USER_INVALID_CHARACTERS"	=> "Kullan�c� ad�n�z alpha-numeric karakterlerden olu�mal�d�r",
			"ACCOUNT_DELETIONS_SUCCESSFUL"		=> " kullan�c�y� ba�ar� ile sildiniz",
			"ACCOUNT_MANUALLY_ACTIVATED"		=> "kullan�c� elle aktifle�tirildi",
			"ACCOUNT_DISPLAYNAME_UPDATED"		=> "Nik de�i�tirildi",
			"ACCOUNT_TITLE_UPDATED"			=> "%m1%'nin ba�l��� %m2% olarak de�i�tirildi",
			"ACCOUNT_PERMISSION_ADDED"		=> "izin derecesi eklendi",
			"ACCOUNT_PERMISSION_REMOVED"		=> "izin derecesi silindi",
			"CONFIG_NAME_CHAR_LIMIT"		=> "site ismi 8 ile 32 karakter aras�nda olmal�d�r",
			"CONFIG_URL_CHAR_LIMIT"			=> "site ismi 8 ile 32 karakter aras�nda olmal�d�r",
			"CONFIG_EMAIL_CHAR_LIMIT"		=> "site ismi 8 ile 32 karakter aras�nda olmal�d�r",
			"CONFIG_ACTIVATION_TRUE_FALSE"		=> "Email aktivasyonu `true` yada `false` olmal�d�r",
			"CONFIG_ACTIVATION_RESEND_RANGE"	=> "Aktivasyonunuzu %m1% ile %m2% saat aras�nda ger�ekle�tirmelisiniz",
			"CONFIG_LANGUAGE_CHAR_LIMIT"		=> "dil eklentisi 8 ile 32 karakter aras�nda olmal�d�r",
			"CONFIG_LANGUAGE_INVALID"		=> "dil anahtar� i�in bir dosya yok",
			"CONFIG_TEMPLATE_CHAR_LIMIT"		=> "�ablon eklentisi 8 ile 32 karkter ars�nda olmal�d�r.",
			"CONFIG_TEMPLATE_INVALID"		=> "�ablon anahtar� i�in hi�bir dosya yok",
			"CONFIG_EMAIL_INVALID"			=> "Email adresi ge�ersiz",
			"CONFIG_INVALID_URL_END"		=> "L�tfen URL adresinizin sonunu getirin",
			"CONFIG_UPDATE_SUCCESSFUL"		=> "Site ayarlar�n�z g�ncellendi",
			"FORGOTPASS_INVALID_TOKEN"		=> "Aktivasyon Token'iniz ge�erli de�il",
			"FORGOTPASS_NEW_PASS_EMAIL"		=> "Parolan�z� de�i�tirdi�inize dair Email ad�k",
			"FORGOTPASS_REQUEST_CANNED"		=> "Kay�p parola bildiriminizden ��k�ld�",
			"FORGOTPASS_REQUEST_EXISTS"		=> "Bu hesapta kay�p �ifre iste�ilde daha �nce bulunulmu�",
			"FORGOTPASS_REQUEST_SUCCESS"		=> "Hesab�n�za ekrar eri�im i�in gereken bilgileri emailinize yollad�k",
			"MAIL_ERROR"				=> "�l�mc�l hata. Server y�neticinizle g�r���n",
			"MAIL_TEMPLATE_BUILD_ERROR"		=> "Email tasla�� olu�turmada hata",
			"MAIL_TEMPLATE_DIRECTORY_ERROR"		=> "Unable to open mail-templates directory. Perhaps try setting the mail directory to %m1%",
			"MAIL_TEMPLATE_FILE_EMPTY"		=> "Taslak bo�. hi�bir�ey g�nderilmedi",
			"CAPTCHA_FAIL"				=> "g�venlik sorunuz hatal�",
			"CONFIRM"				=> "kontrol",
			"DENY"					=> "izinli",
			"SUCCESS"				=> "ba�ar�l�",
			"ERROR"					=> "Hata",
			"NOTHING_TO_UPDATE"			=> "G�ncelleme yok",
			"SQL_ERROR"				=> "�l�mc�l SQL hatas�",
			"FEATURE_DISABLED"			=> "Bu �zellik devre d���",
			"PAGE_PRIVATE_TOGGLED"			=> "Bu sayfa de�i�tirildi",
			"PAGE_ACCESS_REMOVED"			=> "Sayfa g�venli�i  izin derece(ler)i i�in silindi",
			"PAGE_ACCESS_ADDED"			=> "Sayfa g�venli�i  izin derece(ler)i i�in eklendi",
			"PERMISSION_CHAR_LIMIT"			=> "�zin ismi 8 ile 16 karakter aras�nda olmal�d�r",
			"PERMISSION_NAME_IN_USE"		=> "Permission name %m1% is already in use",
			"PERMISSION_DELETIONS_SUCCESSFUL"	=> "Successfully deleted %m1% permission level(s)",
			"PERMISSION_CREATION_SUCCESSFUL"	=> "Successfully created the permission level `%m1%`",
			"PERMISSION_NAME_UPDATE"		=> "�zin derecesi ismi de�i�tirildi",
			"PERMISSION_REMOVE_PAGES"		=> "bu sayfa g�venli�i ba�ar� ile silindi",
			"PERMISSION_ADD_PAGES"			=> "bu sayfaya sayfa g�venlii eklendi",
			"PERMISSION_REMOVE_USERS"		=> "kullan�c� ba�ar� ile silindi",
			"PERMISSION_ADD_USERS"			=> "kullan�c� ba�ar� ile eklendi",
			"Admin_config" => "Y�netici Ayarlar�",
			"Wsitename"=>"Website Ismi",
			"wsiteurl"=>"WebSite URL'si",
			"email"=>"E-Mail : ",
		    "ActivationThreshold"=>"Aktivasyon ad�m� : ",
			"Language"=>"Dil : ",
			"emailactivation"=>"E-Mail Aktivasyonu : ",
 			"template"=>"Sablon : ",
			"submit"=>"g�nder",
			"account"=>"Hesap",
			"hi"=>"Merhaba",
			"you"=>"Senin derecen ",
			"not"=>"Y�netici panelinde de�i�iklik yapabilirisin. Hesab�n� �u tarih te etkinle�tirdin : ",
			"activateaccount"=>"Hesab� etkinle�tir",
			"admin_page"=>"Y�netici Sayfas�",
			"page_information"=>"Sayfa bigisi",
			"ID_:"=>"ID : ",
			"NAME_:"=>"Isim : ",
			"PRIVATE_:"=>"Gizli : ",
			"page_access"=>"Sayfa Eri�imi",
			"remove_access"=>"Eri�imi sil : ",
			"add_access"=>"Eri�im ekle : ",
			"admin_pages"=>"Y�netici Sayfalar�",
			"PAGE"=>"Sayfa",
			"ACCESS"=>"Eri�im",
			"Admin_permission"=>"Y�netici izini",
			"Permission_Information"=>"Izin bilgisi",
			"DELETE_:"=>"Sil : ",
			"Permission_Membership"=>"Uyelik izinleri",
			"Remove_Members"=>"Uyeleri sil : ",
			"Permission_Access"=>"Eri�im izni",
			"Public_access"=>"A��k eri�im : ",
			"admin_permissions"=>"y�netici izinleri",
			"DELETE_"=>"Sil",
			"Permission_Name"=>"Izin ismi",
			"Permission_Name_:"=>"Izin ismi : ",
			"Admin_User"=>"Y�netici kullan�c�",
			"User_information"=>"Kullan�c� bilgisi",
			"USERNAME_:"=>"Kullan�c� ismi : ",
			"USERNAME_"=>"Kullan�c� ismi",
			"Displayname_:"=>"G�r�nt� ismi : ",
			"Displayname_"=>"G�r�nt� ismi",
			"ACTIVE_:"=>"Aktif : ",
			"ACTIVATE_:"=>"Aktif et",
			"TITLE_:"=>"Ba�l�k : ",
			"sign_up_:"=>"Kaydol : ",
			"Last_sign_in_:"=>"Son giri� : ",
			"Last_sign_in_"=>"Son giri� tarihi",
			"Remove_perm"=>"Izin sil",
			"add_perm"=>"Izin ekle",
			"Admin_Users"=>"Y�netici Kullan�c�lar",
			"UNABLE_AVATAR_SET"=>"Ayarlar�n�z g�ncellenemedi, L�tfen alanlar� kontrol edin",
			"ERR_OCCURRED"=>"Bir hata olu�tu, l�tfen tekrar deneyin.",
			"CORRECT_REC"=>"Kay�t ba�ar� ile ger�ekle�tirildi",
			"Change_avatar"=>"Avatar� de�i�tir",
			"avatar_:"=>"Avatar : ",
			"Forgot_Pass"=>"Unutulmu� Parola",
			"Account_Home"=>"Hesap Ana sayfa",
			"User_settings"=>"Kullan�c� Ayarlar�",
			"LOGOUT_"=>"��k��",
			"HOME_"=>"Ana sayfa",
			"LOGIN_"=>"Giri�",
			"REGISTER_"=>"Kay�t ol",
			"Resend_Activation_Email"=>"Aktivasyon emailini tekrar g�nder",
			"PASSWORD_:"=>"Parola : ",
			"CPASS_:"=>"Confirm Parola : ",
			"SEC_CODE_:"=>"G�venlik Kodu : ",
			"ENTER_SEC_CODE_:"=>"G�venlik kodunu gir : ",
			"Resend_Activation"=>"Aktivasyonu tekrar G�nder",
			"NEW_PASS_:"=>"Yeni parola : ",
			"GERI_"=>"Back",
		
	));
	?>