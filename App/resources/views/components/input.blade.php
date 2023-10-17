@props(['invalid' => false])

<input {{ $attributes->class(['input', 'is-invalid' => $invalid])->merge(['type' => 'text']) }}>
