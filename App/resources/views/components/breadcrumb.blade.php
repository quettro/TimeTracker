@unless ($breadcrumbs->isEmpty())
    <nav class="justify-between px-4 py-3 border border-slate-300 rounded-lg bg-slate-50">
        <ol class="flex items-center gap-3">
            @foreach($breadcrumbs as $breadcrumb)
                @if($loop->first)
                    <li>
                        <div class="flex items-center gap-3">
                            <a href="{{ $breadcrumb->url }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">{{ $breadcrumb->title }}</a>
                        </div>
                    </li>
                @else
                    <li>
                        <div class="flex items-center gap-3">
                            <svg class="w-3 h-3 text-slate-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="{{ $breadcrumb->url }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">{{ $breadcrumb->title }}</a>
                        </div>
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
@endunless
