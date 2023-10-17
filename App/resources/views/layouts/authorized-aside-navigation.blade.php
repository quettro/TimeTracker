<div class="px-8">
    <nav class="flex flex-col gap-2">
        <a href="{{ route('dashboard') }}" @class(['flex items-center gap-5 py-[1.1rem] px-5 rounded-lg hover:bg-indigo-50 hover:text-indigo-600', '!bg-indigo-600 !text-indigo-50' => request()->routeIs('dashboard')])>
            <i class="fa-solid fa-layer-group fa-fw fa-sm"></i> {{ __('Дашборд') }}</a>

        <a href="{{ route('project.index') }}" @class(['flex items-center gap-5 py-[1.1rem] px-5 rounded-lg hover:bg-indigo-50 hover:text-indigo-600', '!bg-indigo-600 !text-indigo-50' => request()->routeIs('project.*')])>
            <i class="fa-solid fa-diagram-project fa-fw fa-sm"></i> {{ __('Проекты') }}</a>

        <a href="{{ route('task.index') }}" @class(['flex items-center gap-5 py-[1.1rem] px-5 rounded-lg hover:bg-indigo-50 hover:text-indigo-600', '!bg-indigo-600 !text-indigo-50' => request()->routeIs('task.*')])>
            <i class="fa-solid fa-bars-progress fa-fw fa-sm"></i> {{ __('Задачи') }}</a>

        <a href="{{ route('statistics.index') }}" @class(['flex items-center gap-5 py-[1.1rem] px-5 rounded-lg hover:bg-indigo-50 hover:text-indigo-600', '!bg-indigo-600 !text-indigo-50' => request()->routeIs('statistics.*')])>
            <i class="fa-solid fa-chart-bar fa-fw fa-sm"></i> {{ __('Статистика') }}</a>
    </nav>
</div>
