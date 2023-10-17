<div class="px-8">
    <nav class="flex flex-col gap-2">
        <a href="{{ route('dashboard') }}" @class(['flex items-center gap-5 py-[1.1rem] px-5 rounded-lg hover:bg-indigo-50 hover:text-indigo-600', '!bg-indigo-600 !text-indigo-50' => request()->routeIs('dashboard')])>
            <i class="fa-solid fa-layer-group fa-fw text-sm"></i> {{ __('Дашборд') }}</a>
    </nav>
</div>
