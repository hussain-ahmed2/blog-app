<x-heading name="Blog Dashboard" />

<section>
    <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-4 shadow-md rounded-lg">
            <h3 class="text-lg font-semibold">Total Posts</h3>
            <p class="text-2xl font-bold">{{ $totalPosts }}</p>
        </div>
        <div class="bg-white p-4 shadow-md rounded-lg">
            <h3 class="text-lg font-semibold">Comments Received</h3>
            <p class="text-2xl font-bold">{{ $totalComments }}</p>
        </div>
        <div class="bg-white p-4 shadow-md rounded-lg">
            <h3 class="text-lg font-semibold">Followers</h3>
            <p class="text-2xl font-bold">{{ $totalFollowers }}</p>
        </div>
    </div>

    <div class="mt-10 bg-white p-6 shadow-md rounded-lg">
        <h3 class="text-lg font-semibold mb-4">Recent Activity</h3>
        <ul>
            @foreach ($posts as $post)
                <li>Updated post: {{ $post->title }} </li>
            @endforeach
        </ul>
    </div>
</section>
