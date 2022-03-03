<?php

  $keyword = "";

        if(isset($_POST['keyword']))
        {
                $keyword = $_POST['keyword'];
        }else{
                $keyword = "";
        }

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://apis-3015.lib.cmu.ac.th/exam/book/$keyword',
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
  echo $response;
?>