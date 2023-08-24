<nav class="top-0  w-full flex flex-wrap items-center justify-between px-2 py-1 bg-white
 @if(Request::is('/')) opacity-80 z-50 absolute @else opacity-100 z-0 @endif shadow"
>
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between ">
        <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
            <div>
                <a href="{{ route('home') }}">
                    <img
                        src="{{ asset('storage/img/nav/logo_115.svg') }}"
                        class="text-sm font-bold leading-relaxed h-8 inline-block mr-4 whitespace-nowrap uppercase text-white object-contain"
                        alt="JPS Retail Services"
                    >
                </a>

            </div>

            <button
                class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                type="button"
                title="toggleMobileNavbar"
                onclick="toggleNavbar('example-collapse-navbar')"
            >
                <i class="text-black fas fa-bars"></i>
            </button>
        </div>

        <div
            class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
            id="example-collapse-navbar"
        >
            <ul class="flex flex-col lg:flex-row list-none mr-auto lg:mt-1">
                <li class="flex items-center">
                    <a
                        href="{{ route('offer') }}"
                        class="lg:hover:text-pink-500 px-3
                        py-4 lg:py-2 flex items-center text-xs uppercase font-bold @if(Request::is('offer')) text-pink-600 @else text-gray-800 lg:text-black @endif "
                    >
                        Aanbod</a
                    >
                </li>
{{--                <li class="flex items-center">--}}
{{--                    <a--}}
{{--                        href="{{ route('transacties') }}"--}}
{{--                        class=" lg:hover:text-pink-500 @if(Request::is('transacties')) text-pink-600 @else lg:text-black text-gray-800 @endif--}}
{{--                        px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"--}}
{{--                    >--}}
{{--                        Transacties</a--}}
{{--                    >--}}
{{--                </li>--}}
{{--                <li class="flex items-center">--}}
{{--                    <a--}}
{{--                        href="{{ route('nieuws') }}"--}}
{{--                        class="lg:hover:text-pink-500  @if(Request::is('nieuws')) text-pink-600 @else lg:text-black text-gray-800 @endif--}}
{{--                        px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"--}}
{{--                    >--}}
{{--                        Nieuws</a--}}
{{--                    >--}}
{{--                </li>--}}
                <li class="flex items-center">
                    <a
                        href="{{ route('about_us') }}"
                        class="lg:hover:text-pink-500 @if(Request::is('about_us')) text-pink-600 @else lg:text-black text-gray-800 @endif
                        px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                    >
                        Over ons</a
                    >
                </li>
                <li class="flex items-center">
                    <a
                        href="{{ route('contact') }}"
                        class="lg:hover:text-pink-500 @if(Request::is('contact')) text-pink-600 @else lg:text-black text-gray-800 @endif
                        px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                    >
                        Contact</a
                    >
                </li>
            </ul>
            <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                <li class="flex items-center">
                    <a href="https://www.funda.nl/">
                        <img
                            src="{{ asset('storage/img/nav/funda-100-cropped.png') }}"
                            class="transform transition hover:scale-110 duration-500 ease-in-out mt-1 text-sm font-bold h-8 leading-relaxed inline-block whitespace-nowrap uppercase text-white"
                            alt="Funda logo"
                        >
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
