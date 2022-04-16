@extends('layouts.app')

@section('content')

<div class="w-4/12 mx-auto">
    @if($errors->any())
        @foreach ($errors->all() as $row )
            <p class="text-center mt-3  text-white bg-red-700 rounded p-1">{{ $row }}</p>
        @endforeach
    @endif
</div>

<form method="post" class="mt-2" action="register">
    @csrf
    <div class="w-4/12 mx-auto rounded-lg text-white mainColor overflow-hidden">
        <div class="p-4 text-center uppercase boxColor font-bold text-white">
           Register
        </div>
        <div class="py-5 px-5">
            <p class="text-center mb-4">Find your study partner</p>
          
            
            <div class="mt-5">
                <p>name</p>
                <input type="text" value="{{ old('name') }}" name="name" placeholder="name" class='bg-transparent p-2 w-full  focus:outline-none rounded border border-gray-100/20'>
            </div>
            
       
           
            <div class="mt-5">
                <p>email</p>
                <input type="email" value="{{ old('email') }}" name="email" placeholder="email" class='bg-transparent p-2 w-full  focus:outline-none rounded border border-gray-100/20'>
            </div>
            
       
           
            <div class="mt-5">
                <p>password</p>
                <input type="password" name="password" placeholder="*****" class='bg-transparent p-2 w-full  focus:outline-none rounded border border-gray-100/20'>
            </div>
       
           
            <div class="mt-5">
                <p>password confirmation</p>
                <input type="password" name="password_confirmation" placeholder="*****" class='bg-transparent p-2 w-full  focus:outline-none rounded border border-gray-100/20'>
            </div>
            
            <div class="mt-10">
                <button  class="bg-cyan-500 py-2 px-4 rounded text-gray-700"> <i class="fas fa-lock"></i> Register</button>
            </div>

            <div class="mt-10 text-center">
                <p>Have you signed up?</p>
                <a href="{{ route('login') }}">Login</a>
            </div>
        </div>
    </div>
</form>
@endsection
