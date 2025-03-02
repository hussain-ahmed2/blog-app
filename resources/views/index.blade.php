<x-layout>
    <x-slot:pageTitle>Blog</x-slot:pageTitle>

    <section class="">
        <div class="bg-slate-600 text-white py-16 text-center rounded-sm">
            <h1 class="text-4xl font-bold">Welcome to Blog</h1>
            <p class="mt-2 text-lg">Explore articles, tutorials, and tech insights.</p>
            <a href="/posts"
                class="mt-4 inline-block bg-white text-slate-600 font-semibold px-6 py-2 rounded-full hover:bg-gray-200">
                View Posts
            </a>
        </div>

        <div class="mt-10">
            <x-heading name="Featured Posts" />
            <x-post.post-card :post="$featuredPost" />
        </div>

        <div class="mt-10">
            <x-heading name="Recent Posts" />
            <x-post.post-container :posts="$recentPosts" />
            
            <a class="block w-fit mx-auto mt-5 bg-white hover:underline" href="/posts">View More</a>
        </div>
    </section>
</x-layout>
