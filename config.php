<?php
	// codesnipet 
	// read file from url/api with json format
	//$json = file_get_contents('https://glampatum.cmru.ac.th/api/searchgallery.php?Action=SearchAll&Keysearch=null&keysort=asc'); 
	header ('Content-type: text/html; charset=utf-8');
	$keyword = "null";

	if(isset($_POST['keyword']))
	{
		$keyword = $_POST['keyword'];
	}else{
		$keyword = "null";
	}
	//echo $keyword;

	//$keyword = "null";
	$url = "";
	$url= "https://apis-3015.lib.cmu.ac.th/exam/category";
	//$url = 'https://glampatum.cmru.ac.th/api/searchgallery.php?Action=SearchAll&Keysearch='.$keyword.'&keysort=asc';
	//$url = 'https://glampatum.cmru.ac.th/api/searchgallery.php?Action=SearchAll&Keysearch=null&keysort=asc';
	//echo $url;

	$json = file_get_contents($url);

	//echo $json;
	
	$location_json = json_decode($json);

	/*$url = "https://glampatum.cmru.ac.th/api/searchgallery.php?Action=SearchAll&Keysearch=".$keyword."&keysort=asc";
 
	// Initialize a CURL session.
	$ch = curl_init();
	 
	// Return Page contents.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 
	// Grab URL and pass it to the variable
	curl_setopt($ch, CURLOPT_URL, $url);
	 
	$result = curl_exec($ch);
	 
	//echo $result;
	$location_json = json_decode($result);*/

	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		echo json_encode($location_json);
		//echo $data;
	} else if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//echo "This is POST";
		echo json_encode($location_json);
		//echo $data;
	}else{
		http_response_code(405);
	}

	//echo $url."</br>";
	//var_dump($location_json);
	/*echo "<pre>";
	print_r($location_json);
	echo "</pre>";*/


/*$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://apis-3015.lib.cmu.ac.th/exam/category',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;*/
?>