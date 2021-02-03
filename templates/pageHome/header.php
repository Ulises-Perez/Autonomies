<header>
        <div class="w-full">
            <div class="mx-auto">
                <div class="flex flex-wrap items-stretch h-16 hidden z-40" id="searchMobile">
                    <input type="search" id="search" placeholder="Buscar Peliculas, Series o Animes"
                        class="px-3 py-3 placeholder-white text-white bg-transparent rounded text-sm shadow outline-none focus:outline-none w-full h-full pr-10" />
                </div>
            </div>
        </div>
        <div class="flex flex-wrap relative">
            <div class="w-full absolute z-10">
                <nav class="relative flex flex-wrap items-center justify-between px-2 navbar-expand-lg">
                    <div class="container mx-auto flex flex-wrap items-center justify-between">
                        <div
                            class="w-full relative flex justify-between items-center lg:w-auto lg:static lg:block lg:justify-between">
                            <div class="flex items-center pt-3 pb-2">
                                <a class="text-xl font-bold leading-relaxed inline-block py-2 whitespace-no-wrap"
                                    href="#">
                                    <img class="w-40 py-2" src="./././plugins/images/tmdb_logo.svg" alt="" />
                                </a>
                                <button
                                    class="cursor-pointer text-xl leading-none px-3 py-2 ml-2 border border-solid border-transparent text-white rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                                    type="button" onclick="openDropdown(event,'dropdown-id')">
                                    <i class="fas fa-bars"></i>
                                </button>
                            </div>
                            <div class="flex">
                                <button
                                    class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent text-white rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                                    type="button" onclick="toggleSearchMobile('searchMobile')">
                                    <i id="btn-lupa" class="fas fa-search"></i>
                                </button>
                                <button
                                    class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent text-white rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                                    type="button" onclick="toggleModal('modal-id')">
                                    <i class="fas fa-user"></i>
                                </button>
                                <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
                                    id="modal-id">
                                    <div class="relative w-auto my-6 mx-auto max-w-sm">
                                        <!--content-->
                                        <div
                                            class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                            <!--header-->
                                            <div
                                                class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
                                                <h3 class="text-3xl font-semibold">
                                                    Modal Title
                                                </h3>
                                                <button
                                                    class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                                    onclick="toggleModal('modal-id')">
                                                    <span
                                                        class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                                        ×
                                                    </span>
                                                </button>
                                            </div>
                                            <!--body-->
                                            <div class="relative p-6 flex-auto">
                                                <p class="my-4 text-gray-600 text-lg leading-relaxed">
                                                    I always felt like I could do anything. That’s the main
                                                    thing people are controlled by! Thoughts- their perception
                                                    of themselves! They're slowed down by their perception of
                                                    themselves. If you're taught you can’t do anything, you
                                                    won’t do anything. I was taught I could do everything.
                                                </p>
                                            </div>
                                            <!--footer-->
                                            <div
                                                class="flex items-center justify-end p-6 border-t border-solid border-gray-300 rounded-b">
                                                <button
                                                    class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1"
                                                    type="button" style="transition: all .15s ease"
                                                    onclick="toggleModal('modal-id')">
                                                    Close
                                                </button>
                                                <button
                                                    class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                                                    type="button" style="transition: all .15s ease"
                                                    onclick="toggleModal('modal-id')">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
                            </div>
                            <div class="hidden bg-back-oficial text-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                                style="min-width:12rem" id="dropdown-id">
                                <a class="px-3 py-2 flex items-center text-sm leading-snug bg-white bg-opacity-0 hover:bg-opacity-25"
                                    href="index.php">
                                    Inicio
                                </a>
                                <a class="px-3 py-2 flex items-center text-sm leading-snug bg-white bg-opacity-0 hover:bg-opacity-25"
                                    href="peliculas.php?page=1">
                                    Películas
                                </a>
                                <a class="px-3 py-2 flex items-center text-sm leading-snug bg-white bg-opacity-0 hover:bg-opacity-25"
                                    href="series.php?page=1">
                                    Series
                                </a>
                            </div>
                        </div>
                        <div class="lg:flex lg:flex-grow items-center hidden" id="example-collapse-navbar">
                            <ul class="flex flex-col lg:items-center lg:flex-row list-none lg:mr-auto text-white">
                                <form action="busqueda.php">
                                    <div class="relative flex flex-wrap items-stretch hidden lg:block ml-6 mr-10"
                                        style="width: 400px;">
                                        <input type="search" id="query" name="query" placeholder="Buscar Peliculas, Series o Animes"
                                            class="relative w-full bg-transparent px-3 py-3 pr-10 placeholder-white placeholder-opacity-50 text-white text-sm rounded shadow outline-none focus:outline-none border border-white border-opacity-50" />
                                        <span
                                            class="z-10 h-full leading-snug font-normal absolute text-center text-white absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-3 py-3">
                                            <a href="#" class="text-center">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </span>
                                    </div>
                                </form>
                                <li class="nav-item">
                                    <a class="px-3 py-2 flex items-center text-xs uppercase leading-snug rounded bg-white bg-opacity-0 hover:bg-opacity-25"
                                        href="index.php">
                                        Inicio
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="px-3 py-2 flex items-center text-xs uppercase leading-snug rounded bg-white bg-opacity-0 hover:bg-opacity-25"
                                        href="peliculas.php?page=1">
                                        Películas
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="px-3 py-2 flex items-center text-xs uppercase leading-snug rounded bg-white bg-opacity-0 hover:bg-opacity-25"
                                        href="series.php?page=1">
                                        Series
                                    </a>
                                </li>
                            </ul>
                            <div class="flex items-center text-white text-sm">
                                <button class="px-3 py-2">
                                    Register
                                </button>
                                <button class="bg-red-500 px-3 py-2 rounded">
                                    Login
                                </button>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>