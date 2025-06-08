<x-layout>
    <x-slot name="title">
        form1
    </x-slot>

      <div class="container my-5">
        <h1>Form 1</h1>
         <form action="{{route('forms.form1')}}" method= "post">
         @csrf
         <div class="mb-3">
             <label for="name">Name</label>
            <input type="text" name ="name" id ="name" placeholder ="Enter your name" class ="form-control">

         </div>


            <button type = "btn btn-success px-5">Send</button>


    </form>
      </div>

</x-layout>

