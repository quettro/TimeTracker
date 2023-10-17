@props(['invalid' => false, 'checked' => false])

<label for="{{ $attributes->get('id') }}" class="inline-flex justify-start items-center gap-3"><input {{ $attributes->class(['checkbox', 'is-invalid' => $invalid])->merge(['type' => 'checkbox', 'value' => 1]) }} @checked($checked)><span class="text-slate-500">{{ $slot }}</span></label>
