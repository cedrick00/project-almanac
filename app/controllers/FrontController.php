<?php

class FrontController extends BaseController
{
	public function getIndex()
	{

		//$webService = new PrestaShopWebservice('http://dev.v2.sendah.local/', 'P7XEU2T64I93M9PX82JMXWJF82S89HQL', false);

		try {

			$username = "jdecena@ayannah.com";
			$password = "Testing123";

			$host = "http://four.sendah.com/module/wallet/api?key=P7XEU2T64I93M9PX82JMXWJF82S89HQL&email=jdecena@ayannah.com";

			$ch = curl_init($host);			
			curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			$return = curl_exec($ch);
			curl_close($ch);

			var_dump($return);
		}
		catch (PrestaShopWebserviceException $ex) {
		   // Shows a message related to the error
		   echo 'Other error: <br />' . $ex->getMessage();
		}		

		//START THE CURL
/*		$ch 		= curl_init();
		$url 		= "http://P7XEU2T64I93M9PX82JMXWJF82S89HQL@dev.v2.sendah.local/api/customers";
		$data 		= array(
							'firstname' 	=> Tools::getValue('customer_firstname'), 
							'lastname' 		=> Tools::getValue('customer_lastname'),  
							'email' 		=> Tools::getValue('email'),
							'password' 		=> Tools::getValue('passwd')
						);

		curl_setopt($ch, CURLOPT_URL, $url);
		//curl_setopt($ch, CURLOPT_USERPWD, $this->username . ":" . $this->password); 
		//curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, '10');
		$content = trim(curl_exec($ch));	
		curl_close($ch);

		var_dump($content); die();

		$data 					= json_decode($content);

		var_dump($data); die();*/
	}
}