@extends('../layouts/layout')

@section('details')
    <title>{{ __("JPS Retail Services - Over Ons - Vastgoed verhuur advies") }}</title>
@endsection


@section('content')


    <main class="profile-page">
        <section class="relative block" style="height: 500px;">
            <div
                id="about_us_header_image"
                class="absolute top-0 w-full h-full bg-cover"
                style="background-image: url({{ url('storage/img/aboutus/bg_pink.jpg') }})"
            >
          <span
              id="blackOverlay"
              class="w-full h-full absolute opacity-30 bg-black"
          ></span>
            </div>
            <div
                class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
                style="height: 70px;"
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
        </section>
        <section class="relative py-16 bg-gray-300">
            <div class="container mx-auto px-4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64"
                >
                    <div class="px-6">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                                <div class="relative">
                                    <img
                                        alt="..."
                                        src="{{ asset('storage/img/min/Jan Peter-min.jpg') }}"
                                        class="shadow-xl rounded-full h-auto align-middle border-none
                                absolute -m-16 -ml-20 lg:-ml-16" style="max-width: 150px;">
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-48">
                            <h3
                                class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2"
                            >
                                Jan Peter Stuurstraat
                            </h3>
                            <div
                                class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase"
                            >
                                <i
                                    class="fas fa-map-marker-alt mr-2 text-lg text-gray-500"
                                ></i>
                                Ergens in, Nederland
                            </div>
                            <div class="mb-2 text-gray-700 mt-10">
                                <i class="fas fa-briefcase mr-2 text-lg text-gray-500"></i
                                >CEO - Manager
                            </div>
                            <div class="mb-2 text-gray-700">
                                <i class="fas fa-university mr-2 text-lg text-gray-500"></i
                                >Een hoge school
                            </div>
                        </div>
                        <div class="mt-10 py-10 border-t border-gray-300 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12 px-4">
                                    <p class="mb-4 text-lg leading-relaxed text-gray-800">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aut eos, magni molestiae necessitatibus rem rerum similique ullam vero! Aspernatur earum, eius excepturi itaque magnam modi nostrum optio totam ut?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


@endsection


