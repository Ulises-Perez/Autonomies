<!--<pre>-->
<?php
    require 'key/key.php';
    
    //Api for Content of Movies
    $contentM = file_get_contents('https://api.themoviedb.org/3/movie/'.$_GET['id'].'?api_key='.$TMDB_KEY.'&language=es-ES');
    $contentM = json_decode($contentM, true);
    $contentCast = file_get_contents('https://api.themoviedb.org/3/movie/'.$_GET['id'].'/credits?api_key='.$TMDB_KEY.'&language=es-ES');
    $contentCast = json_decode($contentCast, true);
    $contentImg = file_get_contents('https://api.themoviedb.org/3/movie/'.$_GET['id'].'/images?api_key='.$TMDB_KEY.'');
    $contentImg = json_decode($contentImg, true);
    //print_r($contentM);
?>