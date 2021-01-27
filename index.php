<!-- API UNIVERSAL -->
<?php
    require 'urls/apis/api_home.php';
?>
<!-- API UNIVERSAL -->

<!DOCTYPE html>
<html lang="es">

    <!-- HEAD -->
    <?php
        include('urls/urlHome/head.php');
    ?>
    <!-- HEAD -->

<body id="body">

    <!-- HEADER -->
    <?php 
        include('templates/pageHome/header.php'); 
    ?>
    <!-- HEADER -->

    <section id="content-sliders">
        <div class="w-full">
            <div class="owl-carousel owl-theme owl-carousel-1">
                <?php
                    $i=0;
                    foreach ($mvContent as $mvMovies){
                        if($i++ >= 5) break;
                        $descC = substr_replace($mvMovies['overview'], "...", 156);
                        echo '<div class="item">
                                <div class="sliders relative bg-cover bg-center text-white py-24 px-10 object-fill"
                                    style="background-image: url(https://image.tmdb.org/t/p/w1280/'.$mvMovies['backdrop_path'].'); ">
                                    <div class="sombra absolute inset-0 flex justify-start items-center lg:px-16">
                                        <div class="info px-4">
                                            <h6 class="text-3xl md:text-4xl lg:text-5xl">'.$mvMovies['title'].'</h6>
                                            <p class="text-base md:text-xl mb-10 leading-none">
                                                '.$descC.'
                                            </p>
                                            <a href="Movie/'.$mvMovies['id'].'"
                                                class="bg-red-500 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800 transition duration-300 ease-in-out">
                                                <i class="fas fa-play mr-2"></i> Reproducir
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    }
                ?>
            </div>
        </div>
    </section>

    <main id="main">

        <section id="Generos">
            <div class="w-full">
                <div class="container mx-auto px-4 xl:px-0 py-10 text-white">
                    <a href="#" class="text-3xl hover:opacity-75 hover:text-red-500">
                        Géneros
                        <hr class="border-gray-600 border-opacity-25 mb-4">
                    </a>
                    <div class="owl-carousel owl-theme owl-carousel-generos">
                        <?php
                            foreach($generosContent['genres'] as $generos){
                            echo '<a href="#'.$generos['name'].'">
                                    <div class="col-span-2 genero h-12 relative flex justify-start px-4 items-center rounded">
                                        <div class="nombre-genero absolute inset-0 bg-gradient-to-r from-red-600 px-4 rounded"></div>
                                        <h6 class="opacity-100 absolute">'.$generos['name'].'</h6>
                                    </div>
                                    </a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="lista" class="bg-back-second">
            <div class="w-full">
                <div class="container mx-auto px-4 xl:px-0 py-10 mb-16 text-white">
                    <a href="#" class="text-3xl hover:opacity-75 hover:text-red-500">
                        Populares
                        <hr class="border-gray-600 border-opacity-25 mb-4">
                    </a>
                    <div class="container_p flex flex-wrap justify-center xl:justify-start">
                        <?php
                            $i=0;
                            foreach ($npContent as $npMovies){
                                if($i++ >= 12) break;
                                echo   '<a href="Movie/'.$npMovies['id'].'" class="item tilt-poster transform hover:scale-105 transition duration-300 ease-in-out">
                                            <div class="poster relative">
                                                <img class="w-full h-full rounded" src="https://image.tmdb.org/t/p/w300/'.$npMovies['poster_path'].'" alt="'.$npMovies['title'].'">
                                                <div class="sombra-content absolute inset-0 flex justify-center items-center rounded">
                                                    <button class="play-btn bg-red-500 text-white rounded-full h-10 w-10 lg:h-16 lg:w-16 outline-none focus:outline-none">
                                                        <i class="fas fa-play"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <p class="truncate w-full">'.$npMovies['title'].'</p>
                                        </a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="lista" class="bg-back-oficial">
            <div class="w-full">
                <div class="container mx-auto px-4 xl:px-0 py-10 mb-16 text-white">
                    <a href="#" class="text-3xl hover:opacity-75 hover:text-red-500">
                        Series Populares
                        <hr class="border-gray-600 border-opacity-25 mb-4">
                    </a>
                    <div class="container_p flex flex-wrap justify-center xl:justify-start">
                        <?php
                            $i=0;
                            foreach ($seContent as $sEstrenos){
                                if($i++ >= 12) break;
                                echo   '<a href="Serie/'.$sEstrenos['id'].'" class="item tilt-poster transform hover:scale-105 transition duration-300 ease-in-out">
                                            <div class="poster relative">
                                                <img class="w-full h-full rounded" src="https://image.tmdb.org/t/p/w300/'.$sEstrenos['poster_path'].'" alt="'.$sEstrenos['name'].'">
                                                <div class="sombra-content absolute inset-0 flex justify-center items-center rounded">
                                                    <button class="play-btn bg-red-500 text-white rounded-full h-10 w-10 lg:h-16 lg:w-16 outline-none focus:outline-none">
                                                        <i class="fas fa-play"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <p class="truncate w-full">'.$sEstrenos['name'].'</p>
                                        </a>';
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
    <script src="plugins/js/script.js"></script>
    <!-- FOOTER & JS UNIVERSAL -->

</body>
</html>