<header>
    <div class="w-full">
      <div class="mx-auto bg-back-oficial">
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
                <a class="text-xl font-bold leading-relaxed inline-block py-2 whitespace-no-wrap" href="../Home">
                  <img class="w-40 py-2" src="plugins/images/tmdb_logo.svg" alt="" />
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
              </div>
              <div
                class="hidden bg-back-oficial text-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                style="min-width: 12rem" id="dropdown-id">
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
                  <div class="relative flex flex-wrap items-stretch hidden lg:block ml-6 mr-10" style="width: 400px;">
                    <input type="search" id="query" name="query" placeholder="Buscar Peliculas, Series o Animes"
                      class="relative w-full bg-transparent px-3 py-3 pr-10 placeholder-white placeholder-opacity-50 text-white text-sm rounded shadow outline-none focus:outline-none border border-white border-opacity-50" />
                    <span class="z-10 h-full leading-snug font-normal absolute text-center text-white absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-3 py-3">
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
                <button class="px-3 py-2">Register</button>
                <button class="bg-red-500 px-3 py-2 rounded">Login</button>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>