@props(['position' => 'right'])

<div {{ $attributes->class('relative') }}>
    <div x-data="{open: false}" @click.outside="open = false" @close.stop="open = false">
        <div {{ $trigger->attributes->class('cursor-pointer select-none') }} @click.stop.prevent="open = !open">{{ $trigger }}</div>

        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            @style([
                'display: none;'
            ])
            @class([
                'absolute z-50 mt-2', 'left-0' => $position === 'left', 'right-0' => $position === 'right',
            ])>

            <div
                {{ $content->attributes->class('w-[14rem] shadow-md shadow-slate-200 rounded-lg ring-1 ring-slate-900 ring-opacity-5 bg-white') }}>
                {{ $content }}
            </div>
        </div>
    </div>
</div>
