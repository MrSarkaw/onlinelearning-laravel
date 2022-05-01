@extends('layouts.app')
@section('content')

<div class="flex flex-wrap mt-4 w-10/12 mx-auto">
    <div class="w-2/12 ">
       <x-topic :topics="$topics" :rooms="$rooms" />
    </div>
    <div class="w-7/12 pl-5 text-xl">
       <div class="text-center text-white">
           <img style="background-image:url('{{ asset('images/'.$profile->image) }}')" class="w-20 h-20 mx-auto coverImg rounded-full" alt="">
           <p class="text-2xl mt-2">{{ $profile->name }}</p>
           <p class=" my-2">{{ $profile->username }}</p>
           @auth
                @if($profile->id == Auth::id())
                    <a href="{{ route('profileedit') }}" class="px-4 border-2 border-cyan-500 text-cyan-500 rounded-full py-1 ">Edit Profile</a>
                @endif
           @endauth
       </div>
       <div class="mt-10">
           <p class="text-sm mainColorText uppercase">ABOUT</p>
           <p class="text-white text-sm">{{ $profile->bio }}</p>
       </div>
       <div class="mt-4">
           <p class="text-sm mainColorText uppercase">STUDY ROOMS HOSTED BY {{ $profile->name }}</p>
       </div>
        <x-room :rooms="$profile->rooms " />
    </div>
    <div class="w-3/12 pl-5">
            <x-messages :messages="$profile->messages" />
     </div>
</div>

@endsection