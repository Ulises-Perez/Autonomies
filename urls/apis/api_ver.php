<!--<pre>-->
<?php
    require 'key/key.php';

    $ntemporada = $_POST['numeroTemporada'];

    //api for Content of Series or Tv
    $contentS = file_get_contents('https://api.themoviedb.org/3/tv/'.$_GET['id'].'?api_key='.$TMDB_KEY.'&language=es-ES');
    $contentS = json_decode($contentS, true);

    $contentEpisodesS = file_get_contents('https://api.themoviedb.org/3/tv/'.$_GET['id'].'/season/'.$ntemporada.'?api_key='.$TMDB_KEY.'&language=es-ES');
    $contentEpisodesS = json_decode($contentEpisodesS, true);
    
    //print_r($contentEpisodesS1);
?>