<x-layout>
    <x-slot name="title">
        form3
    </x-slot>

    <div class="container my-5">
        <h1>Validation Form</h1>
        <x-form.errors />

        <form action="{{ route('forms.form3') }}" method= "post">
            @csrf
            <x-form.input name="name" label="Name" type="text" hint="Enter your name" />
            <x-form.input name="email" label="Email" type="email" hint="Enter your email" />
            <x-form.input name="phone" label="Phone" type="text" hint="Enter your phone" />
            <x-form.input name="password" label="password" type="password" hint="Enter your password" />
            <x-form.input name="password_confirmation" label="Confirm password" type="password"
                hint="Enter your password confirmation" />



            <button class = "btn btn-success px-5">Register</button>


        </form>
    </div>

</x-layout>
