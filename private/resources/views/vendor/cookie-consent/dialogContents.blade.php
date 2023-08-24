<div class="js-cookie-consent cookie-consent fixed bottom-0 inset-x-0 pb-2 z-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="p-2 rounded-lg bg-red-900">
            <div class="flex items-center justify-between flex-wrap">
                <div class="w-0 flex-1 items-center hidden md:inline">
                    <p class="ml-3 text-white cookie-consent__message">
                        {!! trans('cookie-consent::texts.message') !!}
                    </p>
                </div>
                <div class="mt-2 flex-shrink-0 w-full sm:mt-0 sm:w-auto">
                    <button class="js-cookie-consent-agree cookie-consent__agree cursor-pointer flex items-center justify-center px-4 py-2 rounded-md text-sm font-medium text-yellow-800 bg-yellow-400 hover:bg-yellow-300">
                        {{ trans('cookie-consent::texts.agree') }}
                    </button>
                </div>
                <div class="mt-2 ml-2 flex-shrink-0 w-full sm:mt-0 sm:w-auto">
                    <button id="cookie-disagree" class="cursor-pointer flex items-center justify-center px-4 py-2 rounded-md text-sm font-medium text-white bg-red-400 hover:bg-yellow-300">
                        {{ trans('cookie-consent::texts.disagree') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("cookie-disagree").addEventListener("click", function() {
        // Redirect to previous page
        window.history.back();

        // Check if previous page still contains the domain name
        if (document.referrer.includes("jpsretail.nl")) {
            // Redirect to google.com
            window.location.href = "https://www.google.com";
        }
    });
</script>
