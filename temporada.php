<?php
    require 'urls/apis/api_temporada.php';
    require 'config/pageContenido/config.php';
?>

<!DOCTYPE html>
<html lang="es">

<?php include('urls/urlContenido/serie/head.php'); ?>

<body id="body" style="background-image: url(https://image.tmdb.org/t/p/w185<?=$contentS['backdrop_path']?>);">

  <?php include('templates/pageContenido/pelicula/header.php'); ?>

  <main id="main" class="backdrop-blur h-full">

    <section id="content-back">
      <div class="w-full">
        <div class="lg:container mx-auto pt-20 lg:pt-32 pb-6 lg:pb-16 px-2 xl:px-0">
          <div class="grid grid-cols-1 md:grid-cols-5 gap-y-4 md:gap-4">
            <div class="box-img-content relative col-span-2 lg:col-span-1 flex justify-center lg:justify-start">
              <img src="https://image.tmdb.org/t/p/w342<?=$contentS['poster_path']?>"
                class="w-80 md:w-auto rounded" alt="" />
                <div class="hidden lg:block absolute top-0 right-0 rounded flex items-center justify-center">
                  <a href="cseries.php?id=<?=$contentS['id']?>">
                    <button class="bg-red-500 text-white px-3 py-2 rounded-bl rounded-tr outline-none focus:outline-none">
                      <i class="fas fa-list-ul"></i>
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
              <div class="episodios lg:px-2 my-2 lg:my-4 h-72 overflow-auto">
                    <?php
                      $i=0;
                      foreach($ntemporada = $contentS['seasons'] as $temporadas){
                        if($i++ >= 1) break;
                        echo '<div class="block" id="'.$ntemporada.'">';
                              echo '<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">';
                                foreach($contentEpisodesS['episodes'] as $episodios){
                                  echo '<form class="w-full" method="post" action="episodio.php?id='.$contentS['id'].'">
                                  <input class="hidden" type="text" name="numeroEpisodio" value="'.$episodios['episode_number'].'">
                                  <input class="hidden" type="text" name="numeroTemporada" value="'.$episodios['season_number'].'">
                                  <div class="gap-4">
                                    <button type="submit" class="font-bold uppercase shadow-lg rounded leading-normal text-white w-full shadow-inner text-white h-20" style="background-image: url(https://image.tmdb.org/t/p/w342'.$episodios['still_path'].'); background-size:cover; background-repeat:no-repeat;">
                                      <h6 class="text-white bg-black bg-opacity-60 rounded py-4 px-4 text-xs h-full flex justify-center items-center">'.$episodios['episode_number'].' - '.$episodios['name'].'</h6>
                                    </button>
                                  </div>
                                </form>';
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

    <section id="temporadas-content">
        <div class="w-full">
            <div class="lg:container mx-auto px-2 xl:px-0 text-white">
              <h1 class="text-xl">Temporadas</h1>
              <div class="temporadas pt-2 pb-8 h-auto w-full overflow-auto flex gap-2">
                        <?php
                        foreach($contentS['seasons'] as $temporadas){
                            echo '<div class="block" id="'.$temporadas['season_number'].'">
                                    <div class="flex gap-2">
                                        <form class="w-full" method="post" action="temporada.php?id='.$contentS['id'].'">
                                          <input class="hidden" type="text" name="numeroEpisodio" value="'.$episodios['episode_number'].'">
                                          <input class="hidden" type="text" name="numeroTemporada" value="'.$temporadas['season_number'].'">
                                          <div class="gap-4">
                                              <button type="submit" class="font-bold uppercase shadow-lg rounded leading-normal text-white shadow-inner text-white w-48 lg:w-60 h-20" style="background-image: url(https://image.tmdb.org/t/p/w342'.$temporadas['poster_path'].'); background-size:cover; background-repeat:no-repeat;">
                                              <h6 class="text-white bg-black bg-opacity-60 rounded py-4 px-4 text-xs h-full flex justify-center items-center">'.$temporadas['season_number'].' - '.$temporadas['name'].'</h6>
                                              </button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>';
                                    
                        }
                        ?>
                </div>
            </div>
        </div>
    </section>

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