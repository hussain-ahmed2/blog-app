<x-layout>

    <x-slot:pageTitle>Create Post</x-slot:pageTitle>

    <x-heading name="Create Post" />

    <div class="bg-white p-5 rounded-xl">
        <form class="flex flex-col gap-3" method="POST" action="/posts">
            @csrf

            <x-form.input-field name="title" label="Title" />

            <x-form.textarea-field name="content" label="Content" />
            
            <x-form.select-field name="category" label="Category" :options="$categories" />

            <x-form.form-button class="btn border-slate-300 w-fit mx-auto hover:bg-slate-200">Post</x-form.form-button>

        </form>
    </div>

</x-layout>