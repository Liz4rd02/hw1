<?php
    include "apiKey.php";

    $puuid = $_GET["puuid"];
    $summoner_v4_url = "https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-puuid/".$puuid."?api_key=".$API_KEY;

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $summoner_v4_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($curl);

    curl_close($curl);

    // Gestisci la risposta
    echo $response;
?>