<x-layout>
    <x-slot:pageTitle>Blog</x-slot:pageTitle>
    
    <x-heading name="Blogs" />

    <x-post.post-container :$posts />

    <div class="mt-5">
        {{ $posts->links('pagination::custom') }}
    </div>
</x-layout>
