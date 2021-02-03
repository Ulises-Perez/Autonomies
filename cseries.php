<?php
    require 'urls/apis/api_content_series.php';
    require 'config/pageContenido/config.php';
    //phpinfo();
?>

<!DOCTYPE html>
<html lang="es">

<?php include('urls/urlContenido/serie/head.php'); ?>

<body id="body" style="background-image: url(https://image.tmdb.org/t/p/w185<?=$contentS['backdrop_path']?>);">

  <?php include('templates/pageContenido/pelicula/header.php'); ?>

  <main id="main" class="backdrop-blur">

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
                  <?=$contentS['name']?>
                </h1>
                <div class="info-year-definicion text-base flex items-center gap-6">
                  <div class="year hidden lg:block">
                    <?php
                      // Como la fecha viene en formato ingles, establecemos el localismo.
                      setlocale(LC_ALL, 'en_US');

                      // Fecha en formato yyyy/mm/dd
                      $timestamp = strtotime($contentS['first_air_date']);

                      // Fecha en formato dd/mm/yyyy
                      $fechaYear = strftime("%d-%m-%Y", $timestamp);
                      echo $fechaYear;
                    ?>
                  </div>
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
              <p
                class="text-base md:text-lg text-justify text-gray-500 my-4 overflow-auto h-20 leading-none">
                  <?php
                    if(!empty($contentS['overview'])){
                      echo substr_replace($contentS['overview'], "...", 350);
                    }else{
                      echo '¡Lo sentimos, no hay ninguna descripción disponible!';
                    }
                  ?>
              </p>
              <div class="generosContent my-4 hidden md:block">
                <h6 class="text-lg">Generos</h6>
                <div class="grid grid-cols-4 lg:grid-cols-6 gap-2">
                  <?php
                    foreach($contentS['genres'] as $generos){
                      echo '<a href="#'.$generos['name'].'">
                              <div class="col-span-2 genero h-12 relative flex justify-start px-4 items-center rounded" style="
                                    background-image: url(https://image.tmdb.org/t/p/w185/'.$contentS['backdrop_path'].');
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
                          if(empty($contentS['tagline'])){
                            echo '¡Lo, sentimos, no hay ninguna frase disponible!';
                          }else{
                            echo '"'.$contentS['tagline'].'"';
                          }
                        ?>
                      </p>
                    </div>
                    <div class="hidden" id="tab-reparto">
                      <div class="owl-carousel owl-theme owl-carousel-2">
                        <?php
                          if(empty($contentCastS)){
                            echo '¡Lo sentimos, no hay reparto disponible!';
                          }else{
                            $i=0;
                            foreach($contentCastS['cast'] as $pcast){
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
                        foreach($contentImgS['backdrops'] as $imgBackdrop){
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
  <script src="plugins/js/script.js"></script>
</body>

</html>