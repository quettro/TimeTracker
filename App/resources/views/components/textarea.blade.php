@props(['invalid' => false, 'value' => $slot])

<textarea {{ $attributes->class(['textarea', 'is-invalid' => $invalid]) }}>{{ $value }}</textarea>
