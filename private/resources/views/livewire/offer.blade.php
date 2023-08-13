<div>

    <section id="header">

        <div
            class="absolute top-0 w-full h-full bg-top bg-cover"
        >

            <div>
                <div id="header_text_div">
                    <h1>AANBOD</h1>
                </div>
            </div>
        </div>

    </section>

    <nav id="menu" class="mobile_menu hidden">

        {{--                    searchbar--}}
        <div class="flex justify-between pl-4 mb-4 pt-2 pb-2 text-white w-full bg-pink-400">
            <div>
                <h1 id="filter-header">Filters</h1>
            </div>
            <div class=" pr-4">
                <button class="flex justify-end">
                    <img class="w-1/6 block mt-1" onclick="toggleNavbar('menu')"
                         src="{{ asset('storage/img/offer/cross.svg') }}" alt="cross">
                </button>
            </div>
        </div>

        <div class="pt-2 relative mx-auto text-gray-600">
            <div class="ml-4">
                <input
                    wire:model.debounce.200ms="search"
                    value="{{ $search }}"
                    class="searchbtn border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                    type="search" name="search" placeholder="Stad/Adres">
            </div>
        </div>
        {{--                    endsearchbar--}}

        <hr class="mt-4 solid">

        {{--                    price--}}
        <div class="ml-4 mt-2">
            <h1 class="mb-2">Prijs</h1>
            <div class="space-y-2">
                <input wire:model.debounce.200ms="min_value" value="{{ $min_value }}" class="rounded" type="number"
                       name="min_value" placeholder="€ 0">
                <input wire:model.debounce.200ms="max_value" value="{{ $max_value }}" class="rounded" type="number"
                       name="max_value" placeholder="Geen maximum">
            </div>
        </div>
        {{--                    endprice--}}

        <hr class="mt-4 solid">

        {{--                    surface--}}
        <div class="ml-4 mt-2">
            <h1 class="mb-2">Oppervlakte</h1>
            <div class="space-y-2">
                <input wire:model.debounce.200ms="min_surface" value="{{ $min_surface }}" class="rounded" type="number"
                       name="min_surface" placeholder="0 m²">
                <input wire:model.debounce.200ms="max_surface" value="{{ $max_surface }}" class="rounded" type="number"
                       name="max_surface" placeholder="Geen maximum">
            </div>
        </div>
        {{--                    endsurface--}}

        <hr class="mt-4 solid">

        {{--                    beschikbaar--}}
        <div class="ml-4 mt-2">
            <input wire:model.debounce.200ms="available" type="radio" style="margin-top: 2px"
                   id="alles" name="alles" value="Alles" checked>
            <label for="all">Alles</label><br>
            <input wire:model.debounce.200ms="available" type="radio" style="margin-top: 2px"
                   id="beschikbaar" name="beschikbaar" value="Beschikbaar">
            <label for="beschikbaar">Beschikbaar</label><br>
            <input wire:model.debounce.200ms="available" type="radio" style="margin-top: 2px"
                   id="Verkocht" name="Verkocht" value="Verkocht">
            <label for="Verkocht">Verkocht</label><br>
            <input wire:model.debounce.200ms="available" type="radio" style="margin-top: 2px"
                   id="Verhuurd" name="Verhuurd" value="Verhuurd">
            <label for="Verhuurd">Verhuurd</label><br>
        </div>
    </nav>

    <section class="flexbox-section">
        <div class="flexbox-container">

            <div class="menu_container">

                <nav id="desktop_menu">

                    {{--                    searchbar--}}
                    <div class="flex justify-between pl-4 mb-4 pt-2 pb-2 text-white w-full filter-header">
                        <div>
                            <h1 id="filter-header">Filters</h1>
                        </div>
                    </div>

                    <div class="pt-2 relative mx-auto text-gray-600">
                        <div class="ml-4 relative">
                            <label>
                                <input
                                    type="text" name="search" placeholder="Stad/Adres"
                                    wire:model.debounce.200ms="search"
                                    value="{{ $search }}"
                                    class="searchbtn border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                                >
                            </label>
                        </div>
                    </div>
                    {{--                    endsearchbar--}}

                    <hr class="mt-4 solid">

                    {{--                    price--}}
                    <div class="ml-4 mt-2">
                        <h1 class="mb-2">Prijs</h1>
                        <div id="price_desktop" class="space-x-2">
                            <input wire:model.debounce.200ms="min_value" value="{{ $min_value }}" class="rounded"
                                   type="number" name="min_price" placeholder="€ 0">
                            <input wire:model.debounce.200ms="max_value" value="{{ $max_value }}" class="rounded"
                                   type="number" name="max_price" placeholder="Geen maximum">
                        </div>
                    </div>
                    {{--                    endprice--}}

                    <hr class="mt-4 solid">

                    {{--                    surface--}}
                    <div class="ml-4 mt-2">
                        <h1 class="mb-2">Oppervlakte</h1>
                        <div id="surface_desktop" class="space-y-2">
                            <input wire:model.debounce.200ms="min_surface" value="{{ $min_surface }}" class="rounded"
                                   type="number" name="min_surface" placeholder="0 m²">
                            <input wire:model.debounce.200ms="max_surface" value="{{ $max_surface }}" class="rounded"
                                   type="number" name="max_surface" placeholder="Geen maximum">
                        </div>
                    </div>
                    {{--                    endsurface--}}

                    <hr class="mt-4 solid">

                    <div class="ml-4 mt-2">

                        <input wire:model.debounce.200ms="available" type="radio" style="margin-top: 2px"
                               id="alles" name="alles" value="Alles" checked>
                        <label for="all">Alles</label><br>
                        <input wire:model.debounce.200ms="available" type="radio" style="margin-top: 2px"
                               id="beschikbaar" name="beschikbaar" value="Beschikbaar">
                        <label for="beschikbaar">Beschikbaar</label><br>
                        <input wire:model.debounce.200ms="available" type="radio" style="margin-top: 2px"
                               id="Verkocht" name="Verkocht" value="Verkocht">
                        <label for="Verkocht">Verkocht</label><br>
                        <input wire:model.debounce.200ms="available" type="radio" style="margin-top: 2px"
                               id="Verhuurd" name="Verhuurd" value="Verhuurd">
                        <label for="Verhuurd">Verhuurd</label><br>

                    </div>


                </nav>

                <div class="mobile_menu_button">
                    <button
                        type="button"
                        class="text-center w-full rounded"
                        onclick="toggleNavbar('menu')"
                        style="background-color: rgb(120, 45, 107);"
                    >
                        <small class="text-white text-xl">Filter</small>
                    </button>
                </div>
            </div>

            <div class="offer-container">

                <div id="top_menu" class="flex pt-4">
                    <div id="filter_div">
                        <select wire:model="orderBy" name="filter" id="filter">
                            <option value="Toegevoegd">Toegevoegd</option>
                            <option value="Prijs">Prijs</option>
                            <option value="Oppervlakte">Oppervlakte</option>
                            <option value="Stad">Stad</option>
                            <option value="Straat">Straat</option>
                        </select>
                    </div>
                    <div class="ml-4">
                        {{ $offers->links('livewirestuff/pagination/tailwind') }}
                    </div>

                </div>

                <div class="offer-list" wire:loading.class="loading_foreground">
                    <div class="loading" wire:loading>
                        <div class="flex justify-center items-center">
                            <div
                                class="animate-spin rounded-full h-32 w-32 border-t-4 border-b-4 border-purple-500"></div>
                        </div>
                    </div>

                    <ul>
                        @foreach($offers as $offer)
                            <li class="offer-menu">
                                <div
                                    class="house-2">


                                    <div
                                        id="_{{ $offer->id }}_image"
                                        class="house-image-div"
                                    >
                                        @isset($offer->image)
                                            <img
                                                src="{{ asset("storage/img/offer/$offer->image") }}"
                                                alt="{{ $offer->city }}">
                                            @if($offer->sold == 1)
                                                <div class="sold">
                                                    <h4>VERKOCHT</h4>
                                                </div>
                                            @elseif($offer->rented == 1)
                                                <div class="sold">
                                                    <h4>VERHUURD</h4>
                                                </div>
                                            @elseif($offer->temporarily_rented == 1)
                                                <div class="sold">
                                                    <h4 style="margin: 2rem 1rem 0rem 1rem; text-align: center;">
                                                        TIJDELIJK VERHUURD</h4>
                                                </div>
                                            @endif
                                        @else
                                            <img
                                                src="{{ asset('storage/img/offer/comingSoon.jpg') }}"
                                                alt="{{ $offer->city }}">
                                        @endisset
                                    </div>

                                    <div class="house-1"
                                    >
                                        <div class="md:flex-col flex-1 details">
                                            <div>
                                                <p class="street" style="">
                                                    {{ $offer->street }} {{ $offer->house_number }} </p>
                                            </div>
                                            <div>
                                                <p class="postal_code" style="">
                                                    {{ $offer->postal_code }} {{ $offer->city }}
                                                </p>
                                            </div>
                                            <div>
                                                <hr id="divide_line">
                                            </div>
                                            <div>
                                                <p class="surface" style="">
                                                    ca. {{ $offer->surface }}{{ $offer->unit }}
                                                </p>
                                            </div>
                                            <div class="price_button">

                                                <div class="price_div">
                                                    @isset($offer->price)
                                                        <p class="price">
                                                            € {{ $offer->price }}
                                                        </p>

                                                    @else
                                                        <p class="price">
                                                            Prijs op aanvraag
                                                        </p>
                                                    @endisset
                                                </div>

                                                @isset($offer->brochure)
                                                    <div class="brochure">
                                                        <div id="brochure_button_div">
                                                            <a href="{{ route('getBrochure', $offer->id) }}">
                                                                Brochure</a>
                                                        </div>
                                                    </div>
                                                @endisset

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div id="_{{ $offer->id }}details" class="extra_details">
                                    <div>
                                        <h3>Extra details</h3>
                                    </div>
                                    <div>
                                        <p>
                                            @empty($offer->extra_details)
                                                Geen extra details beschikbaar.
                                            @else
                                                {{ $offer->extra_details }}
                                            @endempty
                                        </p>
                                    </div>

                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <span style="display: table; margin: 0 auto;">
                        {{ $offers->links('livewirestuff/pagination/tailwind') }}
                    </span>
                </div>
            </div>
        </div>
    </section>
</div>
