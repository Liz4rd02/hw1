<?php
    include "apiKey.php";

    if(isset($_POST["summonerName"]) && isset($_POST["summonerTag"])){
        $gameName = urlencode($_POST["summonerName"]); // Utilizzo di urlencode per codificare l'URL
        $tagLine = urlencode($_POST["summonerTag"]); // Utilizzo di urlencode per codificare l'URL

        $rest_url = "https://europe.api.riotgames.com/riot/account/v1/accounts/by-riot-id/".$gameName."/".$tagLine."?api_key=".$API_KEY;

        // Esegui la richiesta
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $rest_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        echo $result;
    }
?>