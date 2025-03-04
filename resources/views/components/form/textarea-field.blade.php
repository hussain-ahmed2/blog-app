@props(['name', 'label', 'type' => 'text', 'required' => false, 'placeholder' => '', "value" => true, 'rows' => 4])

@php
    $defaultInputValue = [
        'id' => $name,
        'name' => $name,
        'class' => 'border border-slate-400 rounded p-2',
        'type' => $type,
        'required' => $required,
        'placeholder' => $placeholder,
        'rows' => $rows
    ];
@endphp

<div class="flex flex-col gap-1">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea {{ $attributes($defaultInputValue) }} >{{ $value ? old($name) : "" }}</textarea>
    @error($name)
        <p class="text-xs text-rose-500">{{ $message }}</p>
    @enderror
</div>
