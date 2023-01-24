@extends('../layouts/layout')

@section('details')
    <title>{{ __("JPS Retail Services - Aanbod - Vastgoed verhuur advies") }}</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/offer.css') }}"
    />

    @livewireStyles


@endsection

@section('content')

    <livewire:offer/>

@endsection

@section('endbody')
    @livewireScripts

    <script>

        window.onresize = function() {
            resizeDiv();
        }

        resizeDiv();

        function resizeDiv() {
            let mob_menu = document.querySelector("#menu");
            let body = document.body,
                html = document.documentElement;

            let height = Math.max( body.scrollHeight, body.offsetHeight,
                html.clientHeight, html.scrollHeight, html.offsetHeight );
            height = html.scrollHeight;
            mob_menu.style.height = `${height}px`;
        }

        function extraDetails(details, image) {
            details.classList.toggle("hidden");
            // image.classList.toggle("hidden");
        }

    </script>

@endsection
