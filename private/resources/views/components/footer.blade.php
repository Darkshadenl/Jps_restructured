<footer class="relative bg-gray-300 pt-8 pb-6 @if(Request::is('aanbod')) mt-20 @endif">
    @if(!Request::is('aanbod'))
    <div
        class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
        style="height: 80px;"
    >
        <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
        >
            <polygon
                class="text-gray-300 fill-current"
                points="2560 0 2560 100 0 100"
            ></polygon>
        </svg>
    </div>
    @endif
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap">
            <div class="w-full lg:w-6/12 px-4">
                <h4 class="text-3xl font-semibold">Vind ons op LinkedIn!</h4>
                <h5 class="text-lg mt-0 mb-2 text-gray-700">
                    We reageren binnen 1-2 dagen.
                </h5>
                <div class="mt-6 mb-4">
                    <a title="LinkedinLink" href="https://nl.linkedin.com/in/jan-peter-stuurstraat-45112019">
                        <button
                            class="bg-white text-blue-400 hover:text-pink-700 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                            type="button"
                            title="LinkedIn"
                        >
                            <i class="flex fab fa-linkedin"></i></button
                        >
                    </a>
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="flex flex-wrap items-top mb-6">
                    <div class="w-full lg:w-4/12 px-4 ml-auto">

                        <ul class="list-unstyled">
                            <!-- <li>
                                <a
                                    class="text-gray-700 hover:text-pink-700 font-semibold block pb-2 text-sm"
                                    href="{{ route('about_us') }}"
                                >Over ons</a
                                >
                            </li> -->
{{--                            <li>--}}
{{--                                <a--}}
{{--                                    class="text-gray-700 hover:text-pink-700 font-semibold block pb-2 text-sm"--}}
{{--                                    href="https://blog.creative-tim.com"--}}
{{--                                >Nieuws</a--}}
{{--                                >--}}
{{--                            </li>--}}
                        </ul>
                    </div>
                    <div class="w-full lg:w-4/12 px-4">
                <span
                    class="block uppercase text-gray-600 text-sm font-semibold mb-2"
                >Andere bronnen</span
                >
                        <ul class="list-unstyled">
                            <li>
                                <a
                                    class="text-gray-700 hover:text-pink-700 font-semibold block pb-2 text-sm"
                                    href="https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md"
                                >MIT License</a
                                >
                            </li>
{{--                            <li>--}}
{{--                                <a--}}
{{--                                    class="text-gray-700 hover:text-pink-700 font-semibold block pb-2 text-sm"--}}
{{--                                    href="https://creative-tim.com/terms"--}}
{{--                                >Terms &amp; Conditions</a--}}
{{--                                >--}}
{{--                            </li>--}}
                            <li>
                                <a
                                    class="text-gray-700 hover:text-pink-700 font-semibold block pb-2 text-sm"
                                    href="{{ route('privacy') }}"
                                >Privacy Policy</a
                                >
                            </li>
                            <li>
                                <a
                                    class="text-gray-700 hover:text-pink-700 font-semibold block pb-2 text-sm"
                                    href="{{ route('contact') }}"
                                >Contact</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-400"/>
        <div
            class="flex flex-wrap items-center md:justify-between justify-center"
        >
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                <div class="text-sm text-gray-600 font-semibold py-1">
                    Copyright © 2019 Tailwind Starter Kit by
                    <a
                        href="https://www.creative-tim.com"
                        class="text-gray-600 hover:text-pink-700"
                    >Creative Tim</a
                    >. - Edited by <a href="https://github.com/Darkshadenl"
                                      class="text-gray-600 hover:text-pink-700">Darkshadenl</a>
                </div>
            </div>
        </div>
    </div>
</footer>
