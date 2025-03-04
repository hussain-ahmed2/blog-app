<x-layout>
    <x-slot:pageTitle>Search</x-slot:pageTitle>

    <x-heading name="Search" />

    <form method="GET" action="/search" class="flex gap-1 mb-5">
        <input class="input bg-white" type="text" name="query" placeholder="type here..." value="{{ request('query')}}">
        <x-form.form-button class="border-slate-300 bg-cyan-500 hover:bg-cyan-400">Search</x-form.form-button>
    </form>

    @if ($query)
        <p class="mb-5">
            Search result for: {{ $query }}
        </p>

        <x-post.post-container :$posts />

        <div class="mt-5">
            {{ $posts->links('pagination::custom') }}
        </div>
    @endif
</x-layout>
