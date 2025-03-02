<x-layout>
    <x-slot:pageTitle>Blog</x-slot:pageTitle>

    <x-page-heading name="Blog" />

    <article class="bg-slate-100 p-5 rounded-xl">
        <div>
            <h4 class="text-sm font-semibold mb-2">{{ $post->user->name }}</h4>
        </div>
        <div>
            <h3 href="/blogs/{{ $post->slug }}" class="text-lg font-bold mb-2 text-slate-900">{{ $post->title }}</h3>
            <p class="text-slate-600 mb-3">{{ $post->content }}</p>
        </div>
        <div class="flex items-center justify-between flex-wrap gap-2">
            <div class="flex gap-5">
                <p class="text-sm">
                    <span class="me-1">{{ count($post->likes) }}</span> Like
                </p>
                <x-vertical-divider />
                <p class="text-sm">
                    <span class="me-1">{{ count($post->comments) }}</span> Comment
                </p>
            </div>
            <p class="text-xs font-light text-slate-500 ms-auto">{{ $post->created_at }}</p>
        </div>
    </article>
</x-layout>
