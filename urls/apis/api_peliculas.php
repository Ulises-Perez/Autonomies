<?php
    require 'key/key.php';
    
    //Api for Peliculas Page
    $mpContent = file_get_contents('https://api.themoviedb.org/3/movie/popular?api_key='.$TMDB_KEY.'&language=es-ES&page ='.$_GET['page']);
    $mpContent = json_decode($mpContent, true)['results'];
?>