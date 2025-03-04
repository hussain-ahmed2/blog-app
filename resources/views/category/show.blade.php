<x-layout>
    <x-slot:pageTitle>Blog Category - {{ $category->name }}</x-slot:pageTitle>
    
    <x-heading name="{{ $category->name }}" />

    <form action="/categories/{{ $category->id }}" method="get"
        class="bg-white flex justify-end mb-5 px-5 py-2 rounded-xl border border-slate-300 gap-8">
        <div class="flex gap-4 items-center">
            <label for="sort">Sort By</label>
            <select class="border border-slate-300 p-2 rounded outline-none focus:ring-[0.1875rem] ring-cyan-500/50"
                name="sort" id="sort" onchange="this.form.submit()">
                <option value="created_at" {{ request('sort', 'created_at') == 'created_at' ? 'selected' : '' }}>Created
                </option>
                <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>Title</option>
            </select>
        </div>
        <div class="flex gap-4 items-center">
            <label for="order">Order By</label>
            <select class="border border-slate-300 p-2 rounded outline-none focus:ring-[0.1875rem] ring-cyan-500/50"
                name="order" id="order" onchange="this.form.submit()">
                <option value="asc" {{ request('order', 'asc') == 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request('order', 'desc') == 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
        </div>
    </form>

    @if ($posts->count())
        <x-post.post-container :$posts />

        <div class="mt-5">
            {{ $posts->links('pagination::custom') }}
        </div>
    @else
        <p class="text-slate-600">No Post available.</p>
    @endif

</x-layout>