@props(['name', 'label', 'type' => 'text', 'required' => false, 'placeholder' => '', "value" => true])

@php
    $defaultInputValue = [
        'id' => $name,
        'name' => $name,
        'class' => 'border border-slate-400 rounded p-2',
        'type' => $type,
        'required' => $required,
        'placeholder' => $placeholder,
        'value' => $value ? old($name) : ""
    ];
@endphp

<div class="flex flex-col gap-1">
    <label for="{{ $name }}">{{ $label }}</label>
    <input {{ $attributes($defaultInputValue) }} >
    @error($name)
        <p class="text-xs text-rose-500">{{ $message }}</p>
    @enderror
</div>
