<?php
    include "apiKey.php";

    $matchID = $_GET["matchID"];
   
    $matchById_url = "https://europe.api.riotgames.com/lol/match/v5/matches/".$matchID."?api_key=".$API_KEY;
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $matchById_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($curl);

    curl_close($curl);

    echo $response;
?>
