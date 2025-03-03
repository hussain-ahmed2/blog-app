<x-layout>
    <x-slot:pageTitle>All Posts</x-slot:pageTitle>

    <x-heading name="All Blog Posts" />

    @if ($posts->count())
        <x-post.post-container :$posts />

        <div class="mt-5">
            {{ $posts->links('pagination::custom') }}
        </div>
    @else
        <p class="text-slate-600">No Post available.</p>
    @endif

</x-layout>
