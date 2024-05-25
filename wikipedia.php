<?php
    session_start();
    if(!isset($_SESSION['username'])){ 
        header("Location: login.php");
        exit;
    }
    $client_id = "0d0a09b7b17daee17b312d2394817cc8";
    $client_secret = "4f715f9c33c6746b433c7a1f8f2cf905859fb0ec";

    $formData = array(
        'grant_type' => 'client_credentials',
        'client_id' => $client_id,
        'client_secret' => $client_secret
    );

    // Richiesta token
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://meta.wikimedia.org/w/rest.php/oauth2/access_token");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($formData));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);
    
    // Utilizzo
    $token = json_decode($result)->access_token;
    $date = date("Y/m/d");

    $language_code = 'en';
    $base_url = 'https://api.wikimedia.org/feed/v1/wikipedia/';
    $url = $base_url.$language_code."/featured/".$date;
    $headers = array("Authorization: Bearer ".$token);

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);

    echo $result;
    curl_close($curl);

?>