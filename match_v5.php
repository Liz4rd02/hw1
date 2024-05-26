<?php
    include "apiKey.php";

    $puuid = $_GET["puuid"];
    $count = $_GET["count"];

    $match_v5_url = "https://europe.api.riotgames.com/lol/match/v5/matches/by-puuid/".$puuid."/ids?start=0&count=".$count."&api_key=".$API_KEY;

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $match_v5_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($curl);

    curl_close($curl);

    echo $response;
?>
