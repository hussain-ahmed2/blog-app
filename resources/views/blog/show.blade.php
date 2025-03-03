<x-layout>
    <x-slot:pageTitle>Blog</x-slot:pageTitle>

    <x-heading name="Blog" />

    <article class="bg-white p-5 rounded-xl">
        <div>
            <a href="/authors/{{ $post->user->id }}"
                class="text-sm font-semibold mb-2 hover:text-cyan-500 hover:underline">{{ $post->user->name }}</a>
        </div>
        <div>
            <h3 class="text-lg font-bold mb-2 text-slate-900">{{ $post->title }}</h3>
            <p class="text-slate-600 mb-3 text-justify">{{ $post->content }}</p>
        </div>
        <div class="flex items-center justify-between flex-wrap gap-2">
            <div class="flex gap-5 text-xs">
                <p class="">
                    <span class="me-1">{{ count($post->likes) }}</span> Like
                </p>
                <x-vertical-divider />
                <p class="">
                    <span class="me-1">{{ count($post->comments) }}</span> Comment
                </p>
            </div>
            <p class="text-xs font-light text-slate-500 ms-auto">{{ $post->created_at }}</p>
        </div>
        <div class="my-5 flex items-center gap-8">
            <form method="POST" action="/posts/{{ $post->id }}/like">
                @csrf

                <button
                    class="btn border-slate-300 {{ $post->isLikedByUser() ? 'bg-cyan-500 hover:bg-cyan-600 text-white' : 'hover:bg-slate-200' }}">Like</button>

            </form>
            <div>
                <button onclick="toggleModal()" class="btn border-slate-300 hover:bg-slate-200">Comment</button>
            </div>
        </div>

        <div id="comment-modal" class="mb-5 hidden">
            <form method="POST" class="flex flex-col gap-2" action="/posts/{{ $post->id }}/comment">
                @csrf
                <textarea class="input" name="content" id="content" rows="4"></textarea>
                @error('content')
                    <p class="text-sm text-rose-500">{{ $message }}</p>
                @enderror
                <x-form.form-button class="w-fit ms-auto border-slate-300 hover:bg-slate-200">Send</x-form.form-button>
            </form>
        </div>

        <script>
            const commentModal = document.getElementById('comment-modal');
            const content = document.getElementById('content');
            let isCommentModalOpen = false;

            function toggleModal() {
                commentModal.classList.toggle('hidden');

                if (!isCommentModalOpen) {
                    content.focus();
                }

                isCommentModalOpen = !isCommentModalOpen;
            }
        </script>

        @error('content')
            <script>
                isCommentModalOpen = true;
                commentModal.classList.remove('hidden');
            </script>
        @enderror

        @if (count($post->comments))
            <x-horizontal-divider />
        @endif

        <div class="flex flex-col gap-5 mt-5">
            <p class="text-sm text-slate-600">Recent Comments</p>
            @foreach ($post->comments as $comment)
                <div class="p-4 bg-slate-100 rounded-lg">
                    <a href="/authors/{{ $comment->user->id }}"
                        class="font-semibold text-sm hover:underline hover:text-cyan-500">{{ $comment->user->name }}</a>
                    <p class="mt-1 text-gray-600">{{ $comment->content }}</p>
                    <p class="text-right font-thin text-xs">{{ $comment->created_at }}</p>
                </div>
            @endforeach
        </div>
    </article>
</x-layout>
