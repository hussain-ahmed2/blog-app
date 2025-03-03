<x-layout>
    <x-slot:pageTitle>Categories</x-slot:pageTitle>

    <x-heading name="Categories" />

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5">
        @foreach ($categories as $category)
            <a class="btn border-slate-300" href="/categories/{{ $category->id }}">{{ $category->name }}</a>
        @endforeach
    </div>
</x-layout>
