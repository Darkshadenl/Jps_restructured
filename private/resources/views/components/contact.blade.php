<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<section
    class="pb-8 @if(Request::is('contact')) pt-10 lg:pt-0 @else  @endif bg-gray-100 relative block"
>
    @if(Request::is(['contact']))
        <div
            class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden "
            style="height: 80px; margin-top: 17rem;"
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
                    class="fill-current"
                    points="2560 0 2560 100 0 100"
                    style="color:#f4f4f5"
                ></polygon>
            </svg>
        </div>
    @endif



    <div class="container mx-auto px-4 mb-20 lg:pt-4 lg:pb-48">
        <div class="flex flex-wrap text-center justify-center">
            <div class="w-full lg:w-6/12 px-4 mt-10">
                <img class="md:ml-12 lg:ml-0 2xl:max-h-44 2xl:ml-24" style="margin-right: 3px;" src="{{ asset("storage/img/nav/Final-ai (2).svg") }}"
                     alt="JPS Retail Logo">
            </div>
        </div>
    </div>
</section>

<section
    class="relative block py-20 lg:pt-0 bg-gray-100"
>
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center lg:-mt-64 -mt-48">
            <div class="w-full lg:w-6/12 mt-8 px-4">
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300"
                >
                    <div class="flex-auto p-5 lg:p-10">
                        <h4 class="text-2xl font-semibold"
                            @if(Request::is(['/', 'contact']))
                            style="color: #58164a"
                            @endif
                        >
                        Ben u geïnteresseerd?
                        </h4>

                        <p
                            class="leading-relaxed mt-1 mb-4 text-gray-600"
                            @if(Request::is(['/', 'contact']))
                            style="color: #ae2c98;"
                            @endif
                        >
                            Neem dan nu contact met ons op.
                        </p>

                        <p class="contact-info m-1" style="color: #ae2c98;">
                            <span class="phone-number leading-relaxed">Mobiel: 06 51 18 83 22</span>
                            <span class="email leading-relaxed">E-mail: info@jpsretail.nl</span>
                            <span class="address leading-relaxed">Adres: Aangelag 24, 5674 CP Nuenen</span>
                        </p>



                        <form method="POST" id="cform" action="{{ route('home.contact') }}">

                            @csrf

                            <div class="relative w-full mb-3 mt-8">
                                @error('full_name')

                                <p class="text-pink-600 font-weight: 600 text-sm">
                                    {{ $errors->first('full_name') }}
                                </p>

                                @enderror

                                <label
                                    class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                    @if(Request::is(['/', 'contact']))
                                    style="color: #ae2c98;"
                                    @endif
                                    for="full-name"
                                >
                                Volledige naam
                                </label>

                                <input
                                    type="text"
                                    name="full_name"
                                    id="full-name"
                                    value="{{ old('full_name') }}"
                                    class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                    placeholder="Volledige Naam"
                                    style="transition: all 0.15s ease 0s;"
                                />

                            </div>
                            <div class="relative w-full mb-3">
                                @error('email')
                                <p class="text-pink-600 font-weight: 600 text-sm">
                                    {{ $errors->first('email') }}
                                </p>
                                @enderror
                                <label
                                    class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                    for="email"
                                    @if(Request::is(['/', 'contact']))
                                    style="color: #ae2c98;"
                                    @endif
                                >Email
                                </label
                                ><input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                    placeholder="Email"
                                    style="transition: all 0.15s ease 0s;"
                                    autocomplete="email"
                                />
                            </div>
                            <div class="relative w-full mb-3">
                                @error('message')
                                <p class="text-pink-600 font-weight: 600 text-sm">{{ $errors->first('message') }}</p>
                                @enderror
                                <label
                                    class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                    for="message"
                                    @if(Request::is(['/', 'contact']))
                                    style="color: #ae2c98;"
                                    @endif
                                >Bericht</label
                                ><textarea
                                    rows="4"
                                    cols="80"
                                    name="message"
                                    id="message"
                                    class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                    placeholder="Type een bericht..."
                                >{{ old('message') }}</textarea>
                            </div>
                            <div class="text-center mt-6">
                                <input type="hidden" name="g-recaptcha-response" id="hidden-input"/>

                                <button
                                    class="bg-gray-900 hover:bg-pink-500 text-white active:bg-gray-700 text-sm
                                    font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none
                                    focus:outline-none mr-1 mb-1
                                    g-recaptcha
                                    "

                                    data-sitekey="{{ config('services.recaptcha.site_key') }}"
                                    data-callback='onSubmit'
                                    data-action='submit'


                                    type="submit"
                                    @if(Request::is(['/', 'contact']))
                                    style="transition: all 0.15s ease 0s; background-color:#58164a;"
                                    @else
                                    style="transition: all 0.15s ease 0s;"
                                    @endif
                                >
                                    Verstuur bericht
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
   function onSubmit(token) {
     document.getElementById('hidden-input').value = token;
     document.getElementById("cform").submit();
   }
</script>
