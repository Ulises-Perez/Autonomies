<?php
    require 'urls/apis/api_busqueda.php';
    require 'config/pageBusqueda/config.php';
?>

<!DOCTYPE html>
<html lang="es">

<?php include('urls/urlBusqueda/head.php'); ?>

<body id="body">

    <?php include('templates/pageBusqueda/header.php'); ?>

    <main id="main">

        <!--<section id="title-busquedas">
            <div class="w-full">
                <div class="container mx-auto px-4 xl:px-0 pt-10 mb-6 text-white">
                    <h3 class="text-3xl mb-6">
                        Búsquedas encontradas
                    </h3>
                </div>
            </div>
        </section>-->

        <section id="lista-series" class="bg-back-oficial">
            <div class="w-full">
                <div class="container mx-auto px-4 xl:px-0 py-5 mb-6 text-white">
                    <h3 class="text-3xl mb-6">
                        Series
                    </h3>
                    <div class="container_p flex flex-wrap justify-center xl:justify-start">
                        <?php
                            if(!empty($bSContent)){
                                foreach($bSContent as $busquedaS){
                                    if($busquedaS['vote_average'] != "0" && !empty($busquedaS['poster_path'])){
                                        echo '<a href="cseries.php?id='.$busquedaS['id'].'" class="item tilt-poster transform hover:scale-105 transition duration-300 ease-in-out">
                                                <div class="poster relative">
                                                    <img class="w-full h-full rounded" src="https://image.tmdb.org/t/p/w300/'.$busquedaS['poster_path'].'" alt="'.$busquedaS['name'].'">
                                                    <div class="sombra-content absolute inset-0 flex justify-center items-center rounded">
                                                        <button class="play-btn bg-red-500 text-white rounded-full h-10 w-10 lg:h-16 lg:w-16 outline-none focus:outline-none">
                                                            <i class="fas fa-play"></i>
                                                        </button>
                                                    </div>
                                                    <div class="calificacion absolute top-0 left-0 h-8 w-8 bg-red-500 rounded-tl rounded-br shadow-md flex justify-center items-center">
                                                        <p class="p-2">'.$busquedaS['vote_average'].'</p>
                                                    </div>
                                                </div>
                                                <p class="truncate w-full">'.$busquedaS['name'].'</p>
                                            </a>';
                                    }
                                }
                            }else{
                                echo    '<div class="flex flex-col items-center justify-center">
                                            <div class="404-text">
                                                <h3 class="text-xl lg:text-2xl">¡Lo siento, no tenemos nada que mostrar!</h3>
                                            </div>
                                        </div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="lista-peliculas" class="bg-back-oficial">
            <div class="w-full">
                <div class="container mx-auto px-4 xl:px-0 py-5 mb-6 text-white">
                    <h3 class="text-3xl mb-6">
                        Películas
                    </h3>
                    <div class="container_p flex flex-wrap justify-center xl:justify-start">
                        <?php
                            if(!empty($bContent)){
                                foreach($bContent as $busqueda){
                                    if($busqueda['vote_average'] != "0" && !empty($busqueda['poster_path'])){
                                        echo '  <a href="peliculas.php?id='.$busqueda['id'].'" class="item tilt-poster transform hover:scale-105 transition duration-300 ease-in-out">
                                                    <div class="poster relative">
                                                        <img class="w-full h-full rounded" src="https://image.tmdb.org/t/p/w300/'.$busqueda['poster_path'].'" alt="'.$busqueda['title'].'">
                                                        <div class="sombra-content absolute inset-0 flex justify-center items-center rounded">
                                                            <button class="play-btn bg-red-500 text-white rounded-full h-10 w-10 lg:h-16 lg:w-16 outline-none focus:outline-none">
                                                                <i class="fas fa-play"></i>
                                                            </button>
                                                        </div>
                                                        <div class="calificacion absolute top-0 left-0 h-8 w-8 bg-red-500 rounded-tl rounded-br shadow-md flex justify-center items-center">
                                                            <p class="p-2">'.$busqueda['vote_average'].'</p>
                                                        </div>
                                                    </div>
                                                    <p class="truncate w-full">'.$busqueda['title'].'</p>
                                                </a>';
                                    }else{
                                        echo '';
                                    }
                                }
                            }else{
                                echo    '<div class="flex flex-col items-center justify-center">
                                            <div class="404-text">
                                                <h3 class="text-xl lg:text-2xl">¡Lo siento, no tenemos nada que mostrar!</h3>
                                            </div>
                                        </div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER & JS UNIVERSAL -->
    <?php 
        include('templates/pageUniversal/footer.php');
        include('urls/urlUniversal/scripts.php');
    ?>
    <script src="../plugins/js/script.js"></script>
    <!-- FOOTER & JS UNIVERSAL -->
</body>

</html>