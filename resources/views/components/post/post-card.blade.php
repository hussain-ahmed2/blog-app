@props(['post' => []])

<article class="bg-white p-5 rounded-xl shadow-sm">
    <div>
        <h4 class="text-sm font-semibold mb-2">{{ $post->user->name }}</h4>
    </div>
    <div class="flex flex-col gap-1">
        <a href="/posts/{{ $post->slug }}" class="title">{{ $post->title }}</a>
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
