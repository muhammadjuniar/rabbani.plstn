<?php
  class RestData{ 

    function __construct() {
	    $this->url = 'https://rabbani.co.id/blast/get_image_palestine.php';
	} 

	function insert_b64_foto_produk_rpos($datakirim){
		// $result = print_r($dataSend, true); 
		// echo '<pre>'; print_r($result); echo '</pre>';
	    // close();
	 		
		$curl = curl_init();
		  curl_setopt_array($curl, array(
		  CURLOPT_SSL_VERIFYPEER => false,	
		  CURLOPT_URL => $this->url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>  $datakirim 
		
		));

		$response = curl_exec($curl);
		
		// 
		$httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
		$httpHeaders = curl_getinfo($curl);
		// 
		
		curl_close($curl);
		return $response;

		// 
		if($httpcode  && $contents!='')
		{
			makeLog('calls ', $URL.' resp c:'.$httpcode.' r:'.$contents); 
		}
		else if($httpcode)
		{
			makeLog('calls ', $URL.' resp c:'.$httpcode); 
		}

		function makeLog($function , $message='')
		{
			$myFile = "errorLogs.txt";
			$fh = fopen($myFile, 'a+');
			fwrite($fh , "\n\r\n\r".$_SERVER['REMOTE_ADDR'].': '.$message.' -'.$function."\n\r\n\r");
		}
		// 
	}

	// end

	
	

  }// end class
	  


?>