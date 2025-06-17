<x-layout>
    <x-slot name="title">
        form4
    </x-slot>

    <div class="container my-5">
        <h1>Upload file Form</h1>
        <x-form.errors />

        <form action="{{ route('forms.form4') }}" method= "post" enctype="multipart/form-data">
            @csrf
            <x-form.input name="image" label="Avatar" type="file"  />




            <button class = "btn btn-success px-5">Register</button>


        </form>
    </div>

</x-layout>
