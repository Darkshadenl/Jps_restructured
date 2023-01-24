<section>
    <div class="pb-52 bg-gray-900 pt-32">

        <div class="flex flex-wrap content-around justify-center mb-2">

            <div class="flex flex-col p-2 md:w-40"
                 onclick="toggleTransaction('1', 'btn1');"
                 id="btn1">
                <a
                    class="transition transform duration-500 ease-in-out flex items-center
                    p-4 bg-yellow-300 rounded-lg shadow-xs cursor-pointer
                   hover:bg-blue-500 hover:text-gray-100 hover:-translate-y-1 hover:scale-110"
                    id="link1"
                >
                    <div>
                        <p class="text-xs font-medium ml-2 ">
                            Transactie #1
                        </p>
                    </div>
                </a>
            </div>

            <div class="flex flex-col p-2 md:w-40 "
                 onclick="toggleTransaction('2', 'btn2');"
                 id="btn2"
            >
                <a
                    id="link2"
                    class="transition transform duration-500 ease-in-out flex items-center p-4 bg-yellow-300
                   rounded-lg shadow-xs cursor-pointer hover:bg-blue-500 hover:text-gray-100 hover:-translate-y-1 hover:scale-110"
                >
                    <div>
                        <p class=" text-xs font-medium ml-2 ">
                            Transactie #2
                        </p>
                    </div>
                </a>
            </div>

            <div class="flex flex-col p-2 md:w-40"
                 onclick="toggleTransaction('3', 'btn3');"
                 id="btn3"
            >
                <a
                    id="link3"
                    class="transition transform duration-500 ease-in-out flex items-center
                   p-4 bg-yellow-300 rounded-lg shadow-xs cursor-pointer hover:bg-blue-500
                   hover:text-gray-100 hover:-translate-y-1 hover:scale-110"
                >
                    <div>
                        <p class=" text-xs font-medium ml-2 ">
                            Transactie #3
                        </p>
                    </div>
                </a>
            </div>

        </div>

        <div class="ml-1 mr-1">
            <div id="1"
                 class="flex mt-8 bg-white mx-auto max-w-4xl h-full shadow-lg rounded-lg hover:shadow-xl transition duration-200">
                <div class="md:flex-col flex-1 py-4 px-8">
                    <h1 class="mt-2 text-gray-900 font-bold text-2xl tracking-tight">Lorem ipsum dolor sit
                        amet consectetur adipisicing elit.</h1>
                    <p class="py-3 text-gray-600 leading-6">Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Tempora neque eum autem repellat iure perferendis, possimus blanditiis temporibus
                        doloribus corrupti.</p>
                </div>

                <div class="md:flex-col flex-1 min-w-0">
                    <svg
                        preserveAspectRatio="none"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 150 1100"
                        class="absolute bottom-auto h-full block bottom-0 overflow-hidden"
                        style="height: 300px;"
                    >
                        <polygon
                            points="0,0 0,800 30,0"
                            class="text-white fill-current"
                        ></polygon>
                    </svg>
                    <img
                        class="object-cover w-full h-full object-left rounded-t-lg"
                        src="https://images.unsplash.com/photo-1622495894307-93143fc57155"
                        alt=""/>
                </div>
            </div>


            <div id="2"
                 class="hidden flex mt-8 bg-white mx-auto max-w-4xl h-full shadow-lg rounded-lg hover:shadow-xl transition duration-200">
                <div class="md:flex-col flex-1 py-4 px-8">
                    <h1 class="hover:cursor-pointer mt-2 text-gray-900 font-bold text-2xl tracking-tight">TEST2</h1>
                    <p class="hover:cursor-pointer py-3 text-gray-600 leading-6">Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Tempora neque eum autem repellat iure perferendis, possimus blanditiis
                        temporibus
                        doloribus corrupti.</p>
                </div>

                <div class="md:flex-col flex-1 min-w-0">

                    <svg
                        preserveAspectRatio="none"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 150 1100"
                        class="absolute bottom-auto h-full block bottom-0 overflow-hidden"
                        style="height: 300px;"
                    >
                        <polygon
                            points="0,0 0,800 30,0"
                            class="text-white fill-current"
                        ></polygon>
                    </svg>

                    <img
                        class="object-cover w-full h-full object-left rounded-t-lg"
                        src="https://images.unsplash.com/photo-1622495894307-93143fc57155"
                        alt=""/>
                </div>

            </div>

            <div id="3"
                 class="hidden flex mt-8 bg-white mx-auto max-w-4xl h-full shadow-lg rounded-lg hover:shadow-xl transition duration-200">
                <div class="md:flex-col flex-1 py-4 px-8">
                    <h1 class="hover:cursor-pointer mt-2 text-gray-900 font-bold text-2xl tracking-tight">WEIRD 3</h1>
                    <p class="hover:cursor-pointer py-3 text-gray-600 leading-6">Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Tempora neque eum autem repellat iure perferendis, possimus blanditiis
                        temporibus
                        doloribus corrupti.</p>
                </div>

                <div class="md:flex-col flex-1 min-w-0">

                    <svg
                        preserveAspectRatio="none"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 150 1100"
                        class="absolute bottom-auto h-full block bottom-0 overflow-hidden"
                        style="height: 300px;"
                    >
                        <polygon
                            points="0,0 0,800 30,0"
                            class="text-white fill-current"
                        ></polygon>
                    </svg>

                    <img
                        class="object-cover w-full h-full object-left rounded-t-lg"
                        src="https://images.unsplash.com/photo-1622495894307-93143fc57155"
                        alt=""/>
                </div>
            </div>
        </div>

    </div>
</section>
