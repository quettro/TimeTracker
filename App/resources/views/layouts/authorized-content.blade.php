<main class="h-[100%] ml-[340px] flex flex-col">
    @include('layouts.authorized-content-navigation')

    <div class="w-[100%] h-[100%] max-w-screen-xl mx-auto">
        <div class="flex flex-col min-h-[100%]">
            <div class="flex-[1_0_auto] py-6">
                @yield('content')
            </div>

            <div class="flex-[0_0_auto] py-6">
                <x-copyright></x-copyright>
            </div>
        </div>
    </div>
</main>
