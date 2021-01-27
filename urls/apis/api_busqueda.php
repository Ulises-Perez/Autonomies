<!--<pre>-->
<?php
    require 'key/key.php';

    if(!isset($_GET['page'])){
        $_GET['page'] = 1;
    }
    //Api for Peliculas Page
    $bContent = @file_get_contents('https://api.themoviedb.org/3/search/movie?api_key='.$TMDB_KEY.'&language=es-ES&query='.urlencode($_GET['query']).'&page='.$_GET['page'].'&include_adult=false');
    if(empty($bContent)){
        $bContent = '';
    }else{
        $bContent = json_decode($bContent, true)['results'];
    }

    //Api for Series Page
    $bSContent = @file_get_contents('https://api.themoviedb.org/3/search/tv?api_key='.$TMDB_KEY.'&language=es-ES&query='.urlencode($_GET['query']).'&page='.$_GET['page'].'&include_adult=false');
    if(empty($bSContent)){
        $bSContent = '';
    }else{
        $bSContent = json_decode($bSContent, true)['results'];
    }

    //print_r($bContent);
?>