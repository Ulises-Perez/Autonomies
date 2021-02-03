<?php
    require 'urls/apis/api_content.php';
    require 'config/pageContenido/config.php';
?>

<!DOCTYPE html>
<html lang="es">

<?php include('urls/urlContenido/pelicula/head.php'); ?>

<body id="body" style="background-image: url(https://image.tmdb.org/t/p/w185<?=$contentM['backdrop_path']?>);">

  <?php include('templates/pageContenido/pelicula/header.php');?>

  <main id="main" class="backdrop-blur">

    <section id="content-back">
      <div class="w-full">
        <div class="lg:container mx-auto pt-20 lg:pt-32 pb-6 lg:pb-16 px-2 xl:px-0">
          <div class="grid grid-cols-1 md:grid-cols-5 gap-y-4 md:gap-4">
            <div class="box-img-content relative col-span-2 lg:col-span-1 flex justify-center lg:justify-start">
              <img src="https://image.tmdb.org/t/p/w342<?=$contentM['poster_path']?>"
                class="w-80 md:w-auto rounded" alt="" />
                <div class="hidden lg:block absolute top-0 right-0 rounded flex items-center justify-center">
                  <a href="https://www.themoviedb.org/movie/<?=$contentM['id']?>" target="_blank">
                    <button class="bg-red-500 text-white px-3 py-2 rounded-bl rounded-tr outline-none focus:outline-none">
                      <i class="fas fa-external-link-alt"></i>
                    </button>
                  </a>
                </div>
            </div>
            <div class="box-info-content col-span-3 lg:col-span-4 text-white">
              <div class="info-title flex items-center justify-between">
                <h1 class="text-xl md:text-2xl lg:text-3xl font-semibold">
                  <?=$contentM['title']?>
                </h1>
                <div class="info-year-definicion text-base flex items-center gap-6">
                  <div class="duracion hidden lg:block"><?=$contentM['runtime']?>m</div>
                  <div class="year hidden lg:block">
                    <?php
                      // Como la fecha viene en formato ingles, establecemos el localismo.
                      setlocale(LC_ALL, 'en_US');

                      // Fecha en formato yyyy/mm/dd
                      $timestamp = strtotime($contentM['release_date']);

                      // Fecha en formato dd/mm/yyyy
                      $fechaYear = strftime("%d-%m-%Y", $timestamp);
                      echo $fechaYear;
                    ?>
                  </div>
                  <div class="calificacion h-8 w-8 bg-red-500 rounded shadow-md flex justify-center items-center">
                    <p class="p-2"><?=$contentM['vote_average']?></p>
                  </div>
                  <!--
                  <div class="definicion bg-red-500 px-2 rounded-full">
                    HD
                  </div>
                  -->
                </div>
              </div>
              <p
                class="text-base md:text-lg text-justify text-gray-500 my-4 overflow-auto h-20 leading-none lg:px-2">
                  <?php
                    if(!empty($contentM['overview'])){
                      echo substr_replace($contentM['overview'], "...", 350);
                    }else{
                      echo '¡Lo sentimos, no hay ninguna descripción disponible!';
                    }
                  ?>
              </p>
              <div class="hidden md:grid grid-cols-4 gap-4 my-4 text-sm lg:text-base">
                <?php
                    $i=0;
                    foreach($contentCast['crew'] as $pcrew){
                      if($i++ > 7) break;
                      echo '<div class="col-span-2 md:col-span-1 text-white">
                              '.$pcrew['name'].'
                              <p class="text-sm text-gray-500">
                                '.$pcrew['job'].'
                              </p>
                            </div>';
                    }
                ?>
              </div>
              <div class="generosContent my-4 hidden md:block">
                <h6 class="text-lg">Generos</h6>
                <div class="grid grid-cols-4 lg:grid-cols-6 gap-2">
                  <?php
                    foreach($contentM['genres'] as $generos){
                      echo '<a href="#'.$generos['name'].'">
                              <div class="col-span-2 genero h-12 relative flex justify-start px-4 items-center rounded" style="
                                    background-image: url(https://image.tmdb.org/t/p/w185/'.$contentM['backdrop_path'].');
                                  ">
                                <div class="nombre-genero absolute inset-0 bg-gradient-to-r from-red-600 px-4 rounded"></div>
                                <h6 class="opacity-100 absolute">'.$generos['name'].'</h6>
                              </div>
                            </a>';
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="video-content">
      <div class="w-full">
        <div class="lg:container mx-auto mb-6 px-2 xl:px-0 text-white">
                <?php //Iframe && Scrapper Movies in Cuevana.co
                  function scrape($URL){
                      //cURL options
                      $options = Array(
                                  CURLOPT_RETURNTRANSFER => TRUE, //return html data in string instead of printing it out on screen
                                  CURLOPT_FOLLOWLOCATION => TRUE, //follow header('Location: location');
                                  CURLOPT_CONNECTTIMEOUT => 60, //max time to try to connect to page
                                  CURLOPT_HEADER => FALSE, //include header
                                  CURLOPT_USERAGENT => "Mozilla/5.0 (X11; Linux x86_64; rv:21.0) Gecko/20100101 Firefox/21.0", //User Agent
                                  CURLOPT_URL => $URL //SET THE URL
                                  );

                      $ch = curl_init($URL);//initialize a cURL session
                      curl_setopt_array($ch, $options);//set the cURL options
                      $data = curl_exec($ch);//execute cURL (the scraping)
                      curl_close($ch);//close the cURL session

                      return $data;
                    }

                    function parse(&$data, $query, &$dom){
                        $Xpath = new DOMXpath($dom); //new Xpath object associated to the domDocument
                        $result = $Xpath->query($query);//run the Xpath query through the HTML
                        return $result;
                    }


                    //new domDocument
                    $dom = new DomDocument("1.0");

                    if($nombreCuevana = $contentM['original_title']){
                      $nombreCuevana = $contentM['original_title'];
                    }else{
                      $nombreCuevana = $contentM['title'];
                    }

                    $nombreCuevanaArreglado = str_replace(" ","-", $nombreCuevana);

                    $nombreCuevanaFinal = str_replace("'", "", $nombreCuevanaArreglado);

                    $objetivo = "999999";
                    for($i = 100000; $i < 999999; $i++){
                      if($i == $objetivo){
                        echo '';
                      }
                    }

                    //Scrape and parse
                    $data = scrape('https://cuevana3.io/'.$i.'/'.strtolower($nombreCuevanaFinal).''); //scrape the website
                    @$dom->loadHTML($data); //load the html data to the dom

                    $XpathQuery = '//iframe'; //Your Xpath query could look something like this
                    $iframes = parse($data, $XpathQuery, $dom); //parse the HTML with Xpath

                    $i=0;
                    foreach($iframes as $iframe){
                        if($i++ >= 1) break;
                        $src = $iframe->getAttribute('data-src'); //get the src attribute

                        if(!empty($src)){
                          echo '<div class="contentMovie">
                                  <div class="absolute inset-0 flex flex-col items-center">
                                    <iframe class="w-full h-full rounded" src="'.$src.'" frameborder="0"
                                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                      allowfullscreen></iframe>
                                  </div>
                                </div>';
                        }else{
                          echo '';
                        }
                    }
                ?>
        </div>
      </div>
    </section>

    <section id="section-reparto">
      <div class="w-full">
        <div class="lg:container mx-auto px-2 xl:px-0">
          <div class="flex flex-wrap" id="tabs-id">
            <div class="w-full">
              <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                  <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-red-500"
                    onclick="changeAtiveTab(event,'tab-frase')">
                    Fráse
                  </a>
                </li>
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                  <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-back-oficial"
                    onclick="changeAtiveTab(event,'tab-reparto')">
                    Reparto
                  </a>
                </li>
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                  <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-back-oficial"
                    onclick="changeAtiveTab(event,'tab-multimedia')">
                    Multimedia
                  </a>
                </li>
              </ul>
              <div class="relative flex flex-col min-w-0 break-words bg-transparent text-white w-full mb-6 rounded">
                <div class="py-5 flex-auto">
                  <div class="tab-content tab-space">
                    <div class="block" id="tab-frase">
                      <p class="flex justify-center text-center">
                        <?php
                          if(empty($contentM['tagline'])){
                            echo '¡Lo, sentimos, no hay ninguna frase disponible!';
                          }else{
                            echo '"'.$contentM['tagline'].'"';
                          }
                        ?>
                      </p>
                    </div>
                    <div class="hidden" id="tab-reparto">
                      <div class="owl-carousel owl-theme owl-carousel-2">
                        <?php
                          if(empty($contentCast)){
                            echo '¡Lo sentimos, no hay reparto disponible!';
                          }else{
                            $i=0;
                            foreach($contentCast['cast'] as $pcast){
                              if($i++ >= 8) break;
                              if(!empty($pcast['profile_path'])){
                                echo '<div class="item">
                                        <div class="max-w-xs rounded overflow-hidden shadow-lg relative">
                                          <img class="w-full"
                                            src="https://image.tmdb.org/t/p/w185/'.$pcast['profile_path'].'"
                                            alt="Sunset in the mountains" />
                                          <div class="px-6 py-1 w-full absolute bottom-0 backdrop-blur">
                                            <div class="font-bold text-md md:text-lg truncate">
                                            '.$pcast['name'].'
                                            </div>
                                          </div>
                                        </div>
                                      </div>';
                              }else{
                                echo '';
                              }
                            }
                          }
                        ?>
                      </div>
                    </div>
                    <div class="hidden" id="tab-multimedia">
                      <div class="owl-carousel owl-theme owl-carousel-3">
                      <?php
                        $i=0;
                        foreach($contentImg['backdrops'] as $imgBackdrop){
                          if($i++ > 7) break;
                          echo '<div class="item">
                                  <a href="https://image.tmdb.org/t/p/w1280'.$imgBackdrop['file_path'].'" target="_blank">
                                    <div class="img-content">
                                      <img src="https://image.tmdb.org/t/p/w185'.$imgBackdrop['file_path'].'" class="rounded shadow" alt="'.$imgBackdrop['vote_average'].'" />
                                    </div>
                                  </a>
                                </div>';
                        }

                      ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <?php
    include('templates/pageContenido/pelicula/footer.php');
    include('urls/urlUniversal/scripts.php');
  ?>

  <script src="plugins/js/script.js"></script>
</body>

</html>