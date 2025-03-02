@props(['posts' => []])

<div class="flex flex-col gap-5">
    @foreach ($posts as $post)
        <x-post.post-card :$post />
    @endforeach
</div>
