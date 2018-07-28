
<?php

// Use pattern below to give parameters to function
$func_cURL_data_dummy = ['url' => null, 
                        'useragent' => null, 
						'timeout' => null, 
						'followlocation' => null, 
						'ssl_verifyhost' => null, 
						'ssl_verifypeer' => null, 
						'returntransfer' => null ];
unset($func_cURL_data_dummy);
// Pattern end
            
// Use string below to call the function
// $result = cURL();

// The function
function cURL($data)
{
	$default = ['useragent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:52.0) Gecko/20100101 Firefox/52.0', 
				'timeout' => 60,
				'followlocation' => 0,
				'ssl_verifyhost' => 0,
				'ssl_verifypeer' => false,
				'returntransfer' => true ];
	if(is_array($data))
	{
		$data = array_merge($data, $default);
	}
	else if (is_string($data))
	{
		$data() = $default() = ['url' = $data];
	}
	else
	{
		echo 'Error: there is nothing to use in cURL';
	}
		
	$ch = curl_init($data['url']);
	//$fp = fopen("example_homepage.txt", "w");
	
	curl_setopt($ch, CURLOPT_USERAGENT,      $data['useragent']);
	curl_setopt($ch, CURLOPT_TIMEOUT,        $data['timeout'] );
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $data['followlocation']);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $data['ssl_verifyhost']);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $data['ssl_verifypeer']);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, $data['returntransfer']);

	//curl_setopt($ch, CURLOPT_FILE, $fp);
	//curl_setopt($ch, CURLOPT_HEADER, 0);

	$result = curl_exec($ch); // выполнение
	curl_close($ch); // завершение сеанса
	return $result;
}

?>
