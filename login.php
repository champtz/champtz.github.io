<?php

    require_once("./includes/init.php");

    if(!$auth->IsUserLoggedIn())
    {
        header("Location: ".$auth->GetLoginURL());
    }
    else
    {
        session_start();
        $api_key = "YOUR_STEAM_API_KEY";
        $json = json_decode(file_get_contents("http://api.steampowered.com/ISteamUser/GetPlayerSu...), true);

        $steamid = $_SESSION["steamid"] = $json['response']['players'][0]['steamid'];
        $username = $_SESSION["username"] = htmlspecialchars($json['response']['players'][0]['personaname']);
        $avatar = $_SESSION["avatar"] = $json['response']['players'][0]['avatarfull'];

        header("Location: /");
    }

?>