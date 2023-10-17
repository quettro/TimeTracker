<aside {{ $attributes->class('w-[340px] h-[100%] fixed top-0 left-0 bg-white border-r border-slate-200') }}>
    <div class="flex flex-col h-[100%]">
        <div class="flex-[0_0_auto]">
            <div {{ $h->attributes->class('py-6 px-8') }}>{{ $h }}</div>
        </div>

        <div class="flex-[1_0_auto] h-[0%] overflow-y-auto">
            <div {{ $c->attributes->class('py-6') }}>{{ $c }}</div>
        </div>

        <div class="flex-[0_0_auto]">
            <div {{ $f->attributes->class('py-6 px-8') }}>{{ $f }}</div>
        </div>
    </div>
</aside>
