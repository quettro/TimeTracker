<div class="py-6 px-8">
    <div class="flex justify-between items-center">
        <div class="flex items-center gap-8">
            <div class="h5 !font-semibold">{{ __('Здравствуйте') }}, {{ Auth::user()->name }}!</div>
        </div>

        <div class="flex items-center gap-8">
            <x-dropdown>
                <x-slot name="trigger" class="flex items-center gap-2">
                    {{ Auth::user()->email }} <i class="fa-solid fa-chevron-down fa-fw fa-xs"></i>
                </x-slot>

                <x-slot name="content">
                    <div class="py-2.5">
                        <x-form :action="route('logout')">
                            <x-dropdown-link :href="route('logout')" class="!text-red-500 hover:!bg-red-50 focus:!bg-red-100" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fa-solid fa-right-from-bracket fa-fw text-sm mr-2"></i> {{ __('Выйти') }}
                            </x-dropdown-link>
                        </x-form>
                    </div>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</div>
