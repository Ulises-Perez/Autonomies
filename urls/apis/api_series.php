<?php
    require 'key/key.php';
    
    //Api for Peliculas Page
    $spContent = file_get_contents('https://api.themoviedb.org/3/tv/popular?api_key='.$TMDB_KEY.'&language=es-ES&page ='.$_GET['page']);
    $spContent = json_decode($spContent, true)['results'];
?>