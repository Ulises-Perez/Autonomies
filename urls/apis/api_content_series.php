<!--<pre>-->
<?php
    require 'key/key.php';

    //api for Content of Series or Tv
    $contentS = file_get_contents('https://api.themoviedb.org/3/tv/'.$_GET['id'].'?api_key='.$TMDB_KEY.'&language=es-ES');
    $contentS = json_decode($contentS, true);

    $contentCastS = file_get_contents('https://api.themoviedb.org/3/tv/'.$_GET['id'].'/credits?api_key='.$TMDB_KEY.'&language=es-ES');
    $contentCastS = json_decode($contentCastS, true);

    $contentImgS = file_get_contents('https://api.themoviedb.org/3/tv/'.$_GET['id'].'/images?api_key='.$TMDB_KEY.'');
    $contentImgS = json_decode($contentImgS, true);
    
    //print_r($contentS);
?>