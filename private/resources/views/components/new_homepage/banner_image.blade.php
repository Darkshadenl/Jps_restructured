<div class="w-96 sm:w-10/12 md:w-8/12 lg:w-6/12 xl:w-4/12 px-4 text-center">
    <div
        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
    >
        <div class="px-4 py-5 flex-auto">

            <div class="mb-4">
                <img src="{{ $image }}"
                     alt="{{ $street }} {{ $city }}"
                     class="xl:h-48 max-h-48 w-full">
            </div>

            <h6 class="text-xl font-semibold">{{ $street }} {{ $city }}</h6>
        </div>
    </div>
</div>
