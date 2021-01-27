<!--<pre>-->
<?php
    require 'key/key.php';

    $nEpisodio = $_POST['numeroEpisodio'];
    $ntemporada = $_POST['numeroTemporada'];

    //api for Content of Series or Tv
    $contentS = file_get_contents('https://api.themoviedb.org/3/tv/'.$_GET['id'].'?api_key='.$TMDB_KEY.'&language=es-ES');
    $contentS = json_decode($contentS, true);

    $contentEpisodesS = file_get_contents('https://api.themoviedb.org/3/tv/'.$_GET['id'].'/season/'.$ntemporada.'?api_key='.$TMDB_KEY.'&language=es-ES');
    $contentEpisodesS = json_decode($contentEpisodesS, true);

    $content_Info_Episode = file_get_contents('https://api.themoviedb.org/3/tv/'.$_GET['id'].'/season/'.$ntemporada.'/episode/'.$nEpisodio.'?api_key='.$TMDB_KEY.'&language=es-ES');
    $content_Info_Episode = json_decode($content_Info_Episode ,true);
    
    //print_r($content_Info_Episode);
?>