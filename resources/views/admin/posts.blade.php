<x-layout>
    <x-slot:pageTitle>Dashboard</x-slot:pageTitle>

    <x-heading name="Dashboard" />

    <section class="flex">
        <x-admin.sidebar />

        <div class="flex-1 p-6 bg-slate-100">
            <x-heading name="Blog Dashboard" />

            <h3 class="text-lg font-semibold mb-4">Recent Posts</h3>
            
            <x-post.post-container :$posts />

            <div class="mt-5">
                {{ $posts->links('pagination::custom') }}
            </div>
        </div>
    </section>

</x-layout>
