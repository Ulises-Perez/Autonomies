<?php
    require 'urls/apis/api_peliculas.php';
?>

<!DOCTYPE html>
<html lang="es">

<?php include('urls/urlPeliculas/head.php'); ?>

<body id="body">

    <?php include('templates/pagePeliculas/header.php'); ?>

    <main id="main">

        <section id="lista" class="bg-back-oficial">
            <div class="w-full">
                <div class="container mx-auto px-4 xl:px-0 py-10 mb-6 text-white">
                    <div class="container_p flex flex-wrap justify-center xl:justify-start">
                        <?php
                            foreach ($mpContent as $movies){
                                if($movies['vote_average'] != "0" && !empty($movies['poster_path'])){
                                echo   '<a href="../Movie/'.$movies['id'].'" class="item tilt-poster transform hover:scale-105 transition duration-300 ease-in-out">
                                            <div class="poster relative">
                                                <img class="w-full h-full rounded" src="https://image.tmdb.org/t/p/w300/'.$movies['poster_path'].'" alt="'.$movies['title'].'">
                                                <div class="sombra-content absolute inset-0 flex justify-center items-center rounded">
                                                    <button class="play-btn bg-red-500 text-white rounded-full h-10 w-10 lg:h-16 lg:w-16 outline-none focus:outline-none">
                                                        <i class="fas fa-play"></i>
                                                    </button>
                                                </div>
                                                <div class="calificacion absolute top-0 left-0 h-8 w-8 bg-red-500 rounded-tl rounded-br shadow-md flex justify-center items-center">
                                                    <p class="p-2">'.$movies['vote_average'].'</p>
                                                </div>
                                            </div>
                                            <p class="truncate w-full">'.$movies['title'].'</p>
                                        </a>';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="w-full">
                <div class="container mx-auto my-6">
                    <div class="py-2">
                        <nav class="block">
                            <ul class="flex pl-0 rounded list-none flex-wrap justify-center">
                                <?php
                                    if($_GET['page'] > 1){
                                        ?>
                                        <li>
                                            <a href="./<?=$_GET['page']-1?>" class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid border-red-500 bg-white text-red-500">
                                            <i class="fas fa-chevron-left -ml-px"></i>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                ?>
                                <li>
                                    <a href="#" class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid border-red-500 bg-white text-red-500">
                                        <?=$_GET['page']?>
                                    </a>
                                </li>
                                <?php
                                    if($_GET['page'] < 500 ){
                                        ?>
                                        <li>
                                            <a href="./<?=$_GET['page']+1?>" class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid border-red-500 bg-white text-red-500">
                                                <?=$_GET['page']+1?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="./<?=$_GET['page']+1?>" class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid border-red-500 bg-white text-red-500">
                                            <i class="fas fa-chevron-right -mr-px"></i>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </nav>
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