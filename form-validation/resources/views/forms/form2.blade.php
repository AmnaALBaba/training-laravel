<x-layout>
    <x-slot name="title">
        form2
    </x-slot>

       <div class="container my-5">
        <h1>Register Form</h1>
         <form action="{{route('forms.form2')}}" method= "post">
         @csrf
         <div class="mb-3">
             <label for="name">Name</label>
            <input type="text" name ="name" id ="name" placeholder ="Enter your name" class ="form-control">

         </div>
         <div class="mb-3">
             <label for="email">Eamil</label>
            <input type="email" name ="email" id ="email" placeholder ="Enter your email" class ="form-control">

         </div>
         <div class="mb-3">
             <label for="phone">Phone</label>
            <input type="text" name ="phone" id ="phone" placeholder ="Enter your phone" class ="form-control">

         </div>
         <div class="mb-3">
             <label for="password">Password</label>
            <input type="text" name ="password" id ="password" placeholder ="Enter your password" class ="form-control">

         </div>
         <div class="mb-3">
             <label for="name">Confirm Password</label>
            <input type="text" name ="confirm password" id ="confirm password" placeholder ="Enter your confirm password" class ="form-control">

         </div>


            <button class = "btn btn-success px-5">Register</button>


    </form>
      </div>

</x-layout>

