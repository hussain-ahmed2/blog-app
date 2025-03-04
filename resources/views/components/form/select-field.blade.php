@props(['name', 'label', 'class' => 'border border-slate-400 p-2 rounded', 'options' => []])

<div class="flex flex-col gap-1">
    <label for="{{ $name }}">{{ $label }}</label>
    <select class="{{ $class }}" name="{{$name}}" id="{{$name}}">
        <option selected disabled>Please select a {{ $name }}</option>
        @foreach ($options as $option)
            <option value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
    </select>
    @error($name)
        <p class="text-sm text-rose-500">{{ $message }}</p>
    @enderror
</div>