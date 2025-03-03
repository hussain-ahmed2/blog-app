@props(['post'])


<article onclick="window.location='/posts/{{ $post->id }}'" class="bg-white p-5 rounded-xl shadow-sm">
    <div>
        <a onclick="event.stopPropagation()" href="/authors/{{ $post->user->id }}" class="text-sm font-semibold mb-2 text-cyan-500 hover:underline">
            {{ $post->user->name }}
        </a>
    </div>
    <div class="flex flex-col gap-1">
        <h3 class="title">{{ $post->title }}</h3>
        <p class="text-slate-600 mb-1 text-justify">{{ $post->content }}</p>
    </div>
    <p class="text-right text-xs mb-1 hover:underline cursor-pointer hover:text-cyan-500">view more</p>
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
