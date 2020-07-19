<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Gull le Belle</title>
        <link rel="stylesheet" href="/assets/css/main.css" type="text/css">
        <link rel="icon" href="/assets/png/Logo.png" type="image/png">
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <audio id="myAudio">
        <source src="/assets/wav/distcort.wav" type="audio/wav">
    </audio>
    <div class="userinformation"></div>
    <!--<div id="loadpage"></div>-->
    <script src="/assets/js/main.js"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
    <!--<script type="text/javascript">
        hotkeys('ctrl+a,ctrl+b,r,f', function (event, handler){
            switch (handler.key) {
                case 'ctrl+b': changeCookie();
                break;
            }
        });
    </script>-->