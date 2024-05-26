<?php
    include "apiKey.php"; 

    $id = $_GET["id"];
   
    $league_v4_url = "https://euw1.api.riotgames.com/lol/league/v4/entries/by-summoner/".$id."?api_key=".$API_KEY;

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $league_v4_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($curl);

    curl_close($curl);

    echo $response;
?>
