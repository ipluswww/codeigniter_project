<?php

  //start session in all pages
  if (session_status() == PHP_SESSION_NONE) { session_start(); } //PHP >= 5.4.0
  //if(session_id() == '') { session_start(); } //uncomment this line if PHP < 5.4.0 and comment out line above

	// sandbox or live
	define('PPL_MODE', 'main');

	if(PPL_MODE=='sandbox'){
		
		define('PPL_API_USER', 'shelby-testing_api1.mail.com');
		define('PPL_API_PASSWORD', 'H98RNAURG8CUHNQZ');
		define('PPL_API_SIGNATURE', 'AFcWxV21C7fd0v3bYYYRCpSSRl31AwDgfIEht4zsG-hHv8ls7u9ncPiO');
	}
	else{
		
		define('PPL_API_USER', 'marc_api1.shelbyssidecartours.com');
		define('PPL_API_PASSWORD', 'A45LTB2MLR5C7QMU');
		define('PPL_API_SIGNATURE', 'AFcWxV21C7fd0v3bYYYRCpSSRl31ATGtmgoCOqxjnovaqygDtaruASFb');
	}
	
	define('PPL_LANG', 'EN');
	
	define('PPL_LOGO_IMG', asset_url().'img/logo.png');
	
	define('PPL_RETURN_URL', base_url().'pay_success');
	define('PPL_CANCEL_URL', 'http://www.shelbyssidecartours.com');

	define('PPL_CURRENCY_CODE', 'AUD');
