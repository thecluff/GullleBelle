<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php
            if (substr_count($_SERVER['REQUEST_URI'], '/') >= 2) {
                $url = ucwords(str_replace("/", " ", $_SERVER['REQUEST_URI']));
                $str = explode('Index', $url);
                $url = $str[0];
                echo $url;
            } else {
                echo 'Gull le Belle';
            }
        ?></title>
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
    <script src="/assets/js/main.js"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5f1602dd7258dc118bee9c48/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>