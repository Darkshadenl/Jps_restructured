<nav class="border-b-2 border-pink-400">
    <div class="px-8 mx-auto border shadow-lg">
        <div class="flex justify-between ">

            <div class="flex space-x-4">
                {{--        logo--}}
                <div class="py-3">
{{--                    <a href="#" class=" font-bold text-2xl text-gray-800">JPSRetail.nl</a>--}}
                    <img class="w-40 object-contain object-cover" src="{{ asset('img/min/jps_retail_logo-min.png') }}">
                </div>

                {{--        primary nav--}}
                <div class="hidden md:flex flex items-center space-x-1 text-gray-700 rounded">
                    <a href="{{ route('home') }}"
                       class="py-3 px-2 hover:text-gray-900">Welkom</a>
                    <a href="{{ route('offer') }}"
                       class="py-3 px-2 hover:text-gray-900">Aanbod</a>
                    <a href="{{ route('nieuws') }}"
                       class="py-3 px-2 hover:text-gray-900">Nieuws</a>
                    <a href="{{ route('contact') }}"
                       class="py-3 px-2 hover:text-gray-900">Contact</a>
                </div>
            </div>

            {{--        secondary nav--}}
            <div class="hidden md:flex flex space-x-1">
                <a href=""
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="rounded m-1 p-3 px-3 text-gray-800 hover:text-gray-900 hover:bg-green-500"></a>
{{--                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                    @csrf--}}
{{--                </form>--}}
            </div>

            {{--            mobile button goes here--}}
            <div class="md:hidden flex items-center">
                <button class="mobile-menu-button">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- mobile menu -->
    <div class="mobile-menu hidden md:hidden border-b-2 border-pink-400">
        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Welkom</a>
        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Aanbod</a>
        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Nieuws</a>
        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Contact</a>
    </div>

    <script>
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");

        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>

</nav>

