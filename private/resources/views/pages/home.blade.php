@extends('../layouts/layout')

@section('details')
    <title>{{ __("JPS Retail Services - Home - Vastgoed verhuur advies") }}</title>
@endsection

@section('content')

    <x-new_homepage.above_fold :offers="$offers" />
    <x-new_homepage.below_fold/>


@endsection

@section('endbody')
    <script>
        const block = {
            current_block: '1',
        };

        function toggleTransaction(ID, BTN) {
            if (ID !== block.current_block) {
                let btn = document.getElementById(BTN);
                document.getElementById(block.current_block).classList.toggle("hidden");
                document.getElementById(ID).classList.toggle("hidden");
                block.current_block = ID;
            }
        }
    </script>
@endsection
