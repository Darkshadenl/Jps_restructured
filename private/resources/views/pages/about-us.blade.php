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
                                Nuenen, Nederland
                            </div>
                            <div class="mb-2 text-gray-700 mt-10">
                                <i class="fas fa-briefcase mr-2 text-lg text-gray-500"></i
                                >Eigenaar JPS Retail Services
                            </div>
                            <div class="mb-2 text-gray-700">
                                <i class="fas fa-university mr-2 text-lg text-gray-500"></i
                                >Hogeschool Eindhoven
                            </div>
                            <div class="mb-2 text-gray-700">
                                <i class="fas fa-phone mr-2 text-lg text-gray-500"></i
                                >06 51 18 83 22
                            </div>
                            <div class="mb-2 text-gray-700">
                                <i class="fas fa-envelope mr-2 text-lg text-gray-500"></i
                                ><a class="hover:bg-blue-400 p-1 bg-blue-200" href="mailto:info@jpsretail.nl">info@jpsretail.nl</a>
                            </div>
                        </div>
                        <div class="mt-10 py-10 border-t border-gray-300 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12 px-4">
                                    <p class="mb-4 text-lg leading-relaxed text-gray-800">
                                        Jan Peter Stuurstraat is sinds 1991 actief in het winkelvastgoed. Na het volgen van de opleiding HTS Bedrijfskader aan de Hogeschool in Eindhoven, begon hij zijn loopbaan bij Ooms makelaars in Rotterdam. Vervolgens,  werkte hij 23 jaar bij WPM Planontwikkeling in Den Bosch waarbij hij zich heeft bezig gehouden met talloze herontwikkelingsprojecten in de commerciële planrealisatiefase maar ook als projectverhuurder van nieuw gebouwde winkelcentra. Daarnaast was hij ook actief in de verhuur van de leegstaande panden binnen de beheer portefeuille van WPM.
                                    </p>
                                    <p class="mb-4 text-lg leading-relaxed text-gray-800">
                                        Na de overname door Colliers International van de WPM Groep, heeft Jan Peter hier nog 2 jaar gewerkt en besloot vervolgens om in 2017 voor zichzelf te beginnen. Met meer dan 25 jaar werkervaring in het commerciële winkelvastgoed en met een fors netwerk als bagage, heeft hij <b>JPS Retail Services</b> opgericht.
                                    </p>
                                    <p class="mb-4 text-lg leading-relaxed text-gray-800">
                                        Jan Peter werkt zelfstandig  maar ook in samenwerking met andere vastgoed specialisten uit zijn netwerk om zodoende de krachten te kunnen bundelen en hiermee een optimale en- professionele dienstverlening te realiseren.
                                    </p>
                                    <p class="mb-4 text-lg leading-relaxed text-gray-800">
                                        Naast JPS Retail Services is Jan Peter ook samenwerkingspartner bij Vierders (<a class="hover:bg-blue-400 bg-blue-200 p-1" href="https://www.vierders.nl">www.vierders.nl</a>). Vierders adviseert gemeenten/ondernemers bij de realisatie van een vitale- en toekomstbestendige  binnenstad.
                                    </p>
                                    <p class="mb-4 text-lg leading-relaxed text-gray-800">
                                        Betrokkenheid bij uw project staat bij ons hoog in het vaandel; alles met het doel om de waarde van uw winkelvastgoed te verbeteren.
                                    </p>
                                    <p class="mb-4 text-lg leading-relaxed text-gray-800">
                                        Wij nodigen u van harte uit om <a class="hover:bg-blue-400 p-1 bg-blue-200" href="{{ route('contact') }}">contact met ons op te nemen</a>.
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


