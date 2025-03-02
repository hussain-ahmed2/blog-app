<x-layout>

    <x-heading name="Register" />

    <div class="bg-white p-5 rounded-xl">
        <h2 class="text-center mb-5">Create an Account</h2>

        <form  method="POST" action="/register" class="flex flex-col gap-4">
            @csrf

            <x-form.input-field name="name" label="Name" type="name" />
            <x-form.input-field name="email" label="Email" type="email" />
            <x-form.input-field name="password" label="Password" type="password" />
            <x-form.input-field name="password_confirmation" label="Confirm Password" type="password" />

            <x-form.form-button class="mx-auto btn bg-cyan-500 hover:bg-cyan-600 text-white">Register</x-form.form-button>
        </form>
    </div>

</x-layout>