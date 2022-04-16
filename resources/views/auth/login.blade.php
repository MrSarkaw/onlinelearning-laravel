@extends('layouts.app')

@section('content')


<div class="w-4/12 mx-auto">
    @if($errors->any())
        @foreach ($errors->all() as $row )
            <p class="text-center mt-3  text-white bg-red-700 rounded p-1">{{ $row }}</p>
        @endforeach
    @endif
</div>

<form method="post" action="{{ route('login') }}">
    @csrf
    <div class=" flex mt-10 justify-center">
        <div class="w-4/12 rounded-lg text-white mainColor overflow-hidden">
            <div class="p-4 text-center uppercase boxColor font-bold text-white">
               LOGIN
            </div>
            <div class="py-5 px-5">
                <p class="text-center mb-4">Find your study partner</p>
                <div>
                    <p>Email</p>
                    <input name="email" value="{{ old('email') }}" type="text" class="bg-transparent p-2 w-full  focus:outline-none rounded border border-gray-100/20">
                </div>
                
                <div class="mt-5">
                    <p>Password</p>
                    <input type="password" name="password" class="bg-transparent p-2 w-full  focus:outline-none rounded border border-gray-100/20">
                </div>
                

                <div class="mt-10">
                    <button  class="bg-cyan-500 py-2 px-4 rounded text-gray-700"> <i class="fas fa-lock"></i> Login</button>
                </div>

                <div class="mt-10 text-center">
                    <p>Haven't signed up yet?</p>
                    <a href="{{ route('register') }}">Register</a>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
