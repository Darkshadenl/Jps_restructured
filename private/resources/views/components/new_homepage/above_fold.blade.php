<div
    class="relative pt-16 pb-44 flex content-center items-center justify-center"
    style="min-height: 75vh;"
>
    <div
        class="absolute top-0 w-full h-full bg-center bg-cover"
        style="background-image: url({{ asset('storage/img/homepage/header_pink.jpg') }})"
    >
          <span
              id="blackOverlay"
              class="w-full h-full absolute opacity-60 bg-black"
          ></span>
    </div>
    <div class="container relative mx-auto">
        <div class="items-center flex flex-wrap">
            <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                <div class="pr-12 ml-10 sm:ml-8">
                    @if(session()->has('success'))
                        <div class="alert alert-success mx-auto">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h1
                        class="text-white font-semibold text-5xl"
                        style="font-size: 2.7rem;line-height: 1.3;letter-spacing: 0.006em;font-weight: 500;"
                    >
                        WELKOM BIJ
                    </h1>
                    <h1
                        class="text-white font-semibold text-5xl"
                        style="font-size: 2.7rem;line-height: 1.3;letter-spacing: 0.006em;font-weight: 500;"
                    >
                        JPS RETAIL SERVICES
                    </h1>
                    <p
                        class="mt-4 mb-6 text-lg text-gray-300"
                        style="line-height: 1.3rem;letter-spacing: 0.057em;font-weight: 400;"
                    >
                        Een vastgoed organisatie, gespecialiseerd in de verhuur van winkelruimten en retail
                        adviezen.
                    </p>
                    <div class="flex justify-center">
                        <a role="button"
                           href="{{ route('offer') }}"
                           class=" flex scale-110
                               transition transform duration-500 ease-in-out
                               p-4 bg-red-600 text-white text-sm px-4 py-2 font-bold rounded-lg shadow-xs cursor-pointer
                              hover:bg-red-700 hover:text-gray-100 hover:-translate-y-1 hover:scale-110">
                            Ga naar aanbod
                        </a>
                    </div>

                </div>
            </div>
        </div>
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
</div>

<section class="pb-12 lg:pb-20 bg-gray-300 -mt-36">
    <div class="container mx-auto px-4 pt-1">
        <div class="flex flex-wrap mt-8 justify-center">

            @component('components.new_homepage.banner_image', [
                'image' => asset("storage/img/offer/{$offers->first()->image}"),
                'street' => $offers->first()->street,
                'city' => $offers->first()->city
            ])
            @endcomponent

            @component('components.new_homepage.banner_image', [
                'image' => asset("storage/img/offer/{$offers->skip(1)->first()->image}"),
                'street' => $offers->skip(1)->first()->street,
                'city' => $offers->skip(1)->first()->city
            ])
            @endcomponent


            @component('components.new_homepage.banner_image', [
                'image' => asset("storage/img/offer/{$offers->skip(2)->first()->image}"),
                'street' => $offers->skip(2)->first()->street,
                'city' => $offers->skip(2)->first()->city
            ])
            @endcomponent

        </div>
    </div>

</section>
