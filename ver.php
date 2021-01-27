<?php
    require 'urls/apis/api_ver.php';
    require 'config/pageContenido/config.php';
?>

<!DOCTYPE html>
<html lang="es">

<?php include('urls/urlContenido/serie/head.php'); ?>

<body id="body" style="background-image: url(https://image.tmdb.org/t/p/w185<?=$contentS['backdrop_path']?>);">

  <?php include('templates/pageContenido/pelicula/header.php'); ?>

  <main id="main" class="backdrop-blur h-screen">

    <section id="content-back">
      <div class="w-full">
        <div class="lg:container mx-auto pt-20 lg:pt-32 pb-6 lg:pb-16 px-2 xl:px-0">
          <div class="grid grid-cols-1 md:grid-cols-5 gap-y-4 md:gap-4">
            <div class="box-img-content relative col-span-2 lg:col-span-1 flex justify-center lg:justify-start">
              <img src="https://image.tmdb.org/t/p/w342<?=$contentS['poster_path']?>"
                class="w-80 md:w-auto rounded" alt="" />
                <div class="hidden lg:block absolute top-0 right-0 rounded flex items-center justify-center">
                  <a href="https://www.themoviedb.org/tv/<?=$contentS['id']?>" target="_blank">
                    <button class="bg-red-500 text-white px-3 py-2 rounded-bl rounded-tr outline-none focus:outline-none">
                      <i class="fas fa-external-link-alt"></i>
                    </button>
                  </a>
                </div>
            </div>
            <div class="box-info-content col-span-3 lg:col-span-4 text-white">
              <div class="info-title flex items-center justify-between">
                <h1 class="text-xl md:text-2xl lg:text-3xl font-semibold">
                  Temporada: <?=$ntemporada?>
                </h1>
                <div class="info-year-definicion text-base flex items-center gap-6">
                  <div class="calificacion h-8 w-8 bg-red-500 rounded shadow-md flex justify-center items-center">
                    <p class="p-2"><?=$contentS['vote_average']?></p>
                  </div>
                  <!--
                  <div class="definicion bg-red-500 px-2 rounded-full">
                    HD
                  </div>
                  -->
                </div>
              </div>
              <div class="episodios py-8">
                    <?php
                      $i=0;
                      foreach($ntemporada = $contentS['seasons'] as $temporadas){
                        if($i++ >= 1) break;
                        echo '<div class="block" id="'.$ntemporada.'">';
                              echo '<div class="grid grid-cols-3 lg:grid-cols-5 gap-2">';
                                foreach($contentEpisodesS['episodes'] as $episodios){
                                  echo '<a href="#'.$episodios['episode_number'].'">
                                          <div class="col-span-2 genero h-12 relative flex justify-start px-4 items-center rounded" style="
                                                background-image: url(https://image.tmdb.org/t/p/w185/'.$episodios['still_path'].');
                                              ">
                                            <div class="nombre-genero absolute inset-0 bg-gradient-to-r from-red-600 px-4 rounded"></div>
                                            <h6 class="opacity-100 absolute">'.$episodios['name'].'</h6>
                                          </div>
                                        </a>';
                                }
                              echo '</div>';
                        echo '</div>';
                                
                      }
                    ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--<section id="video-content">
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

                    if($nombreCuevana = $contentS['original_name']){
                      $nombreCuevana = $contentS['original_name'];
                    }else{
                      $nombreCuevana = $contentS['name'];
                    }

                    $nombreCuevanaArreglado = str_replace(" ","-", $nombreCuevana);

                    $nombreCuevanaFinal = str_replace("'", "", $nombreCuevanaArreglado);

                    //Scrape and parse
                    $data = scrape('https://cuevana3.io/episodio/'.strtolower($nombreCuevanaFinal).'-1x1'); //scrape the website
                    @$dom->loadHTML($data); //load the html data to the dom

                    $XpathQuery = '//iframe'; //Your Xpath query could look something like this
                    $iframes = parse($data, $XpathQuery, $dom); //parse the HTML with Xpath

                    $i=0;
                    foreach($iframes as $iframe){
                        if($i++ >= 1) break;
                        $src = $iframe->getAttribute('data-src'); //get the src attribute
                        if(empty($src)){
                          echo '<div class="contentMovie">
                          <div class="absolute inset-0 flex flex-col items-center">
                            <iframe class="w-full h-full rounded" src="'.$src.'" frameborder="0"
                              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                              allowfullscreen></iframe>
                          </div>
                        </div>';
                        }else{
                          echo '<div class="contentMovie">
                                    <div class="absolute inset-0 flex flex-col items-center">
                                      <iframe class="w-full h-full rounded" src="'.$src.'" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                    </div>
                                  </div>';
                        }
                    }
                ?>
        </div>
      </div>
    </section>-->

  </main>

  <?php
    include('templates/pageContenido/pelicula/footer.php');
    include('urls/urlUniversal/scripts.php');
  ?>

  <script> //Script De Capitulos
    function changeAtiveTab2(event,tabID){
      let element = event.target;
      while(element.nodeName !== "A"){
        element = element.parentNode;
      }
      ulElement = element.parentNode.parentNode;
      aElements = ulElement.querySelectorAll("li > a");
      tabContents = document.getElementById("tabs-id2").querySelectorAll(".tab-content2 > div");
      for(let i = 0 ; i < aElements.length; i++){
        aElements[i].classList.remove("text-white");
        aElements[i].classList.remove("bg-red-500");
        aElements[i].classList.add("text-white");
        aElements[i].classList.add("bg-back-oficial");
        tabContents[i].classList.add("hidden");
        tabContents[i].classList.remove("block");
      }
      element.classList.remove("text-red-500");
      element.classList.remove("bg-back-oficial");
      element.classList.add("text-white");
      element.classList.add("bg-red-500");
      document.getElementById(tabID).classList.remove("hidden");
      document.getElementById(tabID).classList.add("block");
    }
  </script>
  <script src="../plugins/js/script.js"></script>
</body>

</html>