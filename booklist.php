<?php    header ('Content-type: text/html; charset=utf-8');

        /*$ch = curl_init(); 

        // set url 
        //curl_setopt($ch, CURLOPT_URL, "http://data.tmd.go.th/api/WeatherToday/V1/?type=json"); 
        curl_setopt($ch, CURLOPT_URL, "https://data.tmd.go.th/api/WeatherForecast7Days/V1/?type=json"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 
        
     
   

        // close curl resource to free up system resources 
        curl_close($ch);    
        
        echo $output;
        
       
        //$array = json_decode($output,TRUE);
        
         //print_r($array);*/
    
                 
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://apis-3015.lib.cmu.ac.th/exam/book',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "keyword":"engeineering",
            "category_id": "621f286788d5cf0df814d16d",
            "skip": 0,
            "limit": 50
        }',
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        if(isset($response))
        {
           //echo $response;
           //echo json_encode($response);
           //echo "TEst";
           echo json_decode($response);
        }else{
                echo "Error";
        }
        
?>
