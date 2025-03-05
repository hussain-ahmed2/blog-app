<x-layout>
    <x-slot:pageTitle>Dashboard</x-slot:pageTitle>

    <x-heading name="Dashboard" />

    <section class="flex">
        <x-admin.sidebar />

        <div class="flex-1 p-6 bg-slate-100">
            <x-admin.dashboard-grid :$totalPosts :$totalComments :$totalFollowers :$posts />
        </div>
    </section>

</x-layout>
